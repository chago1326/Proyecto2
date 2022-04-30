<?php 
namespace App\Models;

use CodeIgniter\Model;

class News extends Model{

    protected $table      = 'nuevas_noticias';
    
    protected $primaryKey = 'id_nue_noticas';
    protected $allowedFields=['id_nue_noticas','nombre_noti','url_rss','categoria_id','id_usuario'];
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