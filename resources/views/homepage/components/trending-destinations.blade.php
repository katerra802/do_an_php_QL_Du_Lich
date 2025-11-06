<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Trending Destinations</h2>
            <p class="text-gray-600">Most popular places chosen by travelers</p>
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            @forelse($destinations ?? [] as $destination)
            <a href="{{ route('tours.index', ['destination_id' => $destination->id]) }}" class="flex flex-col items-center group cursor-pointer">
                <div class="w-24 h-24 rounded-full overflow-hidden ring-4 ring-white shadow-lg group-hover:ring-blue-500 transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?w=200"
                        alt="{{ $destination->DestinationName }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                </div>
                <span class="mt-3 font-semibold text-gray-700 group-hover:text-blue-600 transition">
                    {{ $destination->DestinationName }}
                </span>
                @if($destination->tours_count ?? 0 > 0)
                <span class="text-xs text-gray-500">{{ $destination->tours_count }} tours</span>
                @endif
            </a>
            @empty
            <p class="text-gray-500">No destinations available</p>
            @endforelse
        </div>
    </div>
</section>