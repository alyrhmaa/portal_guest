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

        // USER UTAMA
        User::create([
            'name'     => 'Guest',
            'email'    => 'guest@example.com',
            'username' => 'guest',
            'password' => Hash::make('password'),
            'status'   => 'aktif',
        ]);

        // 100 USER DUMMY
        foreach (range(1, 100) as $i) {
            $name = $faker->name();
            $username = strtolower(str_replace(' ', '', $name)) . $i;

            User::create([
                'name'       => $name,
                'email'      => "user{$i}@example.com",
                'username'   => $username,
                'password'   => Hash::make('password123'),
                'status'     => $faker->randomElement(['aktif', 'nonaktif']),
                'last_login' => $faker->optional()->dateTimeBetween('-30 days', 'now'),
            ]);
        }

        $this->command->info("Berhasil membuat 100 user dummy + 1 user Guest!");
    }
}
