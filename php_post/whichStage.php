<?php

	include '../php_extras/connect.php';
	if(isset($_POST['me_id'])) {
		$me_id = $_POST['me_id'];
		$sql_owner = "SELECT * FROM ownedbots WHERE user_id='" . $me_id . "' LIMIT 1";
		$result_owner = mysqli_query($conn, $sql_owner);
		$sql_habitat = "SELECT * FROM ownedhabitats WHERE user_id='" . $me_id . "' LIMIT 1";
		$result_habitat = mysqli_query($conn, $sql_habitat);
		if(mysqli_num_rows($result_owner) > 0){
			echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Choose a habitat for your bot!</font></div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.png" alt="spaceship" class="spaceship"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next starter item</button></div>';
		}
		//else if(mysqli_num_rows($result_owner)>0 && mysqli_num_rows($result_habitat)>0){
			
		//}
	}
?>