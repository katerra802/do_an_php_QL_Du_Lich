<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Latest Tours</h2>
                <p class="text-gray-600">Discover the most amazing destinations</p>
            </div>
            <a href="{{ route('tours.index') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-2">
                View All Tours
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($popularTours ?? [] as $tour)
            <a href="{{ route('tours.show', $tour->id) }}" class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    @if($tour->images->isNotEmpty())
                    <img src="{{ $tour->images->first()->ImageURL }}"
                        alt="{{ $tour->TourName }}"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    @else
                    <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=400"
                        alt="{{ $tour->TourName }}"
                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    @endif

                    @if($tour->category)
                    <span class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                        {{ $tour->category->CategoryName }}
                    </span>
                    @endif
                </div>
                <div class="p-5">
                    @if($tour->destination)
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $tour->destination->DestinationName }}</span>
                    </div>
                    @endif
                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $tour->TourName }}</h3>
                    <div class="flex items-center justify-between">
                        <div class="text-right">
                            <div class="text-sm text-gray-500">From</div>
                            <div class="text-lg font-bold text-blue-600">${{ number_format($tour->PriceAdult, 0) }}</div>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-4 text-center py-12">
                <p class="text-gray-500">No tours available at the moment</p>
            </div>
            @endforelse
        </div>
    </div>
</section>