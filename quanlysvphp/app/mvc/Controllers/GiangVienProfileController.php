<?php
class GiangVienProfileController extends Controller
{   private $GiangVienModel;
    private $KhoaModel;
    public function __construct()
    {
        $this->GiangVienModel=$this->model('GiangVienModel');
        $this->KhoaModel=$this->model('KhoaModel');
        if( $_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {  
        $magv=$_SESSION['MAGV'];
        $result_profile=$this->GiangVienModel->showwheregv($magv);
      foreach($result_profile as $profile)
      {
        $_SESSION['namegv']=$profile['TENGV'];
        $_SESSION['magv']=$profile['MAGV'];
        $_SESSION['khoa']=$profile['MAKH'];
      }
      $tenkhoa=$this->KhoaModel->shownamekhoa($_SESSION['khoa']);
      print_r($tenkhoa);
        $this->view('giangvien/profile',[
           'tenkhoa'=>$tenkhoa
        ]);
    }
}
?>