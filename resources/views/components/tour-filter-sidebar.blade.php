@props(['destinations', 'categories', 'filters'])

<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Filter Tours</h3>

    <form action="{{ route('tours.index') }}" method="GET" id="filter-form">
        <!-- Search -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
            <input type="text"
                name="search"
                value="{{ $filters['search'] ?? '' }}"
                placeholder="Search tours..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <!-- Destination -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Destination</label>
            <div class="space-y-2">
                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                    <input type="radio"
                        name="destination_id"
                        value=""
                        {{ empty($filters['destination_id']) ? 'checked' : '' }}
                        class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-700">All Destinations</span>
                </label>
                @foreach($destinations as $destination)
                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                    <input type="radio"
                        name="destination_id"
                        value="{{ $destination->id }}"
                        {{ $filters['destination_id'] == $destination->id ? 'checked' : '' }}
                        class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-700">{{ $destination->DestinationName }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Category -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Category</label>
            <div class="space-y-2">
                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                    <input type="radio"
                        name="category_id"
                        value=""
                        {{ empty($filters['category_id']) ? 'checked' : '' }}
                        class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-700">All Categories</span>
                </label>
                @foreach($categories as $category)
                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                    <input type="radio"
                        name="category_id"
                        value="{{ $category->id }}"
                        {{ $filters['category_id'] == $category->id ? 'checked' : '' }}
                        class="form-radio text-blue-600">
                    <span class="ml-2 text-gray-700">{{ $category->CategoryName }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <!-- Price Range -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Price Range</label>
            <div class="space-y-3">
                <div>
                    <label class="text-xs text-gray-600">Min Price</label>
                    <input type="number"
                        name="min_price"
                        value="{{ $filters['min_price'] ?? '' }}"
                        placeholder="$0"
                        min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs text-gray-600">Max Price</label>
                    <input type="number"
                        name="max_price"
                        value="{{ $filters['max_price'] ?? '' }}"
                        placeholder="$10,000"
                        min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Rating -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Minimum Rating</label>
            <div class="space-y-2">
                @for($i = 5; $i >= 1; $i--)
                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                    <input type="radio"
                        name="rating"
                        value="{{ $i }}"
                        {{ $filters['rating'] == $i ? 'checked' : '' }}
                        class="form-radio text-blue-600">
                    <span class="ml-2 flex items-center">
                        @for($j = 0; $j < $i; $j++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            @endfor
                            <span class="ml-1 text-gray-700">& up</span>
                    </span>
                </label>
                @endfor
            </div>
        </div>

        <!-- Buttons -->
        <div class="space-y-2">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-colors">
                Apply Filters
            </button>
            <a href="{{ route('tours.index') }}"
                class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 rounded-lg text-center transition-colors">
                Clear Filters
            </a>
        </div>
    </form>
</div>

<script>
    // Auto-submit on radio change
    document.querySelectorAll('#filter-form input[type="radio"]').forEach(input => {
        input.addEventListener('change', function() {
            document.getElementById('filter-form').submit();
        });
    });
</script>