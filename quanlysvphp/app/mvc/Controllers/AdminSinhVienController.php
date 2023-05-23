<?php
class AdminSinhVienController extends Controller
{    private $sinhvien;
    private $KhoaHocModel;
    private $LopModel;
    private $KhoaModel;
    private $GiaoVienCNModel;
    public function __construct()
    {
        $this->sinhvien=$this->model('SinhVienModel');
        $this->KhoaHocModel=$this->model('KhoaHocModel');
        $this->LopModel=$this->model('LopModel');
        $this->KhoaModel=$this->model('KhoaModel');
        $this->GiaoVienCNModel=$this->model('GiaoVienCNModel');

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
        $result_KhoaHocModel=$this->KhoaHocModel->showid();
        $result_LopModel=$this->LopModel->showid();
        $result_GiaoVienCNModel=$this->GiaoVienCNModel->showid();
        $this->view('admin/sinhvien',
    [
        'result'=>$result,
        'result_KhoaModel'=>$result_KhoaModel,
        'result_KhoaHocModel'=>$result_KhoaHocModel,
        'result_LopModel'=>$result_LopModel,
        'result_GiaoVienCNModel'=>$result_GiaoVienCNModel
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
    $gvcn = $_POST['gvcn'];
    $this->sinhvien->add($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$gvcn);
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
        'gvcn'=>$gvcn
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
             $gvcn = $_POST['editedGvcn'];
            $this->sinhvien->update($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$gvcn);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
}
