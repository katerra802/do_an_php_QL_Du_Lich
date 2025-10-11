<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Bài viết phổ biến</h2>
                <p class="text-gray-600">Khám phá những địa điểm được yêu thích nhất</p>
            </div>
            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-2">
                Xem tất cả
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['image' => 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=400&h=300&fit=crop', 'title' => 'Vịnh Hạ Long', 'location' => 'Quảng Ninh', 'price' => '2.500.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?w=400&h=300&fit=crop', 'title' => 'Phố Cổ Hội An', 'location' => 'Quảng Nam', 'price' => '1.800.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=400&h=300&fit=crop', 'title' => 'Đà Lạt', 'location' => 'Lâm Đồng', 'price' => '1.500.000đ'],
                ['image' => 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=400&h=300&fit=crop', 'title' => 'Phú Quốc', 'location' => 'Kiên Giang', 'price' => '3.200.000đ']
            ] as $post)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover cursor-pointer">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $post['image'] }}" 
                             alt="{{ $post['title'] }}" 
                             class="w-full h-full object-cover">
                        <button class="absolute top-4 right-4 bg-white/90 hover:bg-white w-10 h-10 rounded-full flex items-center justify-center transition">
                            <i class="far fa-heart text-gray-700"></i>
                        </button>
                        <span class="absolute bottom-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Phổ biến
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <i class="fas fa-map-marker-alt text-orange-500"></i>
                            <span>{{ $post['location'] }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $post['title'] }}</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="font-semibold text-gray-800">4.8</span>
                                <span class="text-gray-500 text-sm">(120)</span>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-gray-500">Từ</div>
                                <div class="text-lg font-bold text-blue-600">{{ $post['price'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
