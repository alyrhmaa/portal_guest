<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        User::updateOrCreate(
            ['email' => 'guest@example.com'],
            [
                'name'       => 'Guest',
                'username'   => 'guest',
                'password'   => Hash::make('guest123'),
                'status'     => 'aktif',
                'last_login' => now(),
            ]
        );

        foreach (range(1, 100) as $i) {
            $name = $faker->name();
            $username = strtolower(preg_replace('/\s+/', '', $name)) . $i;

            User::updateOrCreate(
                ['email' => "user{$i}@example.com"], // kunci unik
                [
                    'name'       => $name,
                    'username'   => $username,
                    'password'   => Hash::make('password123'),
                    'status'     => $faker->randomElement(['aktif', 'nonaktif']),
                    'last_login' => $faker->optional()->dateTimeBetween('-30 days', 'now'),
                ]
            );
        }

        $this->command->info('Berhasil membuat 1 user Guest + 100 user dummy tanpa duplicate!');
    }
}
