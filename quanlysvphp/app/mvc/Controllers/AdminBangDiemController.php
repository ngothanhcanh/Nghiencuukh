<?php 
class AdminBangDiemController extends Controller
{   private $SinhVienModel;
    private $HocPhanModel;
    private $BangDiemModel; 
    public function __construct()
    {
        $this->SinhVienModel=$this->model('SinhVienModel');
        $this->HocPhanModel=$this->model('HocPhanModel');
        $this->BangDiemModel=$this->model('BangDiemModel');

    }
    public function index()
    {  
        if(isset($_GET['delete']))
        {
            $MSSV=$_GET['delete'];
            if(isset($MSSV))
            {  
                $this->BangDiemModel->delete($MSSV);
                header('location:'.URL.'/AdminBangDiemController/index');
            }
        }
        $result=$this->BangDiemModel->show();
        $result_HocPhanModel=$this->HocPhanModel->show();
        $result_SinhVienModel=$this->SinhVienModel->showid();
        $this->view('admin/ketqua',
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
            $DIEMHE4=0;
            $DIEMQUYDOI="";
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
            $this->BangDiemModel->save($MSSV,$MAHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQUYDOI);
            $response = array(
                'MSSV'=>$MSSV,
                'MAHP'=>$MAHP,
                'CC'=>$CC,
                'GK'=>$GK,
                'CK'=>$CK,
                'DTB'=>$DTB,
                'DIEMHE4'=>$DIEMHE4,
                'DIEMQUYDOI'=>$DIEMQUYDOI
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
                $this->BangDiemModel->update($MSSV,$MAHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQUYDOI);
                $response = array(
                    'MSSV'=>$MSSV,
                    'MAHP'=>$MAHP,
                    'CC'=>$CC,
                    'GK'=>$GK,
                    'CK'=>$CK,
                    'DTB'=>$DTB,
                    'DIEMHE4'=>$DIEMHE4,
                    'DIEMQUYDOI'=>$DIEMQUYDOI
                );
                echo json_encode($response);
                }
        }
    }