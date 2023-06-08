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
        $sql="SELECT * FROM sinhvien";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
          { 
            $data= $resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
          }
    }
    public function add($mssv,$tensv,$gioitinh,$ngaysinh,$diachi,$khoas,$malop,$makh,$gvcn)
    {
      $sql="INSERT INTO `sinhvien`(`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `IDKHOAS`, `MALOP`, `MAKH`, `MAPH`) 
      VALUES ('$mssv','$tensv','$gioitinh','$ngaysinh','$diachi','$khoas','$malop','$makh','$gvcn')";
       return $this->db->execute($sql); 
    }
    public function update($mssv, $tensv, $gioitinh, $ngaysinh, $diachi, $khoas, $malop, $makh, $gvcn)
    {
        $sql = "UPDATE `sinhvien` SET `TENSV`='$tensv', `GIOITINH`='$gioitinh', `NGAYSINH`='$ngaysinh', `DIACHI`='$diachi', `IDKHOAS`='$khoas', `MALOP`='$malop', `MAKH`='$makh', `MAPH`='$gvcn' WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
    }
    
    public function delete($mssv)
    {
        $sql = "DELETE FROM `sinhvien` WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
    }
    
}