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
      
        return redirect()->to('/crudCategorias');
       

    }
    //metodo de eliminar preguntar 
    public function borrar($id=null){
        $categorias = new Categorias(); 
        //$categorias->query("DELETE FROM `categorias` WHERE id = '$id'");
        $deleCate = $categorias->where('id',$id)->first();
        $categorias->where('$id',$id)->delete($id);

        
        return redirect()->to('/crudCategorias');

    }

//preguntar marcos
//Por que utilize [0][id] por que esta funcion lo que hace es meter un array sobre otro
    public function editar($id=null){
       
        $categorias = new categorias();
        $this->resul =$categorias->query("SELECT * FROM `categorias` WHERE id = '$id'") ;
        //$data['categorias']=$categorias->where('id',$id)->first();
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();
        $data['pageTitle'] = 'Manteniento de categorias';
        $content = view('admin/actualizarCategoria',$data);
        return parent::menuAdmin($content,$data);
    }


    public function actualizar(){
        $categorias = new categorias();
        $cate=[
            'categoria_nom' => $this->request->getVar('nombres')
            ];
            $id=$this->request->getVar('id');
            $categorias ->update($id,$cate);
            $consulta = $this->resul;
            $data['datos'] = $consulta->getResultArray();
            return redirect()->to('/crudCategorias');

    }

}