<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * La tabella associata al modello.
   *
   * @var string
   */
  protected $table = "orders";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = [""];

  // funzione che collega la tabella order con la tabella user (one to many)
  public function user()
  {
    return $this->belongsTo("App\User");
  }
  // funzione che collega la tabella plate con la tabella order (many to many)
  public function plate()
  {
    return $this->belongsToMany("App\Plate")->withPivot('quantity');
  }
}
