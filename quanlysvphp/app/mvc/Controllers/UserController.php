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
        'id'=>$id,
        'name'=>$name,
        'password'=>$password,
        'userType'=>$userType,
        'status'=>$status,
        'mssv'=>$mssv,
        'magv'=>$magv
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
            $password = $_POST["editedPassword"];
            $userType = $_POST["editedUserType"];
            $status = $_POST["editedStatus"];
            $mssv = $_POST["editedMssv"];
            $magv = $_POST["editedMagv"];
            $this->userModel->update($id, $name, $password, $userType, $status, $mssv, $magv);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
}
