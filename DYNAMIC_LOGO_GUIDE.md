# Hướng dẫn Logo Động - Step V Studio

## Tổng quan
Website đã được cập nhật để sử dụng logo động từ admin panel thay vì logo cố định. Tất cả các giao diện sẽ tự động sử dụng logo được thiết lập trong admin panel.

## Cách sử dụng

### 1. Cập nhật logo trong Admin Panel
1. Truy cập: `http://127.0.0.1:8000/admin/manage-settings`
2. Vào tab "Thương hiệu" (Branding)
3. Upload logo mới trong trường "Logo website"
4. Nhập tên website trong trường "Tên website"
5. Nhấn "Lưu cài đặt"

### 2. Logo sẽ tự động cập nhật ở:
- Header (cả desktop và mobile)
- Footer
- Favicon
- SEO meta tags (Open Graph, Twitter Card)
- Structured data
- Admin panel Filament

## Helper Functions

### `get_site_logo()`
Trả về URL đầy đủ của logo website với xử lý thông minh:
- Nếu logo từ settings là file upload → trả về `storage/path`
- Nếu logo từ settings là file trong public → trả về `asset(path)`
- Nếu không có setting → trả về logo mặc định `images/logo_dh.png`

```php
// Sử dụng trong blade template
<img src="{{ get_site_logo() }}" alt="Logo">
```

### `get_site_name()`
Trả về tên website từ settings hoặc fallback "Step V Studio":

```php
// Sử dụng trong blade template
<h1>{{ get_site_name() }}</h1>
```

## Các file đã được cập nhật

### 1. Helper Functions
- `app/helpers.php` - Thêm `get_site_logo()` và `get_site_name()`

### 2. Blade Templates
- `resources/views/components/header.blade.php`
- `resources/views/components/footer.blade.php`
- `resources/views/components/dynamic-seo.blade.php`
- `resources/views/components/seo.blade.php`
- `resources/views/components/structured-data.blade.php`

### 3. Admin Panel
- `app/Providers/Filament/AdminPanelProvider.php` - Logo và tên động
- `app/Filament/Pages/ManageSettings.php` - Clear cache khi lưu

### 4. Config
- `config/stepv.php` - Cập nhật comment cho fallback

## Cache Management

Hệ thống sử dụng cache để tối ưu hiệu suất. Cache sẽ tự động được xóa khi:
- Lưu settings trong admin panel
- Chạy seeder UpdateLogoSeeder

Để xóa cache thủ công:
```bash
php artisan cache:clear
```

## Fallback Logic

1. **Logo**: `setting('site_logo')` → `images/logo_dh.png`
2. **Tên website**: `setting('site_name')` → `Step V Studio`

## Testing

Chạy test để đảm bảo mọi thứ hoạt động:
```bash
php artisan test tests/Feature/DynamicLogoTest.php
```

## Lưu ý quan trọng

1. **Upload logo**: Logo upload sẽ được lưu trong `storage/app/public/logos/`
2. **Storage link**: Đảm bảo đã chạy `php artisan storage:link`
3. **Cache**: Settings được cache 1 giờ để tối ưu hiệu suất
4. **Fallback**: Luôn có logo mặc định nếu không có setting

## Troubleshooting

### Logo không hiển thị
1. Kiểm tra storage link: `php artisan storage:link`
2. Kiểm tra quyền thư mục storage
3. Clear cache: `php artisan cache:clear`

### Logo cũ vẫn hiển thị
1. Clear cache: `php artisan cache:clear`
2. Refresh browser (Ctrl+F5)
3. Kiểm tra setting trong admin panel
