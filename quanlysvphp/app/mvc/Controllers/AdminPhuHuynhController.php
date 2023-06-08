<?php 
class AdminPhuHuynhController extends Controller
{   
    private $phuhuynhModel;
    public function __construct()
    {
        $this->phuhuynhModel=$this->model('PhuHuynhModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            $this->phuhuynhModel->delete($id);
        }
        $this->loadContent();
    }
    public function save()
    {    
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Lấy dữ liệu từ yêu cầu AJAX
        $cccd = $_POST["cccd"];
        $mk = $_POST["mk"];
            
        // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
        $this->phuhuynhModel->add($cccd, $mk);
        // Gọi phương thức lưu dữ liệu trong phuhuynhModel
        // Trả về kết quả (ví dụ: thành công hoặc thất bại)
        $response = array(
            'success' => true,
            'message' => 'Dữ liệu đã được lưu thành công'
        );
        // $this->loadContent();
        echo json_encode($response);
        }
    }
    public function loadContent(){
        $result=$this->phuhuynhModel->show();
        $this->view('admin/phuhuynh',
        [
            'result'=>$result
        ]);
    }
    public function edit()
    {    
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Lấy dữ liệu từ yêu cầu AJAX
        $cccd = $_POST["cccd"];
        $mk = $_POST["mk"];
            
        // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
        $this->phuhuynhModel->update($cccd, $mk);
        $response = array(
            'success' => true,
            'message' => 'Dữ liệu đã được lưu thành công'
        );
        $this->loadContent();
        echo json_encode($response);
        }
    }
}
