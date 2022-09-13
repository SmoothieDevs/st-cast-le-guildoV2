<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Obtention d'une date de début aléatoire, et d'une date de fin entre 3 jours et 2 semaines après cette date de début
        $start = fake()->dateTimeBetween('+1 week', '+3 months');
        $end = fake()->dateTimeBetween($start->format('Y-m-d').' +3 days', $start->format('Y-m-d').' +2 weeks');

        return [
            'user_id' => User::doesntHave('booking')->get()->random()->id,
            'start' => $start,
            'end' => $end,
            'nb_people' => fake()->numberBetween(1, 5),
            'status' => BookingStatus::values()[fake()->numberBetween(0, 2)],
        ];
    }
}
