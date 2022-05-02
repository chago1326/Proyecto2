<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categorias;
use App\Models\News;
use App\Models\Portada;
class NewsSource extends BaseController
{

    //Me llena select con todas las categorias y me llave a la venta de ingresar una noticia
    public function noticiaNueva()
    {
        $categorias = new Categorias();
        //$cat['cat'] = $categoria->findAll();
        $this->resul =$categorias->query("SELECT * FROM `categorias` ") ;
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();
        $data['pageTitle'] = 'Noticia nueva';
        $content = view('news/nuevaNoticia',$data);
        return parent::renderTemplate($content, $data);
    }

    //Me lleva al Mantenimiento de las noticias
    public function crudNoticias()
    {
        $usua =session('id_cedula');
        $news = new News();
        $this->resul = $news->query("SELECT id_nue_noticas,nombre_noti,url_rss,categoria_nom,id_usuario 
        FROM `nuevas_noticias`,`usuarios`,`categorias`
         WHERE nuevas_noticias.id_usuario = usuarios.id_cedula and 
         nuevas_noticias.categoria_id = categorias.id 
         and id_usuario = '$usua'");
        $consulta = $this->resul;
        $data['datos']=$consulta->getResultArray();
        $data['pageTitle'] = 'Mantenimiento de tus noticias';
        $content = view('news/crudNoticias',$data);
        return parent::renderTemplate($content, $data);
    }
    //Me lleva a la pantalla de editar una noticia 
    public function editarNoticia()
    {
        $data['pageTitle'] = 'Actualizacion de noticias';
        $content = view('news/editarNoticia');
        return parent::renderTemplate($content, $data);
    }

//Funcion de insertar tengo que cambiarle la cedula por el usuario cuando ya lo pued obtener

    public function  guardarNo(){

        $usua =session('id_cedula');
        $news = new News(); 
        $datos=[
        'nombre_noti'=>$this->request->getVar('nombre'),
        'url_rss'=>$this->request->getVar('rss'),
        'categoria_id'=>$this->request->getVar('categorias'),
        'id_usuario'=>($usua)
        ];
        print_r($datos);
        $news ->insert($datos);

        return redirect()->to('/crudNoticias');

    }

    //me lleva los datos que necesito para editar a la pantalla de edicion de noticia
    public function editarNo($id=null){
        $news = new News();
        $this->resul =$news->query("SELECT nuevas_noticias.id_nue_noticas,nuevas_noticias.nombre_noti,nuevas_noticias.url_rss,categorias.categoria_nom,nuevas_noticias.id_usuario FROM `nuevas_noticias`,`categorias` WHERE id_nue_noticas = '$id' and nuevas_noticias.categoria_id = categorias.id") ;
        $consulta = $this->resul;
        $data['datos'] = $consulta->getResultArray();

        //Para llenar el select si el usuario quiere cmabiar de categorias
        $categorias = new Categorias();
        $this->resul =$categorias->query("SELECT * FROM `categorias` ") ;
        $consulta2 = $this->resul;
        $data['cate'] = $consulta2->getResultArray();

        $data['pageTitle'] = 'Actualizacion de noticias';
        $content = view('news/editarNoticia',$data);
        return parent::renderTemplate($content, $data);
    }

    public function actualiazNo(){

        $news = new News();
        $noti=[
            'nombre_noti'=>$this->request->getVar('nombre'),
            'url_rss'=>$this->request->getVar('rssUrl'),
            'categoria_id'=>$this->request->getVar('categorias')
            ];
            $id=$this->request->getVar('id');
            $news ->update($id,$noti);
            return redirect()->to('/crudNoticias');
    }

    public function borrarNo($id=null){
        $news = new News(); 
        $news->query("DELETE FROM `nuevas_noticias` WHERE id_nue_noticas = '$id'");
        return redirect()->to('/crudNoticias');

    }
    //Esta funcion es una consulta a la base de datos con la informacion de la noticias para poderlas mostrar
    public function dashboard(){
         
        $usua =session('id_cedula');
        $noticia = new Portada();
        $this->resul =$noticia->query("SELECT * FROM `noticias` where usuario_id = '$usua'");
        $consulta = $this->resul;
        $data['mos'] = $consulta->getResultArray();

        $this->resul =$noticia ->query("SELECT DISTINCT categorias.categoria_nom FROM `noticias`,`categorias` WHERE noticias.categoria_id = categorias.id");
        $consulta4 =$this->resul;
        $data['categori'] = $consulta4->getResultArray();
        $data['pageTitle'] = 'Mis noticias';
        $content = view('user/dashboard',$data);
        return parent::renderTemplate($content, $data);

    }
    //metodo para relealizar busqueda
    public function busqueda(){

        $buscar = $this ->request ->getVar('buscar');
        $noticia = new Portada();
        $this->resul =$noticia->query("SELECT * FROM `noticias`,`categorias` WHERE noticias.titulo LIKE '%$buscar%' or noticias.descripcion LIKE '%$buscar%'");
        $consulta = $this->resul;
        $data['mos'] = $consulta->getResultArray();

        $this->resul =$noticia ->query("SELECT DISTINCT categorias.categoria_nom FROM `noticias`,`categorias` WHERE noticias.categoria_id = categorias.id");
        $consulta4 =$this->resul;
        $data['categori'] = $consulta4->getResultArray();
        $data['pageTitle'] = 'Mis noticias';
        $content = view('user/dashboard',$data);
        return parent::renderTemplate($content, $data);

       

    }

    //funcion para filtrar por categorias
    public function filtrar(){
        $noticia = new Portada();
        $filtro = $this ->request ->getVar('filtro');
        //ARREGLAR la consulta
        $this->resul =$noticia->query("SELECT * FROM `noticias`,`categorias` WHERE noticias.categoria_id = '$filtro'");
        $consulta = $this->resul;
        $data['mos'] = $consulta->getResultArray();

        $this->resul =$noticia ->query("SELECT DISTINCT categorias.categoria_nom FROM `noticias`,`categorias` WHERE noticias.categoria_id = categorias.id");
        $consulta4 =$this->resul;
        $data['categori'] = $consulta4->getResultArray();
        $data['pageTitle'] = 'Mis noticias';
        $content = view('user/dashboard',$data);
        return parent::renderTemplate($content, $data);

    }
}