<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Điểm đến thịnh hành</h2>
            <p class="text-gray-600">Những nơi được du khách lựa chọn nhiều nhất</p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-8">
            @foreach([
                ['image' => 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=200&h=200&fit=crop', 'name' => 'Hạ Long'],
                ['image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?w=200&h=200&fit=crop', 'name' => 'Hội An'],
                ['image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=200&h=200&fit=crop', 'name' => 'Đà Lạt'],
                ['image' => 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=200&h=200&fit=crop', 'name' => 'Phú Quốc'],
                ['image' => 'https://images.unsplash.com/photo-1540611025311-01df3cef54b5?w=200&h=200&fit=crop', 'name' => 'Nha Trang'],
                ['image' => 'https://images.unsplash.com/photo-1557750255-c76072a7aad1?w=200&h=200&fit=crop', 'name' => 'Sapa'],
                ['image' => 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=200&h=200&fit=crop', 'name' => 'Huế'],
                ['image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?w=200&h=200&fit=crop', 'name' => 'Đà Nẵng']
            ] as $destination)
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-24 h-24 rounded-full overflow-hidden ring-4 ring-white shadow-lg group-hover:ring-blue-500 transition-all duration-300">
                        <img src="{{ $destination['image'] }}" 
                             alt="{{ $destination['name'] }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <span class="mt-3 font-semibold text-gray-700 group-hover:text-blue-600 transition">
                        {{ $destination['name'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</section>
