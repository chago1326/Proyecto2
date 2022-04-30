<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categorias;
class Admin extends BaseController{



       
    //Me lleva a la pantalla de categorias y de igual manero lleno los campos para poder realizar el crud
    public function categorias()
    {
        $categorias = new Categorias();
        $this->resul =$categorias->query("SELECT * FROM `categorias` ") ;
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
      
        return redirect()->to('/crudCategorias');
       

    }
    //metodo de eliminar 
    public function borrar($id=null){
        $categorias = new Categorias(); 
        $categorias->query("DELETE FROM `categorias` WHERE id = '$id'");
        
        
        return redirect()->to('/crudCategorias');

    }


   //Me lleva a la pantalla de editar y captura el id y el nombre de la categoria para poder editarla
    public function editar($id=null){
       
        $categorias = new categorias();
        $this->resul =$categorias->query("SELECT * FROM `categorias` WHERE id = '$id'") ;
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/actualizarCategoria',$data);
        return parent::menuAdmin($content,$data);
    }
    
//Funcion de actulizar categoria
    public function actualizar(){
        $categorias = new categorias();
        $cate=[
            'categoria_nom' => $this->request->getVar('nombres')
            ];
            $id=$this->request->getVar('id');
            $categorias ->update($id,$cate);
            return redirect()->to('/crudCategorias');

    }

}