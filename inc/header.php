<?php 
$self_path  = $_SERVER['PHP_SELF'];
$explode = explode('/', $self_path);
unset($explode[0]);

function my_autoloader($class) {
	include 'class/' .$class.'.php';
}

spl_autoload_register('my_autoloader');
$db  	= new Database();
$stu 	= new Student();
$set  	= new Setting();
$helper = new Helper();
$message = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
	<!-- navbar start -->	

	<nav class="navbar navbar-expand-lg navbar-light bg-red nav-background-color">
		<a class="navbar-brand" href="index.php">Student Management </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Student
					</a>
					<div class="dropdown-menu nav-background-color" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="add_student.php">Add Student</a>
						<a class="dropdown-item" href="studentlist.php">Student List</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Settings
					</a>
					<div class="dropdown-menu nav-background-color" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="types.php">Type List</a>
						<a class="dropdown-item" href="departments.php">Department List</a>
					</div>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="#">Login</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#">Registration</a>
				</li>


			</ul>

		</div>
	</nav> 
	<!-- navbar end -->

	<!--container-->


