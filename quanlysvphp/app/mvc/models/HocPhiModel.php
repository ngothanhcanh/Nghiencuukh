<?php
class HocPhiModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($mssv)
    {
      $sql = "SELECT COUNT(*) FROM hocphi WHERE MSSV = '$mssv'";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
    }
    public function show()
    {
        try {
            $sql="SELECT * FROM `hocphi`";
            $result= $this->db->execute($sql);
            if(mysqli_num_rows($result)>0)
            { 
                $data= $result->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
        } catch (Exception $th) {
            echo $th;
        }
    }
    public function add($makh,$masv, $tt)
    {
      try {
        $sql="INSERT INTO `hocphi` (`MAKH`, `MSSV`, `TRANGTHAI`) VALUES ('$makh','$masv','$tt')";
        $this->db->execute($sql);
        return "Success";
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($makh,$masv, $tt)
    {
        try {
            $sql = "UPDATE `hocphi` SET `TRANGTHAI`='$tt'  WHERE `MAKH`='$makh' AND `MSSV`='$masv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($makh,$masv)
    {
        try {
            $sql= "DELETE FROM `hocphi` WHERE `MAKH`='$makh' AND `MSSV`='$masv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

}

?>