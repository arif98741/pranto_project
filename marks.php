 <?php include ('inc/header.php'); ?>
 <?php 
 // delete department
 if (isset($_GET['action']) && $_GET['action'] == 'delete') {
 	$message = $stu->delete_student($_GET); 
 }
 ?>
 <!--container-->
 <div class="container mt-4">
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 			<li class="breadcrumb-item"><a href="students.php">Students</a></li>
 			<li class="breadcrumb-item active" aria-current="page">Marks</li>
 		</ol>

 	</nav>

 	<?php  if(!empty($message)){?>
 		<div class="row">
 			<div class="col-md-12" id="message">
 				<?php echo $message; ?>
 			</div>
 		</div>

 	<?php } ?>

 	<?php  if(!empty($_SESSION['flash_success'])){?>
 		<div class="row">
 			<div class="col-md-12" id="message">
 				<?php echo $_SESSION['flash_success'];

 				$_SESSION['flash_success'] = '';
 				?>
 			</div>
 		</div>

 	<?php } ?>

 	<table id="dataTable" style="width: 100%; ">
 		<thead>
 			<tr>
 				<th>Serial</th>
 				<th>Student Name</th>
 				<th>Student ID</th>
 				<th>Department</th>
 				<th>Written</th>
 				<th>Oral</th>
 				<th>Practical</th>
 				<th>Marks</th>
 				<th>Total Marks</th>
 				<th>AVG.</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			$sql = "select marks.*,students.name,students.student_id,departments.department_name from marks join registration on marks.registration_id = registration.id join students on registration.student_id = students.id join departments on students.department_id = departments.id";
 			$stmt = $db->select($sql);
 			//echo "<pre>";
 			//print_r($stmt->fetch_object()); exit;


 			$i = 1;
 			while ($row = $stmt->fetch_assoc()) {  ?>
 				<tr>
 					<td><?php echo $i; ?></td>
 					<td><?php echo $row['name']; ?></td>
 					<td><?php echo $row['student_id']; ?></td>
 					<td><?php echo $row['department_name']; ?></td>
 					<td><?php echo $row['written']; ?></td>
 					<td><?php echo $row['oral']; ?></td>
 					<td><?php echo $row['practical']; ?></td>
 					<td><?php echo $row['written'] + $row['oral'] +$row['practical']; ?></td>
 					<td><?php echo number_format((float)(($row['written'] + $row['oral'] +$row['practical'])/3), 2, '.', ''); ?></td>
 					<td><a href="view_student.php?action=view&id=<?php echo $row['id']; ?>" class="btn btn-success">V</a>&nbsp;<a href="edit_student.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">E</a>&nbsp;<a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return(confirm('are you sure to confirm delete?'))" class="btn btn-danger">D</a></td>
 				</tr>
 				<?php	$i++;}?>

 			</tbody>
 		</table>
 	</div>



 	<!-- container end -->
 	<?php include ('inc/footer.php'); ?>