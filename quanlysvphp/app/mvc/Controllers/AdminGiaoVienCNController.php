<?php 
class AdminGiaoVienCNController extends Controller
{
    private $GiaoVienCNModel;
    private $GiangVienModel;
    public function __construct()
    {
        $this->GiaoVienCNModel=$this->model('GiaoVienCNModel');
        $this->GiangVienModel=$this->model('GiangVienModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->GiaoVienCNModel->delete($id))
            {
            header('location:'.URL.'/AdminGiaoVienCNController/index');
            }
        }
        $result=$this->GiaoVienCNModel->show();
        $result_GiangVienModel = $this->GiangVienModel->showid();
        
        $this->view('admin/giaoviencn',
    [
        'result'=>$result,
        'result_GiangVienModel'=>$result_GiangVienModel,
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $password = $_POST["password"];
    $this->GiaoVienCNModel->add($id, $password);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong GiaoVienCNModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'password'=>$password,
        
    );
    echo json_encode($response);
      }
    }
    public function update()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $id = $_POST["id"];         
            $password = $_POST["editedPassword"];
            $this->GiaoVienCNModel->update($id, $password);
            $response = array(
                'id' => $id
              
            );
            echo json_encode($response);
        }
    }
}