<?php
class GiangVienLopModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function showid()
    {
        $sql = "SELECT * FROM giangvien_lop WHERE MAGV";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data= $resuil->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        else
        {
            return null;
        }
    }
    public function show()
    {
        try {
            $sql="SELECT * FROM `giangvien_lop`";
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
    public function add($magv,$malop)
    {
      try {
        $sql="INSERT INTO `giangvien_lop` (`MAGV`, `MALOP`) VALUES ('$magv','$malop')";
        $this->db->execute($sql);
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($magv,$malop)
    {
        try {
            $sql = "UPDATE `giangvien_lop` SET `MALOP`='$malop' WHERE `MAGV`='$magv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($magv)
    {
        try {
            $sql= "DELETE FROM `giangvien_lop` WHERE MAGV='$magv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

}

?>