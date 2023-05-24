<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tipo_Cristal extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'tipo_cristales';
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

    public function cristal()
    {
      return $this->HasOne('App\Models\Cristal', 'tipo_cristal_id', 'id');
    } 

    public function categoria(){

      return $this->belongsTo('App\Models\Categoria');
  }
}
