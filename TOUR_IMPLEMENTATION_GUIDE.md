# Tour Management System - Implementation Guide

## 📁 Cấu trúc đã tạo

### 1. **Service Layer** (`app/Services/TourService.php`)
Service xử lý logic nghiệp vụ cho Tours:
- `getTours($filters)` - Lấy danh sách tour với filter
- `getTourDetail($id)` - Lấy chi tiết tour
- `getAvailableSeats($tourId)` - Tính số chỗ còn trống
- `parseItinerary($tour)` - Parse lịch trình từ JSON/text
- `calculatePrice($tour, $adults, $children)` - Tính giá booking
- `getRelatedTours($tour, $limit)` - Lấy tour liên quan

### 2. **Controller** (`app/Http/Controllers/TourController.php`)
Controller xử lý HTTP requests:
- `index(Request $request)` - Hiển thị trang danh sách tour
- `show($id)` - Hiển thị trang chi tiết tour
- `calculatePrice(Request $request, $id)` - API tính giá
- `booking(Request $request, $id)` - Xử lý booking

### 3. **Views**

#### a. Tour Listing (`resources/views/tours/index.blade.php`)
**Tính năng:**
- Grid hiển thị danh sách tour
- Sidebar filter (destination, category, price range, rating)
- Sort options
- Pagination
- Search box

**Props:**
- `$tours` - Danh sách tour (paginated)
- `$destinations` - Tất cả destinations
- `$categories` - Tất cả categories
- `$filters` - Filter hiện tại

#### b. Tour Detail (`resources/views/tours/show.blade.php`)
**Tính năng:**
- Image gallery (1 ảnh lớn + thumbnails)
- Thông tin tour đầy đủ
- Tour highlights
- What's included
- Detailed itinerary (Day by day)
- Booking sidebar:
  - Chọn ngày
  - Chọn số người (adults/children)
  - Hiển thị giá real-time
  - Available seats
  - Book now button
- Related tours section

**Props:**
- `$tour` - Chi tiết tour
- `$itinerary` - Lịch trình đã parse
- `$availableSeats` - Số chỗ còn trống
- `$relatedTours` - Tour liên quan

### 4. **Components**

#### a. `tour-card.blade.php`
Card hiển thị tour trong grid:
- Image với category badge
- Destination
- Tour name (clickable)
- Description (truncated)
- Duration, Rating
- Price và "View Details" button

**Usage:**
```blade
<x-tour-card :tour="$tour" />
```

#### b. `tour-filter-sidebar.blade.php`
Sidebar filter với:
- Search box
- Destination filter (radio)
- Category filter (radio)
- Price range (min/max inputs)
- Rating filter (radio với stars)
- Apply/Clear buttons
- Auto-submit khi chọn radio

**Usage:**
```blade
<x-tour-filter-sidebar 
    :destinations="$destinations" 
    :categories="$categories"
    :filters="$filters" />
```

## 🔗 Routes đã tạo

```php
// Tour Listing
GET /tours → TourController@index

// Tour Detail
GET /tours/{id} → TourController@show

// API tính giá (AJAX)
POST /tours/{id}/calculate-price → TourController@calculatePrice

// Submit booking
POST /tours/{id}/booking → TourController@booking
```

## 🎨 Styling

Sử dụng **Tailwind CSS** (qua CDN) với:
- Responsive design (mobile-first)
- Hover effects
- Transitions mượt mà
- Grid layout
- Shadow/rounded corners
- Color scheme: Blue (primary), Orange (CTA)

## 📊 Database Requirements

### Model relationships cần thiết:
```php
// Tour.php
public function category() { return $this->belongsTo(Category::class); }
public function destination() { return $this->belongsTo(Destination::class); }
public function images() { return $this->hasMany(TourImage::class); }
public function bookings() { return $this->hasMany(Booking::class); }
```

### Columns cần có trong `tours` table:
- `TourName` (string)
- `Description` (text)
- `DetailedItinerary` (text/json)
- `Highlights` (text)
- `IncludedServices` (text)
- `StartDate` (date)
- `EndDate` (date)
- `PriceAdult` (decimal)
- `PriceChild` (decimal)
- `MaxSeats` (integer)
- `AverageRating` (decimal)
- `TotalReviews` (integer)
- `category_id` (foreign key)
- `destination_id` (foreign key)

## 🚀 Cách test

### 1. Seed dữ liệu mẫu (nếu chưa có):

```bash
# Tạo seeder
php artisan make:seeder TourSeeder

# Chạy seeder
php artisan db:seed --class=TourSeeder
```

### 2. Truy cập pages:

- **Tour Listing:** `http://localhost/tours`
- **Tour Detail:** `http://localhost/tours/1`

### 3. Test filters:

```
# Filter theo destination
/tours?destination_id=1

# Filter theo price
/tours?min_price=100&max_price=500

# Kết hợp nhiều filters
/tours?destination_id=1&min_price=100&rating=4&sort_by=PriceAdult&sort_order=asc
```

## 🔧 Customization

### Thay đổi số tour per page:
```php
// TourController.php, line 46
$tours = $this->tourService->getTours($filters)->paginate(12); // Đổi 12 thành số khác
```

### Thay đổi số related tours:
```php
// TourController.php, line 67
$relatedTours = $this->tourService->getRelatedTours($tour, 4); // Đổi 4 thành số khác
```

### Thêm filter mới:
1. Thêm input trong `tour-filter-sidebar.blade.php`
2. Thêm logic filter trong `TourService.php → getTours()`
3. Thêm param vào `$filters` array trong `TourController@index()`

## 📝 Next Steps

### Các tính năng có thể mở rộng:

1. **Wishlist/Favorites**
   - Thêm button "Add to Wishlist" vào tour card
   - Tạo WishlistController và model

2. **Reviews & Ratings**
   - Tạo ReviewController
   - Thêm section reviews vào tour detail page
   - Form submit review

3. **Booking Flow**
   - Tạo BookingController đầy đủ
   - Trang checkout
   - Payment integration

4. **Advanced Filters**
   - Multi-select cho destinations/categories
   - Date range picker
   - Duration filter
   - Price slider

5. **Search Enhancement**
   - Full-text search
   - Autocomplete
   - Search suggestions

6. **Image Gallery**
   - Lightbox khi click ảnh
   - Image carousel/slider

## ⚠️ Lưu ý

1. **Authentication:**
   - Booking hiện tại redirect đến `bookings.create` route (chưa tạo)
   - Cần thêm middleware `auth` cho booking routes

2. **Validation:**
   - Frontend validation (JavaScript) chưa implement đầy đủ
   - Thêm custom validation messages tiếng Việt nếu cần

3. **Performance:**
   - Cân nhắc cache cho destinations/categories (ít thay đổi)
   - Eager loading relationships để tránh N+1 queries
   - Image optimization (resize, lazy loading)

4. **SEO:**
   - Thêm meta tags (title, description, og:image)
   - Schema.org markup cho tour data
   - Sitemap generation

## 🎯 Testing Checklist

- [ ] Tour listing hiển thị đúng
- [ ] Filter theo destination hoạt động
- [ ] Filter theo price range hoạt động
- [ ] Sort options hoạt động
- [ ] Pagination hoạt động
- [ ] Search box hoạt động
- [ ] Tour detail page load đúng ảnh và thông tin
- [ ] Calculator số người và giá hoạt động
- [ ] Related tours hiển thị
- [ ] Responsive trên mobile
- [ ] Booking form validation hoạt động

---

**Created:** {{ date('Y-m-d') }}
**Author:** GitHub Copilot
**Version:** 1.0
