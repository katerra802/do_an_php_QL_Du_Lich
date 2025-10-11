@props(['activity'])

<div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
    <div class="flex flex-col md:flex-row">
         Image Section 
        <div class="relative md:w-64 h-48 md:h-auto flex-shrink-0">
            <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}" class="w-full h-full object-cover">
            @if($activity['badge'] ?? false)
                <span class="absolute top-3 left-3 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded">
                    {{ $activity['badge'] }}
                </span>
            @endif
            <button class="absolute top-3 right-3 bg-white rounded-full p-2 hover:bg-gray-100 transition">
                <i class="far fa-heart text-gray-600"></i>
            </button>
        </div>

         Content Section 
        <div class="flex-1 p-5">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                <div class="flex-1">
                     Category 
                    <p class="text-sm text-gray-500 mb-2">{{ $activity['category'] }}</p>
                    
                     Title 
                    <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-orange-500 cursor-pointer">
                        {{ $activity['title'] }}
                    </h3>

                     Duration 
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <i class="far fa-clock mr-2"></i>
                        <span>{{ $activity['duration'] }}</span>
                    </div>

                     Description 
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $activity['description'] }}
                    </p>

                     Features 
                    <div class="flex flex-wrap gap-3 mb-4">
                        @if($activity['free_cancellation'] ?? false)
                            <span class="flex items-center text-sm text-green-600">
                                <i class="fas fa-check-circle mr-1"></i>
                                Miễn phí hủy
                            </span>
                        @endif
                        @if($activity['instant_confirmation'] ?? false)
                            <span class="flex items-center text-sm text-blue-600">
                                <i class="fas fa-bolt mr-1"></i>
                                Xác nhận ngay
                            </span>
                        @endif
                    </div>

                     Rating 
                    <div class="flex items-center">
                        <div class="flex text-orange-400 mr-2">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < floor($activity['rating']))
                                    <i class="fas fa-star text-sm"></i>
                                @else
                                    <i class="far fa-star text-sm"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">{{ $activity['rating'] }} ({{ $activity['reviews'] }} đánh giá)</span>
                    </div>
                </div>

                 Price Section 
                <div class="mt-4 md:mt-0 md:ml-6 text-right">
                    <p class="text-sm text-gray-500 mb-1">Từ</p>
                    <p class="text-2xl font-bold text-gray-900 mb-3">{{ $activity['price'] }}</p>
                    <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition w-full md:w-auto">
                        Xem chi tiết
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
