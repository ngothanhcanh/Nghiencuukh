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
           $name=isset($_POST['login_name']) ? $_POST['login_name'] : '' ;
           $password=$_POST['login_password'] ? $_POST['login_password'] : '';
           $result=$this->loginModel->sigin($name,$password) ?? array();
           if($result && $result['name']===$name && $result['password']===$password)
           { 
            $_SESSION['user_id']=$result['ID'];
            $_SESSION['status']=$result['status'];
            $_SESSION['user_type']=$result['user_type'];
           if( $_SESSION['user_type']=='nguoidung')
            {
                header('location:'.URL.'/ViewController/index');
            }
            if($_SESSION['user_type']=='admin')
            {
                header('location:'.URL.'/ViewController/index');
            }
           }
                $error[] = 'sai tài khoản hoặc mật khẩu';
            
        }

        $this->view('login/login',
    [
        'error'=>$error
      
    ]);
       
    }
}