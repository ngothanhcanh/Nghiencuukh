<?php 
class HocPhanModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    function show()
    {
        $sql="SELECT * FROM hocphan ORDER BY MAHP ASC";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    public function add($id,$TENHP,$SOTC)
    { 
            $sql="INSERT INTO `hocphan`(`MAHP`, `TENHP`, `SOTC`)
            VALUES ('$id','$TENHP','$SOTC') ";
        return $this->db->execute($sql); 
    }
    public function update($MAHP,$TENHP,$SOTC)
    {
       
            $sql="UPDATE `hocphan` SET `TENHP`='$TENHP',`SOTC`='$SOTC' WHERE MAHP='$MAHP' ";
        
        return $this->db->execute($sql); 
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `hocphan` WHERE MAHP='$id'";
       $resuil= $this->db->execute($sql);
       return $resuil;
    }
}