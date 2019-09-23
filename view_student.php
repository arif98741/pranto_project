 <?php include ('inc/header.php'); ?>
 <?php 



 if (isset($_GET['action']) && $_GET['action'] == 'delete_registration') {
 	$id = $helper->validation($_GET['id']);
 	$student_id = $helper->validation($_GET['student_id']);
 	$db->delete("delete from registration where id='$id'");
 	header('location: view_student.php?action=view&id='.$student_id);
 	
 }


 if (isset($_GET['id'])) {
 	$student_id = $helper->validation($_GET['id']);
 	$student = $stu->single_student($helper->validation($_GET['id']));
 }


 ?>

 <!--container-->
 <div class="container mt-4">
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 			<li class="breadcrumb-item"><a href="students.php">Students</a></li>
 			<li class="breadcrumb-item active" aria-current="page">View Student</li>
 		</ol>

 	</nav>
 	
 	<div class="row">
 		<div class="col-md-4">
 			<p>Name:<strong> <?php echo $student['name']; ?> </strong></p>
 			<p>Student ID:<strong> <?php echo $student['student_id']; ?> </strong></p>
 			<p>Department:<strong> <?php echo $student['department_name']; ?> </strong></p>
 			<p>Student Type:<strong> <?php echo $student['type_name']; ?> </strong></p>
 			<p>Username:<strong> <?php echo $student['username']; ?> </strong></p>
 			<p>Email:<strong> <?php echo $student['email']; ?> </strong></p>
 			<p>Mobile:<strong> <?php echo $student['mobile']; ?> </strong></p>
 			<p>Address:<strong> <?php echo $student['address']; ?> </strong></p>
 		</div>
 	</div>
 </div>
 <!-- container end -->
 <div class="container" style="margin-bottom: 30px;">
 	

 	<br><br>
 	<hr>
 	<h4>Allocated Subjects</h4>
 	<a href="add_allocate_subject.php">Add Subject for Student</a>
 	<hr>
 	<table id="" style="width: 100%; ">
 		<thead>
 			<tr>
 				<th>Serial</th>
 				<th>Subject Name</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			$sql = "select subjects.subject_name,registration.* from registration join students on registration.student_id = students.id join subjects on registration.subject_id = subjects.id where registration.student_id = '$student_id'";
 			$stmt = $db->select($sql);
 		
 			$j = 1;
 			while ($row = $stmt->fetch_assoc()) {  ?>
 				<tr>
 					<td><?php echo $j; ?></td>
 					<td><?php echo $row['subject_name']; ?></td>
 					
 					<td><a href="?action=delete_registration&id=<?php echo $row['id']; ?>&student_id=<?php echo $row['student_id']; ?>" onclick="return(confirm('are you sure to confirm delete?'))" class="btn btn-danger">D</a></td>
 				</tr>
 			<?php	$j++;}?>

 		</tbody>
 	</table>
 </div>
 <?php include ('inc/footer.php'); ?>