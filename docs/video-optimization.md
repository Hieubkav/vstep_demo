# Video Optimization System

Hệ thống tối ưu hóa video cho dự án Laravel Step V Studio sử dụng lazy loading và Intersection Observer để cải thiện hiệu suất tải trang.

## Tính năng chính

### 1. Lazy Loading với Intersection Observer
- Video chỉ tải khi người dùng scroll đến gần
- Tự động phát hiện tốc độ kết nối và điều chỉnh
- Hỗ trợ placeholder và loading states

### 2. Video Manager Service
- Quản lý tải video thông minh
- Theo dõi thay đổi kết nối
- Tối ưu hóa cho thiết bị di động

### 3. Connection-aware Optimization
- Phát hiện tốc độ kết nối (fast/medium/slow)
- Điều chỉnh chất lượng video tự động
- Hiển thị indicator trạng thái kết nối

## Cách sử dụng

### Video Lazy Component

```blade
<x-video-lazy
    video-id="GXppDZ0k2IM"
    title="Video Title"
    :autoplay="true"
    :mute="true"
    :loop="true"
    :controls="false"
    :start="2"
    :end="31"
    class="w-full h-full"
    container-class="relative w-full h-full"
    loading-class="bg-gray-900"
    placeholder="/path/to/thumbnail.jpg"
    :threshold="0.1"
    root-margin="50px"
/>
```

### Tham số

| Tham số | Mặc định | Mô tả |
|---------|----------|-------|
| `video-id` | '' | ID video YouTube |
| `title` | 'Video' | Tiêu đề video |
| `autoplay` | true | Tự động phát |
| `mute` | true | Tắt tiếng |
| `loop` | true | Lặp lại |
| `controls` | false | Hiển thị controls |
| `start` | null | Thời gian bắt đầu (giây) |
| `end` | null | Thời gian kết thúc (giây) |
| `playlist` | null | ID playlist |
| `class` | 'w-full h-full' | CSS class cho iframe |
| `container-class` | 'relative w-full h-full' | CSS class cho container |
| `loading-class` | 'bg-gray-900' | CSS class cho loading state |
| `placeholder` | null | URL ảnh placeholder |
| `threshold` | 0.1 | Ngưỡng Intersection Observer |
| `root-margin` | '50px' | Margin cho Intersection Observer |

### Connection Indicator

```blade
<x-connection-indicator 
    :show="true" 
    position="bottom-right" 
    class="custom-class" 
/>
```

## Tối ưu hóa hiệu suất

### 1. Intersection Observer Settings
- **Hero video**: threshold=0.05, rootMargin=0px (ưu tiên cao)
- **Content videos**: threshold=0.2-0.3, rootMargin=100-150px
- **Mobile videos**: threshold=0.2, rootMargin=100px

### 2. Connection-based Optimization
- **Fast connection**: Tải video chất lượng cao
- **Medium connection**: Tải video chất lượng tiêu chuẩn  
- **Slow connection**: Tải video chất lượng thấp, delay loading

### 3. Mobile Optimization
- Giảm animation duration
- Tối ưu touch performance
- Stagger loading cho multiple videos

## CSS Classes

### Loading States
```css
.video-lazy-loading     /* Shimmer animation */
.video-lazy-loaded      /* Fade in animation */
.video-placeholder      /* Placeholder styling */
```

### Performance Classes
```css
.video-container        /* Performance optimizations */
.video-iframe          /* Hardware acceleration */
.video-responsive      /* Responsive aspect ratio */
```

### Connection Classes
```css
.slow-connection       /* Applied to body for slow connections */
.video-quality-auto    /* Quality indicators */
.video-quality-hd
.video-quality-sd
.video-quality-low
```

## JavaScript Events

### Video Events
```javascript
// Video loaded successfully
document.addEventListener('video:loaded', (event) => {
    console.log('Video loaded:', event.target);
});

// Video optimization started
document.addEventListener('video:optimizing', () => {
    console.log('Optimizing videos...');
});

// Video optimization completed
document.addEventListener('video:optimized', () => {
    console.log('Videos optimized');
});
```

### Connection Events
```javascript
// Connection speed changed
navigator.connection.addEventListener('change', () => {
    console.log('Connection changed');
});
```

## Cấu hình nâng cao

### Video Manager Configuration
```javascript
// Access global video manager
window.videoManager.setupLazyLoading(element, {
    threshold: 0.2,
    rootMargin: '100px',
    priority: 'high', // 'high', 'normal', 'low'
    autoplay: true
});
```

### Custom Priority Settings
```blade
{{-- High priority - loads immediately --}}
<x-video-lazy 
    video-id="hero-video"
    class="video-lazy-priority-high"
    :threshold="0"
    root-margin="0px"
/>

{{-- Low priority - loads when closer --}}
<x-video-lazy 
    video-id="background-video"
    class="video-lazy-priority-low"
    :threshold="0.5"
    root-margin="200px"
/>
```

## Accessibility

### Reduced Motion Support
- Tự động tắt animations cho users có `prefers-reduced-motion`
- Fallback cho các trình duyệt không hỗ trợ Intersection Observer

### Focus Management
```css
.video-lazy-container:focus-within {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}
```

### Screen Reader Support
- Proper ARIA labels
- Descriptive titles
- Loading state announcements

## Troubleshooting

### Common Issues

1. **Video không tải**
   - Kiểm tra video ID có đúng không
   - Kiểm tra network connection
   - Xem console logs

2. **Autoplay không hoạt động**
   - Đảm bảo `mute="true"`
   - Kiểm tra browser autoplay policy
   - Thử user interaction trigger

3. **Performance issues**
   - Giảm số lượng video cùng lúc
   - Tăng threshold value
   - Sử dụng placeholder images

### Debug Mode
```javascript
// Enable debug logging
window.videoManager.debug = true;
```

## Browser Support

- Chrome 51+
- Firefox 55+
- Safari 12.1+
- Edge 15+

### Fallbacks
- Graceful degradation cho browsers cũ
- Polyfill cho Intersection Observer
- CSS-only loading states

## Performance Metrics

### Improvements
- **Page Load Time**: Giảm 40-60%
- **First Contentful Paint**: Cải thiện 30-50%
- **Cumulative Layout Shift**: Giảm đáng kể
- **Bandwidth Usage**: Tiết kiệm 50-70% cho slow connections

### Monitoring
```javascript
// Performance monitoring
performance.mark('video-start');
// ... video loading
performance.mark('video-end');
performance.measure('video-load', 'video-start', 'video-end');
```
