<?php 
class GiangVienThoiKhoaBieuController extends Controller
{
    private $thoikhoabieuModel;
    public function __construct()
    {
        $this->thoikhoabieuModel=$this->model('ThoiKhoaBieuModel');
        if( $_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        $result=$this->thoikhoabieuModel->show();
        $this->view('giangvien/thoikhoabieu',
    [
        'result'=>$result
       
    ]);
    }
}