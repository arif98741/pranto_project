<?php include ('inc/header.php'); ?>
<?php 
		if (isset($_POST['allocate_subject'])) {
			$student_id = $helper->validation($_POST['student_id']);
			$subject_id = $helper->validation($_POST['subject_id']);

			$sql = "insert into registration(student_id,subject_id) values('$student_id','$subject_id')";
			$stmt = $db->insert($sql);
			if ($stmt) {
				$_SESSION['flash_success'] = "<p class='alert alert-success'> Type updated successfully</p>";
            	header('location: view_student.php?action=view&id='.$student_id);
			}
		}
?>
<!--container-->

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="students.php">Student</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Subject for Student</li>
		</ol>
		
	</nav>

	<!-- form for adding member -->
	<form method="post" action="">
		
		<div class="row">

			<!-- message for showing error/success -->


			<!-- message for showing error/success  end-->

			<div class="col-md-6">



				<div class="form-group">
					<label for="exampleInputEmail1">Student</label>
					<select name="student_id" id="" class="form-control">
						<option value="" disabled="" selected="">---</option>
						<?php 
						$sql = "select s.*,t.type_name,d.department_name from students s join types t on s.type_id = t.id join departments d on s.department_id = d.id  order by s.name asc";
						$stmt = $db->select($sql);

						$i = 1;
						while ($row = $stmt->fetch_assoc()) { $i++; ?>
							<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
						<?php } ?>
					</select>
				</div>


				<div class="form-group">
					<label for="exampleInputEmail1">Subject</label>
					<select name="subject_id" id="" class="form-control">
						<option value="" disabled="" selected="">---</option>
						<?php 
						$sql = "select * from subjects order by subject_name asc";
						$stmt = $db->select($sql);

						$i = 1;
						while ($row = $stmt->fetch_assoc()) { $i++; ?>
							<option value="<?php echo $row['id'] ?>" ><?php echo $row['subject_name'] ?></option>
						<?php } ?>
					</select>
				</div>

			</div>

		</div>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<button class="btn btn-danger" type="reset">Reset</button>
				<button class="btn btn-success" type="submit" name="allocate_subject">Submit</button>
			</div>


		</div>

	</form>

</div>
<!-- container end -->

<?php include ('inc/footer.php'); ?> 