@props(['tour'])

<div class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <!-- Image -->
    <div class="relative h-48 overflow-hidden">
        @if($tour->images && $tour->images->count() > 0)
        <img src="{{ asset('storage/' . $tour->images->first()->ImageURL) }}"
            alt="{{ $tour->TourName }}"
            class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
        @else
        <img src="{{ asset('images/default-tour.jpg') }}"
            alt="{{ $tour->TourName }}"
            class="w-full h-full object-cover">
        @endif

        <!-- Badge -->
        @if($tour->category)
        <span class="absolute top-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
            {{ $tour->category->CategoryName }}
        </span>
        @endif
    </div>

    <!-- Content -->
    <div class="p-4">
        <!-- Destination -->
        @if($tour->destination)
        <div class="flex items-center text-gray-600 text-sm mb-2">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $tour->destination->DestinationName }}
        </div>
        @endif

        <!-- Title -->
        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 hover:text-blue-600 transition-colors">
            <a href="{{ route('tours.show', $tour->id) }}">
                {{ $tour->TourName }}
            </a>
        </h3>

        <!-- Description -->
        @if($tour->Description)
        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
            {{ Str::limit($tour->Description, 100) }}
        </p>
        @endif

        <!-- Info Row -->
        <div class="flex items-center justify-between text-sm text-gray-600 mb-3">
            <!-- Duration -->
            @if($tour->StartDate && $tour->EndDate)
            @php
            $duration = \Carbon\Carbon::parse($tour->StartDate)->diffInDays(\Carbon\Carbon::parse($tour->EndDate));
            @endphp
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $duration }} {{ $duration > 1 ? 'days' : 'day' }}
            </div>
            @endif

            <!-- Rating -->
            @if($tour->AverageRating)
            <div class="flex items-center">
                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="font-semibold">{{ number_format($tour->AverageRating, 1) }}</span>
            </div>
            @endif
        </div>

        <!-- Price & Button -->
        <div class="flex items-center justify-between pt-3 border-t border-gray-200">
            <div>
                <span class="text-sm text-gray-500">From</span>
                <div class="text-xl font-bold text-blue-600">
                    ${{ number_format($tour->PriceAdult, 2) }}
                    <span class="text-sm text-gray-500 font-normal">/person</span>
                </div>
            </div>
            <a href="{{ route('tours.show', $tour->id) }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                View Details
            </a>
        </div>
    </div>
</div>