<?php 
class AdminGiangVienController extends Controller
{   
    private $giangvienModel;
    private $khoaModel;
    public function __construct()
    {
        $this->giangvienModel=$this->model('GiangVienModel');
        $this->khoaModel=$this->model('KhoaModel');
        if(!isset($_SESSION['user_type']))
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->giangvienModel->delete($id))
            {
            header('location:'.URL.'/AdminGiangVienController/index');
            }
        }
        $this->loadContent();
    }
    
    public function loadContent(){
        $result=$this->giangvienModel->show();
        $result_khoa = $this->khoaModel->show();
        $this->view('admin/giangvien',
    [
        'result'=>$result,
        'result_khoa'=>$result_khoa
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $makh = $_POST["makh"];
    $this->giangvienModel->add($id, $name, $makh);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong userModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'success' => true,
        'message' => 'Dữ liệu đã được lưu thành công'
    );
    $this->loadContent();
    echo json_encode($response);
      }
    }
    public function edit()
    {    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = $_POST["id"];
            $name = $_POST["name"];
            $makh = $_POST["makh"];

            $this->giangvienModel->update($id, $name, $makh);
            
            $response = array(
                'success' => true,
                'message' => 'Dữ liệu đã được cập nhật thành công'
            );
            $this->loadContent();
            echo json_encode($response);
        }
    }

}
