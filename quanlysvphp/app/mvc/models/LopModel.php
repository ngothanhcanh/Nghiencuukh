<?php 
class LopModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function show()
    {
        $sql="SELECT * FROM lop ORDER BY MALOP ASC";
        $resuil= $this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    public function add($id,$TENLOP,$MAKH)
    { 
            $sql="INSERT INTO `lop`(`MALOP`, `TENLOP`, `MAKH`)
            VALUES ('$id','$TENLOP','$MAKH') ";
        return $this->db->execute($sql); 
    }
    public function update($MALOP,$TENLOP,$MAKH)
    {
       
            $sql="UPDATE `lop` SET `TENLOP`='$TENLOP',`MAKH`='$MAKH' WHERE MALOP='$MALOP' ";
        
        return $this->db->execute($sql); 
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `lop` WHERE MALOP='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}