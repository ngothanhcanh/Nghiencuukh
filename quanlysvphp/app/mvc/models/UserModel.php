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
    {  try {
        if($SV != '' && $GV != '')
        {
        return [];
        }else
        {
        $sql = "INSERT INTO `nguoidung`(`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`)
        VALUES ('$id', '$Name', '$Pass', '$User_type', '$TrangThai', NULLIF('$SV', ''), NULLIF('$GV', ''))";
        }
        $this->db->execute($sql);
        return "Success";
    } catch (Exception $th) {
        echo $th;
    }
    }
    public function update($ID, $Name, $Pass, $usertype, $TrangThai, $SV, $GV)
    {
        try {
            if ($SV !== '' && $GV !== '') {
                // Cả $SV và $GV đều có giá trị, không cần cập nhật
                return "Success";
            } else {
                $sql = "UPDATE `nguoidung` SET `Name`='$Name', `Pass`='$Pass', `User_type`='$usertype', `TrangThai`='$TrangThai'";
                
                if ($SV !== '') {
                    $sql .= ", `SV`='$SV'";
                } else {
                    $sql .= ", `SV`=null";
                }
                
                if ($GV !== '') {
                    $sql .= ", `GV`='$GV'";
                } else {
                    $sql .= ", `GV`=null";
                }
                
                $sql .= " WHERE ID='$ID'";
                
                $this->db->execute($sql);
                return "Success";
            }
        } catch (Exception $th) {
            echo $th;
        }
    }

    public function delete($id)
    {
       $sql= "DELETE FROM `nguoidung` WHERE id='$id'";
       $resuil= $this->db->execute($sql);
    }
}