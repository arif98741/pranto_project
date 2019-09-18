<?php include('inc/header.php'); ?>
<?php 
$page_id = 1;
if (isset($_GET['page_id'])) {
	$page_id = $_GET['page_id'];
}
?>
<?php
if (isset($_POST['addmember'])) {
	$msg = $mem->addMember($_POST);
} else {

}
?>

<div class="container mt-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">

			<?php foreach ( $helper->currentPath() as $value): ?>

				<li class="breadcrumb-item"><a  href="<?php echo $value; ?>"><?php echo ucfirst(str_replace('.php', '', $value)); ?></a></li>

			<?php endforeach; ?>

		</ol>
	</nav>

	<?php if(isset($msg)) echo $msg; ?>
	<br>

	<table id="" style="width: 100%; ">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Address</th>
				<th>Designtaion</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php

			$statement  = $db->pdo->prepare('select * from member');
			$statement->execute();
			$row = $statement->rowCount();

			$perpage = 2;
			$offset = ($page_id - 1) * $perpage;
			$previous_page      = $page_id - 1;
			$next_page          = $page_id + 1;
			$total_no_of_pages  = ceil($row / $perpage);

			$statement_a  = $db->pdo->prepare('select * from member limit :limit offset :offset');
			$statement_a->bindParam(':limit',$perpage);
			$statement_a->bindParam(':offset',$offset);
			$statement_a->execute();
			$results = $statement_a->fetchAll(PDO::FETCH_OBJ);

			$data['row']    = $row;
			$data['pages']  = (int)$total_no_of_pages;
			$data['previous_page']  = $previous_page;
			$data['next_page']      = $next_page;


			?>
			<?php foreach ($results as $result) { ?>

			
			<tr>
				<td>1</td>
				<td>Ariful Islam</td>
				<td>arifsofg</td>
				<td>arifsofg@gmail.com</td>
				<td>Elenga Tangail</td>
				<td>General Member</td>
				<td><a href="#" class="btn btn-primary">E</a></td>
			</tr>
		<?php  }?>
	</tbody>
</table>
</div>



<?php include('inc/footer.php'); ?>