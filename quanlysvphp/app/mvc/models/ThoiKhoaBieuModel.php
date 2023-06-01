<?php
class ThoiKhoaBieuModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function showid()
    {
        $sql = "SELECT * FROM thoikhoabieu WHERE ID";
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
            $sql="SELECT * FROM `thoikhoabieu`";
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
    public function add($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien)
    {
      try {
        $sql="INSERT INTO `thoikhoabieu`(`ID`, `BUOI1_THU`, `BUOI1_TIET`, `BUOI1_PHONG`, `BUOI2_THU`, `BUOI2_TIET`, `BUOI2_PHONG`, `NGAYBATDAU`, `NGAYKETTHUC`, `GHICHU`, `LOP`, `MONHOC`, `GIANGVIEN`) VALUES ('$id','$b1_thu','$b1_tiet','$b1_phong','$b2_thu','$b2_tiet','$b2_phong','$ngay_bd','$ngay_kt','$ghichu','$lop','$monhoc','$giangvien')";
        $this->db->execute($sql);
      } catch (Exception $th) {
        echo $th;
      }
    }
    public function update($id, $b1_tiet, $b1_thu, $b1_phong, $b2_tiet, $b2_thu, $b2_phong, $ngay_bd, $ngay_kt, $ghichu, $lop, $monhoc, $giangvien)
    {
        try {
            $sql = "UPDATE `thoikhoabieu` SET `BUOI1_THU`='$b1_thu',`BUOI1_TIET`='$b1_tiet',`BUOI1_PHONG`='$b1_phong',`BUOI2_THU`='$b2_thu',`BUOI2_TIET`='$b2_tiet',`BUOI2_PHONG`='$b2_phong',`NGAYBATDAU`='$ngay_bd',`NGAYKETTHUC`='$ngay_kt',`GHICHU`='$ghichu',`LOP`='$lop',`MONHOC`='$monhoc',`GIANGVIEN`='$giangvien' WHERE `ID`='$id'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($id)
    {
        try {
            $sql= "DELETE FROM `thoikhoabieu` WHERE `ID`='$id'";
            $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }

}

?>