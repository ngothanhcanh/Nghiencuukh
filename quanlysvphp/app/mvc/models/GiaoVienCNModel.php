<?php 
class GiaoVienCNModel
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function showid()
    {
        $sql = "SELECT * FROM giaovienchunhiem ";
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
        $sql="SELECT * FROM giaovienchunhiem ORDER BY ID ASC";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    public function add($id,$MAGV)
    { 
            $sql="INSERT INTO `giaovienchunhiem`(`ID`, `MAGV`)
            VALUES ('$id','$MAGV') ";
        return $this->db->execute($sql); 
    }
    public function update($ID,$MAGV)
    {
       
            $sql="UPDATE `giaovienchunhiem` SET `MAGV`='$MAGV' WHERE ID='$ID' ";
        
        return $this->db->execute($sql); 
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `giaovienchunhiem` WHERE ID='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}