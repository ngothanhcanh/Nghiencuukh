<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminHocPhanController extends Controller
{ 
    private $GiangVienModel;
    private $hocphanModel;
    public function __construct()
    {
        $this->GiangVienModel=$this->model('GiangVienModel');
        $this->hocphanModel=$this->model('HocPhanModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
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
        $result_giaovien=$this->GiangVienModel->show();
        $result=$this->hocphanModel->show();
        $this->view('admin/hocphan',
    [
        'result'=>$result,
        'result_giaovien'=>$result_giaovien
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
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->hocphanModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách học phần');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'Mã học phần');
        $sheet->setCellValue('B1', 'Tên học phần');
        $sheet->setCellValue('C1', 'Số TC');
        $sheet->setCellValue('D1', 'Giáo viên phụ trách');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MAHP']);
            $sheet->setCellValue('B' . $row, $row_data['TENHP']);
            $sheet->setCellValue('C' . $row, $row_data['SOTC']);
            $sheet->setCellValue('D' . $row, $row_data['GVPT']);
    
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
        if (isset($_POST['importhocphan'])) {
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
                $mahp = $sheet->getCell('A' . $row)->getValue();
                $tenhp = $sheet->getCell('B' . $row)->getValue();
                $sotc = $sheet->getCell('C' . $row)->getValue();
                $gvpt = $sheet->getCell('D' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->hocphanModel->add($mahp, $tenhp, $sotc, $gvpt) !== "Success") {
                    if($this->hocphanModel->exists($mahp)===true){
                        $error[] = $mahp;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminHocPhanController/index');
            exit();
        }
    }
}