<?php 
class LoginController extends Controller 
{  
    private $loginModel;
    public function __construct()
    {
        $this->loginModel=$this->model('LoginModel');
    }
    public function index()
    {    $error = array();
        // check user
        if(isset($_POST['login_submit']))
        {
           $name=$_POST['login_name'];
           $password=$_POST['login_password'];
           if(($result=$this->loginModel->sigin($name,$password))==1)
           { 
            $_SESSION['user_id']=$result['ID'];
            $_SESSION['status']=$result['status'];
            $_SESSION['user_type']=$result['user_type'];
            if( $_SESSION['user_type']='nguoidung')
            {
                header('location:'.URL.'/ViewController/index');
            }else 
            {
              $error [] = 'error password or name';
            }
            if($_SESSION['user_type']='admin')
            {
                header('location:'.URL.'/AdminIndexController/index');
            }else
            {
                $error [] = 'error password or name';
            }
            // if($_SESSION['user_type']='admin')
            // {
            //     header('location:'.URL.'/AdminIndexController/index');
            // }else
            // {
            //     $error [] = 'error password or name';
            // }
            }
            
        }

        $this->view('login/login',
    [
        'error'=>$error
    ]);
       
    }
}