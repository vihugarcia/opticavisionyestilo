<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Producto_Orden extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'producto_orden';
     protected $primaryKey = 'id';

    protected $fillable = [                
    ];

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

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function productos()
    {
      return $this->belongsTo('App\Models\Producto', 'producto_id', 'id');
    }

    public function ordenes()
    {
      return $this->belongsTo('App\Models\Orden', 'orden_id', 'id');
    }
}
