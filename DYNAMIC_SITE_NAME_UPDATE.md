# Dynamic Site Name & Image Upload/URL Implementation

## Tổng quan
1. Đã cập nhật toàn bộ website để sử dụng tên website động từ settings thay vì hardcode "Step V Studio"
2. Đã thêm tính năng upload ảnh hoặc sử dụng URL cho tất cả hình ảnh trong WebDesign

## Các file đã được cập nhật

### 1. Helper Functions
- `app/helpers.php` - Function `get_site_name()` đã tồn tại và hoạt động tốt

### 2. Components
- `resources/views/components/seo.blade.php` - Cập nhật props và meta tags
- `resources/views/components/structured-data.blade.php` - Cập nhật WebSite structured data
- `resources/views/components/footer.blade.php` - Cập nhật copyright
- `resources/views/components/dynamic-footer.blade.php` - Cập nhật company_name và copyright
- `resources/views/components/dynamic-why-choose-us.blade.php` - Cập nhật title
- `resources/views/components/dynamic-turning.blade.php` - Cập nhật description
- `resources/views/components/dynamic-we-work.blade.php` - Cập nhật description
- `resources/views/components/dynamic-logo-brand.blade.php` - Cập nhật founder_title
- `resources/views/components/dynamic-your-advice.blade.php` - Cập nhật video title

### 3. Pages
- `resources/views/pages/about-us.blade.php` - Cập nhật story content và founder info
- `resources/views/pages/contact-us.blade.php` - Cập nhật description

### 4. Config
- `config/stepv.php` - Thêm comment về dynamic name

## Cách sử dụng

### Trong Blade Templates
```php
{{ get_site_name() }} // Trả về tên website từ settings
{{ strtoupper(get_site_name()) }} // Trả về tên website viết hoa
```

### Trong PHP Code
```php
$siteName = get_site_name(); // Trả về tên từ settings hoặc fallback "Step V Studio"
```

## Fallback Logic
- Nếu có setting `site_name` → sử dụng giá trị từ database
- Nếu không có setting → sử dụng fallback "Step V Studio"

## Quản lý trong Admin
- Truy cập `/admin/manage-settings`
- Tab "Thương hiệu" → "Tên website"
- Thay đổi và lưu → tự động clear cache

## Cache Management
- Cache được clear tự động khi lưu settings
- Manual clear: `php artisan cache:clear`

## Test Results
✅ Helper functions hoạt động
✅ Settings được load từ database
✅ Fallback logic hoạt động
✅ Cache management hoạt động

## Image Upload/URL Feature

### Các section đã được cập nhật:
1. **Services** - Hỗ trợ upload hoặc URL cho service images
2. **Why Choose Us** - Video placeholder image
3. **Logo Brand** - Signature image và client logos
4. **Gallery Picture** - Tất cả gallery images

### Cách sử dụng trong Admin:
1. Chọn "Upload file" để upload ảnh từ máy tính
2. Chọn "Link URL" để sử dụng ảnh từ URL external
3. ImageHelper tự động xử lý cả hai loại

### Technical Implementation:
- **ImageHelper::getImageUrl()** - Xử lý cả upload và URL
- **get_webdesign_image()** - Helper function an toàn cho WebDesign images
- **Radio buttons** - Cho phép chọn loại image
- **Conditional fields** - Hiển thị field phù hợp theo lựa chọn
- **Backward compatibility** - Vẫn hỗ trợ format cũ
- **Safe array access** - Tránh lỗi "Undefined array key"

## Lưu ý
- Dữ liệu seed vẫn giữ "Step V Studio" làm giá trị mặc định ban đầu
- Tất cả hardcode "Step V Studio" trong templates đã được thay thế
- Website hiện tại đang sử dụng "DH STUDIO" từ settings
- Hình ảnh có thể sử dụng upload hoặc URL external
