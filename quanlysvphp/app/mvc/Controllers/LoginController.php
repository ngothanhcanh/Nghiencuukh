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
           if($result && $result['Name']===$name && $result['Pass']===$password)
           { 
            $_SESSION['user_id']=$result['ID'];
            $_SESSION['status']=$result['trangthai'];
            $_SESSION['user_type']=$result['User_type'];
           if( $_SESSION['user_type']==='giangvien')
            { 
                $_SESSION['MAGV']=$result['GV'];
                header('location:'.URL.'/GiangVienIndexController/index');
            }
            if($_SESSION['user_type']==='admin')
            {
                header('location:'.URL.'/AdminIndexController/index');
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