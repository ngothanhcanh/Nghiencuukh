<?php 
class UserModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($ID)
    {
      $sql = "SELECT COUNT(*) FROM nguoidung WHERE ID = '$ID'";
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
        $sql="SELECT * FROM nguoidung ORDER BY ID ASC";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    public function add($id,$Name,$Pass,$User_type,$TrangThai,$SV,$GV)
    { try{
        if($GV=='')
        {
            $sql="INSERT INTO `nguoidung`(`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`)
            VALUES ('$id','$Name','$Pass','$User_type','$TrangThai','$SV',null) ";
        }else if($SV=='')
        {
            $sql="INSERT INTO `nguoidung`(`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`)
            VALUES ('$id','$Name','$Pass','$User_type','$TrangThai',null,'$GV') ";
        }else
        {
            
            $sql="INSERT INTO `nguoidung`(`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`)
            VALUES ('$id','$Name','$Pass','$User_type','$TrangThai',null,null) ";
        }
        $this->db->execute($sql); 
        return "Success"; 
        }catch (Exception $th) {
            echo $th;
          }
    }
    public function update($ID,$Name,$Pass,$usertype,$TrangThai,$SV,$GV)
    {
        if($GV=='')
        {
            $sql="UPDATE `nguoidung` SET `Name`='$Name',`Pass`='$Pass',`User_type`='$usertype',`TrangThai`='$TrangThai',`SV`='$SV',`GV`=null WHERE ID='$ID' ";
        }else if($SV=='')
        {
            $sql="UPDATE `nguoidung` SET `Name`='$Name',`Pass`='$Pass',`User_type`='$usertype',`TrangThai`='$TrangThai',`SV`=null,`GV`='$GV' WHERE ID='$ID' ";
        }else
        {    
            $sql="UPDATE `nguoidung` SET `Name`='$Name',`Pass`='$Pass',`User_type`='$usertype',`TrangThai`='$TrangThai',`SV`=null,`GV`=null  WHERE ID='$ID' ";
        }
        $this->db->execute($sql); 
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `nguoidung` WHERE id='$id'";
       $resuil= $this->db->execute($sql);
    }
}