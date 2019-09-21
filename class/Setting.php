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
    ! Type List
    ! return $array
    !---------------------------------------------------------
    */
    public function type_list() {
    
        $query = "select * from types order by type_name asc";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            return $stmt;
        }
        
    }


    /*
    !----------------------------------------------------------
    ! Department List
    ! return $array
    !---------------------------------------------------------
    */
    public function department_list() {
    
        $query = "select * from departments order by department_name asc";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            return $stmt;
        }
        
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
        $stmt  = $this->dbObj->link->query($query);
        if ($stmt->num_rows > 0 ){
            
            $this->msg = '<p class="alert alert-warning">Type <strong>'.$type_name.' </strong> already added;</p>';
            
        }else{

            $query = "insert into types(type_name) values('$type_name')";
            $stmt  = $this->dbObj->insert($query);
            $this->msg = '<p class="alert alert-success">Type <strong>'.$type_name.' </strong> added successfully</p>';
        }

        return $this->msg;
    }

    /*
    !----------------------------------------------------------
    ! Edit Type
    ! @param id
    ! return $string
    !---------------------------------------------------------
    */
    public function edit_type($type_id) {
     
        $query = "select * from types where id='$type_id'";
        $stmt  = $this->dbObj->select($query);
        if ($stmt) {
            if ($this->dbObj->row($stmt) > 0) {
                return $stmt->fetch_assoc();
            }
        }else{

            header('location: types.php');
        }

        return $this->msg;
    }


    /*
    !----------------------------------------------------------
    ! Update type
    ! @param array
    ! return $string
    !---------------------------------------------------------
    */
    public function update_type($data) {
        $type_name = $this->helpObj->validation($data['type_name']);
        $id        = $this->helpObj->validation($data['id']);

        $query = "update types set type_name='$type_name' where id='$id'";
        $stmt  = $this->dbObj->update($query);
        if ($stmt) {
            $_SESSION['flash_success'] = "<p class='alert alert-success'> Type updated successfully</p>";
            header('location: types.php');
        }else{
            $_SESSION['flash_error'] = "<p class='alert alert-warning'> Type update failed</p>";
            header('location: types.php');
        }

    }


    /*
    !----------------------------------------------------------
    ! Delete type
    ! @param array
    ! return $string
    !---------------------------------------------------------
    */
    public function delete_type($data) {
        $id        = $this->helpObj->validation($data['id']);

        $query = "delete from  types where id='$id'";
        $stmt  = $this->dbObj->delete($query);
        if ($stmt) {
            $_SESSION['flash_success'] = "<p class='alert alert-success'> Type deleted successfully</p>";
            header('location: types.php');
        }else{
            $_SESSION['flash_error'] = "<p class='alert alert-warning'> Type delete failed</p>";
            header('location: types.php');
        }
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
        $stmt  = $this->dbObj->link->query($query);
        
        if ($this->dbObj->row($stmt) > 0) {
           
            $this->msg = '<p class="alert alert-warning">Department <strong>'.$department_name.'</strong> already added;</p>';
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
                return $stmt->fetch_assoc();
            }
        }else{

            header('location: departments.php');
        }

        return $this->msg;
    }


    /*
    !----------------------------------------------------------
    ! Update department
    ! @param array
    ! return $string
    !---------------------------------------------------------
    */
    public function update_department($data) {
        $department_name = $this->helpObj->validation($data['department_name']);
        $id              = $this->helpObj->validation($data['id']);

        $query = "update departments set department_name='$department_name' where id='$id'";
        $stmt  = $this->dbObj->update($query);
        if ($stmt) {
            $_SESSION['flash_success'] = "<p class='alert alert-success'> Department updated successfully</p>";
            header('location: departments.php');
        }else{
            $_SESSION['flash_error'] = "<p class='alert alert-warning'> Department update failed</p>";
            header('location: departments.php');
        }

    }


     /*
    !----------------------------------------------------------
    ! Delete department
    ! @param array
    ! return $string
    !---------------------------------------------------------
    */
    public function delete_department($data) {
        $id        = $this->helpObj->validation($data['id']);

        $query = "delete from  departments where id='$id'";
        $stmt  = $this->dbObj->delete($query);
        if ($stmt) {
            $_SESSION['flash_success'] = "<p class='alert alert-success'> Department deleted successfully</p>";
            header('location: departments.php');
        }else{
            $_SESSION['flash_error'] = "<p class='alert alert-warning'> Department delete failed</p>";
            header('location: departments.php');
        }
    }




}