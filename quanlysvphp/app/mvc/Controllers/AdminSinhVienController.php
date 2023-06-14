<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class AdminSinhVienController extends Controller
{  
    private $sinhvien;
    private $KhoasModel;
    private $LopModel;
    private $KhoaModel;
    private $PhuHuynhModel;
    public function __construct()
    {
        $this->sinhvien=$this->model('SinhVienModel');
        $this->KhoasModel=$this->model('KhoasModel');
        $this->LopModel=$this->model('LopModel');
        $this->KhoaModel=$this->model('KhoaModel');
        $this->PhuHuynhModel=$this->model('PhuHuynhModel');
        if( $_SESSION['user_type'] !== 'admin' )
        {
            header('location:'.URL.'/LoginController/index');
        }

    }
    public function index() 
    {  
        if(isset($_GET['delete']))
        {    $id=$_GET['delete'];
            
            $this->sinhvien->delete($id);
            
            header('Location:'.URL.'/AdminSinhVienController/index');
            
        }
        $result=$this->sinhvien->show();
        $result_KhoaModel=$this->KhoaModel->show();
        $result_KhoasModel=$this->KhoasModel->show();
        $result_LopModel=$this->LopModel->show();
        $result_PhuHuynhModel=$this->PhuHuynhModel->show();
        $this->view('admin/sinhvien',
    [
        'result'=>$result,
        'result_KhoaModel'=>$result_KhoaModel,
        'result_KhoasModel'=>$result_KhoasModel,
        'result_LopModel'=>$result_LopModel,
        'result_PhuHuynhModel'=>$result_PhuHuynhModel
    ]);
    }
    public function save()
    {    
       
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
    // Lấy dữ liệu từ yêu cầu AJAX
    $id = $_POST["id"];
    $name = $_POST["name"];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $khoas = $_POST['khoas'];
    $malop = $_POST['malop'];
    $makh = $_POST['makh'];
    $maph = $_POST['maph'];
    $this->sinhvien->add($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$maph);
    // TODO: Thực hiện lưu dữ liệu vào cơ sở dữ liệu
    // Gọi phương thức lưu dữ liệu trong sinhvien
    // Trả về kết quả (ví dụ: thành công hoặc thất bại)
    $response = array(
        'id'=>$id,
        'name'=>$name,
        'gioitinh'=>$gioitinh ,
        'ngaysinh'=>$ngaysinh ,
        'diachi'=>$diachi ,
       'khoas'=>$khoas ,
        'malop'=>$malop,
        'makh'=>$makh,
        'maph'=>$maph
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
            $gioitinh = $_POST['editedGioitinh'];
            $ngaysinh = $_POST['editedNgaysinh'];
            $diachi = $_POST['editedDiachi'];
            $khoas = $_POST['editedKhoas'];
            $malop = $_POST['editedMalop'];
            $makh = $_POST['editedMakh'];
             $maph = $_POST['editedMaph'];
            $this->sinhvien->update($id, $name, $gioitinh, $ngaysinh, $diachi,$khoas, $malop, $makh,$maph);
            $response = array(
                'id' => $id,
                'name' => $name
            );
            echo json_encode($response);
        }
    }
    public function export()
    { 
        if(isset($_POST['exportdssv']))
        {
        $data = $this->sinhvien->show();
    
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
    public function import()
    {
        if (isset($_POST['importSinhVien'])) {
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
                $tensv = $sheet->getCell('B' . $row)->getValue();
                $gioitinh = $sheet->getCell('C' . $row)->getValue();
                $ngaysinh = $sheet->getCell('D' . $row)->getValue();
                $diachi = $sheet->getCell('E' . $row)->getValue();
                $khoas = $sheet->getCell('F' . $row)->getValue();
                $malop = $sheet->getCell('G' . $row)->getValue();
                $makh = $sheet->getCell('H' . $row)->getValue();
                $maph = $sheet->getCell('I' . $row)->getValue();
    
                // Thêm dữ liệu sinh viên
                if ($this->sinhvien->add($mssv, $tensv, $gioitinh, $ngaysinh, $diachi, $khoas, $malop, $makh, $maph) !== "Success") {
                    if($this->sinhvien->exists($mssv)===true){
                        $error[] = $mssv;
                    }
                }               
            }
    
            if (!empty($error)) {
                $_SESSION['import_error'] = $error;
            }
    
            header('Location: ' . URL . '/AdminSinhVienController/index');
            exit();
        }
    }
    
    }
    


    

