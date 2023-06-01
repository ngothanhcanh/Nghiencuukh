<?php
class KetQuaModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        $sql = "SELECT * FROM ketqua";
       $resuil = $this->db->execute($sql);
       if(mysqli_num_rows($resuil)>0)
       {
        $data = $resuil->fetch_all(MYSQLI_ASSOC);
        return $data;
       }else{
        return null;
       }
    }
    public function save($MSSV,$MHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQD)
    {
      $sql="INSERT INTO `ketqua`( `MSSV`,`MAHP`, `CC`, `GK`, `CK`, `DTB`, `DIEMHE4`, `DIEMQUYDOI`)
       VALUES ('$MSSV','$MHP','$CC','$GK','$CK','$DTB','$DIEMHE4','$DIEMQD')";
       $this->db->execute($sql);
    }
    public function update($MSSV,$MHP,$CC,$GK,$CK,$DTB,$DIEMHE4,$DIEMQD)
    {
     $sql="UPDATE `ketqua` SET `MAHP`='$MHP',`CC`='$CC',`GK`='$GK',`CK`='$CK',`DTB`='$DTB',`DIEMHE4`='$DIEMHE4',`DIEMQUYDOI`='$DIEMQD' WHERE MSSV='$MSSV'";
     $this->db->execute($sql);
    }
    public function delete($MSSV)
    {
        $sql= "DELETE FROM `ketqua` WHERE MSSV = '$MSSV'";
        $this->db->execute($sql);
    }
}
?>