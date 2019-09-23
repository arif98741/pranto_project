<?php 
session_start();
if (isset($_SESSION['login'])) {
	header('location: index.php');
}
include 'class/Database.php';
include 'class/Helper.php';
$db = new Database;
$help = new Helper;

$message = '';
if (isset($_POST['username'])) {
	// echo '<pre>';
	// print_r($_POST); exit;

	$username = $help->validation($_POST['username']);
	$password = md5($help->validation($_POST['password']));
	$sql = "select * from tbl_user where username='$username' and password='$password'";
	$stmt = $db->select($sql);
	
	if($db->row($stmt) > 0)
	{
		$data = $stmt->fetch_object();

		$_SESSION['login']      = TRUE;
		$_SESSION['userid']     = $data->id;
		$_SESSION['name']       = $data->incharge_name;
		$_SESSION['username']   = $data->username;
		$_SESSION['email']      = $data->email;
		$_SESSION['image']      = $data->image;
		$_SESSION['flash_success'] = "<p class='alert alert-success'> Login to dashboard successfully</p>";
		header('location: types.php');
		header('location: index.php');

	}else{
		$message = '<p class="alert alert-danger" style="margin-top: 2px;">Username or password not matched</p>';
	}
}
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
		<a class="navbar-brand" href="#" style="color: #fff;">Student Management System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">


				<a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>


			</ul>

		</div>
	</nav> 
	<!-- navbar end -->

	<!--container-->
	
	
	<div class="container mt-4" style="width: 45%; margin: 0 auto;">
		<marquee behavior="alternative" direction=""><p class="text-center alert alert-success">Welcome to Student Management System. You must login to access dashboard.</p></marquee>
		
		<h2>Login</h2>	
		<form method="post" action="">

			<div class="md-3 col-sm-12">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text"  name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<button class="btn btn-success mt-2">Login</button>
				<?php if(!empty($message)): ?>
					<p class="alert alert-warning mt-1"><?php echo $message; ?></p>
				<?php endif; ?>
			</div>


		</form>
		
	</div>





	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="asset/js/main.js"></script>
</body>
</html>