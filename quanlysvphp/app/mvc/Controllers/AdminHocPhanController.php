<?php 
class AdminHocPhanController extends Controller
{
    private $hocphanModel;
    public function __construct()
    {
        $this->hocphanModel=$this->model('HocPhanModel');
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->hocphanModel->delete($id))
            {
            header('location:'.URL.'/AdminHocPhanController/index');
            }
        }
        $result=$this->hocphanModel->show();
        $this->view('admin/hocphan',
    [
        'result'=>$result,
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $giangvien = $_POST["giangvien"];
    $this->hocphanModel->add($id, $name, $password,$giangvien);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong hocphanModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'name'=>$name,
        'password'=>$password,
        'giangvien'=>$giangvien
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
            $giangvien = $_POST['editMagv'];
            $this->hocphanModel->update($id, $name, $password,$giangvien);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
}