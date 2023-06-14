<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
class GiangVienHocPhanController extends Controller
{
    private $hocphanModel;
    public function __construct()
    {
        $this->hocphanModel=$this->model('HocPhanModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        $magv=$_SESSION['MAGV'];
        $result=$this->hocphanModel->showwheremagv($magv);
        $this->view('giangvien/hocphan',
    [
        'result'=>$result,
    ]);
    }
    public function export()
    {   $magv=$_SESSION['MAGV'];
        if(isset($_POST['exportds']))
        {
        $data = $this->hocphanModel->showwheremagv($magv);
    
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
}