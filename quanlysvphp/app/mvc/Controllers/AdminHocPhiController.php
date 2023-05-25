<?php 
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
    }
    public function index() 
    {  
        if(isset($_GET['delete_kh']) && isset($_GET['delete_sv']))
        {    
            $makh=$_GET['delete_kh'];
            $masv=$_GET['delete_sv'];
            
            if($this->hocphiModel->delete($makh, $masv))
            {
                header('location:'.URL.'/AdminHocPhiController/index');
            }
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
}