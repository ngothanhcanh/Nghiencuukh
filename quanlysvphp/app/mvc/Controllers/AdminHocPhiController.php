<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminHocPhiController extends Controller
{
    private $hocphiModel;
    private $sinhvienModel;
    public function __construct()
    {
        $this->hocphiModel=$this->model('HocPhiModel');
        $this->sinhvienModel=$this->model('SinhVienModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index() 
    {  
        if(isset($_GET['delete_SV']))
        {    
            $masv=$_GET['delete_SV'];
            $namhoc=$_GET['delete_NH'];
            $hocky=$_GET['delete_HK'];
            $this->hocphiModel->delete($masv,$namhoc,$hocky);
            header('location:'.URL.'/AdminHocPhiController/index');
        }
        $result=$this->hocphiModel->show();
        $result_sv=$this->sinhvienModel->show();
        $this->view('admin/hocphi',
    [
        'result'=>$result,
        'result_sv'=>$result_sv
    ]);
    }
    public function save()
    {    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Lấy dữ liệu từ yêu cầu AJAX
        $masv = $_POST["masv"];
        $namhoc=$_POST['namhoc'];
        $hocky=$_POST['hocky'];
        $status=$_POST['status'];
        $ghichu = $_POST["ghichu"];
        $this->hocphiModel->add($masv, $namhoc, $hocky, $status, $ghichu);
        $response = array(
            'MSSV'=>$masv,
            'NAMHOC'=>$namhoc,
            'HOCKY'=>$hocky,
            'STATUS'=>$status,
            'GHICHU'=>$ghichu
        );
        echo json_encode($response);
        }
    }
    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $masv = $_POST["masv"];
            $namhoc=$_POST['Namhoc'];
            $hocky=$_POST['Hocky'];
            $status=$_POST['Status'];
            $ghichu = $_POST["Ghichu"];
            $this->hocphiModel->update($masv, $namhoc, $hocky, $status, $ghichu);
            $response = array(
                'MSSV'=>$masv,
               'NAMHOC'=>$namhoc,
              'HOCKY'=>$hocky,
               'STATUS'=>$status,
               'GHICHU'=>$ghichu
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
        $sheet->setCellValue('A1', 'Mã sinh viên');
        $sheet->setCellValue('B1', 'Năm Học');
        $sheet->setCellValue('C1', 'Học kỳ');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Ghi chú');

        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MSSV']);
            $sheet->setCellValue('B' . $row, $row_data['NAMHOC']);
            $sheet->setCellValue('C' . $row, $row_data['HOCKY']);
            $sheet->setCellValue('D' . $row, $row_data['STATUS']);
            $sheet->setCellValue('E' . $row, $row_data['GHICHU']);
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
                $mssv = $sheet->getCell('A' . $row)->getValue();
                $namhoc = $sheet->getCell('B' . $row)->getValue();
                $hocky = $sheet->getCell('C' . $row)->getValue();
                $status = $sheet->getCell('D' . $row)->getValue();
                $ghichu = $sheet->getCell('E' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->hocphiModel->add($mssv, $namhoc, $hocky,$status,$ghichu) !== "Success") {
                    if($this->hocphiModel->exists($mssv,$namhoc,$hocky)===true){
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