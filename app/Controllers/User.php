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

//ingresa los usuario tengo que arrelar lo de las rutas
    public function guardar(){

        $usuario = new Usuario();
       
     
        $datos=[
            
        'nombre'=>$this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'correo' => $this->request->getVar('email'),
        'contra' => $this->request->getVar('contrasenna'),
        'tipoUsua' => $this->request->getVar('tipoUsua')

        ];

        $usuario ->insert($datos);


    }
}