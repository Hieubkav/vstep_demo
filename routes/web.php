<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Artisan;

// Homepage
Route::get('/', [MainController::class, 'homepage'])->name('homepage');
Route::get('/homepage', [MainController::class, 'homepage'])->name('homepage.alt');

// Main Pages
Route::get('/contact-us', [MainController::class, 'contactUs'])->name('contact-us');
Route::get('/projects', [MainController::class, 'projects'])->name('projects');
Route::get('/pricing', [MainController::class, 'pricing'])->name('pricing');
Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about-us');
Route::get('/jobs', [MainController::class, 'jobs'])->name('jobs');
Route::get('/asset-library', [MainController::class, 'assetLibrary'])->name('asset-library');
Route::get('/courses', [MainController::class, 'courses'])->name('courses');
Route::get('/services', [MainController::class, 'services'])->name('services');

// Specific Project Pages
Route::get('/caron-paris-aimez-moi-3d-visualization', [MainController::class, 'caronParisProject'])->name('caron-paris-project');
Route::get('/gdivine-babydoll-blush-3d-visualization', [MainController::class, 'gdivineVisualizationProject'])->name('gdivine-visualization-project');
Route::get('/vanilla-sex-visualization', [MainController::class, 'tomFordProject'])->name('tom-ford-project');
Route::get('/bois-1920-animation', [MainController::class, 'bois1920Project'])->name('bois-1920-project');
Route::get('/gdivine-baby-doll-blush-3d-animation', [MainController::class, 'gdivineAnimationProject'])->name('gdivine-animation-project');
Route::get('/hyaluronce-animation', [MainController::class, 'hyaluronceProject'])->name('hyaluronce-project');

// Service Pages
Route::get('/marketing', [MainController::class, 'marketing'])->name('marketing');
Route::get('/architectural-visualization', [MainController::class, 'architecturalVisualization'])->name('architectural-visualization');

// Legal Pages
Route::get('/gtcs', [MainController::class, 'gtcs'])->name('gtcs');
Route::get('/impressum', [MainController::class, 'impressum'])->name('impressum');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Utility
Route::get('/run-storage-link', function () {
    try {
        Artisan::call('storage:link');
        return response()->json(['message' => 'Storage linked successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});



// Route để liệt kê tất cả section IDs
Route::get('/section-ids', function () {
    $html = '<h1>Danh sách Section IDs cho MenuItem</h1>';
    $html .= '<p>Các ID này có thể sử dụng trong MenuItem với component_target</p>';
    $html .= '<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } th { background-color: #f2f2f2; }</style>';

    $sections = [
        // Sections có ID cố định
        ['id' => 'home', 'name' => 'Hero Section', 'description' => 'Phần đầu trang với video background'],
        ['id' => 'services', 'name' => 'Services Section', 'description' => 'Phần dịch vụ (6 services)'],
        ['id' => 'about', 'name' => 'About/Turning Section', 'description' => 'Phần giới thiệu về studio'],
        ['id' => 'gallery', 'name' => 'Gallery Picture Section', 'description' => 'Phần gallery ảnh (18 ảnh)'],
        ['id' => 'stats', 'name' => 'Stats Section', 'description' => 'Phần thống kê (Years, Projects, etc.)'],
        ['id' => 'why-choose-us', 'name' => 'Why Choose Us Section', 'description' => 'Phần tại sao chọn chúng tôi'],
        ['id' => 'your-advice', 'name' => 'Your Advice Section', 'description' => 'Phần video showcase'],
        ['id' => 'logo-brand', 'name' => 'Logo Brand Section', 'description' => 'Phần chữ ký CEO và client logos'],
        ['id' => 'we-work', 'name' => 'We Work Section', 'description' => 'Phần quy trình làm việc'],
        ['id' => 'contact', 'name' => 'Contact Form Section', 'description' => 'Phần form liên hệ'],
        ['id' => 'word-slider', 'name' => 'Word Slider Section', 'description' => 'Phần text animation (EMPOWER/ELEVATE/ENCHANT)'],

        // Sections khác có thể có
        ['id' => 'projects', 'name' => 'Projects Section', 'description' => 'Phần dự án (nếu có)'],
        ['id' => 'testimonials', 'name' => 'Testimonials Section', 'description' => 'Phần đánh giá khách hàng (nếu có)'],
        ['id' => 'pricing', 'name' => 'Pricing Section', 'description' => 'Phần bảng giá (nếu có)'],
        ['id' => 'team', 'name' => 'Team Section', 'description' => 'Phần đội ngũ (nếu có)'],
        ['id' => 'footer', 'name' => 'Footer Section', 'description' => 'Phần footer'],
    ];

    $html .= '<table>';
    $html .= '<tr><th>Section ID</th><th>Tên Section</th><th>Mô tả</th><th>Cách sử dụng</th></tr>';

    foreach ($sections as $section) {
        $html .= '<tr>';
        $html .= '<td><code>' . $section['id'] . '</code></td>';
        $html .= '<td><strong>' . $section['name'] . '</strong></td>';
        $html .= '<td>' . $section['description'] . '</td>';
        $html .= '<td><code>#' . $section['id'] . '</code></td>';
        $html .= '</tr>';
    }

    $html .= '</table>';

    $html .= '<h2>Cách sử dụng trong MenuItem Admin</h2>';
    $html .= '<ol>';
    $html .= '<li>Vào <strong>/admin/menu-items</strong></li>';
    $html .= '<li>Tạo hoặc chỉnh sửa menu item</li>';
    $html .= '<li>Trong field <strong>"Component Target"</strong>, nhập một trong các ID trên (không cần #)</li>';
    $html .= '<li>Ví dụ: nhập <code>services</code> để link đến Services Section</li>';
    $html .= '<li>Lưu lại và menu sẽ scroll đến section tương ứng</li>';
    $html .= '</ol>';

    $html .= '<h2>Lưu ý</h2>';
    $html .= '<ul>';
    $html .= '<li>Chỉ sử dụng các ID này cho <strong>component_target</strong>, không phải URL</li>';
    $html .= '<li>Nếu muốn link external, sử dụng field <strong>"URL"</strong> thay vì component_target</li>';
    $html .= '<li>Một số section có thể không hiển thị nếu bị tắt trong WebDesign admin</li>';
    $html .= '</ul>';

    return $html;
});


