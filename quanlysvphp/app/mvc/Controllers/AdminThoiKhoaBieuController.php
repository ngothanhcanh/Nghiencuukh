<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminThoiKhoaBieuController extends Controller
{
    private $thoikhoabieuModel;
    private $lopModel;
    private $giangvienModel;
    private $hocphanModel;
    public function __construct()
    {
        $this->thoikhoabieuModel=$this->model('ThoiKhoaBieuModel');
        $this->lopModel=$this->model('LopModel');
        $this->hocphanModel=$this->model('HocPhanModel');
        $this->giangvienModel=$this->model('GiangVienModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            if($this->thoikhoabieuModel->delete($id))
            {
                header('location:'.URL.'/AdminThoiKhoaBieuController/index');
            }
        }
        $result=$this->thoikhoabieuModel->show();
        $result_gv=$this->giangvienModel->show();
        $result_lop=$this->lopModel->show();
        $result_hp=$this->hocphanModel->show();
        $this->view('admin/thoikhoabieu',
    [
        'result'=>$result,
        'result_lop'=>$result_lop,
        'result_gv'=>$result_gv,
        'result_hp'=>$result_hp
    ]);
    }
    public function save()
    {    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Lấy dữ liệu từ yêu cầu AJAX
        $id = $_POST["id"];
        $b1_tiet = $_POST["b1_tiet"];
        $b1_thu = $_POST["b1_thu"];
        $b1_phong = $_POST["b1_phong"];
        $b2_tiet = $_POST["b2_tiet"];
        $b2_thu = $_POST["b2_thu"];
        $b2_phong = $_POST["b2_phong"];
        $ngay_bd = $_POST["ngay_bd"];
        $ngay_kt = $_POST["ngay_kt"];
        $ghichu = $_POST["ghichu"];
        $lop = $_POST["lop"];
        $monhoc = $_POST["monhoc"];
        $giangvien = $_POST["giangvien"];

        $this->thoikhoabieuModel->add($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien);
        $response = array(
            'id'=>$id,
            'b1_tiet'=>$b1_tiet,
            'b1_thu'=>$b1_thu,
            'b1_phong'=>$b1_phong,
            'b2_tiet'=>$b2_tiet,
            'b2_thu'=>$b2_thu,
            'b2_phong'=>$b2_phong,
            'ngay_bd'=>$ngay_bd,
            'ngay_kt'=>$ngay_kt,
            'ghichu'=>isset($ghichu) ? $ghichu : "",
            'lop'=>$lop,
            'monhoc'=>$monhoc,
            'giangvien'=>$giangvien
        );
        echo json_encode($response);
        }
    }
    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            // Lấy dữ liệu từ yêu cầu AJAX
            $id = $_POST["id"];
            $b1_tiet = $_POST["b1_tiet"];
            $b1_thu = $_POST["b1_thu"];
            $b1_phong = $_POST["b1_phong"];
            $b2_tiet = $_POST["b2_tiet"];
            $b2_thu = $_POST["b2_thu"];
            $b2_phong = $_POST["b2_phong"];
            $ngay_bd = $_POST["ngay_bd"];
            $ngay_kt = $_POST["ngay_kt"];
            $ghichu = $_POST["ghichu"];
            $lop = $_POST["lop"];
            $monhoc = $_POST["monhoc"];
            $giangvien = $_POST["giangvien"];
            $this->thoikhoabieuModel->update($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien);
            $response = array(
                'id'=>$id,
                'b1_tiet'=>$b1_tiet,
                'b1_thu'=>$b1_thu,
                'b1_phong'=>$b1_phong,
                'b2_tiet'=>$b2_tiet,
                'b2_thu'=>$b2_thu,
                'b2_phong'=>$b2_phong,
                'ngay_bd'=>$ngay_bd,
                'ngay_kt'=>$ngay_kt,
                'ghichu'=>isset($ghichu) ? $ghichu : "",
                'lop'=>$lop,
                'monhoc'=>$monhoc,
                'giangvien'=>$giangvien
            );
            echo json_encode($response);
        }
    }
    public function export()
    { 
        if (isset($_POST['exportds'])) {
            $data = $this->thoikhoabieuModel->show();
        
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
    public function import()
    {
        if (isset($_POST['importthoikhoabieu'])) {
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
            for ($row = 3; $row <= $lastRow; $row++) {
                // Lấy dữ liệu từ từng cột
                $id = $sheet->getCell('A' . $row)->getValue();
                $thu1 = $sheet->getCell('B' . $row)->getValue();
                $tiet1 = $sheet->getCell('C' . $row)->getValue();
                $phong1 = $sheet->getCell('D' . $row)->getValue();
                $thu2 = $sheet->getCell('E' . $row)->getValue();
                $tiet2 = $sheet->getCell('F' . $row)->getValue();
                $phong2 = $sheet->getCell('G' . $row)->getValue();
                $nbd = $sheet->getCell('H' . $row)->getValue();
                $nkt = $sheet->getCell('I' . $row)->getValue();
                $ghichu = $sheet->getCell('J' . $row)->getValue();
                $lop = $sheet->getCell('K' . $row)->getValue();
                $monhoc = $sheet->getCell('M' . $row)->getValue();
                $giangvien = $sheet->getCell('L' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->thoikhoabieuModel->add($id, $thu1, $tiet1, $phong1, $thu2, $tiet2, $phong2,$nbd,$nkt,$ghichu,$lop,$monhoc,$giangvien) !== "Success") {
                    if($this->thoikhoabieuModel->exists($id)===true){
                        $error[] = $id;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminThoiKhoaBieuController/index');
            exit();
        }
    }
}