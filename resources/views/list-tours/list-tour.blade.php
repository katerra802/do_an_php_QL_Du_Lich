@extends('layouts.app')

@section('title', 'Khám phá Phú Quốc - Hoạt động & Tour du lịch')

@section('content')
<div class="bg-gray-50 min-h-screen">
    @include('homepage.components.header')

    Breadcrumb
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="/" class="hover:text-orange-500">Trang chủ</a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <a href="#" class="hover:text-orange-500">Việt Nam</a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <span class="text-gray-900 font-semibold">Phú Quốc</span>
        </div>
    </div>

    Main Content
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row gap-6">
            Left Sidebar - Filters
            <div class="lg:w-64 flex-shrink-0">
                @include('components.filter-sidebar')
            </div>

            Main Content Area
            <div class="flex-1 min-w-0">
                Results Header
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
                    <h1 class="text-2xl font-bold mb-4 md:mb-0">Hoạt động tại Phú Quốc</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-600">Sắp xếp theo:</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option>Được đề xuất</option>
                            <option>Giá thấp đến cao</option>
                            <option>Giá cao đến thấp</option>
                            <option>Đánh giá cao nhất</option>
                            <option>Thời lượng</option>
                        </select>
                    </div>
                </div>

                @include('components.activity-card')
                <div class="space-y-4">
                    @foreach([
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'badge' => 'CÓ THỂ BÁN HẾT',
                    'category' => 'Tour trong ngày',
                    'title' => 'Tour phiêu lưu đảo Phi Phi với bữa trưa Seaview bởi V. Marine Tour',
                    'duration' => '6 giờ',
                    'description' => 'Khám phá vẻ đẹp tuyệt vời của quần đảo Phi Phi với tour du thuyền sang trọng. Thưởng thức bữa trưa buffet hải sản tươi ngon và lặn biển tại những vùng nước trong xanh nhất.',
                    'rating' => 4.8,
                    'reviews' => 2453,
                    'price' => '1.850.000₫',
                    'free_cancellation' => true,
                    'instant_confirmation' => true
                    ],
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'category' => 'Tour văn hóa',
                    'title' => 'Trải nghiệm bảo tồn voi đạo đức tại Phú Quốc',
                    'duration' => '4 giờ',
                    'description' => 'Tham gia trải nghiệm độc đáo với những chú voi được cứu hộ. Tìm hiểu về bảo tồn động vật và tương tác với voi trong môi trường tự nhiên.',
                    'rating' => 4.9,
                    'reviews' => 1876,
                    'price' => '1.250.000₫',
                    'free_cancellation' => true,
                    'instant_confirmation' => false
                    ],
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'badge' => 'CÓ THỂ BÁN HẾT',
                    'category' => 'Du thuyền & Tour nước',
                    'title' => 'Du thuyền hoàng hôn sang trọng với bữa tối',
                    'duration' => '3 giờ',
                    'description' => 'Tận hưởng hoàng hôn tuyệt đẹp trên du thuyền sang trọng với bữa tối buffet quốc tế và nhạc sống. Trải nghiệm lãng mạn không thể bỏ lỡ.',
                    'rating' => 4.7,
                    'reviews' => 3201,
                    'price' => '2.100.000₫',
                    'free_cancellation' => true,
                    'instant_confirmation' => true
                    ],
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'category' => 'Lặn biển',
                    'title' => 'Tour lặn biển khám phá rạn san hô',
                    'duration' => '8 giờ',
                    'description' => 'Khám phá thế giới dưới nước tuyệt đẹp với tour lặn biển chuyên nghiệp. Phù hợp cho cả người mới bắt đầu và thợ lặn có kinh nghiệm.',
                    'rating' => 4.8,
                    'reviews' => 1542,
                    'price' => '1.650.000₫',
                    'free_cancellation' => false,
                    'instant_confirmation' => true
                    ],
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'category' => 'Tour phiêu lưu',
                    'title' => 'Phiêu lưu ATV qua rừng nhiệt đới',
                    'duration' => '2 giờ',
                    'description' => 'Trải nghiệm cảm giác mạnh khi lái xe địa hình ATV qua những con đường rừng nhiệt đới. Phù hợp cho những người yêu thích phiêu lưu.',
                    'rating' => 4.6,
                    'reviews' => 987,
                    'price' => '890.000₫',
                    'free_cancellation' => true,
                    'instant_confirmation' => true
                    ],
                    [
                    'image' => '/placeholder.svg?height=300&width=400',
                    'category' => 'Tour ẩm thực',
                    'title' => 'Lớp học nấu ăn Thái truyền thống',
                    'duration' => '5 giờ',
                    'description' => 'Học cách nấu các món ăn Thái đích thực từ đầu bếp chuyên nghiệp. Bao gồm tham quan chợ địa phương và thưởng thức bữa ăn bạn tự nấu.',
                    'rating' => 4.9,
                    'reviews' => 2156,
                    'price' => '1.150.000₫',
                    'free_cancellation' => true,
                    'instant_confirmation' => false
                    ]
                    ] as $activity)
                    <x-activity-card :activity="$activity" />
                    @endforeach
                </div>

                Pagination
                <x-pagination :currentPage="1" :totalPages="48" />
            </div>

            Right Sidebar - Traveler Favorites
            <div class="hidden xl:block xl:w-80 flex-shrink-0">
                <x-traveler-favorites />
            </div>
        </div>
    </div>

    @include('homepage.components.footer')
</div>
@endsection