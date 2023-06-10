<?php
class AdminSinhVienController extends Controller
{    private $sinhvien;
    private $KhoasModel;
    private $LopModel;
    private $KhoaModel;
    private $PhuHuynhModel;
    public function __construct()
    {
        $this->sinhvien=$this->model('SinhVienModel');
        $this->KhoasModel=$this->model('KhoasModel');
        $this->LopModel=$this->model('LopModel');
        $this->KhoaModel=$this->model('KhoaModel');
        $this->PhuHuynhModel=$this->model('PhuHuynhModel');

    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->sinhvien->delete($id))
            {
            header('location:'.URL.'/AdminSinhVienController/index');
            }
        }
        $result=$this->sinhvien->show();
        $result_KhoaModel=$this->KhoaModel->showid();
        $result_KhoasModel=$this->KhoasModel->showid();
        $result_LopModel=$this->LopModel->showid();
        $result_PhuHuynhModel=$this->PhuHuynhModel->showid();
        $this->view('admin/sinhvien',
    [
        'result'=>$result,
        'result_KhoaModel'=>$result_KhoaModel,
        'result_KhoasModel'=>$result_KhoasModel,
        'result_LopModel'=>$result_LopModel,
        'result_PhuHuynhModel'=>$result_PhuHuynhModel
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $khoas = $_POST['khoas'];
    $malop = $_POST['malop'];
    $makh = $_POST['makh'];
    $maph = $_POST['maph'];
    $this->sinhvien->add($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$maph);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong sinhvien
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'name'=>$name,
        'gioitinh'=>$gioitinh ,
        'ngaysinh'=>$ngaysinh ,
        'diachi'=>$diachi ,
       'khoas'=>$khoas ,
        'malop'=>$malop,
        'makh'=>$makh,
        'maph'=>$maph
    );
    echo json_encode($response);
      }
    }
    public function update()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $id = $_POST["id"];
            $name = $_POST["editedName"];
            $gioitinh = $_POST['editedGioitinh'];
            $ngaysinh = $_POST['editedNgaysinh'];
            $diachi = $_POST['editedDiachi'];
            $khoas = $_POST['editedKhoas'];
            $malop = $_POST['editedMalop'];
            $makh = $_POST['editedMakh'];
             $maph = $_POST['editedMaph'];
            $this->sinhvien->update($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$maph);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
}
