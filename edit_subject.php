<?php include ('inc/header.php'); ?>
<?php 
if (isset($_GET['action'])) {
	$id = $_GET['id'];
	$subject = $set->edit_subject($id);
	//echo "<pre>";
	//print_r( $set->edit_subject($id));
	//exit;
}else{
	header('location: subjects.php');
}
?>

<!--container-->

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="subjects.php">Subject</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit subject</li>
		</ol>
	
	</nav>

	<!-- form for adding member -->
	<form method="post" action="subjects.php">
		
		<div class="row">

			<!-- message for showing error/success -->


			<!-- message for showing error/success  end-->

			<div class="col-md-6" id="dsfj">
				<div class="form-group">
					<label for="exampleInputEmail1">Subject Name</label>
					<input type="text" value="<?php echo $subject['subject_name']; ?>"  name="subject_name" class="form-control" id="<exampleInputEmail1></exampleInputEmail1>" aria-describedby="emailHelp" placeholder="Enter Your subject Name " required="">
					<input name="id" type="hidden" value="<?php echo $subject['id']; ?>">
				</div>
				
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button class="btn btn-success" type="submit" name="update_subject">Update</button>
			</div>

			
		</div>

	</form>
	
</div>
<!-- container end -->

<?php include ('inc/footer.php'); ?> 