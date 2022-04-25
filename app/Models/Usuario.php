<?php 
namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_cedula';
    protected $allowepFields =['id_cedula','email','nombre','apellido','contrasenna','rol_id'];
     
}