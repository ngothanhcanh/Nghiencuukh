<?php
class BangDiemModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($mssv)
    {
      $sql = "SELECT COUNT(*) FROM bangdiem WHERE MSSV = '$mssv'";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
    }
    function showwheremahp($mahp)
    {
        $sql="SELECT * FROM bangdiem where MAHP='$mahp' ORDER BY MAHP ASC";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }else{
          return [];
        }
    }
    public function show()
    {
        $sql = "SELECT * FROM bangdiem";
       $resuil = $this->db->execute($sql);
       if(mysqli_num_rows($resuil)>0)
       {
        $data = $resuil->fetch_all(MYSQLI_ASSOC);
        return $data;
       }else{
        return [];
       }
    }
    public function save($MSSV,$MHP,$CC,$GK,$CK,$DIEMHE10,$DIEMHE4,$DIEMQD,$HOCKY,$NAMHOC)
    {
        try{
      $sql="INSERT INTO `bangdiem`(`MSSV`, `MAHP`, `CC`, `GK`, `CK`, `DIEMHE10`, `DIEMHE4`, `DIEMQUYDOI`, `HOCKY`, `NAMHOC`)
       VALUES ('$MSSV','$MHP','$CC','$GK','$CK','$DIEMHE10','$DIEMHE4','$DIEMQD','$HOCKY','$NAMHOC')";
       $this->db->execute($sql);
       return "Success";
        }catch(Exception $error)
        {
            echo $error;
        }
    }
    public function update($MSSV,$MHP,$CC,$GK,$CK,$DIEMHE10,$DIEMHE4,$DIEMQD,$HOCKY,$NAMHOC)
    {
     try{
        $sql="UPDATE `bangdiem` SET `CC`='$CC',`GK`='$GK',`CK`='$CK',`DIEMHE10`='$DIEMHE10',`DIEMHE4`='$DIEMHE4',`DIEMQUYDOI`='$DIEMQD',`HOCKY`='$HOCKY,',`NAMHOC`='$NAMHOC' WHERE MSSV='$MSSV' and MAHP='$MHP'";
     $this->db->execute($sql);
       }catch(Exception $error)
       {
        echo $error;
       }
    }
    public function delete($MSSV,$MHP)
    {
        $sql= "DELETE FROM `bangdiem` WHERE MSSV = '$MSSV' and `MAHP`='$MHP' ";
        $this->db->execute($sql);
    }
}
?>