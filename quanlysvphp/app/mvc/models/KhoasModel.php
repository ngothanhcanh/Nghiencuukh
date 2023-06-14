<?php 
class KhoasModel
{  private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        $sql="SELECT * FROM khoas ORDER BY ID ASC";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    public function add($id)
    {   
          $sql="INSERT INTO `khoas`(`ID`)
            VALUES ('$id') ";
        return $this->db->execute($sql); 
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `khoas` WHERE id='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}