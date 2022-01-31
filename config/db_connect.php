<?php
    // connect to the database
	$conn = mysqli_connect('localhost', 'matigari', 'angabanga', 'contactsdb');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

    ?>