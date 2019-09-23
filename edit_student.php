<?php include ('inc/header.php'); ?>

<!-- edit student -->
<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'edit') {
		$student = $stu->edit_student($helper->validation($_GET['id']));
	}
?>

<?php if (isset($_POST['updatestudent'])) {
	$message = $stu->update_student($_POST);
} ?>



<!--container-->

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="students.php">Student</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit Student</li>
		</ol>
		
	</nav>

	<!-- form for adding member -->
	<?php  if(!empty($message)){?>
		<div class="row">
			<div class="col-md-12" id="message">
				<?php echo $message; ?>
			</div>
		</div>

	<?php } ?>
	<form method="post" action="">
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Student Name</label>
					<input type="text" value="<?php echo $student['name']; ?>" name="name" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Name" required="">
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Student ID</label>
					<input type="text"  name="student_id" value="<?php echo $student['student_id']; ?>" class="form-control"  aria-describedby="emailHelp" placeholder="Enter student id" required="">
				</div>

				
				<div class="form-group">
					<label >Username</label>
					<input type="text" name="username" value="<?php echo $student['username']; ?>" class="form-control"  placeholder="Username" required="" readonly>
				</div>


				<div class="form-group">
					<label >Mobile</label>
					<input type="text" name="mobile" value="<?php echo $student['mobile']; ?>" class="form-control"  placeholder="Mobile">
				</div>
				
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Department</label>
					<select name="department_id" id="" class="form-control">
						<option value="" disabled="" selected="" required>Select Department</option>
						<?php foreach ($set->department_list() as $department) {?>
							<option value="<?php echo $department['id'] ?>" <?php if($department['id'] == $student['department_id']): ?> selected <?php endif; ?>><?php echo $department['department_name']; ?></option>
							
						<?php } ?>
					</select>
					
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Student Type</label>
					<select name="type_id" id="" class="form-control">
						<option value="" disabled="" selected="" required>Select Type</option>
						<?php foreach ($set->type_list() as $type) {?>
							<option value="<?php echo $type['id'] ?>" <?php if($type['id'] == $student['type_id']): ?> selected <?php endif; ?>><?php echo $type['type_name']; ?></option>
							
						<?php } ?>
						
					</select>
					
				</div>

				<div class="form-group">
					<label >Batch No</label>
					<input type="text" name="batch_no" value="<?php echo $student['batch_no']; ?>" class="form-control"  placeholder="Batch no" required="">
				</div>


				<div class="form-group">
					<label >Password</label>
					<input type="password" name="password" class="form-control"  placeholder="Password" >
				</div>


			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label >Email</label>
					<input type="text" name="email" value="<?php echo $student['email']; ?>" class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label >Address</label>
					<input type="text" name="address" value="<?php echo $student['address']; ?>" class="form-control">
					<input type="hidden" name="id" value="<?php echo $student['id']; ?>">

				</div>
			</div>

			
		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<button class="btn btn-success" type="submit" name="updatestudent"><i class="fa fa-refresh"></i>&nbsp;Update</button>
				<button class="btn btn-danger" type="reset">Reset</button>
			</div>

			
		</div>

	</form>
	
</div>
<!-- container end -->

<?php include ('inc/footer.php'); ?>