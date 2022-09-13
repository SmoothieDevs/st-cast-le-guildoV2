<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => config('admin.email'),
        ]);

        $user = \App\Models\User::factory()->create([
            'firstname' => 'Michel',
            'lastname' => 'Dupont',
            'email' => 'michel@dupont.com',
        ]);

        \App\Models\Booking::factory()->create([
            'user_id' => $user->id,
            'start' => '2023-01-01',
            'end' => '2023-01-10',
            'nb_people' => 2,
            'status' => 'paid_for',
        ]);
    }
}
