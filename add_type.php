<?php include ('inc/header.php'); ?>



<!--container-->

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="types.php">Type</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Type</li>
		</ol>
		
	</nav>

	<!-- form for adding member -->
	<form method="post" action="types.php">
		
		<div class="row">

			<!-- message for showing error/success -->


			<!-- message for showing error/success  end-->

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Type Name</label>
					<input type="text"  name="type_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name" required="">
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