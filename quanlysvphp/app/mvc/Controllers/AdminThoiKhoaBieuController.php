<?php 
class AdminThoiKhoaBieuController extends Controller
{
    private $thoikhoabieuModel;
    private $lopModel;
    private $giangvienModel;
    private $hocphanModel;
    public function __construct()
    {
        $this->thoikhoabieuModel=$this->model('ThoiKhoaBieuModel');
        $this->lopModel=$this->model('LopModel');
        $this->hocphanModel=$this->model('HocPhanModel');
        $this->giangvienModel=$this->model('GiangVienModel');
        if(!isset($_SESSION['user_type']))
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            if($this->thoikhoabieuModel->delete($id))
            {
                header('location:'.URL.'/AdminThoiKhoaBieuController/index');
            }
        }
        $result=$this->thoikhoabieuModel->show();
        $result_gv=$this->giangvienModel->show();
        $result_lop=$this->lopModel->show();
        $result_hp=$this->hocphanModel->show();
        $this->view('admin/thoikhoabieu',
    [
        'result'=>$result,
        'result_lop'=>$result_lop,
        'result_gv'=>$result_gv,
        'result_hp'=>$result_hp
    ]);
    }
    public function save()
    {    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Lấy dữ liệu từ yêu cầu AJAX
        $id = $_POST["id"];
        $b1_tiet = $_POST["b1_tiet"];
        $b1_thu = $_POST["b1_thu"];
        $b1_phong = $_POST["b1_phong"];
        $b2_tiet = $_POST["b2_tiet"];
        $b2_thu = $_POST["b2_thu"];
        $b2_phong = $_POST["b2_phong"];
        $ngay_bd = $_POST["ngay_bd"];
        $ngay_kt = $_POST["ngay_kt"];
        $ghichu = $_POST["ghichu"];
        $lop = $_POST["lop"];
        $monhoc = $_POST["monhoc"];
        $giangvien = $_POST["giangvien"];

        $this->thoikhoabieuModel->add($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien);
        $response = array(
            'id'=>$id,
            'b1_tiet'=>$b1_tiet,
            'b1_thu'=>$b1_thu,
            'b1_phong'=>$b1_phong,
            'b2_tiet'=>$b2_tiet,
            'b2_thu'=>$b2_thu,
            'b2_phong'=>$b2_phong,
            'ngay_bd'=>$ngay_bd,
            'ngay_kt'=>$ngay_kt,
            'ghichu'=>isset($ghichu) ? $ghichu : "",
            'lop'=>$lop,
            'monhoc'=>$monhoc,
            'giangvien'=>$giangvien
        );
        echo json_encode($response);
        }
    }
    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            // Lấy dữ liệu từ yêu cầu AJAX
            $id = $_POST["id"];
            $b1_tiet = $_POST["b1_tiet"];
            $b1_thu = $_POST["b1_thu"];
            $b1_phong = $_POST["b1_phong"];
            $b2_tiet = $_POST["b2_tiet"];
            $b2_thu = $_POST["b2_thu"];
            $b2_phong = $_POST["b2_phong"];
            $ngay_bd = $_POST["ngay_bd"];
            $ngay_kt = $_POST["ngay_kt"];
            $ghichu = $_POST["ghichu"];
            $lop = $_POST["lop"];
            $monhoc = $_POST["monhoc"];
            $giangvien = $_POST["giangvien"];
            $this->thoikhoabieuModel->update($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien);
            $response = array(
                'id'=>$id,
                'b1_tiet'=>$b1_tiet,
                'b1_thu'=>$b1_thu,
                'b1_phong'=>$b1_phong,
                'b2_tiet'=>$b2_tiet,
                'b2_thu'=>$b2_thu,
                'b2_phong'=>$b2_phong,
                'ngay_bd'=>$ngay_bd,
                'ngay_kt'=>$ngay_kt,
                'ghichu'=>isset($ghichu) ? $ghichu : "",
                'lop'=>$lop,
                'monhoc'=>$monhoc,
                'giangvien'=>$giangvien
            );
            echo json_encode($response);
        }
    }
}