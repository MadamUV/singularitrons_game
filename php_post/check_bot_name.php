<?php
	if(isset($_POST['starter_name']) && isset($_POST['me_id'])) {
		$starter_name = $_POST['starter_name'];
		include '../php_extras/connect.php';
		$sql_check = "SELECT * FROM bot_identification";
		$checking = mysqli_query($conn, $sql_check);
		if(mysqli_num_rows($checking) !== 0){
			echo "Oops, that name is taken. Please try again.";
		}
		if(strlen($starter_name)<5 || strlen($starter_name)>12){
			echo "Oops, name must be within 5 to 12 characters!";
		}
		if(strlen($starter_name)>4 && strlen($starter_name)<13 && mysqli_num_rows($checking) === 0){
			echo "Success!";
		}
	}
?>
