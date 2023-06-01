<?php 
class DiemDanhModel 
{   private $db;
    public function __construct()
    {
     $this->db=new Database();
    }
    public function show()
    {
    $sql = "SELECT * FROM diemdanh";
    $resuil=$this->db->execute($sql);
    if(mysqli_num_rows($resuil))
    {
        $data=$resuil->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    }
    public function save($MSSV,$MH,$THU,$TIET,$PHONG,$TT)
    {
      $sql="INSERT INTO `diemdanh`(`MSSV`, `MONHOC`, `THU`, `TIET`, `PHONG`, `TRANGTHAI`) 
      VALUES ('$MSSV','$MH','$THU','$TIET','$PHONG','$TT')";
      $this->db->execute($sql);
    }
    public function update($MSSV,$MH,$THU,$TIET,$PHONG,$TT)
    {
      $sql="UPDATE `diemdanh` SET `MONHOC`='$MH',`THU`='$THU',`TIET`='$TIET',`PHONG`='$PHONG',`TRANGTHAI`='$TT' WHERE MSSV='$MSSV'";
      $this->db->execute($sql);
    }
    public function delete($MSSV)
    {
      $sql="DELETE FROM `diemdanh` WHERE MSSV='$MSSV'";
      $this->db->execute($sql);
    }
}