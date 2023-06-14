<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class GiangVienSVLopController extends Controller
{   private $SinhVienModel;
    public function __construct()
    {
        $this->SinhVienModel=$this->model('SinhVienModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {   
        if($_SERVER["REQUEST_METHOD"]==="POST")
        {
            $MALOP=$_POST['selectmalop'];
            $_SESSION['MaLop']=$MALOP;
            $result_svlop=$this->SinhVienModel->showwheremalop($MALOP);
            $this->view('giangvien/sinhvienlop',[
                'result_svlop'=>$result_svlop 
             ]);
        }
    }
    public function export()
    {  $MALOP=$_SESSION['MaLop'];
        if(isset($_POST['exportds']))
        {
        $data = $this->SinhVienModel->showwheremalop($MALOP);
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách sinh viên');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'MSSV');
        $sheet->setCellValue('B1', 'Tên Sinh Viên');
        $sheet->setCellValue('C1', 'Giới Tính');
        $sheet->setCellValue('D1', 'Ngày Sinh');
        $sheet->setCellValue('E1', 'Địa Chỉ');
        $sheet->setCellValue('F1', 'Mã khóa học');
        $sheet->setCellValue('G1', 'Mã Lớp');
        $sheet->setCellValue('H1', 'Mã Khoa');
        $sheet->setCellValue('I1', 'MAPH');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MSSV']);
            $sheet->setCellValue('B' . $row, $row_data['TENSV']);
            $sheet->setCellValue('C' . $row, $row_data['GIOITINH']);
            $sheet->setCellValue('D' . $row, $row_data['NGAYSINH']);
            $sheet->setCellValue('E' . $row, $row_data['DIACHI']);
            $sheet->setCellValue('F' . $row, $row_data['IDKHOAS']);
            $sheet->setCellValue('G' . $row, $row_data['MALOP']);
            $sheet->setCellValue('H' . $row, $row_data['MAKH']);
            $sheet->setCellValue('I' . $row, $row_data['MAPH']);
    
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
?>