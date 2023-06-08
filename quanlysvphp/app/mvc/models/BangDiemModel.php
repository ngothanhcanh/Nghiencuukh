<?php
class BangDiemModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
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
        return null;
       }
    }
    public function save($MSSV,$MHP,$CC,$GK,$CK,$DIEMHE10,$DIEMHE4,$DIEMQD,$HOCKY,$NAMHOC)
    {
      $sql="INSERT INTO `bangdiem`(`MSSV`, `MAHP`, `CC`, `GK`, `CK`, `DIEMHE10`, `DIEMHE4`, `DIEMQUYDOI`, `HOCKY`, `NAMHOC`)
       VALUES ('$MSSV','$MHP','$CC','$GK','$CK','$DIEMHE10',',$DIEMHE4',',$DIEMQD','$HOCKY','$NAMHOC')";
       $this->db->execute($sql);
    }
    public function update($MSSV,$MHP,$CC,$GK,$CK,$DIEMHE10,$DIEMHE4,$DIEMQD,$HOCKY,$NAMHOC)
    {
     $sql="UPDATE `bangdiem` SET `MAHP`='$MHP',`CC`='$CC',`GK`='$GK',`CK`='$CK',`DIEMHE10`='$DIEMHE10',`DIEMHE4`='$DIEMHE4',`DIEMQUYDOI`='$DIEMQD',`HOCKY`='$HOCKY,',`NAMHOC`='$NAMHOCa' WHERE MSSV='$MSSV'";
     $this->db->execute($sql);
    }
    public function delete($MSSV)
    {
        $sql= "DELETE FROM `bangdiem` WHERE MSSV = '$MSSV'";
        $this->db->execute($sql);
    }
}
?>