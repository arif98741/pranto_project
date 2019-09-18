<?php include ('inc/header.php'); ?>



<!--container-->

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="departments.php">Department</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Department</li>
		</ol>
		<p><a href="http://<?php echo $helper->currentPath(); ?>">http://<?php echo $helper->currentPath(); ?></a></p>
	</nav>

	<!-- form for adding member -->
	<form method="post" action="departments.php">
		
		<div class="row">

			<!-- message for showing error/success -->


			<!-- message for showing error/success  end-->

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Department Name</label>
					<input type="text"  name="department_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Department Name " required="">
				</div>
				
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button class="btn btn-success" type="submit" name="addmember">Submit</button>
			</div>

			
		</div>

	</form>
	
</div>
<!-- container end -->

<?php include ('inc/footer.php'); ?> 