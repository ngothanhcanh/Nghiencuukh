<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class UserController extends Controller
{   
    private $userModel;
    private $giangvienModel;
    private $sinhvienModel;
    public function __construct()
    {
        $this->userModel=$this->model('UserModel');
        $this->giangvienModel=$this->model('GiangVienModel');
        $this->sinhvienModel=$this->model('SinhVienModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            if($this->userModel->delete($id))
            {
            header('location:'.URL.'/UserController/index');
            }
        }
        $result=$this->userModel->show();
        $result_giaovien = $this->giangvienModel->show();
        $result_sinhvien=$this->sinhvienModel->show();
        $this->view('admin/user',
    [
        'result'=>$result,
        'result_giaovien'=>$result_giaovien,
        'result_sinhvien'=>$result_sinhvien
    ]);
    }
    public function save()
    {    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["Name"];
    $password = $_POST["Pass"];
    $userType = $_POST["userType"];
    $status = $_POST["status"];
    $mssv = $_POST["mssv"];
    $magv = $_POST["magv"];
    $this->userModel->add($id, $name, $password, $userType, $status, $mssv, $magv);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong userModel
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'name'=>$name,
        'password'=>$password,
        'userType'=>$userType,
        'status'=>$status,
        'mssv'=>$mssv,
        'magv'=>$magv
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
            $userType = $_POST["editedUserType"];
            $status = $_POST["editedStatus"];
            $mssv = $_POST["editedMssv"];
            $magv = $_POST["editedMagv"];
            $this->userModel->update($id, $name, $password, $userType, $status, $mssv, $magv);
            $response = array(
               
            );
            echo json_encode($response);
        }
    }
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->userModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách sinh viên');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tên Người Dùng');
        $sheet->setCellValue('C1', 'Mật khẩu');
        $sheet->setCellValue('D1', 'Quyền');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'MASSV');
        $sheet->setCellValue('G1', 'MAGV');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['ID']);
            $sheet->setCellValue('B' . $row, $row_data['Name']);
            $sheet->setCellValue('C' . $row, $row_data['Pass']);
            $sheet->setCellValue('D' . $row, $row_data['User_type']);
            $sheet->setCellValue('E' . $row, $row_data['TrangThai']);
            $sheet->setCellValue('F' . $row, $row_data['SV']);
            $sheet->setCellValue('G' . $row, $row_data['GV']);
    
            $row++;
        }
    
        // Xuất file Excel
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="danh_sach' . time() . '.xlsx"');
        header('Cache-Control: max-age=0');
    
        $writer->save('php://output');
    }
    }
    public function import()
    {
        if (isset($_POST['importuser'])) {
            // Đường dẫn đến tệp Excel
            $excelFilePath = $_FILES['excelFile']['tmp_name'];
    
            // Tạo đối tượng IOFactory để đọc tệp Excel thư viện
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilePath);
    
            // Lấy sheet đầu tiên
            $sheet = $spreadsheet->getActiveSheet();
    
            // Lấy số dòng cuối cùng có dữ liệu
            $lastRow = $sheet->getHighestDataRow();
            $error = [];
    
            // Lặp qua từng dòng để lấy dữ liệu
            for ($row = 2; $row <= $lastRow; $row++) {
                // Lấy dữ liệu từ từng cột
                $id = $sheet->getCell('A' . $row)->getValue();
                $name = $sheet->getCell('B' . $row)->getValue();
                $pass = $sheet->getCell('C' . $row)->getValue();
                $usertype = $sheet->getCell('D' . $row)->getValue();
                $trangthai = $sheet->getCell('E' . $row)->getValue();
                $sv = $sheet->getCell('F' . $row)->getValue();
                $gv = $sheet->getCell('G' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->userModel->add($id, $name, $pass, $usertype, $trangthai, $sv, $gv) !== "Success") {
                    if($this->userModel->exists($id)===true){
                        $error[] = $id;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
            header('Location: ' . URL . '/UserController/index');
        }
       
            
    }
    
}
