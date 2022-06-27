<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    /**
     * La tabella associata al modello.
     *
     * @var string
     */
    protected $table = "plates";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // funzione che collega la tabella plate con la tabella user (one to many)
    public function user()
    {
        return $this->belongsTo("App\User");
    }
    // funzione che collega la tabella order con la tabella plate (many to many)
    public function order()
    {
        return $this->belongsToMany("App\Order");
    }
}
