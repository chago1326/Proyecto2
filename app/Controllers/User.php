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
    

//ingresa los usuario.
    public function guardar(){
        $usuario = new Usuario(); 
        if($rol=$_POST['tipoUsua'] == 'Administrador'){
            $rol1 = '1';
          }else{
            $rol1 = '2';
          }
        $datos=[
        'id_cedula'=>$this->request->getVar('id_cedula'),
        'email' => $this->request->getVar('email'),
        'nombre'=>$this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'contrasenna' => $this->request->getVar('contrasenna'),
        'rol_id' => ($rol1)
        ];

        $usuario ->insert($datos);

        $data['pageTitle'] = 'Login';
        $content = view('user/login');
        print_r("Registro exitoso");
        return parent::mostrarSinMenu($content, $data);
      
        



    }

//Funcion del login para acceder al sistema da un error en la linea 76
    public function acceso(){
       

        $usuario = new Usuario();
        
        $username = $this ->request ->getVar('username');
        $contrasenna = $this ->request ->getVar('password');

        $data = $usuario->where('id_cedula', $username)->first();

        if($data){
            $pass = $data['contrasenna'];
            $authenticatePassword = password_verify($contrasenna, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id_cedula' => $data['id_cedula'],
                    'nombre' => $data['nombre'],
                    'isLoggedIn' => TRUE
                ];
                
                //cambiarlo por el dashboard
                return redirect()->to('/nuevaNoticia');

            }else{
        print_r('Usuario no exite!!');
        $data['pageTitle'] = 'Login';
        $content = view('user/login');
        return parent::mostrarSinMenu($content, $data);

       }
       
       }

       
        
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/index');
    }
}