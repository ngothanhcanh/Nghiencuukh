<?php 
class AdminKhoasController extends Controller
{   private $khoasModel;
    public function __construct()
    {
        $this->khoasModel=$this->model('KhoasModel');
        if(!isset($_SESSION['user_type']))
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->khoasModel->delete($id))
            {
            header('location:'.URL.'/AdminKhoasController/index');
            }
        }
        $result=$this->khoasModel->show();
        $this->view('admin/khoas',
    [
        'result'=>$result,
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $this->khoasModel->add($id);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong khoasModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
    );
    echo json_encode($response);
      }
    }
}