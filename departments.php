 <?php include ('inc/header.php'); ?>

 <!--container-->
 <div class="container mt-4">
 	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="add_department.php">Add Department</a></li>
			<li class="breadcrumb-item active" aria-current="page">Departments</li>
		</ol>
	</nav>

 	<table id="dataTable" style="width: 100%; ">
 		<thead>
 			<tr>
 				<th>Serial</th>
 				<th>Department Name</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			$sql = "select * from departments";
 			$stmt = $db->select($sql);

 			if($stmt){ $i = 0;
 				while ($row = $stmt->fetch_assoc()) { $i++; ?>
 					<tr>
 						<td><?php echo $i; ?></td>
 						<td><?php echo $row['department_name']; ?></td>

 						<td><a href="edit_department.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">E</a></td>
 					</tr>
 				<?php	}
 			}
 			?>

 		</tbody>
 	</table>
 </div>
 <!-- container end -->
 <?php include ('inc/footer.php'); ?>