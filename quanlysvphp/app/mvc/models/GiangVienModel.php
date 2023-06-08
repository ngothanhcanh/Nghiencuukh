<?php
class GiangVienModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function showid()
    {
        $sql = "SELECT * FROM giangvien";
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
            $sql="SELECT * FROM `giangvien`";
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
    public function add($magv,$tengv,$makh)
    {
      try {
        $sql="INSERT INTO `giangvien`(`MAGV`, `TENGV`, `MAKH`) VALUES ('$magv','$tengv', '$makh')";
        $this->db->execute($sql);
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($magv, $tengv, $makh)
    {
        try {
            $sql = "UPDATE `giangvien` SET `TENGV`='$tengv',`MAKH`='$makh' WHERE `MAGV`='$magv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($magv)
    {
        try {
            $sql= "DELETE FROM `giangvien` WHERE MAGV='$magv'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

}

?>