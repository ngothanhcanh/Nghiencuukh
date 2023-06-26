<?php
class GiangVienIndexController extends Controller
{
    private $SinhVienModel;
    private $GiangVienModel;
    private $KhoaModel;
    public function __construct()
    {
        $this->SinhVienModel = $this->model('SinhVienModel');
        $this->GiangVienModel = $this->model('GiangVienModel');
        $this->KhoaModel = $this->model('KhoaModel');
        if ($_SESSION['user_type'] !== 'giangvien') {
            header('location:' . URL . '/LoginController/index');
        }
    }
    public function index()
    {   $magv=$_SESSION['MAGV'];
        $result_profile=$this->GiangVienModel->showwheregv($magv);
       foreach($result_profile as $profile)
       {
        $_SESSION['namegv']=$profile['TENGV'];
        $_SESSION['magv']=$profile['MAGV'];
        $_SESSION['khoa']=$profile['MAKH'];
        }
        $result_sv = $this->SinhVienModel->totalStudents();
        $result_gv = $this->GiangVienModel->totalTeacher();
        $result_kh = $this->KhoaModel->totalKhoa();
        $this->view('giangvien/index', [
            'result_sv' => $result_sv,
            'result_gv' => $result_gv,
            'result_kh' => $result_kh
        ]);
    }
    public function out()
    {
        if (isset($_GET['thoat'])) {
            session_destroy();
            header('location:' . URL . '/LoginController/index');
        }
    }
}
