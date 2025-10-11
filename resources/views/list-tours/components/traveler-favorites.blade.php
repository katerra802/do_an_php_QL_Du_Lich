<aside class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
    <h3 class="font-bold text-lg mb-4">Yêu thích của du khách</h3>
    
    <div class="space-y-4">
        @foreach([
            [
                'image' => '/placeholder.svg?height=80&width=80',
                'title' => 'Tour đảo Phi Phi',
                'rating' => 4.8,
                'reviews' => 2453,
                'price' => '1.250.000₫'
            ],
            [
                'image' => '/placeholder.svg?height=80&width=80',
                'title' => 'Lặn biển khám phá',
                'rating' => 4.9,
                'reviews' => 1876,
                'price' => '890.000₫'
            ],
            [
                'image' => '/placeholder.svg?height=80&width=80',
                'title' => 'Du thuyền hoàng hôn',
                'rating' => 4.7,
                'reviews' => 3201,
                'price' => '1.450.000₫'
            ]
        ] as $favorite)
            <div class="flex gap-3 pb-4 border-b last:border-b-0">
                <img src="{{ $favorite['image'] }}" alt="{{ $favorite['title'] }}" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-sm mb-1 hover:text-orange-500 cursor-pointer truncate">
                        {{ $favorite['title'] }}
                    </h4>
                    <div class="flex items-center mb-2">
                        <div class="flex text-orange-400 text-xs mr-1">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-xs text-gray-600">{{ $favorite['rating'] }} ({{ $favorite['reviews'] }})</span>
                    </div>
                    <p class="text-sm font-bold text-gray-900">Từ {{ $favorite['price'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</aside>
