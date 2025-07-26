# Hướng dẫn Website Động - Step V Studio

## Tổng quan
Website đã được chuyển từ tĩnh sang động với các tính năng quản lý nội dung thông qua Filament Admin Panel.

## Các Model đã tạo

### 1. Setting Model
- **Mục đích**: Quản lý các cài đặt chung của website
- **Các nhóm cài đặt**:
  - `branding`: Logo, tên website
  - `colors`: Màu chính, màu phụ (#d0ff71, etc.)
  - `seo`: Tiêu đề SEO, mô tả, og_image
  - `contact`: Email, số điện thoại liên hệ

### 2. WebDesign Model
- **Mục đích**: Quản lý các component trong trang chủ
- **Các component**: Hero, About, Services, Portfolio, Contact
- **Tính năng**: Ẩn/hiện, thay đổi vị trí, chỉnh sửa nội dung

### 3. MenuItem Model
- **Mục đích**: Quản lý menu động
- **Tính năng**: Menu con, link tùy chỉnh, link đến component (scroll)

## Filament Admin Panel

### Truy cập Admin Panel
- URL: `http://localhost:8000/admin`
- Đăng nhập bằng tài khoản admin đã tạo

### Các trang quản lý:
1. **Cài đặt** (`/admin/manage-settings`)
   - Quản lý thương hiệu, màu sắc, SEO, liên hệ
   
2. **Thiết kế Web** (`/admin/manage-web-design`)
   - Quản lý các component trang chủ (Hero, About, Services, Portfolio, Contact)
   - Giao diện dạng form với tabs, dễ quản lý hơn table
   
3. **Menu Items** (`/admin/menu-items`)
   - Quản lý menu và submenu

## Helper Functions

### Trong Blade Templates:
```php
// Lấy setting
{{ setting('site_name', 'Default Name') }}
{{ setting('primary_color', '#d0ff71') }}

// Lấy nhóm settings
@php $colors = settings_group('colors'); @endphp

// Lấy component
@php $hero = get_component('hero'); @endphp

// Lấy menu tree
@php $menu = get_menu_tree(); @endphp
```

## Components Động đã tạo

### 1. Dynamic SEO (`<x-dynamic-seo />`)
- Tự động lấy SEO settings từ database
- Open Graph, Twitter Cards
- Canonical URL

### 2. Dynamic Menu (`@include('components.dynamic-menu')`)
- Menu desktop động
- Hỗ trợ submenu

### 3. Dynamic Mobile Menu (`@include('components.dynamic-mobile-menu')`)
- Menu mobile động
- Submenu với animation

### 4. Dynamic Hero (`<x-dynamic-hero />`)
- Hero section động với video background
- Video load ngay lập tức (không lazy load) vì là đầu website
- Sử dụng component `<x-video-hero />` thay vì `<x-video-lazy />`
- Có thể tùy chỉnh từ admin panel

## Cache System
- Tất cả dữ liệu được cache 1 giờ
- Tự động clear cache khi có thay đổi
- Command manual: `php artisan cache:clear-dynamic`

## Cách sử dụng

### 1. Thay đổi logo và branding:
- Vào Admin Panel > Cài đặt > Tab "Thương hiệu"
- Upload logo mới, đổi tên website

### 2. Thay đổi màu sắc:
- Vào Admin Panel > Cài đặt > Tab "Màu sắc"
- Chỉnh màu chính, màu phụ

### 3. Quản lý SEO:
- Vào Admin Panel > Cài đặt > Tab "SEO"
- Chỉnh title, description, og_image

### 4. Quản lý menu:
- Vào Admin Panel > Menu Items
- Thêm/sửa/xóa menu items
- Tạo submenu bằng cách chọn "Menu cha"

### 5. Quản lý components:
- Vào Admin Panel > Thiết kế Web
- Giao diện tabs dễ sử dụng (Hero, About, Services, Portfolio, Contact)
- Bật/tắt từng component
- Chỉnh sửa tiêu đề, phụ đề, nội dung
- Thay đổi vị trí hiển thị

## Migration và Seeder
```bash
# Đã chạy migration
php artisan migrate

# Đã chạy seeder với dữ liệu mẫu
php artisan db:seed
```

## Lưu ý quan trọng
1. Dữ liệu được cache, có thể cần clear cache sau khi thay đổi
2. Hero component sẽ fallback về static nếu không active
3. Menu sẽ hiển thị từ database, không còn hardcode
4. SEO meta tags được generate tự động từ settings
5. Hero video load ngay lập tức để tối ưu trải nghiệm người dùng
6. WebDesign page giờ là form tabs thay vì table để dễ quản lý

## Troubleshooting
- Nếu thay đổi không hiển thị: `php artisan cache:clear-dynamic`
- Nếu lỗi 500: Check logs và đảm bảo đã migrate + seed
- Nếu admin panel không load: Đảm bảo đã tạo user admin
