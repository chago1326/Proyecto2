<?php 
namespace App\Models;

use CodeIgniter\Model;

class Portada extends Model{
    protected $table      = 'noticias';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';

     protected $allowedFields=['id','titulo','descripcion','link','fecha',
     'id_noticia_nueva','usuario_id','categoria_id'];

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