<?php 
class AdminLopController extends Controller
{
    private $lopModel;
    private $KhoaModel;
    
    public function __construct()
    {
        $this->lopModel=$this->model('LopModel');
        $this->KhoaModel=$this->model('KhoaModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->lopModel->delete($id))
            {
            header('location:'.URL.'/AdminLopController/index');
            }
        }
        $result=$this->lopModel->show();
        $result_KhoaModel = $this->KhoaModel->showid();
        
        $this->view('admin/lop',
    [
        'result'=>$result,
        'result_KhoaModel'=>$result_KhoaModel,
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $this->lopModel->add($id, $name, $password);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong lopModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'name'=>$name,
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
            $name = $_POST["editedName"];
            $password = $_POST["editedPassword"];
            $this->lopModel->update($id, $name, $password);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
}