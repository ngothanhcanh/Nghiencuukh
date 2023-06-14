<?php 
class GiangVienIndexController extends Controller
{
    public function __construct()
    {
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {
        $this->view('giangvien/index');
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