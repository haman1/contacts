<?php 


	include('config/db_connect.php');

	// write query for all contacts
	$sql = 'SELECT  name, phone, id FROM contacts ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);
	


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">My Contacts</h4>

<div class="container">
	<div class="row">

		<?php foreach($contacts as $contact){ ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
				<img src="img/contact.png"class="contact">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($contact['name']); ?></h6>
						<div><?php echo htmlspecialchars($contact['phone']); ?></div>
					</div>
					<div class="card-action right-align">
						<a class="brand-text" href="details.php?id=<?php echo $contact['id'] ?>">more info</a>
					</div>
				</div>
			</div>

		<?php } ?>

	</div>
</div>

	<?php include('templates/footer.php'); ?>

</html>