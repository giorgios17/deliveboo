<?php

use App\Plate;
use Illuminate\Database\Seeder;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config("plates");
        foreach ($plates as $plate) {
            $newPlate = new Plate();
            $newPlate->name = $plate['name'];
            $newPlate->description = $plate['description'];
            $newPlate->price = $plate['price'];
            $newPlate->visible = $plate['visible'];
            $newPlate->image = $plate['image'];
            $newPlate->user_id = $plate['user_id'];
            $newPlate->save();
        }
    }
}
