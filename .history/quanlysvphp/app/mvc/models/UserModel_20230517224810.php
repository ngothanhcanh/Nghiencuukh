<?php 
class UserModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        $sql="SELECT * FROM nguoidung ORDER BY ID ASC";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }else return 
    }
    public function add($id,$name,$password,$user_type,$status,$mssv,$magv)
    { 
        if($magv=='')
        {
            $sql="INSERT INTO `nguoidung`(`ID`, `name`, `password`, `user_type`, `status`, `MSSV`, `MAGV`)
            VALUES ('$id','$name','$password','$user_type','$status','$mssv',null) ";
        }else if($mssv=='')
        {
            $sql="INSERT INTO `nguoidung`(`ID`, `name`, `password`, `user_type`, `status`, `MSSV`, `MAGV`)
            VALUES ('$id','$name','$password','$user_type','$status',null,'$magv') ";
        }else
        {
            
            $sql="INSERT INTO `nguoidung`(`ID`, `name`, `password`, `user_type`, `status`, `MSSV`, `MAGV`)
            VALUES ('$id','$name','$password','$user_type','$status','$mssv','$magv') ";
        }
        return $this->db->execute($sql); 
    }

    public function update($id, $name, $password, $user_type, $status, $mssv, $magv)
    {
        try {
            if($magv=='')
            {
                $sql = "UPDATE `nguoidung` SET `name`='$name', `password`='$password', `user_type`='$user_type', `status`='$status', `MSSV`='$mssv', `MAGV`=null WHERE `ID`='$id'";
            }else if($mssv=='')
            {
                $sql = "UPDATE `nguoidung` SET `name`='$name', `password`='$password', `user_type`='$user_type', `status`='$status', `MSSV`=null, `MAGV`='$magv' WHERE `ID`='$id'";
            }else
            {
                $sql = "UPDATE `nguoidung` SET `name`='$name', `password`='$password', `user_type`='$user_type', `status`='$status', `MSSV`='$mssv', `MAGV`='$magv' WHERE `ID`='$id'";
            }
            return $this->db->execute($sql);
        } catch (Exception $th) {
            echo $th;
        }
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `nguoidung` WHERE id='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}