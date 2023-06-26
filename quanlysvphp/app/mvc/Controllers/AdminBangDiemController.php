<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminBangDiemController extends Controller
{   private $SinhVienModel;
    private $HocPhanModel;
    private $BangDiemModel; 
    public function __construct()
    {
        $this->SinhVienModel=$this->model('SinhVienModel');
        $this->HocPhanModel=$this->model('HocPhanModel');
        $this->BangDiemModel=$this->model('BangDiemModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {  
        if(isset($_GET['deletesv']))
        {
            $MSSV=$_GET['deletesv'];
            $MAHP=$_GET['deletehp'];
            if(isset($MSSV))
            {  
                $this->BangDiemModel->delete($MSSV,$MAHP);
                header('location:'.URL.'/AdminBangDiemController/index');
            }
        }
        $result=$this->BangDiemModel->show();
        $result_HocPhanModel=$this->HocPhanModel->show();
        $result_SinhVienModel=$this->SinhVienModel->show();
        $this->view('admin/bangdiem',
        [
            'result'=>$result,
            'result_HocPhanModel'=>$result_HocPhanModel,
            'result_SinhVienModel'=>$result_SinhVienModel
        ]);
    }
    public function save()
    {
        if($_SERVER["REQUEST_METHOD"]==="POST")
        {
            $MSSV = $_POST['MSSV'];
            $MAHP = $_POST['MAHP'];
            $CC=$_POST['CC'];
            $GK=$_POST['GK'];
            $CK=$_POST['CK'];
            $DTB=$_POST['DTB'];
            $HK = $_POST['HocKy'];
            $NH = $_POST['NamHoc'];
            if($DTB>=8.5)
            {
            $DIEMHE4=4;
            }
            else if($DTB>=7)
            {
             $DIEMHE4=3;
            }
            else if($DTB>=5.5)
            {
             $DIEMHE4=2;
            }
            else if($DTB>=4)
            {
            $DIEMHE4=1;
            }
            else
            {
            $DIEMHE4=0;
            }

            if($DIEMHE4==4)
            {
            $DIEMQUYDOI= "A";
            }
            else if($DIEMHE4==3)
            {
                $DIEMQUYDOI= "B";
            }
            else if($DIEMHE4==2)
            {
                $DIEMQUYDOI= "C";
            }
            else if($DIEMHE4==1)
            {
                $DIEMQUYDOI= "D";
            }
            else
            {
            $DIEMQUYDOI= "F";
            }
            $this->BangDiemModel->save($MSSV,$MAHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQUYDOI,$HK,$NH);
            $response = array(
                'MSSV'=>$MSSV,
                'MAHP'=>$MAHP,
                'CC'=>$CC,
                'GK'=>$GK,
                'CK'=>$CK,
                'DTB'=>$DTB,
                'DIEMHE4'=>$DIEMHE4,
                'DIEMQUYDOI'=>$DIEMQUYDOI,
                'HocKy'=>$HK,
                'NamHoc'=>$NH
            );
            echo json_encode($response);
            }
        }
        public function update()
        {
            if($_SERVER["REQUEST_METHOD"]==="POST")
            {
                $MSSV = $_POST['MSSV'];
                $MAHP = $_POST['editedMAHP'];
                $CC=$_POST['editedCC'];
                $GK=$_POST['editedGK'];
                $CK=$_POST['editedCK'];
                $DTB=$_POST['editDTB'];
                $HK = $_POST['editedHK'];
                $NH = $_POST['editedNH'];
                if($DTB>=8.5)
                {
                $DIEMHE4=4;
                }
                else if($DTB>=7)
                {
                 $DIEMHE4=3;
                }
                else if($DTB>=5.5)
                {
                 $DIEMHE4=2;
                }
                else if($DTB>=4)
                {
                $DIEMHE4=1;
                }
                else
                {
                $DIEMHE4=0;
                }

                if($DIEMHE4==4)
                {
                $DIEMQUYDOI= "A";
                }
                else if($DIEMHE4==3)
                {
                    $DIEMQUYDOI= "B";
                }
                else if($DIEMHE4==2)
                {
                    $DIEMQUYDOI= "C";
                }
                else if($DIEMHE4==1)
                {
                    $DIEMQUYDOI= "D";
                }
                else
                {
                $DIEMQUYDOI= "F";
                }
                $this->BangDiemModel->update($MSSV,$MAHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQUYDOI,$HK,$NH);
                $response = array(
                    'MSSV'=>$MSSV,
                    'MAHP'=>$MAHP,
                    'CC'=>$CC,
                    'GK'=>$GK,
                    'CK'=>$CK,
                    'DTB'=>$DTB,
                    'DIEMHE4'=>$DIEMHE4,
                    'DIEMQUYDOI'=>$DIEMQUYDOI,
                    'HocKy'=>$HK,
                    'NamHoc'=>$NH
                );
                echo json_encode($response);
                }
        }
        public function export()
      { 
        if(isset($_POST['exportds']))
        {
        $data = $this->BangDiemModel->show();
    
        // Tạo một tệp Excel mới
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Danh sách Bảng Điểm');
    
        // Đặt tiêu đề các cột
        $sheet->setCellValue('A1', 'Mã sinh viên');
        $sheet->setCellValue('B1', 'Mã học phần');
        $sheet->setCellValue('C1', 'Chuyên cần');
        $sheet->setCellValue('D1', 'Giữa kỳ');
        $sheet->setCellValue('E1', 'Thi cuối kỳ');
        $sheet->setCellValue('F1', 'Điểm hệ 10');
        $sheet->setCellValue('G1', 'Điểm hệ 4');
        $sheet->setCellValue('H1', 'Điểm quy đổi');
        $sheet->setCellValue('I1', 'Học kỳ');
        $sheet->setCellValue('J1', 'Năm học');
    
        $row = 2;
        foreach ($data as $row_data) {
            // Xuất dữ liệu vào các ô tương ứng
            $sheet->setCellValue('A' . $row, $row_data['MSSV']);
            $sheet->setCellValue('B' . $row, $row_data['MAHP']);
            $sheet->setCellValue('C' . $row, $row_data['CC']);
            $sheet->setCellValue('D' . $row, $row_data['GK']);
            $sheet->setCellValue('E' . $row, $row_data['CK']);
            $sheet->setCellValue('F' . $row, $row_data['DIEMHE10']);
            $sheet->setCellValue('G' . $row, $row_data['DIEMHE4']);
            $sheet->setCellValue('H' . $row, $row_data['DIEMQUYDOI']);
            $sheet->setCellValue('I' . $row, $row_data['HOCKY']);
            $sheet->setCellValue('J' . $row, $row_data['NAMHOC']);
    
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
        if (isset($_POST['importbangdiem'])) {
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
                $cc = $sheet->getCell('C' . $row)->getValue();
                $gk = $sheet->getCell('D' . $row)->getValue();
                $ck = $sheet->getCell('E' . $row)->getValue();
                $h10 = $sheet->getCell('F' . $row)->getValue();
                $h4 = $sheet->getCell('G' . $row)->getValue();
                $qd = $sheet->getCell('H' . $row)->getValue();
                $hk = $sheet->getCell('I' . $row)->getValue();
                $nh = $sheet->getCell('J' . $row)->getValue();
                // Thêm dữ liệu sinh viên
                if ($this->BangDiemModel->save($mssv, $mahp, $cc, $gk,$ck,$h10,$h4,$qd,$hk,$nh) !== "Success") {
                    if($this->BangDiemModel->exists($mssv)===true){
                        $error[] = $mssv;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminBangDiemController/index');
            exit();
        }
    }
    }