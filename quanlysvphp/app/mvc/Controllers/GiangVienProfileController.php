<?php
class GiangVienProfileController extends Controller
{  
    private $KhoaModel;
    public function __construct()
    {
        $this->KhoaModel=$this->model('KhoaModel');
        if( $_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {  
      $tenkhoa=$this->KhoaModel->shownamekhoa($_SESSION['khoa']);
        $this->view('giangvien/profile',[
           'tenkhoa'=>$tenkhoa
        ]);
    }
}
?>