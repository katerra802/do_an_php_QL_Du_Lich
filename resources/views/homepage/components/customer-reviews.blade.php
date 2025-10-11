<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Đánh giá từ khách hàng</h2>
            <p class="text-gray-600">Những trải nghiệm thực tế từ du khách</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Nguyễn Văn A', 'avatar' => 'https://i.pravatar.cc/150?img=1', 'rating' => 5, 'review' => 'Chuyến đi tuyệt vời! Dịch vụ chuyên nghiệp, hướng dẫn viên nhiệt tình. Tôi sẽ quay lại lần nữa.'],
                ['name' => 'Trần Thị B', 'avatar' => 'https://i.pravatar.cc/150?img=2', 'rating' => 5, 'review' => 'Giá cả hợp lý, lịch trình hợp lý. Gia đình tôi rất hài lòng với chuyến du lịch này.'],
                ['name' => 'Lê Văn C', 'avatar' => 'https://i.pravatar.cc/150?img=3', 'rating' => 5, 'review' => 'Đặt tour rất dễ dàng, hỗ trợ tận tình. Khách sạn và phương tiện đều tốt.']
            ] as $review)
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ $review['avatar'] }}" 
                             alt="{{ $review['name'] }}" 
                             class="w-16 h-16 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-gray-800">{{ $review['name'] }}</h4>
                            <div class="flex gap-1">
                                @for($i = 0; $i < $review['rating']; $i++)
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed">{{ $review['review'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
