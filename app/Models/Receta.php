<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Receta extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'recetas';
     protected $primaryKey = 'id';

    protected $fillable = [
        'name',       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];   

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'paciente_id', 'id');
    }

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'medico_id', 'id');
    }

    public function receta()
    {
        return $this->belongsTo('App\Models\Receta');
    }

    public function orden()
    {
        return $this->belongsTo('App\Models\Orden');
    }

    public function distancia_apto()
    {
        return $this->belongsTo('App\Models\Distancia_Apto', 'distancia_apto_id', 'id');
    }

    public function forma()
    {
        return $this->belongsTo('App\Models\Forma_Cara', 'forma_id', 'id');
    }

    public function cerca()
    {
        return $this->belongsTo('App\Models\Cerca', 'cerca_id', 'id');
    }

    public function lejos()
    {
        return $this->belongsTo('App\Models\Lejos', 'lejos_id', 'id');
    }
}
