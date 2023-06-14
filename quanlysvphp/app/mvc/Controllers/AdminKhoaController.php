<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminKhoaController extends Controller
{   
    private $khoaModel;
    public function __construct()
    {
        $this->khoaModel=$this->model('KhoaModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            $this->khoaModel->delete($id);
            header('location:'.URL.'/AdminKhoaController/index');
        }
        $this->loadContent();
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
        // $this->loadContent();
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
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->khoaModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách khoa');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tên Khoa');
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MAKH']);
            $sheet->setCellValue('B' . $row, $row_data['TENKH']);
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
        if (isset($_POST['importkhoaModel'])) {
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
                $ID = $sheet->getCell('A' . $row)->getValue();
                $tenkhoa = $sheet->getCell('B' . $row)->getValue();
                // Thêm dữ liệu sinh viên
                if ($this->khoaModel->add($ID, $tenkhoa) !== "Success") {
                    if($this->khoaModel->exists($ID)===true){
                        $error[] = $ID;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminkhoaController/index');
            exit();
        }
    }
}
