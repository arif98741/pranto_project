 <?php include ('inc/header.php'); ?>

 <!--container-->
 <div class="container mt-4">
 	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="add_student.php">Add Student</a></li>
			<li class="breadcrumb-item active" aria-current="page">Students</li>
		</ol>
		
	</nav>
 	<table id="dataTable" style="width: 100%; ">
 		<thead>
 			<tr>
 				<th>Serial</th>
 				<th>Name</th>
 				<th>Student ID</th>
 				<th>Department</th>
 				<th>Batch</th>
 				<th>Type</th>
 				<th>Username</th>
 				<th>Email</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			$sql = "select s.*,t.type_name,d.department_name from students s join types t on s.type_id = t.id join departments d on s.department_id = d.id  order by s.name asc";
			$stmt = $db->select($sql);

 			$i = 1;
 				while ($row = $stmt->fetch_assoc()) { $i++; ?>
 					<tr>
 						<td><?php echo $i; ?></td>
 						<td><?php echo $row['name']; ?></td>
 						<td><?php echo $row['student_id']; ?></td>
 						<td><?php echo $row['department_name']; ?></td>
 						<td><?php echo $row['batch_no']; ?></td>
 						<td><?php echo $row['type_name']; ?></td>
 						<td><?php echo $row['username']; ?></td>
 						<td><?php echo $row['email']; ?></td>
 						<td><?php echo $row['address']; ?></td>
 						<td><a href="viewmember.php?action=view&id=<?php echo $row['id']; ?>" class="btn btn-success">V</a>&nbsp;<a href="editmember.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">E</a>&nbsp;<a href="?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">D</a></td>
 					</tr>
 				<?php	}?>

 		</tbody>
 	</table>
 </div>
 <!-- container end -->
 <?php include ('inc/footer.php'); ?>