<?php 
namespace App\Models;

use CodeIgniter\Model;

class NuevaNoticia extends Model{
    protected $table      = 'undefined';
   
    protected $primaryKey = 'id';
    protected $allowedFields=['id','categoria_nom'];

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