<?php 

	// if(isset($_GET['submit'])){
	// 	echo $_GET['email'] . '<br />';
	// 	echo $_GET['name'] . '<br />';
	// 	echo $_GET['phone'] . '<br />';
	// 	echo $_GET['address'] . '<br />';
	// }


	$email = $name = $phone = $address = '';
	$errors = array('email' => '', 'name' => '', 'phone' => '', 'address' => '');


	if(isset($_POST['submit'])){
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required <br />';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] ='Email must be a valid email address';
			}
		}


		// check Name
		if(empty($_POST['name'])){
			$errors['name'] = 'Name is required <br />';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
			}
		}

	// check Phone
	if(empty($_POST['phone'])){
		$errors['phone'] =  'Phone is required <br />';
	} else{
		$phone = $_POST['address'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $phone)){
			$errors['phone'] = 'Phone must be digits only';
		}
	}

	// check Address
	if(empty($_POST['address'])){
		$errors['address'] = 'Address is required <br />';
	} else{
		$address = $_POST['address'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $address)){
			$errors['address'] = 'Address must be letters and spaces only';
		}
	}
	if(array_filter($errors)){
		//echo 'errors in form';
	} else {
		//echo 'form is valid';
		header('Location: index.php');
	}
	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Contact</h4>
		<form class="white" action="add.php" method="POST">
			<label>Contact's Email</label>
			<input type="text" name="email"  value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Name</label>
			<input type="text" name="name"  value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Phone Number</label>
			<input type="number" name="phone"  value="<?php echo htmlspecialchars($phone) ?>">
			<div class="red-text"><?php echo $errors['phone']; ?></div>
            <label>Address/Location</label>
			<input type="text" name="address"  value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>