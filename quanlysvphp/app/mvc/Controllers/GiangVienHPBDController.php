<?php
class GiangVienHPBDController extends Controller
{   
    private $BangDiemModel; 
    public function __construct()
    {
        $this->BangDiemModel=$this->model('BangDiemModel');
        if($_SESSION['user_type'] !== 'giangvien' )
        {
            header('location:'.URL.'/LoginController/index');
        }
    }
    public function index()
    {  
        if (isset($_POST['mahp-dssv'])) {
            $mahp = $_POST['mahp-dssv'];
        
            // Lưu giá trị MAHP vào phiên làm việc
            $_SESSION['mahp'] = $mahp;
        } elseif (isset($_SESSION['mahp'])) {
            // Lấy giá trị MAHP từ phiên làm việc (nếu có)
            $mahp = $_SESSION['mahp'];
        }
        if(isset($_GET['deletesv']))
        {
            $MSSV=$_GET['deletesv'];
            $MAHP=$_GET['deletehp'];
            if(isset($MSSV))
            {  
                $this->BangDiemModel->delete($MSSV,$MAHP);
                header('location:'.URL.'/GiangVienHPBDController/index');
            }
        }
        $result=$this->BangDiemModel->showwheremahp($mahp);
        $this->view('giangvien/hocphanbangdiem',[
            'result'=>$result,
        ]);
    }  public function save()
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
}
?>