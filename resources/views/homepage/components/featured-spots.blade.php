<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Địa điểm nổi bật</h2>
                <p class="text-gray-600">Những trải nghiệm không thể bỏ lỡ</p>
            </div>
            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-2">
                Xem thêm
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['image' => 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=400&h=500&fit=crop', 'title' => 'Tour Miền Bắc', 'days' => '5 ngày 4 đêm', 'price' => '4.500.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1540611025311-01df3cef54b5?w=400&h=500&fit=crop', 'title' => 'Biển Nha Trang', 'days' => '3 ngày 2 đêm', 'price' => '2.800.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1557750255-c76072a7aad1?w=400&h=500&fit=crop', 'title' => 'Sapa Mùa Lúa', 'days' => '4 ngày 3 đêm', 'price' => '3.500.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?w=400&h=500&fit=crop', 'title' => 'Hội An Cổ Kính', 'days' => '3 ngày 2 đêm', 'price' => '2.200.000đ']
            ] as $spot)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover cursor-pointer">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $spot['image'] }}" 
                             alt="{{ $spot['title'] }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <button class="absolute top-4 right-4 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center transition">
                            <i class="far fa-bookmark text-gray-700"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $spot['title'] }}</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                            <i class="far fa-clock"></i>
                            <span>{{ $spot['days'] }}</span>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div>
                                <div class="text-sm text-gray-500">Giá từ</div>
                                <div class="text-xl font-bold text-blue-600">{{ $spot['price'] }}</div>
                            </div>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-medium transition">
                                Đặt ngay
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
