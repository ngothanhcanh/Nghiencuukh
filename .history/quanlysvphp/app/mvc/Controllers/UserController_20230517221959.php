<?php 
class UserController extends Controller
{   
    private $userModel;
    private $giangvienModel;
    private $sinhvienModel;
    public function __construct()
    {
        $this->userModel=$this->model('UserModel');
        $this->giangvienModel=$this->model('GiangVienModel');
        $this->sinhvienModel=$this->model('SinhVienModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->userModel->delete($id))
            {
            header('location:'.URL.'/UserController/index');
            }
        }
        $result=$this->userModel->show();
        $result_giaovien = $this->giangvienModel->showid();
        $result_sinhvien=$this->sinhvienModel->show();
        $this->view('admin/user',
    [
        'result'=>$result,
        'result_giaovien'=>$result_giaovien,
        'result_sinhvien'=>$result_sinhvien
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $userType = $_POST["userType"];
    $status = $_POST["status"];
    $mssv = $_POST["mssv"];
    $magv = $_POST["magv"];
    $this->userModel->add($id, $name, $password, $userType, $status, $mssv, $magv);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong userModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'success' => true,
        'message' => 'Dữ liệu đã được lưu thành công'
    );
    echo json_encode($response);
      }
    }
    public function edit()
    {    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Lấy dữ liệu từ yêu cầu POST
            $id = $_POST["id"];
            $name = $_POST["name"];
            $password = $_POST["password"];
            $userType = $_POST["userType"];
            $status = $_POST["status"];
            $mssv = $_POST["mssv"];
            $magv = $_POST["magv"];

            // Gọi phương thức update trong userModel
            $this->userModel->update($id, $name, $password, $userType, $status, $mssv, $magv);
            
            // TODO: Thực hiện cập nhật dữ liệu trong cơ sở dữ liệu
            // Gọi phương thức update trong userModel
            // Trả về kết quả (ví dụ: thành công hoặc thất bại)

            $response = array(
                'success' => true,
                'message' => 'Dữ liệu đã được cập nhật thành công'
            );
            echo json_encode($response);
        }
    }

}
