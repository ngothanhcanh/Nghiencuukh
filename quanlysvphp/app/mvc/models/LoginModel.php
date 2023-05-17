<?php 
class LoginModel
{   private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function sigin($name,$password)
   {
      $sql="SELECT * FROM nguoidung WHERE name='$name' and password = '$password'" or die('database not exit');
      if($this->db->execute($sql))
      {
        return 1;
      }
      else {
        return 0;
      }
   }

}