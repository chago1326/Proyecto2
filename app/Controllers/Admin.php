<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
class Admin extends BaseController{

    public function categorias()
    {
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias');
        return parent::menuAdmin($content, $data);
    }

}