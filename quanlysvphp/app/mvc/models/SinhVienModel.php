<?php 
class SinhVienModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($mssv)
    {
      $sql = "SELECT COUNT(*) FROM sinhvien WHERE mssv = '$mssv'";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
    }
    public function showwheremalop($MALOP) //banggiangvienlop
    {
      $sql= "SELECT * FROM `sinhvien` WHERE MALOP ='$MALOP'" ;
      $resuil = $this->db->execute($sql);
      if(mysqli_num_rows($resuil)>0)
      { 
        $data= $resuil->fetch_all(MYSQLI_ASSOC);    
        return $data;
      }
    }
    public function show()
    { 
        $sql="SELECT * FROM sinhvien";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
          { 
            $data= $resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
          }else{
            return [];
          }

    }
  
    public function add($mssv,$tensv,$gioitinh,$ngaysinh,$diachi,$khoas,$malop,$makh,$gvcn)
    {
      try {
        $sql="INSERT INTO `sinhvien`(`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `IDKHOAS`, `MALOP`, `MAKH`, `MAPH`) 
        VALUES ('$mssv','$tensv','$gioitinh','$ngaysinh','$diachi','$khoas','$malop','$makh','$gvcn')";
         $this->db->execute($sql);
         return "Success"; 
    } catch (Exception $th) {
      echo $th;
    }
    }
    public function update($mssv, $tensv, $gioitinh, $ngaysinh, $diachi, $khoas, $malop, $makh, $gvcn)
    {  
        try{
        $sql = "UPDATE `sinhvien` SET `TENSV`='$tensv', `GIOITINH`='$gioitinh', `NGAYSINH`='$ngaysinh', `DIACHI`='$diachi', `IDKHOAS`='$khoas', `MALOP`='$malop', `MAKH`='$makh', `MAPH`='$gvcn' WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
        return "Success"; 
        }catch(Exception $erro){
            echo $erro;
        }
    }
    
    public function delete($mssv)
    {
        $sql = "DELETE FROM `sinhvien` WHERE `MSSV`='$mssv'";
        $this->db->execute($sql);
    }
  }