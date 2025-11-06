<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed - Travel Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 py-8">
        <!-- Success Message -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8 text-center mb-8">
                <!-- Success Icon -->
                <div class="flex justify-center mb-6">
                    <div class="rounded-full bg-green-100 p-6">
                        <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-2">Booking Confirmed!</h1>
                <p class="text-gray-600 mb-6">Thank you for your booking. We've sent a confirmation email to <strong>{{ $booking->CustomerEmail }}</strong></p>

                <div class="inline-block bg-gray-100 rounded-lg px-6 py-3 mb-6">
                    <p class="text-sm text-gray-600 mb-1">Booking Reference</p>
                    <p class="text-2xl font-bold text-blue-600 font-mono">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('tours.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg transition duration-200">
                        Browse More Tours
                    </a>
                    <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print Voucher
                    </button>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Booking Details
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tour Information -->
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-3">Tour Information</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tour Name:</span>
                                <span class="font-semibold">{{ $booking->tour->TourName }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Destination:</span>
                                <span class="font-semibold">{{ $booking->tour->destination->DestinationName }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Category:</span>
                                <span class="font-semibold">{{ $booking->tour->category->CategoryName }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tour Date:</span>
                                <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->TourDate)->format('F j, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Departure Point:</span>
                                <span class="font-semibold">{{ $booking->tour->DeparturePoint }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-3">Customer Information</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Name:</span>
                                <span class="font-semibold">{{ $booking->CustomerName }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Email:</span>
                                <span class="font-semibold">{{ $booking->CustomerEmail }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Phone:</span>
                                <span class="font-semibold">{{ $booking->CustomerPhone }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Adults:</span>
                                <span class="font-semibold">{{ $booking->NumberOfAdults }}</span>
                            </div>
                            @if($booking->NumberOfChildren > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Children:</span>
                                <span class="font-semibold">{{ $booking->NumberOfChildren }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if($booking->Notes)
                <div class="mt-6 pt-6 border-t">
                    <h3 class="font-semibold text-gray-700 mb-2">Special Requests</h3>
                    <p class="text-sm text-gray-600">{{ $booking->Notes }}</p>
                </div>
                @endif
            </div>

            <!-- Payment Information -->
            @if($booking->payment)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Payment Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Transaction ID:</span>
                            <span class="font-semibold font-mono">{{ $booking->payment->TransactionID }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Method:</span>
                            <span class="font-semibold capitalize">{{ str_replace('_', ' ', $booking->payment->PaymentMethod) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Date:</span>
                            <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->payment->PaymentDate)->format('M j, Y g:i A') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="font-semibold text-green-600">✓ {{ $booking->payment->Status }}</span>
                        </div>
                    </div>

                    <div class="bg-green-50 rounded-lg p-4">
                        <div class="text-center">
                            <p class="text-sm text-green-700 mb-2">Total Amount Paid</p>
                            <p class="text-3xl font-bold text-green-600">${{ number_format($booking->payment->Amount, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- What's Next -->
            <div class="bg-blue-50 rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-blue-900 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    What's Next?
                </h2>

                <div class="space-y-3 text-sm text-blue-800">
                    <div class="flex items-start">
                        <span class="font-bold mr-2">1.</span>
                        <p>Check your email for the confirmation and voucher (check spam folder if needed)</p>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">2.</span>
                        <p>Print or save your voucher on your mobile device</p>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">3.</span>
                        <p>Arrive at <strong>{{ $booking->tour->DeparturePoint }}</strong> at least 15 minutes before departure</p>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">4.</span>
                        <p>Show your voucher to our staff and enjoy your tour!</p>
                    </div>
                </div>

                <div class="mt-4 p-3 bg-white rounded border border-blue-200">
                    <p class="text-sm text-blue-900">
                        <strong>Need Help?</strong> Contact us at <a href="tel:+66123456789" class="text-blue-600 hover:underline">+66 123 456 789</a>
                        or email <a href="mailto:support@travel.com" class="text-blue-600 hover:underline">support@travel.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <style>
        @media print {

            nav,
            footer,
            button {
                display: none !important;
            }
        }
    </style>
</body>

</html>