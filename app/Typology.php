<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
   /**
     * La tabella associata al modello.
     *
     * @var string
     */
    protected $table = "typologies";

    // funzione che collega la tabella typology con la tabella user (many to many)
    public function user()
    {
        return $this->belongsToMany("App\User");
    }
}