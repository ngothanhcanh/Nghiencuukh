<?php 
class PhuHuynhModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }

    public function show()
    {
        try {
            $sql="SELECT * FROM `phuhuynh`";
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
    public function add($cccd,$mk)
    {
      try {
        $sql="INSERT INTO `phuhuynh`(`CCCD`, `MK`)
            VALUES ('$cccd','$mk')";
        $this->db->execute($sql);
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($cccd, $mk)
    {
        try {
            $sql = "UPDATE `phuhuynh` SET `MK`='$mk' WHERE `CCCD`='$cccd'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($cccd)
    {
        try {
            $sql= "DELETE FROM `phuhuynh` WHERE CCCD='$cccd'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }
}