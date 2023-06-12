<?php
class GiangVienProfileController extends Controller
{   private $GiangVienModel;
    public function __construct()
    {
        $this->GiangVienModel=$this->model('GiangVienModel');
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
      }
     
        $this->view('giangvien/profile',[
           
        ]);
    }
}
?>