<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Tours - Travel Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Header/Navbar -->
    @include('layouts.navigation')

    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Explore All Things To Do</h1>
            <p class="text-gray-600">{{ $tours->total() }} tours found</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="lg:w-1/4">
                <x-tour-filter-sidebar
                    :destinations="$destinations"
                    :categories="$categories"
                    :filters="$filters" />
            </aside>

            <!-- Main Content -->
            <main class="lg:w-3/4">
                <!-- Sort Options -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-semibold text-gray-700">Sort by:</span>
                            <form action="{{ route('tours.index') }}" method="GET" id="sort-form" class="flex gap-2">
                                <!-- Preserve filters -->
                                @foreach($filters as $key => $value)
                                @if($value && !in_array($key, ['sort_by', 'sort_order']))
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                                @endforeach

                                <select name="sort_by"
                                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500"
                                    onchange="document.getElementById('sort-form').submit()">
                                    <option value="created_at" {{ ($filters['sort_by'] ?? '') == 'created_at' ? 'selected' : '' }}>Newest</option>
                                    <option value="PriceAdult" {{ ($filters['sort_by'] ?? '') == 'PriceAdult' ? 'selected' : '' }}>Price</option>
                                    <option value="AverageRating" {{ ($filters['sort_by'] ?? '') == 'AverageRating' ? 'selected' : '' }}>Rating</option>
                                    <option value="TourName" {{ ($filters['sort_by'] ?? '') == 'TourName' ? 'selected' : '' }}>Name</option>
                                </select>

                                <select name="sort_order"
                                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500"
                                    onchange="document.getElementById('sort-form').submit()">
                                    <option value="asc" {{ ($filters['sort_order'] ?? '') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ ($filters['sort_order'] ?? '') == 'desc' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </form>
                        </div>

                        <!-- View Toggle (optional) -->
                        <div class="flex gap-2">
                            <button class="p-2 bg-blue-600 text-white rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </button>
                            <button class="p-2 bg-gray-200 text-gray-700 rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tours Grid -->
                @if($tours->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($tours as $tour)
                    <x-tour-card :tour="$tour" />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $tours->appends($filters)->links() }}
                </div>
                @else
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No tours found</h3>
                    <p class="text-gray-500 mb-4">Try adjusting your filters or search criteria</p>
                    <a href="{{ route('tours.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                        Clear all filters
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>

    <!-- Footer (tái sử dụng) -->
    @include('layouts.footer')
</body>

</html>