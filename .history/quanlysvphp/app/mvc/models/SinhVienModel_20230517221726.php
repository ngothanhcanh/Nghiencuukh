<?php 
class SinhVienModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        $sql="SELECT * FROM sinhvien";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
          { 
            $data= $resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
          }
    }
    public function showid()
    {
        $sql="SELECT * FROM sinhvien WHERE MSSV";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
          { 
            $data= $resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
          }
    }
    public function add($mssv,$tensv,$gioitinh,$ngaysinh,$diachi,$khoas,$malop,$makh,$gvcn)
    {
      $sql="INSERT INTO `sinhvien`(`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `KHOAS`, `MALOP`, `MAKH`, `GVCN`) 
      VALUES ('$mssv','$tensv','$gioitinh','$ngaysinh','$diachi','$khoas','$malop','$makh','$gvcn')";
    }
    public function update($mssv, $tensv, $gioitinh, $ngaysinh, $diachi, $khoas, $malop, $makh, $gvcn)
    {
        $sql = "UPDATE `sinhvien` SET `TENSV`='$tensv', `GIOITINH`='$gioitinh', `NGAYSINH`='$ngaysinh', `DIACHI`='$diachi', `KHOAS`='$khoas', `MALOP`='$malop', `MAKH`='$makh', `GVCN`='$gvcn' WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
    }
    
    public function delete($mssv)
    {
        $sql = "DELETE FROM `sinhvien` WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
    }
    
}