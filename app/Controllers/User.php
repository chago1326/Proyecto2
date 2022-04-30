<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\Categorias;
class User extends BaseController{


    //Para ir a la ventana de el registro de usuarios
 public function register()
    {
        $data['pageTitle'] = 'Registro de usuario';
        $content = view('user/register');
        return parent::mostrarSinMenu($content, $data);
    }
    //Para ir a la ventana de el login de usuarios
    public function login()
    {
        $data['pageTitle'] = 'Login';
        $content = view('user/login');
        return parent::mostrarSinMenu($content, $data);
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
            $rol = $data['rol_id'];
            $authenticatePassword = password_verify($contrasenna, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id_cedula' => $data['id_cedula'],
                    'nombre' => $data['nombre'],
                    'isLoggedIn' => TRUE
                ];
                
                if($rol =="2"){
                    //cambiarlo por el dashboard

                    $data['pageTitle'] = 'Noticia nueva';
                    $content = view('news/nuevaNoticia',$data);
                    return parent::renderTemplate($content, $data);


                }else{
                    $data['pageTitle'] = 'Manteniento de categorias';
                    $content = view('admin/crudCategorias',$data);
                    return parent::menuAdmin($content, $data);

                }

            }else{
        print_r('Usuario no exite!!');
        $data['pageTitle'] = 'Login';
        $content = view('user/login');
        return parent::mostrarSinMenu($content, $data);

       }
       
       }

       
        
    }


    //Cierra la sesion del usuario
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/index');
    }
}