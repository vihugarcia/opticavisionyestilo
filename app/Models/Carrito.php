<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {

	private $id;
	private $products; 
	private $cristales = []; 
	private $receta_id; 
	private $total;	

}
