<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminGiangVienController extends Controller
{   
    private $giangvienModel;
    private $khoaModel;
    public function __construct()
    {
        $this->giangvienModel=$this->model('GiangVienModel');
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
            
            $this->giangvienModel->delete($id);
            
            header('location:'.URL.'/AdminGiangVienController/index');
            
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
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->giangvienModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách sinh viên');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tên Giảng Viên');
        $sheet->setCellValue('C1', 'MAKH');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MAGV']);
            $sheet->setCellValue('B' . $row, $row_data['TENGV']);
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
        if (isset($_POST['importgiangvien'])) {
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
                $tengv = $sheet->getCell('B' . $row)->getValue();
                $makh = $sheet->getCell('C' . $row)->getValue();
               
    
                // Thêm dữ liệu sinh viên
                if ($this->giangvienModel->add($id, $tengv, $makh) !== "Success") {
                    if($this->giangvienModel->exists($id)===true){
                        $error[] = $id;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminGiangVienController/index');
            exit();
        }
    }
}
