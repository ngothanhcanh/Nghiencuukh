<?php 
class AdminKhoaController extends Controller
{   
    private $khoaModel;
    public function __construct()
    {
        $this->khoaModel=$this->model('KhoaModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            $this->khoaModel->delete($id);
        }
        $result=$this->khoaModel->show();
        $this->view('admin/khoa',
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
            
        // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
        $this->khoaModel->add($id, $name);
        // Gọi phương thức lưu dữ liệu trong khoaModel
        // Trả về kết quả (ví dụ: thành công hoặc thất bại)
        $response = array(
            'success' => true,
            'message' => 'Dữ liệu đã được lưu thành công'
        );
        $this->loadContent();
        echo json_encode($response);
        }
    }
    public function loadContent(){
        $result=$this->khoaModel->show();
        $this->view('admin/khoa',
        [
            'result'=>$result
        ]);
    }
    public function edit()
    {    
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Lấy dữ liệu từ yêu cầu AJAX
        $id = $_POST["id"];
        $name = $_POST["name"];
            
        // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
        $this->khoaModel->update($id, $name);
        $response = array(
            'success' => true,
            'message' => 'Dữ liệu đã được lưu thành công'
        );
        $this->loadContent();
        echo json_encode($response);
        }
    }
}
