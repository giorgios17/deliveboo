<?php

use App\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //prendo il file config
        $typologies = config("typologies");

        foreach ($typologies as $typology) {
            $newTypology = new Typology();
            $newTypology->name = $typology['name'];
            $newTypology->description = $typology['description'];
            $newTypology->image = $typology['image'];
            $newTypology->save();
        }
    }
}