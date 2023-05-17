<?php 
class UserController extends Controller
{   
    private $userModel;
    public function __construct()
    {
        $this->userModel=$this->model('userModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            $this->userModel->delete($id);
        }
        $result=$this->userModel->show();
        $this->view('admin/user',
    [
        'result'=>$result
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

    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    $this->userModel->add($id, $name, $password, $userType, $status, $mssv, $magv);
    // Gọi phương thức lưu dữ liệu trong userModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'success' => true,
        'message' => 'Dữ liệu đã được lưu thành công'
    );
    echo json_encode($response);
      }
    }
}
