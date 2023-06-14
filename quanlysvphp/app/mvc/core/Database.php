<?php
class Database
{  
    protected $localhost = "localhost";
    protected $name ="root";
    protected $password ="";
    protected $dbname = "nckhupdate1";
    
    public $conn=null;
    private $result=null;
    public function __construct()
    {
        $this->conn = mysqli_connect($this->localhost,$this->name,$this->password,$this->dbname);
        mysqli_set_charset($this->conn,'utf8');
    }
    //truy van du lieu
    public function execute($sql)
    {
      $this->result=$this->conn->query($sql);
      return $this->result;
    }
   
}

?>