<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminHocPhiController extends Controller
{
    private $hocphiModel;
    private $khoaModel;
    private $sinhvienModel;
    public function __construct()
    {
        $this->hocphiModel=$this->model('HocPhiModel');
        $this->khoaModel=$this->model('KhoaModel');
        $this->sinhvienModel=$this->model('SinhVienModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete_kh']) && isset($_GET['delete_sv']))
        {    
            $makh=$_GET['delete_kh'];
            $masv=$_GET['delete_sv'];
            $this->hocphiModel->delete($makh, $masv);
            header('location:'.URL.'/AdminHocPhiController/index');
        }
        $result=$this->hocphiModel->show();
        $result_kh=$this->khoaModel->show();
        $result_sv=$this->sinhvienModel->show();
        $this->view('admin/hocphi',
    [
        'result'=>$result,
        'result_kh'=>$result_kh,
        'result_sv'=>$result_sv,
    ]);
    }
    public function save()
    {    
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Lấy dữ liệu từ yêu cầu AJAX
        $makh = $_POST["makh"];
        $masv = $_POST["masv"];
        $tt = $_POST["tt"];
        $this->hocphiModel->add($makh, $masv, $tt);
        $response = array(
            'makh'=>$makh,
            'masv'=>$masv,
            'tt'=>$tt,
        );
        echo json_encode($response);
        }
    }
    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $makh = $_POST["makh"];
            $masv = $_POST["masv"];
            $tt = $_POST["tt"];
            $this->hocphiModel->update($makh, $masv, $tt);
            $response = array(
                'makh'=>$makh,
                'masv'=>$masv,
                'tt'=>$tt,
            );
            echo json_encode($response);
        }
    }
    public function export()
    { 
        if(isset($_POST['exportds']))
        {
        $data = $this->hocphiModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách học phí');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'Mã khoa');
        $sheet->setCellValue('B1', 'Mã sinh vien');
        $sheet->setCellValue('C1', 'Trang thái');

        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MAKH']);
            $sheet->setCellValue('B' . $row, $row_data['MSSV']);
            $sheet->setCellValue('C' . $row, $row_data['TRANGTHAI']);
    
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
        if (isset($_POST['importhocphi'])) {
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
                $mssv = $sheet->getCell('B' . $row)->getValue();
                $trangthai = $sheet->getCell('C' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->hocphiModel->add($mahp, $mssv, $trangthai) !== "Success") {
                    if($this->hocphiModel->exists($mssv)===true){
                        $error[] = $mssv;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminHocPhiController/index');
            exit();
        }
    }
}