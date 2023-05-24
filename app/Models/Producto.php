<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    //Relaciones

    public function categoria(){

        return $this->belongsTo('App\Models\Categoria');
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function forma_armazon()
    {
        return $this->belongsTo('App\Models\Forma_Armazon');
    }

    public function producto_orden()
    {
        return $this->hasMany('App\Models\Producto_Orden', 'producto_id', 'id');
    }
   
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
   
    public function distancia_apto()
    {
        return $this->belongsTo('App\Models\Distancia_Apto');
    }

    public function lejos()
    {
        return $this->belongsTo('App\Models\Lejos');
    }

    public function cerca()
    {
        return $this->belongsTo('App\Models\Lejos');
    }

    public function tipo_cambio()
    {
        return $this->belongsTo('App\Models\Tipo_Cambio');
    }
    
    public function ProductoPedido()
    {
        return $this->hasMany('App\ProductoPedido');
    }   
  

    public function UserCreated()
    {
        return $this->belongsTo('App\User', 'created_user_id');
    }

    public function UserUpdated()
    {
        return $this->belongsTo('App\User', 'updated_user_id');
    }

    public function UserDeleted()
    {
        return $this->belongsTo('App\User', 'deleted_user_id');
    }

    public function ordenes()
    {
      return $this->belongsToMany(Orden::class, 'producto_orden');
    }
}
