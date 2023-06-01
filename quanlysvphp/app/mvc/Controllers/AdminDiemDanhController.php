<?php 
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
    {  
        if(isset($_GET['delete']))
        {
            $MSSV=$_GET['delete'];
            if(isset($MSSV))
            {  
                $this->DiemDanhModel->delete($MSSV);
                header('location:'.URL.'/AdminDiemDanhController/index');
            }
        }
        $result=$this->DiemDanhModel->show();
        $result_HocPhanModel=$this->HocPhanModel->show();
        $result_SinhVienModel=$this->SinhVienModel->showid();
        $this->view('admin/diemdanh',
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
            $MH = $_POST['MH'];
            $THU=$_POST['THU'];
            $TIET=$_POST['TIET'];
            $PHONG=$_POST['PHONG'];
            $TT=$_POST['TRANGTHAI'];  
            $this->DiemDanhModel->save($MSSV,$MH,$THU,$TIET,$PHONG,$TT);
            $response = array(
                'MSSV'=>$MSSV,
                'MH'=>$MH,
                'THU'=>$THU,
                'TIET'=>$TIET,
                'PHONG'=>$PHONG,
                'TT'=>$TT
              
            );
            echo json_encode($response);
            }
        }
        public function update()
        {
            if($_SERVER["REQUEST_METHOD"]==="POST")
            {
                $MSSV = $_POST['MSSV'];
                $MH = $_POST['editedMONHOC'];
                $THU=$_POST['editedTHU'];
                $TIET=$_POST['editedTIET'];
                $PHONG=$_POST['editedPHONG'];
                $TT=$_POST['editTRANGTHAI'];
                $this->DiemDanhModel->update($MSSV,$MH,$THU,$TIET,$PHONG,$TT);
                $response = array(
                    'MSSV'=>$MSSV,
                    'MH'=>$MH,
                    'THU'=>$THU,
                    'TIET'=>$TIET,
                    'PHONG'=>$PHONG,
                    'TT'=>$TT
                );
                echo json_encode($response);
                }
        }
    }
