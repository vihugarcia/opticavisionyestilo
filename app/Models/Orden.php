<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model {

	protected $table = 'ordenes';
	protected $primaryKey = 'id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['product_id', 'pedido_id'];

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'medico_id', 'id');
    }

    public function receta()
    {
        return $this->belongsTo('App\Models\Receta', 'receta_id', 'id');
    }

	  public function productos()
    {
      return $this->belongsToMany(Producto::class, 'producto_orden');
    }
    public function cristales()
    {
      return $this->belongsToMany(Cristal::class, 'cristal_orden');
    }

    public function ordenes()
    {
      return $this->belongsTo('App\Models\Orden', 'orden_id', 'id');
    }

	public function producto_orden()
    {
      return $this->hasMany('App\Models\Producto_Orden', 'orden_id', 'id');
    }

	public function orden_cristal()
    {
      return $this->hasMany('App\Models\Cristal_Orden');
    }

}
