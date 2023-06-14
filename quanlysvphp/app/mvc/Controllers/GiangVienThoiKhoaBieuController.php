<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class GiangVienThoiKhoaBieuController extends Controller
{  
    private $thoikhoabieuModel;
    public function __construct()
    {
        $this->thoikhoabieuModel=$this->model('ThoiKhoaBieuModel');
        if( $_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        $magv=$_SESSION['MAGV'];
        $result=$this->thoikhoabieuModel->showwheremagv($magv);
        $this->view('giangvien/thoikhoabieu',
    [
        'result'=>$result
    ]);
    }
    public function export()
    { 
        $magv=$_SESSION['MAGV'];
        if (isset($_POST['exportds'])) {
            $data = $this->thoikhoabieuModel->showwheremagv($magv);
        
            // Tạo một tệp Excel mới
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Danh sách thoi khoa bieu');
        
            // Đặt tiêu đề các cột
            $sheet->mergeCells('B1:D1');
            $sheet->setCellValue('B1', 'Buổi sáng');
            $sheet->mergeCells('E1:G1');
            $sheet->setCellValue('E1', 'Buổi chiều');
        
            $sheet->setCellValue('A2', 'ID');
            $sheet->setCellValue('B2', 'Thứ');
            $sheet->setCellValue('C2', 'Tiết');
            $sheet->setCellValue('D2', 'Phòng');
            $sheet->setCellValue('E2', 'Thứ');
            $sheet->setCellValue('F2', 'Tiết');
            $sheet->setCellValue('G2', 'Phòng');
            $sheet->setCellValue('H2', 'Ngày bắt đầu');
            $sheet->setCellValue('I2', 'Ngày kết thúc');
            $sheet->setCellValue('J2', 'Ghi chú');
            $sheet->setCellValue('K2', 'Lớp');
            $sheet->setCellValue('L2', 'Môn học');
            $sheet->setCellValue('M2', 'Giang viên');
        
            $row = 3;
            foreach ($data as $row_data) {
                // Xuất dữ liệu vào các ô tương ứng
                $sheet->setCellValue('A' . $row, $row_data['ID']);
                $sheet->setCellValue('B' . $row, $row_data['BUOI1_THU']);
                $sheet->setCellValue('C' . $row, $row_data['BUOI1_TIET']);
                $sheet->setCellValue('D' . $row, $row_data['BUOI1_PHONG']);
                $sheet->setCellValue('E' . $row, $row_data['BUOI2_THU']);
                $sheet->setCellValue('F' . $row, $row_data['BUOI2_TIET']);
                $sheet->setCellValue('G' . $row, $row_data['BUOI2_PHONG']);
                $sheet->setCellValue('H' . $row, $row_data['NGAYBATDAU']);
                $sheet->setCellValue('I' . $row, $row_data['NGAYKETTHUC']);
                $sheet->setCellValue('J' . $row, $row_data['GHICHU']);
                $sheet->setCellValue('K' . $row, $row_data['LOP']);
                $sheet->setCellValue('L' . $row, $row_data['MONHOC']);
                $sheet->setCellValue('M' . $row, $row_data['GIANGVIEN']);
        
                $row++;
            }
        
            // Xuất file Excel
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $filename = 'danh_sach' . time() . '.xlsx';
            $writer->save($filename);
        
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            readfile($filename);
            unlink($filename); // Xóa file tạm sau khi đã xuất
        }
        
    
    }
   
}