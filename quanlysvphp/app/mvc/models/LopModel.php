<?php
class LopModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function exists($malop)
    {
        $sql = "SELECT COUNT(*) FROM lop WHERE MALOP = '$malop'";
        $count = $this->db->execute($sql);
        if ($count > 1) {
            return false;
        } else {
            return true;
        }
    }
    public function show()
    {
        $sql = "SELECT * FROM lop ORDER BY MALOP ASC";
        $resuil = $this->db->execute($sql);
        if (mysqli_num_rows($resuil) > 0) {
            $data = $resuil->fetch_all(MYSQLI_ASSOC);
            return $data;
        } else {
            return [];
        }
    }
    public function add($id, $TENLOP, $MAKH)
    {
        try {
            $sql = "INSERT INTO `lop`(`MALOP`, `TENLOP`, `MAKH`)
            VALUES ('$id','$TENLOP','$MAKH') ";
            $this->db->execute($sql);
        } catch (Exception $error) {
            echo $error;
        }
    }
    public function update($MALOP, $TENLOP, $MAKH)
    {
         try{
            $sql = "UPDATE `lop` SET `TENLOP`='$TENLOP',`MAKH`='$MAKH' WHERE MALOP='$MALOP' ";
            $this->db->execute($sql);
           }catch(Exception $error)
           {
            echo $error;
           }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `lop` WHERE MALOP='$id'";
        $resuil = $this->db->execute($sql);
    }
}
