<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [""];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // funzione che collega la tabella user con la tabella typology (many to many)
    public function typology()
    {
        return $this->belongsToMany("App\Typology");
    }

    // funzione che collega la tabella user con la tabella plate (one to many)
    public function plate()
    {
        return $this->hasMany("App\Plate");
    }

    // funzione che collega la tabella user con la tabella order (one to many)
    public function order()
    {
        return $this->hasMany("App\Order");
    }

    public static function generateSlug($businessName)
    {
        $slug = Str::slug($businessName);
        $alternativeSlug = $slug;
        $businessNameFound = User::where("slug", $slug)->first();
        $counter = 1;
        while ($businessNameFound) {
            $alternativeSlug = $slug . "_" . $counter;
            $counter++;
            $businessNameFound = User::where("slug", $alternativeSlug)->first();
        }
        return $alternativeSlug;
    }
}
