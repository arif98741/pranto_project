<?php

class Setting {

    private $dbObj;
    private $helpObj;
    private $msg;

    public function __construct() {

        $this->dbObj   = new Database();
        $this->helpObj = new Helper();
    }

    /*
    !----------------------------------------------------------
    ! Add Type 
    !---------------------------------------------------------
    */
    public function add_type($data) {
       
        $type_name = $data['type_name'];
        $query = "select * from types where type_name='$type_name'";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            if ($this->dbObj->row($stmt) > 0) {

                $this->msg = '<p class="alert alert-warning">Types already added;</p>';
            }
        }else{
            
            $query = "insert into types(type_name) values('$type_name')";
            $stmt  = $this->dbObj->insert($query);
            $this->msg = '<p class="alert alert-success">Types added successfully</p>';
        }

        return $this->msg;
        
    }


}
