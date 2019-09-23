 <?php include ('inc/header.php'); ?>
 <?php 

// delete subject
 if (isset($_GET['action']) && $_GET['action'] == 'delete') {
 	$message = $set->delete_subject($_GET); 
 }

 if (isset($_POST['add_subject'])) {
 	$message = $set->add_subject($_POST); 
 }

 if (isset($_POST['update_subject'])) {
 	$message = $set->update_subject($_POST); 
 }
 //echo '<pre>';
 //print_r($_SESSION);

 ?>


 <!--container-->
 <div class="container mt-4">
 	<nav aria-label="breadcrumb">
 		<ol class="breadcrumb">
 			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
 			<li class="breadcrumb-item"><a href="add_subject.php">Add subject</a></li>
 			<li class="breadcrumb-item active" aria-current="page">subjects</li>
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


 	<?php  if(!empty($_SESSION['flash_error'])){?>
 		<div class="row">
 			<div class="col-md-12" id="message">
 				<?php echo $_SESSION['flash_error'];

 				$_SESSION['flash_error'] = '';
 				?>
 			</div>
 		</div>

 	<?php } ?>





 	<table id="dataTable" style="width: 100%; ">
 		<thead>
 			<tr>
 				<th>Serial</th>
 				<th>subject Name</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 			$sql = "select * from subjects";
 			$stmt = $db->select($sql);

 			if($stmt){ $i = 0;
 				while ($row = $stmt->fetch_assoc()) { $i++; ?>
 					<tr>
 						<td><?php echo $i; ?></td>
 						<td><?php echo $row['subject_name']; ?></td>

 						<td><a href="edit_subject.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">E</a>

 							<a href="?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return(confirm('are you sure to delete?'))">D</a>

 						</td>
 					</tr>
 				<?php	}
 			}
 			?>

 		</tbody>
 	</table>
 </div>
 <!-- container end -->
 <?php include ('inc/footer.php'); ?>