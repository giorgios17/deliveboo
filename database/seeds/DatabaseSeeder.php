<?php

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
        // richiamo tutti i seeder per eseguirli in una volta sola
        $this->call([
            TypologyTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
