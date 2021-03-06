<?php 
namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{
    protected $table      = 'usuarios';

    protected $primaryKey = 'id_cedula';
    protected $allowedFields=['id_cedula','email','nombre','apellido','contrasenna','rol_id'];

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;


    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    
     
     
}