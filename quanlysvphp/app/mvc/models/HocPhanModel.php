<?php 
class HocPhanModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function exists($mahp)
    {
      $sql = "SELECT COUNT(*) FROM hocphan WHERE MAHP = '$mahp'";
      $count=$this->db->execute($sql);
      if($count>1)
      {
        return false;
      }else{
        return true;
      }
    }
    function showwheremagv($magv)
    {
        $sql="SELECT * FROM hocphan where GVPT='$magv' ORDER BY MAHP ASC";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }
    }
    function show()
    { 
       
        $sql="SELECT * FROM hocphan ORDER BY MAHP ASC";
        $resuil=$this->db->execute($sql);
        if(mysqli_num_rows($resuil)>0)
        {
            $data=$resuil->fetch_all(MYSQLI_ASSOC);    
            return $data;
        }else
        {
            return [];
        }
       
    }
    public function add($id,$TENHP,$SOTC,$GVPT)
    {    try{
            $sql="INSERT INTO `hocphan`(`MAHP`, `TENHP`, `SOTC`,`GVPT`)
            VALUES ('$id','$TENHP','$SOTC','$GVPT') ";
            $this->db->execute($sql); 
            return "Success";
            }catch(Exception $error)
            {
                echo $error;
            }
    }
    public function update($MAHP,$TENHP,$SOTC,$GVPT)
    {
       try{
        $sql="UPDATE `hocphan` SET `TENHP`='$TENHP',`SOTC`='$SOTC',GVPT`= '$GVPT' WHERE MAHP='$MAHP' ";
        $this->db->execute($sql); 
       }catch(Exception $error)
       {
        echo $error;
       }
    }
    public function delete($id)
    {
       $sql= "DELETE FROM `hocphan` WHERE MAHP='$id'";
       $this->db->execute($sql);

    }
}