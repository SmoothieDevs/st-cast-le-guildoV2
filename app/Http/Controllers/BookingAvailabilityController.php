<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Spatie\Period\Period;
use Illuminate\Http\Request;
use App\Models\BookingAvailability;
use Spatie\Period\PeriodCollection;

class BookingAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.availabilities')->with([
            'availabilities' => BookingAvailability::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['from'] = Carbon::parse($request['from'])->toDateTimeString();
        $request['to'] = Carbon::parse($request['to'])->toDateTimeString();

        $validated = $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'type' => 'required|in:available,unavailable'
        ]);

        if ($validated['type'] === 'available') {
            // Si on souhaite ajouter une plage de disponibilité on l'ajoute simplement
            BookingAvailability::create($validated);

            return redirect()->back()->with('success', 'La plage de dates a été ajoutée avec succès.');
        } else {
            // Si on souhaite bloquer une plage, on retire les dates disponibles qui se trouvent dans cette plage
            $availabilities = BookingAvailability::whereBetween('from', [$validated['from'], $validated['to']])
                ->orWhereBetween('to', [$validated['from'], $validated['to']])
                ->orWhere(function ($query) use ($validated) {
                    $query->where('from', '<=', $validated['from'])
                        ->where('to', '>=', $validated['to']);
                })
                ->get();

            $availabilitiesCollection = new PeriodCollection();
            foreach ($availabilities as $availability) {
                $availabilitiesCollection = $availabilitiesCollection->add(Period::make($availability['from'], $availability['to']));
                // On supprime la plage de disponibilité
                $availability->delete();
            }
            $bookingPeriod = Period::make($validated['from'], $validated['to']);
            $availablePeriods = $availabilitiesCollection->subtract($bookingPeriod);

            foreach ($availablePeriods as $availablePeriod) {
                BookingAvailability::create([
                    'from' => $availablePeriod->start(),
                    'to' => $availablePeriod->end()
                ]);
            }

            return redirect()->back()->with('success', 'La plage de dates a été bloquée avec succès.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
