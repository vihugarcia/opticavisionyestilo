<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cristal extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'cristales';
     protected $primaryKey = 'id';
   
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */   
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo_cristal()
    {
        return $this->belongsTo(Tipo_Cristal::class, 'tipo_cristal_id', 'id');
    }

    public function ordenes()
    {
      return $this->belongsToMany(Orden::class, 'cristal_orden');
    }

    public function tipo_cambio()
    {
        return $this->belongsTo('App\Models\Tipo_Cambio');
    }

    
}
