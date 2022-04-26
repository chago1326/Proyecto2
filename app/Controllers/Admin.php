<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categorias;
class Admin extends BaseController{

    public function categorias()
    {
        $categorias = new Categorias(); 
        $cate = $newsModel->findAll();
        $data['admin'] = $cate;
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias');
        return parent::menuAdmin($content, $data);
    }

    //ingresar los categorias.
    public function ingresarCategorias(){
        $categorias = new Categorias(); 
        $datos=[
        'categoria_nom' => $this->request->getVar('nombres')
        ];

        $categorias ->insert($datos);


        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias');
        return parent::menuAdmin($content, $data);
      
        



    }
}