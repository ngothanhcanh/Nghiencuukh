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
        }
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
    public function update()
    {

    }
    public function delete($id)
    {
       $sql= "DELETE FROM `nguoidung` WHERE id='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}