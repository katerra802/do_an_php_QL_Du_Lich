<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Featured Tours</h2>
                <p class="text-gray-600">Most popular tours selected by travelers</p>
            </div>
            <a href="{{ route('tours.index') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-2">
                View All Tours
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($featuredTours ?? [] as $tour)
            <a href="{{ route('tours.show', $tour->id) }}" class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 group">
                <div class="relative h-56 overflow-hidden">
                    @if($tour->images->count() > 0)
                    <img src="{{ $tour->images->first()->ImageURL }}"
                        alt="{{ $tour->TourName }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                    <img src="https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?w=400"
                        alt="{{ $tour->TourName }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @endif

                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $tour->category->CategoryName ?? 'Tour' }}
                        </span>
                    </div>

                    @if($tour->IsFeatured)
                    <div class="absolute top-4 right-4">
                        <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Featured
                        </span>
                    </div>
                    @endif
                </div>

                <div class="p-5">
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $tour->destination->DestinationName ?? 'N/A' }}</span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-blue-600 transition">
                        {{ $tour->TourName }}
                    </h3>

                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($tour->StartDate)->format('M d') }} - {{ \Carbon\Carbon::parse($tour->EndDate)->format('M d, Y') }}</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div>
                            <div class="text-sm text-gray-500">From</div>
                            <div class="text-2xl font-bold text-blue-600">${{ number_format($tour->PriceAdult, 0) }}</div>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                            Book Now
                        </button>
                    </div>
                </div>
            </a>
            @empty
            <p class="text-gray-500 col-span-3 text-center py-8">No featured tours available</p>
            @endforelse
        </div>
    </div>
</section>