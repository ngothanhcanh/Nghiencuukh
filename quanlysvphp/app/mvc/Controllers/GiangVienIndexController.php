<?php 
class GiangVienIndexController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user_type']))
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {
        $this->view('giangvien/index');
    }
}