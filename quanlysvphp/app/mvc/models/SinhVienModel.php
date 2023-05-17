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
    public function add($mssv,$tensv,$gioitinh,$ngaysinh,$diachi,$khoas,$malop,$makh,$gvcn)
    {
      $sql="INSERT INTO `sinhvien`(`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `KHOAS`, `MALOP`, `MAKH`, `GVCN`) 
      VALUES ('$mssv','$tensv','$gioitinh','$ngaysinh','$diachi','$khoas','$malop','$makh','$gvcn')";
    }
    public function update()
    {

    }
    public function delete($mssv)
    {

    }
}