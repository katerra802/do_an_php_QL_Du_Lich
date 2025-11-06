<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book {{ $tour->TourName }} - Travel Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li><a href="{{ route('tours.index') }}" class="text-gray-600 hover:text-gray-900">Tours</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('tours.show', $tour->id) }}" class="text-gray-600 hover:text-gray-900">{{ $tour->TourName }}</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-blue-600 font-semibold">Book Now</li>
                </ol>
            </nav>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900">Complete Your Booking</h2>

                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <input type="hidden" name="adults" value="{{ $adults }}">
                        <input type="hidden" name="children" value="{{ $children }}">
                        <input type="hidden" name="tour_date" value="{{ $date }}">

                        <!-- Contact Information -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Contact Information
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="John Doe">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" name="customer_email" value="{{ old('customer_email') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="john@example.com">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                    <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="+66 123 456 789">
                                </div>
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                Special Requests (Optional)
                            </h3>
                            <textarea name="special_requests" rows="4"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Any dietary requirements, accessibility needs, or special requests...">{{ old('special_requests') }}</textarea>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" required class="mt-1 mr-2">
                                <span class="text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-blue-600 hover:underline">Terms and Conditions</a>
                                    and <a href="#" class="text-blue-600 hover:underline">Cancellation Policy</a>
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition duration-200">
                            Proceed to Payment
                        </button>
                    </form>
                </div>

                <!-- Cancellation Policy -->
                <div class="bg-blue-50 rounded-lg p-6 mt-6">
                    <h3 class="text-lg font-semibold mb-3 text-blue-900">📋 Cancellation Policy</h3>
                    <ul class="space-y-2 text-sm text-blue-800">
                        <li>• Free cancellation up to 24 hours before the tour</li>
                        <li>• 50% refund for cancellations within 24 hours</li>
                        <li>• No refund for no-shows or same-day cancellations</li>
                    </ul>
                </div>
            </div>

            <!-- Booking Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Booking Summary</h3>

                    <!-- Tour Info -->
                    <div class="mb-4">
                        @if($tour->images->isNotEmpty())
                        <img src="{{ $tour->images->first()->ImageURL }}" alt="{{ $tour->TourName }}" class="w-full h-40 object-cover rounded-lg mb-3">
                        @endif
                        <h4 class="font-semibold text-gray-900">{{ $tour->TourName }}</h4>
                        <p class="text-sm text-gray-600 flex items-center mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $tour->destination->DestinationName }}
                        </p>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-4">
                        <!-- Date -->
                        <div class="flex justify-between mb-3">
                            <span class="text-gray-600">Tour Date:</span>
                            <span class="font-semibold">{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</span>
                        </div>

                        <!-- Passengers -->
                        <div class="flex justify-between mb-3">
                            <span class="text-gray-600">Adults:</span>
                            <span class="font-semibold">{{ $adults }} × ${{ number_format($pricing['adult_price'], 2) }}</span>
                        </div>

                        @if($children > 0)
                        <div class="flex justify-between mb-3">
                            <span class="text-gray-600">Children:</span>
                            <span class="font-semibold">{{ $children }} × ${{ number_format($pricing['child_price'], 2) }}</span>
                        </div>
                        @endif

                        <!-- Available Seats -->
                        <div class="flex justify-between mb-3 text-sm">
                            <span class="text-gray-600">Available Seats:</span>
                            <span class="text-green-600 font-semibold">{{ $availableSeats }} left</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-semibold text-gray-900">Total Amount:</span>
                            <span class="text-2xl font-bold text-blue-600">${{ number_format($pricing['total'], 2) }}</span>
                        </div>

                        <!-- What's Included -->
                        <div class="bg-green-50 rounded-lg p-3 text-sm">
                            <p class="font-semibold text-green-800 mb-2">✓ What's Included:</p>
                            <ul class="text-green-700 space-y-1 text-xs">
                                <li>• {{ $tour->IncludedServices }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>

</html>