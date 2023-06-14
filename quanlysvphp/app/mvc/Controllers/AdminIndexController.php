<?php
class AdminIndexController extends Controller
{  
    public function __construct()
    {
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {
       $this->view('admin/index');
    }
    public function out()
    {
        if(isset($_GET['thoat']))
        {
            session_destroy();
            header('location:'.URL.'/LoginController/index');
        }
    }
}

?>