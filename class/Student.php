<?php

include_once "Session.php";

class Student {

    private $db;
    private $help;
    private $msg;

    public function __construct() {
        $this->db = new Database();
        $this->help = new Helper();
        
    }

    /*
    ||==========================================
    || Add Student
    || @param array
    || return string
    ||==========================================
    */
    public function addStudent($data) { //form validation method 
        
        $name           = $this->help->validation($_POST['name']);
        $student_id     = $this->help->validation($_POST['student_id']);
        $username       = $this->help->validation($_POST['username']);
        $mobile         = $this->help->validation($_POST['mobile']);
        $email          = $this->help->validation($_POST['email']);
        $address        = $this->help->validation($_POST['address']);
        $department_id  = $this->help->validation($_POST['department_id']);
        $type_id        = $this->help->validation($_POST['type_id']);
        $batch_no       = $this->help->validation($_POST['batch_no']);
        $password       = $this->help->validation($_POST['password']);

        //student ID check
        if ($this->studentCheck('student_id',$student_id) > 0) {

            $this->msg = '<p class="alert alert-warning">Student ID <strong>'.$student_id.'</strong> already exist;</p>';
        }else if ($this->studentCheck('username',$username) > 0) { //student username check
            $this->msg = '<p class="alert alert-warning">Student username <strong>'.$username.'</strong> already exist;</p>';
        }else if ($this->studentCheck('email',$email) > 0) { //student email check
            $this->msg = '<p class="alert alert-warning">Student email <strong>'.$email.'</strong> already exist;</p>';
        }else if ($this->studentCheck('mobile',$mobile) > 0) { //student mobile check
            $this->msg = '<p class="alert alert-warning">Student mobile <strong>'.$mobile.'</strong> already exist;</p>';
        }
        else{

            //insert student data
            $query = "insert into students(name,student_id,username,mobile,email,address,department_id,type_id,batch_no,password) values('$name','$student_id','$username','$mobile','$email','$address','$department_id','$type_id','$batch_no','$password')";
            $stmt  = $this->db->insert($query);
            $this->msg = '<p class="alert alert-success">Student added successfully</p>';
             
        }

        return $this->msg;
    }

    

    /*
    ||==========================================
    || Student List
    || return @array
    ||==========================================
    */
    public function studentList() { 
        $query = "select s.*,t.type_name,d.department_name from students s join types t on s.type_id = t.id join departments d on s.department_id = d.id  order by s.name asc";
        $stmt  = $this->db->select($query);
        if ($stmt) {
            return $stmt;
        }
    }    



    /*
    ||==========================================
    || Check Student Existance
    || @param $column, $value
    || return @int
    ||==========================================
    */
    public function studentCheck($column, $value) { //form validation method 

        if ($column == 'student_id') {
            $query = "select * from students where student_id = '$value'";
            $stmt  = $this->db->select($query);
            if ($stmt) {
                return $this->db->row($stmt);
            }else{
                return 0;
            }
        }
        if($column == 'email')
        {
            $query = "select * from students where email = '$value'";
            $stmt  = $this->db->select($query);
            if ($stmt) {
                return $this->db->row($stmt);
            }else{
                return 0;
            }
        }
        if($column == 'username')
        {
            $query = "select * from students where username = '$value'";
            $stmt  = $this->db->select($query);
            if ($stmt) {
                return $this->db->row($stmt);
            }else{
                return 0;
            }
        }

        if($column == 'mobile')
        {
            $query = "select * from students where mobile = '$value'";
            $stmt  = $this->db->select($query);
            if ($stmt) {
                return $this->db->row($stmt);
            }else{
                return 0;
            }
        }

        
    }


}

?>