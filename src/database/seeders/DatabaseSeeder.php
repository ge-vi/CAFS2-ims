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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Gerardas',
            'email' => 'gerardas.virsuta@gmail.com',
            'password' => '$2y$10$D.PAo24vW4qUJ0cTpaWFUekiaN6UlWPgGWAp4ySKtLf3OsIljqW8m',
            // U$$fZ6o7DmmJJkoDeBS8odaK^Uu4buSWKoDXh*&cGi3bYnPi%K
        ]);

        $this->call([
            OwnerSeeder::class,
            TypeSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
