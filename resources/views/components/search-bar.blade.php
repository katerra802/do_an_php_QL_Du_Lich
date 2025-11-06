<div class="mb-6">
    <form method="GET" action="{{ route('activities.index') }}" class="flex gap-2">
        <div class="flex-1 relative">
            <input 
                type="text" 
                name="search" 
                placeholder="Search things to do in Phuket..." 
                value="{{ $searchQuery }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
            >
        </div>
        <button 
            type="submit" 
            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg transition"
        >
            Search
        </button>
    </form>
</div>
