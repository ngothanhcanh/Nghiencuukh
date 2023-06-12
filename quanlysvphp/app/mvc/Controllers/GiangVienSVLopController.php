<?php
class GiangVienSVLopController extends Controller
{   private $SinhVienModel;
    public function __construct()
    {
        $this->SinhVienModel=$this->model('SinhVienModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {   
        if($_SERVER["REQUEST_METHOD"]==="POST")
        {
            $MALOP=$_POST['selectmalop'];
            $result=$this->SinhVienModel->showwheremalop($MALOP);
            $this->view('giangvien/sinhvienlop',[
                'result'=>$result 
             ]);
        }
    }
}
?>