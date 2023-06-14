<?php 
class LoginModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function sigin($name,$password)
   {  
     
      $sql="SELECT * FROM `nguoidung` WHERE Name='$name' AND Pass ='$password'";
      $resuil=$this->db->execute($sql);
      if(mysqli_num_rows($resuil)>0)
      {
        $data=mysqli_fetch_assoc($resuil);
        return $data; 
      }else
      {
        return [];
      }
   }

}