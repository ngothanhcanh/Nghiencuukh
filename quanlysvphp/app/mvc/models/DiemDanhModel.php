<?php
class DiemDanhModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($mssv,$mahp,$buoi)
    {
      $sql = "SELECT COUNT(*) FROM diemdanh WHERE MSSV = '$mssv' and MAHP='$mahp' and BUOIHOC= '$buoi' ";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
    }
    function countDate($mssv,$mahp)
    {
      $sql = "SELECT COUNT(*) AS count FROM diemdanh WHERE MSSV = '$mssv' AND MAHP = '$mahp'";
      $result = $this->db->execute($sql);
      $row = mysqli_fetch_assoc($result);
      $count = $row['count'];
      return $count;
    }
    function showwheremahp($mahp)
    {
        $sql="SELECT * FROM diemdanh where MAHP='$mahp' ORDER BY MAHP ASC";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }else{
          return [];
        }
    }
    function show_buoi_mahp($mahp,$buoi)
    {
        $sql="SELECT * FROM diemdanh where MAHP='$mahp' and BUOIHOC='$buoi' ORDER BY MAHP ASC";
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
        $sql = "SELECT * FROM diemdanh";
       $resuil = $this->db->execute($sql);
       if(mysqli_num_rows($resuil)>0)
       {
        $data = $resuil->fetch_all(MYSQLI_ASSOC);
        return $data;
       }else{
        return [];
       }
    }
    public function save($MSSV,$MHP,$buoi,$ngayhoc,$status,$ghichu)
    {
        try{
      $sql="INSERT INTO `diemdanh`(`MSSV`, `MAHP`, `BUOIHOC`, `NGAYHOC`, `STATUS`, `GHICHU`)
       VALUES ('$MSSV','$MHP',$buoi,'$ngayhoc',$status,'$ghichu')";
       $this->db->execute($sql);
       return "Success";
        }catch(Exception $error)
        {
            echo $error;
        }
    }
    public function update($MSSV, $MAHP, $buoi, $ngayhoc, $status, $ghichu)
     {
        $sql = "UPDATE `diemdanh` SET `NGAYHOC`='$ngayhoc',`STATUS`=$status,`GHICHU`='$ghichu' WHERE MSSV='$MSSV' AND MAHP = '$MAHP' AND BUOIHOC = $buoi";
        $this->db->execute($sql);
   
      }

    public function delete($MSSV,$MHP,$Buoi)
    {
        $sql= "DELETE FROM `diemdanh` WHERE MSSV = '$MSSV' and MAHP='$MHP' and BUOIHOC='$Buoi'";
        $this->db->execute($sql);
    }
}
?>