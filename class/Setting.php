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
    ! @param array
    ! return $string
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


     /*
    !----------------------------------------------------------
    ! Add Department 
    ! @param array
    ! return $string
    !---------------------------------------------------------
    */
    public function add_department($data) {
       
        $department_name = $data['department_name'];
        $query = "select * from departments where department_name='$department_name'";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            if ($this->dbObj->row($stmt) > 0) {

                $this->msg = '<p class="alert alert-warning">Department <strong>'.$department_name.'</strong> already added;</p>';
            }
        }else{
            $query = "insert into departments(department_name) values('$department_name')";
            $stmt  = $this->dbObj->insert($query);
            $this->msg = '<p class="alert alert-success">Department <strong>'.$department_name.'</strong> added successfully</p>';
        }

        return $this->msg;
    }



     /*
    !----------------------------------------------------------
    ! Edit department
    ! @param id
    ! return $string
    !---------------------------------------------------------
    */
    public function edit_department($department_id) {
     
        $query = "select * from departments where id='$department_id'";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            if ($this->dbObj->row($stmt) > 0) {
                $value = $stmt->fetch_assoc();
                $this->msg = $value['department_name'];
            }
        }else{

            header('location: departments.php');
        }

        return $this->msg;
    }



}