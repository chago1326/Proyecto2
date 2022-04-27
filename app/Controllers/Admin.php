<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categorias;
class Admin extends BaseController{


    
     function __construct(){
           $categorias = new Categorias();; 
            
            $this->resul = $categorias->query("SELECT * FROM `categorias`");
            
      
    }

    public function categorias()
    {
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias',$data);
        return parent::menuAdmin($content, $data);
    }

    public function pantallaPrincipal(){

        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias');
        return parent::menuAdmin($content,$data);
      
    }
    
    //ingresar los categorias.
    public function ingresarCategorias(){
        $categorias = new Categorias(); 
        $cate=[
        'categoria_nom' => $this->request->getVar('nombres')
        ];

        $categorias ->insert($cate);
        
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/crudCategorias',$data);
        return parent::menuAdmin($content,$data);

    }
    //hacer delete 
    public function borrar($id=null){
        $categorias = new Categorias(); 
        

    }
}