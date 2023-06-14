<?php
class GiangVienLopController extends Controller
{   private $lopModel;
    public function __construct()
    {
        $this->lopModel=$this->model('LopModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {   
        $result = $this->lopModel->show();
        $this->view('giangvien/lop',
        [
            'result'=>$result
        ]);
    }
}