<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class personas extends Model{
	protected $table="personas"; 
	protected $primaryKey="id";
	protected $fillable=array('nombre','apellido','rut','fecha'); 
	protected $hidden=['created_at', 'updated_at'];
}