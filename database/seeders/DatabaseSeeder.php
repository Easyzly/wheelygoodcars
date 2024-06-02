<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jamie van Gulik',
            'email' => 'jamievangulik2006@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Test Account',
            'email' => 'test@gmail.com',
        ]);

        for ($i=0; $i < 10; $i++) {
            Car::factory(1)->create([
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }


    }
}
