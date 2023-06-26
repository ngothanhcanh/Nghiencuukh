<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminDiemDanhController extends Controller
{   private $SinhVienModel;
    private $HocPhanModel;
    private $DiemDanhModel;
    public function __construct()
    {
        $this->SinhVienModel=$this->model('SinhVienModel');
        $this->HocPhanModel=$this->model('HocPhanModel');
        $this->DiemDanhModel=$this->model('DiemDanhModel');

    }
    public function index()
    {   if(isset($_GET['deletesv']))
        {
            $MSSV=$_GET['deletesv'];
            $MAHP=$_GET['deletehp'];
            $BUOI=$_GET['deletebuoi'];
            $this->DiemDanhModel->delete($MSSV,$MAHP,$BUOI);
            header('location:'.URL.'/AdminDiemDanhController/index');
        }
        $result=$this->DiemDanhModel->show();
        $result_SinhVienModel=$this->SinhVienModel->show();
        $result_HocPhanModel=$this->HocPhanModel->show();
        $this->view('Admin/diemdanh',[
           'result'=>$result,
           'result_SinhVienModel'=>$result_SinhVienModel,
           'result_HocPhanModel'=>$result_HocPhanModel
        ]);
    }
    public function save()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $MSSV=$_POST['MSSV'];
            $MAHP=$_POST['MAHP'];
            $BUOI=$_POST['BUOIHOC'];
            $NGAY=$_POST['NGAYHOC'];
            $STATUS=$_POST['STATUS'];
            $GHICHU=$_POST['GHICHU'];
            $this->DiemDanhModel->save($MSSV,$MAHP,$BUOI,$NGAY,$STATUS,$GHICHU);
            $response = array(
                'MSSV'=>$MSSV,
                'MAHP'=>$MAHP,
                'BUOI'=>$BUOI,
                'NGAY'=>$NGAY,
                'STATUS'=>$STATUS,
                'GHICHU'=>$GHICHU
            );
            echo json_encode($response);
        }
    }
    public function update()
    { 
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            $MSSV=$_POST['MSSV'];
            $MAHP=$_POST['MAHP'];
            $BUOI=$_POST['BUOIHOC'];
            $NGAY=$_POST['editedNgayhoc'];
            $STATUS=$_POST['editedStatus'];
            $GHICHU=$_POST['editedGhiChu'];
            $this->DiemDanhModel->update($MSSV,$MAHP,$BUOI,$NGAY,$STATUS,$GHICHU);
            $response =array(
                'MSSV'=>$MSSV,
                'MAHP'=>$MAHP,
                'BUOI'=>$BUOI,
                'NGAY'=>$NGAY,
                'STATUS'=>$STATUS,
                'GHICHU'=>$GHICHU
            );
            echo json_encode($response);
        }
       
    }
    public function export()
    { 
      if(isset($_POST['exportds']))
      {
      $data = $this->DiemDanhModel->show();
  
      // Tạo một tệp Excel mới
      $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setTitle('Danh sách điểm danh');
  
      // Đặt tiêu đề các cột
      $sheet->setCellValue('A1', 'Mã sinh viên');
      $sheet->setCellValue('B1', 'Mã học phần');
      $sheet->setCellValue('C1', 'Buổi học');
      $sheet->setCellValue('D1', 'Ngày học');
      $sheet->setCellValue('E1', 'Status');
      $sheet->setCellValue('F1', 'Ghi chú');
  
      $row = 2;
      foreach ($data as $row_data) {
          // Xuất dữ liệu vào các ô tương ứng
          $sheet->setCellValue('A' . $row, $row_data['MSSV']);
          $sheet->setCellValue('B' . $row, $row_data['MAHP']);
          $sheet->setCellValue('C' . $row, $row_data['BUOIHOC']);
          $sheet->setCellValue('D' . $row, $row_data['NGAYHOC']);
          $sheet->setCellValue('E' . $row, $row_data['STATUS']);
          $sheet->setCellValue('F' . $row, $row_data['GHICHU']);

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
      if (isset($_POST['importdiemdanh'])) {
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
              $mahp = $sheet->getCell('B' . $row)->getValue();
              $buoi = $sheet->getCell('C' . $row)->getValue();
              $ngay = $sheet->getCell('D' . $row)->getValue();
              $status = $sheet->getCell('E' . $row)->getValue();
              $ghichu = $sheet->getCell('F' . $row)->getValue();
              // Thêm dữ liệu sinh viên
              if ($this->DiemDanhModel->save($mssv, $mahp, $buoi, $ngay,$status,$ghichu) !== "Success") {
                  if($this->DiemDanhModel->exists($mssv,$mahp,$buoi)===true){
                      $error[] = $mssv;
                  }
              }               
          }
  
          if (!empty($error)) {
              $_SESSION['import_error'] = $error;
          }
  
          header('Location: ' . URL . '/AdminDiemDanhController/index');
          exit();
      }
  }
}
?>