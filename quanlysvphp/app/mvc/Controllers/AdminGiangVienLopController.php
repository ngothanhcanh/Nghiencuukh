<?php 
class AdminGiangVienLopController extends Controller
{
    private $giangvienlopModel;
    private $giangvienModel;
    private $lopModel;
    public function __construct()
    {
        $this->giangvienlopModel=$this->model('GiangVienLopModel');
        $this->giangvienModel=$this->model('GiangVienModel');
        $this->lopModel=$this->model('LopModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->giangvienlopModel->delete($id))
            {
                header('location:'.URL.'/AdminGiangVienLopController/index');
            }
        }
        $result=$this->giangvienlopModel->show();
        $result_gv=$this->giangvienModel->show();
        $result_lop=$this->lopModel->show();
        $this->view('admin/giangvienlop',
    [
        'result'=>$result,
        'result_lop'=>$result_lop,
        'result_gv'=>$result_gv,
    ]);
    }
    public function save()
    {    
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Lấy dữ liệu từ yêu cầu AJAX
        $magv = $_POST["magv"];
        $malop = $_POST["malop"];
        $this->giangvienlopModel->add($magv, $malop);
        $response = array(
            'magv'=>$magv,
            'malop'=>$malop,
        );
        echo json_encode($response);
        }
    }
    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $magv = $_POST["magv"];
            $malop = $_POST["malop"];
            $this->giangvienlopModel->update($magv, $malop);
            // Trả về kết quả (ví dụ: thành công hoặc thất bại)
            $response = array(
                'magv'=>$magv,
                'malop'=>$malop,
            );
            echo json_encode($response);
        }
    }
}