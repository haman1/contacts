<?php 

	include('config/db_connect.php');

    if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM contacts WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM contacts WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$contact = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center">
		<?php if($contact): ?>
			<h4><?php echo $contact['name']; ?></h4>
            <p>Phone Number <?php echo $contact['phone']; ?></p>
			<p>Created by <?php echo $contact['email']; ?></p>
			<p><?php echo date($contact['created_at']); ?></p>
			<p><?php echo $contact['address']; ?></p>

            <!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $contact['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>Contact doesn't exist.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>