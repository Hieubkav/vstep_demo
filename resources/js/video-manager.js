/**
 * Video Manager - Quản lý tải và phát video thông minh
 * Sử dụng Intersection Observer để lazy load video
 */
class VideoManager {
    constructor() {
        this.loadedVideos = new Set();
        this.observers = new Map();
        this.connectionSpeed = this.getConnectionSpeed();
        this.isLowBandwidth = this.connectionSpeed === 'slow';
        
        // Bind methods
        this.handleIntersection = this.handleIntersection.bind(this);
        
        // Initialize
        this.init();
    }
    
    init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setupAutoDiscovery());
        } else {
            this.setupAutoDiscovery();
        }
        
        // Monitor connection changes
        this.monitorConnection();
    }
    
    /**
     * Tự động phát hiện và setup lazy loading cho video
     */
    setupAutoDiscovery() {
        // Tìm tất cả iframe YouTube
        const youtubeIframes = document.querySelectorAll('iframe[src*="youtube"]');
        youtubeIframes.forEach(iframe => {
            if (!iframe.dataset.lazyLoaded) {
                this.setupLazyLoading(iframe);
            }
        });
        
        // Setup mutation observer để theo dõi video mới được thêm
        this.setupMutationObserver();
    }
    
    /**
     * Setup lazy loading cho một video element
     */
    setupLazyLoading(element, options = {}) {
        const config = {
            threshold: options.threshold || 0.1,
            rootMargin: options.rootMargin || '50px',
            priority: options.priority || 'normal', // 'high', 'normal', 'low'
            ...options
        };
        
        // Điều chỉnh config dựa trên connection speed
        if (this.isLowBandwidth) {
            config.threshold = Math.max(config.threshold, 0.3);
            config.rootMargin = '20px';
        }
        
        const observer = new IntersectionObserver(
            (entries) => this.handleIntersection(entries, config),
            {
                threshold: config.threshold,
                rootMargin: config.rootMargin
            }
        );
        
        observer.observe(element);
        this.observers.set(element, observer);
        
        // Mark as setup
        element.dataset.lazyLoaded = 'setup';
    }
    
    /**
     * Xử lý khi video vào viewport
     */
    handleIntersection(entries, config) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Kiểm tra priority và connection
                if (this.shouldLoadVideo(config)) {
                    this.loadVideo(element, config);
                } else {
                    // Delay loading for low priority or slow connection
                    setTimeout(() => {
                        if (entry.isIntersecting) {
                            this.loadVideo(element, config);
                        }
                    }, this.getLoadDelay(config));
                }
            }
        });
    }
    
    /**
     * Tải video
     */
    loadVideo(element, config) {
        if (this.loadedVideos.has(element)) return;
        
        // Mark as loaded
        this.loadedVideos.add(element);
        element.dataset.lazyLoaded = 'loaded';
        
        // Disconnect observer
        const observer = this.observers.get(element);
        if (observer) {
            observer.disconnect();
            this.observers.delete(element);
        }
        
        // Load video based on element type
        if (element.tagName === 'IFRAME') {
            this.loadIframeVideo(element, config);
        } else if (element.tagName === 'VIDEO') {
            this.loadVideoElement(element, config);
        }
        
        // Trigger custom event
        element.dispatchEvent(new CustomEvent('video:loaded', {
            detail: { config, connectionSpeed: this.connectionSpeed }
        }));
    }
    
    /**
     * Tải iframe video (YouTube)
     */
    loadIframeVideo(iframe, config) {
        const originalSrc = iframe.dataset.src || iframe.src;
        
        if (!originalSrc) return;
        
        // Modify URL for better performance on slow connections
        let videoUrl = originalSrc;
        if (this.isLowBandwidth) {
            videoUrl = this.optimizeVideoUrl(videoUrl);
        }
        
        // Set src to trigger loading
        iframe.src = videoUrl;
        
        // Setup autoplay if needed
        if (config.autoplay !== false) {
            iframe.addEventListener('load', () => {
                setTimeout(() => this.triggerAutoplay(iframe), 1000);
            });
        }
    }
    
    /**
     * Tải video element (HTML5)
     */
    loadVideoElement(video, config) {
        const sources = video.querySelectorAll('source[data-src]');
        sources.forEach(source => {
            source.src = source.dataset.src;
            source.removeAttribute('data-src');
        });
        
        if (video.dataset.src) {
            video.src = video.dataset.src;
        }
        
        video.load();
        
        if (config.autoplay !== false) {
            video.play().catch(e => console.log('Autoplay failed:', e));
        }
    }
    
    /**
     * Trigger autoplay cho YouTube iframe
     */
    triggerAutoplay(iframe) {
        try {
            iframe.contentWindow.postMessage(
                '{"event":"command","func":"playVideo","args":""}',
                '*'
            );
        } catch (e) {
            console.log('Video autoplay message failed:', e);
        }
    }
    
    /**
     * Tối ưu URL video cho connection chậm
     */
    optimizeVideoUrl(url) {
        // Giảm quality cho connection chậm
        if (url.includes('youtube')) {
            // Thêm parameter để request quality thấp hơn
            const separator = url.includes('?') ? '&' : '?';
            return url + separator + 'vq=small';
        }
        return url;
    }
    
    /**
     * Kiểm tra có nên load video không
     */
    shouldLoadVideo(config) {
        if (config.priority === 'high') return true;
        if (config.priority === 'low' && this.isLowBandwidth) return false;
        return true;
    }
    
    /**
     * Lấy delay time dựa trên config
     */
    getLoadDelay(config) {
        if (config.priority === 'low') return 2000;
        if (this.isLowBandwidth) return 1000;
        return 500;
    }
    
    /**
     * Phát hiện tốc độ connection
     */
    getConnectionSpeed() {
        if ('connection' in navigator) {
            const connection = navigator.connection;
            if (connection.effectiveType === 'slow-2g' || connection.effectiveType === '2g') {
                return 'slow';
            } else if (connection.effectiveType === '3g') {
                return 'medium';
            }
        }
        return 'fast';
    }
    
    /**
     * Monitor connection changes
     */
    monitorConnection() {
        if ('connection' in navigator) {
            navigator.connection.addEventListener('change', () => {
                this.connectionSpeed = this.getConnectionSpeed();
                this.isLowBandwidth = this.connectionSpeed === 'slow';
            });
        }
    }
    
    /**
     * Setup mutation observer để theo dõi video mới
     */
    setupMutationObserver() {
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === 1) { // Element node
                        // Check if it's a video element
                        if (node.tagName === 'IFRAME' && node.src.includes('youtube')) {
                            this.setupLazyLoading(node);
                        }
                        
                        // Check for video elements inside
                        const videos = node.querySelectorAll?.('iframe[src*="youtube"], video[data-src]');
                        videos?.forEach(video => {
                            if (!video.dataset.lazyLoaded) {
                                this.setupLazyLoading(video);
                            }
                        });
                    }
                });
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
    
    /**
     * Cleanup
     */
    destroy() {
        this.observers.forEach(observer => observer.disconnect());
        this.observers.clear();
        this.loadedVideos.clear();
    }
}

// Initialize global video manager
window.videoManager = new VideoManager();

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = VideoManager;
}
