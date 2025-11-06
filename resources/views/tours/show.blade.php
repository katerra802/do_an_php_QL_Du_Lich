<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tour->TourName }} - Travel Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm">
            <ol class="flex items-center space-x-2 text-gray-600">
                <li><a href="{{ route('tours.index') }}" class="hover:text-blue-600">Tours</a></li>
                <li>/</li>
                <li class="text-gray-900 font-semibold">{{ $tour->TourName }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image Gallery -->
                <div class="mb-6">
                    @if($tour->images && $tour->images->count() > 0)
                    <div class="grid grid-cols-4 gap-2">
                        <!-- Main Image -->
                        <div class="col-span-4 md:col-span-3 row-span-2">
                            <img src="{{ asset('storage/' . $tour->images->first()->ImageURL) }}"
                                alt="{{ $tour->TourName }}"
                                class="w-full h-96 object-cover rounded-lg">
                        </div>
                        <!-- Thumbnails -->
                        @foreach($tour->images->skip(1)->take(2) as $image)
                        <div class="col-span-2 md:col-span-1">
                            <img src="{{ asset('storage/' . $image->ImageURL) }}"
                                alt="{{ $tour->TourName }}"
                                class="w-full h-48 md:h-[11.5rem] object-cover rounded-lg cursor-pointer hover:opacity-80 transition">
                        </div>
                        @endforeach
                        @if($tour->images->count() > 3)
                        <div class="relative col-span-2 md:col-span-1">
                            <img src="{{ asset('storage/' . $tour->images->get(3)->ImageURL) }}"
                                alt="{{ $tour->TourName }}"
                                class="w-full h-48 md:h-[11.5rem] object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex items-center justify-center cursor-pointer hover:bg-opacity-60 transition">
                                <span class="text-white text-lg font-bold">+{{ $tour->images->count() - 3 }} Photos</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <img src="{{ asset('images/default-tour.jpg') }}"
                        alt="{{ $tour->TourName }}"
                        class="w-full h-96 object-cover rounded-lg">
                    @endif
                </div>

                <!-- Tour Title & Info -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $tour->TourName }}</h1>
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                @if($tour->destination)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $tour->destination->DestinationName }}
                                </div>
                                @endif
                                @if($tour->AverageRating)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    {{ number_format($tour->AverageRating, 1) }} ({{ $tour->TotalReviews ?? 0 }} reviews)
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Wishlist Button -->
                        <button class="p-2 border border-gray-300 rounded-full hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Tour Description -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Tour Description</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $tour->Description }}</p>
                    </div>

                    <!-- Tour Highlights -->
                    @if($tour->Highlights)
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Tour Highlights</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach(explode("\n", $tour->Highlights) as $highlight)
                            @if(trim($highlight))
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ trim($highlight) }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- What's Included -->
                    @if($tour->IncludedServices)
                    <div class="mb-6 border-t pt-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">What's Included</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach(explode(',', $tour->IncludedServices) as $service)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700">{{ trim($service) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Itinerary -->
                @if(count($itinerary) > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Itinerary</h2>
                    <div class="space-y-4">
                        @foreach($itinerary as $day)
                        <div class="border-l-4 border-blue-500 pl-4">
                            <div class="flex items-center mb-2">
                                <span class="bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full mr-3">
                                    Day {{ $day['day'] }}
                                </span>
                                <h3 class="font-bold text-gray-800">{{ $day['title'] }}</h3>
                            </div>
                            @if(!empty($day['description']))
                            <p class="text-gray-700 text-sm">{{ $day['description'] }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Booking Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <div class="mb-4">
                        <div class="flex items-baseline mb-2">
                            <span class="text-3xl font-bold text-blue-600">${{ number_format($tour->PriceAdult, 2) }}</span>
                            <span class="text-gray-600 ml-2">/person</span>
                        </div>
                        @if($tour->PriceChild > 0)
                        <p class="text-sm text-gray-600">Child: ${{ number_format($tour->PriceChild, 2) }}</p>
                        @endif
                    </div>

                    <form action="{{ route('tours.booking', $tour->id) }}" method="POST" id="booking-form">
                        @csrf

                        <!-- Date -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Select Date</label>
                            <input type="date"
                                name="date"
                                min="{{ date('Y-m-d') }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Number of Travelers -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Number of Travelers</label>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">Adults</span>
                                    <div class="flex items-center gap-3">
                                        <button type="button" onclick="changeQuantity('adults', -1)" class="w-8 h-8 border border-gray-300 rounded-full hover:bg-gray-100">-</button>
                                        <input type="number" name="adults" id="adults" value="1" min="1" readonly class="w-12 text-center border-0 font-semibold">
                                        <button type="button" onclick="changeQuantity('adults', 1)" class="w-8 h-8 border border-gray-300 rounded-full hover:bg-gray-100">+</button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">Children</span>
                                    <div class="flex items-center gap-3">
                                        <button type="button" onclick="changeQuantity('children', -1)" class="w-8 h-8 border border-gray-300 rounded-full hover:bg-gray-100">-</button>
                                        <input type="number" name="children" id="children" value="0" min="0" readonly class="w-12 text-center border-0 font-semibold">
                                        <button type="button" onclick="changeQuantity('children', 1)" class="w-8 h-8 border border-gray-300 rounded-full hover:bg-gray-100">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Available Seats -->
                        <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Available Seats:</span>
                                <span class="font-semibold text-gray-800">{{ $availableSeats }} left</span>
                            </div>
                        </div>

                        <!-- Price Summary -->
                        <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center justify-between text-sm mb-2">
                                <span class="text-gray-700">Adults</span>
                                <span class="font-semibold" id="adult-price">${{ number_format($tour->PriceAdult, 2) }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm mb-2">
                                <span class="text-gray-700">Children</span>
                                <span class="font-semibold" id="child-price">$0.00</span>
                            </div>
                            <div class="border-t border-blue-200 pt-2 mt-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-gray-800">Total</span>
                                    <span class="text-2xl font-bold text-blue-600" id="total-price">${{ number_format($tour->PriceAdult, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Book Button -->
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors mb-3">
                            Book Now
                        </button>
                        <p class="text-xs text-center text-gray-500">You won't be charged yet</p>
                    </form>

                    <!-- Additional Info -->
                    <div class="mt-6 pt-6 border-t space-y-3 text-sm">
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Free cancellation up to 24 hours
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Instant confirmation
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Mobile ticket accepted
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Tours -->
        @if($relatedTours->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">You May Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedTours as $relatedTour)
                <x-tour-card :tour="$relatedTour" />
                @endforeach
            </div>
        </div>
        @endif
    </div>

    @include('layouts.footer')

    <script>
        const priceAdult = {
            {
                $tour - > PriceAdult
            }
        };
        const priceChild = {
            {
                $tour - > PriceChild
            }
        };

        function changeQuantity(type, delta) {
            const input = document.getElementById(type);
            let value = parseInt(input.value) + delta;

            if (type === 'adults' && value < 1) return;
            if (value < 0) return;

            input.value = value;
            updatePrice();
        }

        function updatePrice() {
            const adults = parseInt(document.getElementById('adults').value);
            const children = parseInt(document.getElementById('children').value);

            const adultTotal = adults * priceAdult;
            const childTotal = children * priceChild;
            const total = adultTotal + childTotal;

            document.getElementById('adult-price').textContent = '$' + adultTotal.toFixed(2);
            document.getElementById('child-price').textContent = '$' + childTotal.toFixed(2);
            document.getElementById('total-price').textContent = '$' + total.toFixed(2);
        }
    </script>
</body>

</html>