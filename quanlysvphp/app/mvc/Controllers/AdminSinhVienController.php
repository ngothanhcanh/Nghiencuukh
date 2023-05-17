<?php
class AdminSinhVienController extends Controller
{    private $sinhvien;
    public function __construct()
    {
        $this->sinhvien=$this->model('SinhVienModel');
    }
    public function index()
    {  
      $result=$this->sinhvien->show();           
        $this->view('admin/sinhvien',
    [
        'result'=>$result
    ]);
    }
}
?>