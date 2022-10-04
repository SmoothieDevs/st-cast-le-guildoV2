<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Enums\BookingStatus;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmed;
use App\Events\BookingCancelled;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\BookingResource;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified')->except('create', 'store');
        $this->authorizeResource(Booking::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate();
        return BookingResource::collection($bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Auth\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        if (auth()->user() === null && !empty($validated['email'])) {
            // Création d'un nouvel utilisateur avec les informations fournies
            $user = User::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'email' => $validated['email']
            ]);
            $validated['user_id'] = $user->id;
            event(new Registered($user));
            // Connexion de l'utilisateur
            Auth::login($user);
        }

        // Vérification de l'absence d'une réservation en cours
        $request->ensureDoesNotHaveActiveBooking();
        // Vérification de la disponibilité des dates
        $request->ensureDatesAreAvailable();
        // Création de la réservation
        $request->user()->booking()->create($validated);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'status' => 'exclude',
            'nb_people' => 'required|integer|min:1',
        ]);

        $booking->update($validated);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Confirme la réservation.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function confirm(Booking $booking)
    {
        if ($booking->status === BookingStatus::PendingConfirmation) {
            $booking->status = BookingStatus::Validated;
            $booking->save();
            // Mail à l'utilisateur pour l'informer de la validation de sa réservation
            Mail::to($booking->user->email)->queue(new BookingConfirmed($booking));
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Annule la réservation.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function cancel(Booking $booking)
    {
        if ($booking->status === BookingStatus::Finished) {
            abort(403, 'This booking is no longer active.');
        } elseif ($booking->status === BookingStatus::Validated) {
            // Evènement écouté dans BookingStatusEventSubscriber
            event(new BookingCancelled($booking));
        } else {
            $booking->delete();
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect(RouteServiceProvider::HOME);
    }
}
