<?php
class GiangVienDiemDanhController extends Controller
{
  private $DiemDanhModel;
  public function __construct()
  {
    $this->DiemDanhModel=$this->model('DiemDanhModel');
  }
  public function index()
  {
    if(isset($_POST['mahp-dsdd']))
    {
        $mahp=$_POST['mahp-dsdd'];
        $_SESSION['maHP']=$mahp;
    }else if(isset($_SESSION['maHP']))
    {
        $mahp = $_SESSION['maHP'];
        $result_sv=$this->DiemDanhModel->showwheremahp($mahp);
        $sinhvien1=$result_sv[0]['MSSV'];
        $_SESSION['sinhvien1']=$sinhvien1;
    }
    $result=$this->DiemDanhModel->showwheremahp($mahp);
    $this->view('giangvien/diemdanh',[
        'result'=> $result,
    ]);
  }
  public function update()
  { 
      if($_SERVER['REQUEST_METHOD']==='POST')
      {
          $MSSV=$_POST['MSSV'];
          $MAHP=$_POST['MAHP'];
          $BUOI=$_POST['BUOIHOC'];
          $NGAY=$_POST['NGAY'];
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
  public function diemdanh()
  { 
    if(isset($_POST['diemdanhnagy']))
    {
    $ghichu='';
    $status=0;
    $ngay=$_POST['diemdanhnagy'];
    $mahp = $_SESSION['maHP'];
    $sinhvien1=$_SESSION['sinhvien1'];
    $result_dem=$this->DiemDanhModel->countDate($sinhvien1, $mahp);
    $result_sv=$this->DiemDanhModel->show_buoi_mahp($mahp,$result_dem);
    $result_dem = $result_dem + 1; 
    foreach($result_sv as $row)
    {   
        $this->DiemDanhModel->save($row['MSSV'],$mahp,$result_dem,$ngay,$status,$ghichu);
    }
    }
    $result_diemdanhngay=$this->DiemDanhModel->show_buoi_mahp($mahp,$result_dem);
    $this->view('giangvien/diemdanhngay',[
        'result_diemdanhngay'=> $result_diemdanhngay,
    ]);
  }
  public function saveData()
  {
    $data = json_decode($_POST['data'], true);
    $response = array();
      foreach ($data as $row) {
          $mssv = $row['mssv'];
          $mahp = $row['mahp'];
          $buoi = $row['buoi'];
          $ngay =$row['ngay'];
          $status = $row['status'];
          $ghichu = $row['ghichu'];
        $this->DiemDanhModel->update($mssv,$mahp,$buoi,$ngay,$status,$ghichu);
        $response[] = array(
            'mssv' => $mssv,
            'mahp' => $mahp,
            'buoi' => $buoi,
            'ngay' => $ngay,
            'status' => $status,
            'ghichu' => $ghichu
        );
      }
      echo json_encode($response);
      // Trả về kết quả (nếu cần)
      // Ví dụ: trả về JSON cho phản hồi AJAX
      
  }
}
?>