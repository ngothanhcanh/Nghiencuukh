<?php 
class KhoaModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($id)
    {
      $sql = "SELECT COUNT(*) FROM khoa WHERE MAKH = '$id'";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
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
            return 'error';
        }
    }
    public function add($makh,$tenkh)
    {
      try {
        $sql="INSERT INTO `khoa`(`MAKH`, `TENKH`)
            VALUES ('$makh','$tenkh')";
        $this->db->execute($sql);
        return "Success";
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($makh, $tenkh)
    {
        try {
            $sql = "UPDATE `khoa` SET `TENKH`='$tenkh' WHERE `MAKH`='$makh'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($makh)
    {
    $sql= "DELETE FROM `khoa` WHERE MAKH='$makh'";
    $this->db->execute($sql);
       
    }
    //show name khoa to MAKH
    public function shownamekhoa($makh)
    {
      $sql="SELECT `TENKH` FROM `khoa` WHERE MAKH='$makh'";
      $data=$this->db->execute($sql);
      return mysqli_fetch_assoc($data);
    }
}