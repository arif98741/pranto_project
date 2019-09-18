<?php include ('inc/header.php'); ?>
<?php 
if (isset($_POST['type_name'])) {
	$message = $set->add_type($_POST); 
}
?>

<!--container-->
<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="add_type.php">Add Type</a></li>
			<li class="breadcrumb-item active" aria-current="page">Types</li>
		</ol>
	</nav>

	<?php  if(!empty($message)){?>
		<div class="row">
			<div class="col-md-12" id="message">
				<?php echo $message; ?>
			</div>
		</div>

	<?php } ?>
	
	<table id="dataTable" style="width: 100%; ">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Type Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql = "select * from types";
			$stmt = $db->select($sql);

			if($stmt){ $i = 0;
				while ($row = $stmt->fetch_assoc()) { $i++; ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row['type_name']; ?></td>
						
						<td><a href="edit_type.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">E</a></td>
					</tr>
				<?php	}
			}
			?>

		</tbody>
	</table>
</div>
<!-- container end -->
<?php include ('inc/footer.php'); ?>