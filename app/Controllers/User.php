<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
class User extends BaseController{

 public function register()
    {
        $data['pageTitle'] = 'Registro de usuario';
        $content = view('user/register');
        return parent::mostrarSinMenu($content, $data);
    }

    public function login()
    {
        $data['pageTitle'] = 'Login';
        $content = view('user/login');
        return parent::mostrarSinMenu($content, $data);
    }

    public function noticiaNueva()
    {
        $data['pageTitle'] = 'Noticia nueva';
        $content = view('user/nuevaNoticia');
        return parent::renderTemplate($content, $data);
    }
    public function crudNoticias()
    {
        $data['pageTitle'] = 'Mantenimiento de tus noticias';
        $content = view('user/crudNoticias');
        return parent::renderTemplate($content, $data);
    }
    public function editarNoticia()
    {
        $data['pageTitle'] = 'Actualizacion de noticias';
        $content = view('user/editarNoticia');
        return parent::renderTemplate($content, $data);
    }
    

//ingresa los usuario tengo que arrelar lo de las rutas
    public function guardar(){
        
       

         $usuario = new Usuario(); 
        $datos=[
        'cedula'=>$this->request->getVar('id_cedula'),
        'nombre'=>$this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'correo' => $this->request->getVar('email'),
        'contra' => $this->request->getVar('contrasenna'),
        'tipoUsua' => $this->request->getVar('tipoUsua')

        ];

        $usuario ->insert($datos);
        


    }
}