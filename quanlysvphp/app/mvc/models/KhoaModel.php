<?php 
class KhoaModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        try {
            $sql="SELECT * FROM `khoa`";
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
    public function add($makh,$tenkh)
    {
      try {
        $sql="INSERT INTO `khoa`(`makh`, `tenkh`)
            VALUES ('$makh','$tenkh')";
        $this->db->execute($sql);
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($makh, $tenkh)
    {
        try {
            $sql = "UPDATE `khoa` SET `tenkh`='$tenkh' WHERE `makh`='$makh'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($makh)
    {
        try {
            $sql= "DELETE FROM `khoa` WHERE makh='$makh'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }
}