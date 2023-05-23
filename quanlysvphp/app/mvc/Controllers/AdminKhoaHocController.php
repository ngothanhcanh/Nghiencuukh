<?php 
class AdminKhoaHocController extends Controller
{   private $khoahocModel;
    public function __construct()
    {
        $this->khoahocModel=$this->model('KhoaHocModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->khoahocModel->delete($id))
            {
            header('location:'.URL.'/AdminKhoaHocController/index');
            }
        }
        $result=$this->khoahocModel->show();
        $this->view('admin/khoahoc',
    [
        'result'=>$result,
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $this->khoahocModel->add($id);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong khoahocModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
    );
    echo json_encode($response);
      }
    }
}