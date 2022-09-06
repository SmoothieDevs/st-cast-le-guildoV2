<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Obtention d'une date de début aléatoire, et d'une date de fin entre 3 jours et 2 semaines après cette date de début
        $start = fake()->dateTimeBetween('+1 week', '+3 months');
        $end = fake()->dateTimeBetween($start->modify('+2 days'), $start->modify('+2 weeks'));

        return [
            'user_id' => User::all()->random()->id,
            'start' => $start,
            'end' => $end,
            'nb_people' => fake()->numberBetween(1, 5),
            'status' => ['need_payment', 'paid_for', 'cancelled'][fake()->numberBetween(0, 2)],
        ];
    }
}
