<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
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
        $result_KhoaModel = $this->KhoaModel->show();
        
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
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->lopModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách lớp');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'Mã lớp');
        $sheet->setCellValue('B1', 'Tên lớp');
        $sheet->setCellValue('C1', 'Mã khóa học');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MALOP']);
            $sheet->setCellValue('B' . $row, $row_data['TENLOP']);
            $sheet->setCellValue('C' . $row, $row_data['MAKH']);
    
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
        if (isset($_POST['importlop'])) {
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
                $malop = $sheet->getCell('A' . $row)->getValue();
                $tenlop = $sheet->getCell('B' . $row)->getValue();
                $makh = $sheet->getCell('C' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->lopModel->add($malop, $tenlop, $makh) !== "Success") {
                    if($this->lopModel->exists($malop)===true){
                        $error[] = $malop;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminLopController/index');
            exit();
        }
    }
}