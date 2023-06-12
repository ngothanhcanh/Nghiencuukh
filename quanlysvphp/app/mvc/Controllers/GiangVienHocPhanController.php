<?php 
class GiangVienHocPhanController extends Controller
{
    private $hocphanModel;
    public function __construct()
    {
        $this->hocphanModel=$this->model('HocPhanModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        $magv=$_SESSION['MAGV'];
        $result=$this->hocphanModel->showwheremagv($magv);
        $this->view('giangvien/hocphan',
    [
        'result'=>$result,
    ]);
    }
    
}