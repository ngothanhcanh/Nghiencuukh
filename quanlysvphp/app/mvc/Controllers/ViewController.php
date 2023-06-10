<?php 
class ViewController extends Controller
{
    public function index()
    {
        $this->view('giaovien/index');
        if(!isset($_SESSION['user_type']))
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
}