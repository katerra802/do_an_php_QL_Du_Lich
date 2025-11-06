<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Travel Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 py-8">
        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center justify-center">
                <div class="flex items-center">
                    <div class="flex items-center text-green-600">
                        <div class="rounded-full h-8 w-8 bg-green-600 text-white flex items-center justify-center font-semibold">✓</div>
                        <span class="ml-2 font-semibold">Booking Details</span>
                    </div>
                    <div class="w-16 h-1 bg-green-600 mx-4"></div>
                    <div class="flex items-center text-blue-600">
                        <div class="rounded-full h-8 w-8 bg-blue-600 text-white flex items-center justify-center font-semibold">2</div>
                        <span class="ml-2 font-semibold">Payment</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-300 mx-4"></div>
                    <div class="flex items-center text-gray-400">
                        <div class="rounded-full h-8 w-8 bg-gray-300 flex items-center justify-center font-semibold">3</div>
                        <span class="ml-2">Confirmation</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Payment Methods -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-2xl font-bold mb-6 text-gray-900">Select Payment Method</h2>

                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <form action="{{ route('bookings.processPayment', $booking->id) }}" method="POST" id="payment-form">
                            @csrf

                            <!-- Payment Options -->
                            <div class="space-y-4 mb-6">
                                <!-- Credit Card -->
                                <label class="border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer hover:border-blue-500 transition">
                                    <input type="radio" name="payment_method" value="credit_card" class="mr-4" checked onchange="togglePaymentDetails('credit_card')">
                                    <div class="flex-1 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold">Credit/Debit Card</p>
                                                <p class="text-sm text-gray-500">Visa, Mastercard, Amex</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="h-6">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-6">
                                        </div>
                                    </div>
                                </label>

                                <!-- Bank Transfer -->
                                <label class="border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer hover:border-blue-500 transition">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="mr-4" onchange="togglePaymentDetails('bank_transfer')">
                                    <div class="flex-1 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold">Bank Transfer</p>
                                                <p class="text-sm text-gray-500">Direct bank transfer</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Cash Payment -->
                                <label class="border-2 border-gray-200 rounded-lg p-4 flex items-center cursor-pointer hover:border-blue-500 transition">
                                    <input type="radio" name="payment_method" value="cash" class="mr-4" onchange="togglePaymentDetails('cash')">
                                    <div class="flex-1 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-3 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <div>
                                                <p class="font-semibold">Cash Payment</p>
                                                <p class="text-sm text-gray-500">Pay at departure point</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Credit Card Form -->
                            <div id="credit-card-details" class="payment-details">
                                <h3 class="text-lg font-semibold mb-4">Card Details</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                                        <input type="text" placeholder="1234 5678 9012 3456" maxlength="19"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                                            <input type="text" placeholder="MM/YY" maxlength="5"
                                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                            <input type="text" placeholder="123" maxlength="3"
                                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label>
                                        <input type="text" placeholder="JOHN DOE"
                                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Transfer Details -->
                            <div id="bank-transfer-details" class="payment-details hidden">
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <h3 class="text-lg font-semibold mb-3 text-blue-900">Bank Account Details</h3>
                                    <div class="space-y-2 text-sm">
                                        <p><strong>Bank Name:</strong> Bangkok Bank</p>
                                        <p><strong>Account Name:</strong> Travel Agency Co., Ltd.</p>
                                        <p><strong>Account Number:</strong> 123-456-7890</p>
                                        <p><strong>SWIFT Code:</strong> BKKBTHBK</p>
                                        <p class="mt-3 text-blue-800">
                                            Please include booking reference <strong>#{{ $booking->id }}</strong> in the transfer description.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Cash Payment Details -->
                            <div id="cash-details" class="payment-details hidden">
                                <div class="bg-yellow-50 rounded-lg p-4">
                                    <h3 class="text-lg font-semibold mb-3 text-yellow-900">Cash Payment Instructions</h3>
                                    <p class="text-sm text-yellow-800">
                                        Please bring the exact amount in cash on the tour date.
                                        Payment must be made at least 30 minutes before departure at {{ $booking->tour->DeparturePoint }}.
                                    </p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6 pt-6 border-t">
                                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Confirm Payment
                                </button>
                                <p class="text-center text-sm text-gray-500 mt-3">
                                    🔒 Your payment information is secure and encrypted
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                        <h3 class="text-lg font-bold mb-4 text-gray-900">Order Summary</h3>

                        <div class="space-y-3 mb-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tour:</span>
                                <span class="font-semibold">{{ Str::limit($booking->tour->TourName, 20) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-semibold">{{ \Carbon\Carbon::parse($booking->TourDate)->format('M d, Y') }}</span>
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

                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Total:</span>
                                <span class="text-2xl font-bold text-green-600">${{ number_format($booking->TotalPrice, 2) }}</span>
                            </div>
                        </div>

                        <div class="mt-4 p-3 bg-gray-50 rounded-lg text-xs text-gray-600">
                            <p class="font-semibold mb-1">Booking Reference:</p>
                            <p class="font-mono">#{{ $booking->id }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function togglePaymentDetails(method) {
            // Hide all payment details
            document.querySelectorAll('.payment-details').forEach(el => {
                el.classList.add('hidden');
            });

            // Show selected payment details
            if (method === 'credit_card') {
                document.getElementById('credit-card-details').classList.remove('hidden');
            } else if (method === 'bank_transfer') {
                document.getElementById('bank-transfer-details').classList.remove('hidden');
            } else if (method === 'cash') {
                document.getElementById('cash-details').classList.remove('hidden');
            }
        }
    </script>
</body>

</html>