<section class="relative h-[500px] md:h-[600px] overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1600&h=900&fit=crop"
            alt="Beautiful Beach"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/40"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4 h-full flex flex-col items-center justify-center text-center">
        <span class="inline-block bg-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-6">
            🎉 Special Offers Available
        </span>

        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 max-w-4xl leading-tight">
            Discover Amazing Thailand
        </h1>

        <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl">
            Explore breathtaking destinations and create unforgettable memories
        </p>

        <!-- Search Box -->
        <form action="{{ route('tours.index') }}" method="GET" class="bg-white rounded-full shadow-2xl p-2 flex flex-col md:flex-row items-center gap-2 w-full max-w-4xl">
            <div class="flex-1 flex items-center px-4 py-3 w-full md:w-auto">
                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <input type="text"
                    name="search"
                    placeholder="Where do you want to go?"
                    class="flex-1 outline-none text-gray-700 w-full">
            </div>

            <div class="hidden md:block w-px h-12 bg-gray-200"></div>

            <div class="flex-1 flex items-center px-4 py-3 w-full md:w-auto">
                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <input type="date"
                    name="start_date"
                    min="{{ date('Y-m-d') }}"
                    placeholder="Select date"
                    class="flex-1 outline-none text-gray-700 w-full">
            </div>

            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full font-medium transition flex items-center justify-center gap-2 w-full md:w-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span>Search Tours</span>
            </button>
        </form>
    </div>
</section>