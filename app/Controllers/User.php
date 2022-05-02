<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\Categorias;
use App\Models\Portada;
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


//Funcion del login para acceder al sistema 
    public function acceso()
    {
     $session = session();
     
     $usuario = new Usuario();
     $portada = new Portada();
        $username = $this ->request ->getVar('username');
        $contrasenna = $this ->request ->getVar('password');
        $query=$usuario->query("SELECT * FROM `usuarios`,`roles` 
        WHERE usuarios.id_cedula = '$username' AND usuarios.contrasenna = '$contrasenna' and usuarios.rol_id = roles.id_rol");

        $datos = $query->getRow();
        //convierto el objeto en array para poderlo buscar bien.
        $array = json_decode(json_encode($datos), true);
        $rol_usuario = '2';
        $rol_id_admin = '1';
        $query2=$portada->query("SELECT * FROM `noticias`");
        $cons = $query2->getRow();
        //convierto el objeto en array para poderlo buscar bien.
        $array2 = json_decode(json_encode($cons), true);



        if ($array) {
            $pass = $array['contrasenna'];
            $rol = $array['rol_id'];
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            if (password_verify($contrasenna, $pass) && $rol === $rol_usuario) {
                $ses_data = [
                    'id_cedula' => $array['id_cedula'],
                    'nombre' => $array['nombre'],
                    'logged_in'     => TRUE
                ];
                //preguntar a marcos mañana
                
                $session->set($ses_data);

                if($array2 == null){
                    return redirect()->to('/nuevaNoticia');
                }else{
                    return redirect()->to('/dashboard');
                }
            } elseif (password_verify($contrasenna, $pass) && $rol === $rol_id_admin) {
                $ses_data = [
                    'id_cedula' => $array['id_cedula'],
                    'nombre' => $array['nombre'],
                    'logged_in'     => TRUE
                ];
                //$session->set($ses_data);
                return redirect()->to('/crudCategorias');
            } 
        }else {
            print_r('Usuario no exite!!');
            $data['pageTitle'] = 'Login';
            $content = view('user/login');
            return parent::mostrarSinMenu($content, $data);
           
        }

       
        
    }


    //Cierra la sesion del usuario
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}