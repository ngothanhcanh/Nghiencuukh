<?php
class HocPhiModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($masv,$namhoc,$hocky)
    {
      $sql = "SELECT COUNT(*) FROM hocphi WHERE `MSSV`='$masv' and `NAMHOC`='$namhoc' and `HOCKY`= $hocky";
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
    public function add($masv,$namhoc,$hocky,$status,$ghichu)
    {
      try {
        $sql="INSERT INTO `hocphi`(`MSSV`, `NAMHOC`, `HOCKY`, `STATUS`, `GHICHU`) VALUES ('$masv','$namhoc',$hocky,$status,'$ghichu')";
        $this->db->execute($sql);
        return "Success";
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($masv,$namhoc,$hocky,$status,$ghichu)
    {
        try {
            $sql = "UPDATE `hocphi` SET `STATUS`=$status,`GHICHU`='$ghichu' WHERE  `MSSV`='$masv' and `NAMHOC`='$namhoc'and `HOCKY`= $hocky";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($masv,$namhoc,$hocky)
    {
        try {
            $sql= "DELETE FROM `hocphi` WHERE `MSSV`='$masv' and `NAMHOC`='$namhoc' and `HOCKY`= $hocky";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

}

?>