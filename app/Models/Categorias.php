<?php 
namespace App\Models;

use CodeIgniter\Model;

class Categorias extends Model{
    protected $table      = 'categorias';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['id','categoria_nom'];
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $insertID         = 0;
    protected $protectFields    = true;


    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

   
    
}