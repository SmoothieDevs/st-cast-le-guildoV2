<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class BookingForm extends Component
{

    public $startDefault, $startMin, $startMax, $endDefault, $endMin, $endMax;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Date par défaut du champ "start" = le prochain samedi
        $this->startDefault = now()->is(Carbon::SATURDAY) ? now() : now()->next(Carbon::SATURDAY);
        // Date par défaut du champ "end" = le samedi d'après le samedi par défaut
        $this->endDefault = $this->startDefault->copy()->next(Carbon::SATURDAY);
        // Date minimum = maintenant
        $this->startMin = $this->endMin = now();
        // Date maximum = 31 décembre de l'année prochaine
        $this->startMax = $this->endMax = now()->next('year')->endOfYear();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.booking-form');
    }
}
