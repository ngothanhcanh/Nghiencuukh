<?php
class GiangVienModel 
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function showid()
    {
        $sql = "SELECT * FROM giangvien WHERE MAGV";
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
}

?>