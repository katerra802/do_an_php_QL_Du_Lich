<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use App\Models\Payment;
use App\Services\TourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    /**
     * Show booking form
     */
    public function create(Request $request, $tourId)
    {
        $tour = Tour::with(['category', 'destination', 'images'])->findOrFail($tourId);

        // Get data from form
        $adults = $request->input('adults', 1);
        $children = $request->input('children', 0);
        $date = $request->input('date', now()->addDays(7)->format('Y-m-d'));

        // Calculate price
        $pricing = $this->tourService->calculatePrice($tour, $adults, $children);

        // Check available seats
        $availableSeats = $this->tourService->getAvailableSeats($tourId);

        return view('bookings.create', compact('tour', 'adults', 'children', 'date', 'pricing', 'availableSeats'));
    }

    /**
     * Store booking
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'tour_date' => 'required|date|after_or_equal:today',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        try {
            DB::beginTransaction();

            $tour = Tour::findOrFail($validated['tour_id']);
            $pricing = $this->tourService->calculatePrice(
                $tour,
                $validated['adults'],
                $validated['children'] ?? 0
            );

            // Create booking
            $booking = Booking::create([
                'user_id' => Auth::id() ?? 1, // Guest or logged in user
                'tour_id' => $validated['tour_id'],
                'NumberOfAdults' => $validated['adults'],
                'NumberOfChildren' => $validated['children'] ?? 0,
                'CustomerName' => $validated['customer_name'],
                'CustomerEmail' => $validated['customer_email'],
                'CustomerPhone' => $validated['customer_phone'],
                'TourDate' => $validated['tour_date'],
                'BookingDate' => now(),
                'TotalPrice' => $pricing['total'],
                'Status' => 'Pending',
                'Notes' => $validated['special_requests'] ?? null,
            ]);

            DB::commit();

            // Redirect to payment page
            return redirect()->route('bookings.payment', $booking->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Booking failed. Please try again.'])->withInput();
        }
    }

    /**
     * Show payment page
     */
    public function payment($bookingId)
    {
        $booking = Booking::with(['tour', 'user'])->findOrFail($bookingId);

        return view('bookings.payment', compact('booking'));
    }

    /**
     * Process payment
     */
    public function processPayment(Request $request, $bookingId)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:credit_card,bank_transfer,cash',
        ]);

        try {
            DB::beginTransaction();

            $booking = Booking::findOrFail($bookingId);

            // Create payment record
            $payment = Payment::create([
                'booking_id' => $booking->id,
                'Amount' => $booking->TotalPrice,
                'PaymentMethod' => $validated['payment_method'],
                'PaymentDate' => now(),
                'Status' => 'Completed',
                'TransactionID' => 'TXN-' . strtoupper(uniqid()),
            ]);

            // Update booking status
            $booking->update(['Status' => 'Confirmed']);

            DB::commit();

            return redirect()->route('bookings.confirmation', $booking->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Payment failed. Please try again.']);
        }
    }

    /**
     * Show confirmation page
     */
    public function confirmation($bookingId)
    {
        $booking = Booking::with(['tour.destination', 'tour.category', 'payment'])->findOrFail($bookingId);

        return view('bookings.confirmation', compact('booking'));
    }

    /**
     * Show user's bookings
     */
    public function myBookings()
    {
        $bookings = Booking::with(['tour', 'payment'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }
}
