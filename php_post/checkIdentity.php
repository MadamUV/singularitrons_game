<?php
    include '../php_extras/connect.php';
    if(isset($_POST['me_id'])) {
		$me_id = $_POST['me_id'];
        $sql = "SELECT * FROM levels WHERE user_id='" . $me_id . "' LIMIT 1";
        $result1 = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result1);
		$sql_owner = "SELECT * FROM ownedbots WHERE user_id='" . $me_id . "' LIMIT 1";
		$result_owner = mysqli_query($conn, $sql_owner);
		$sql_habitat = "SELECT * FROM ownedhabitats WHERE user_id='" . $me_id . "' LIMIT 1";
		$result_habitat = mysqli_query($conn, $sql_habitat);
		//conditionals begin
		if(mysqli_num_rows($result_owner)>0) {
			echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
		}
		if(mysqli_num_rows($result1)==0 && isset($_POST['me_firstname'])){
        	$me_firstname = $_POST['me_firstname'];
			$sql_insert = "INSERT INTO levels (user_id, first_name, level) VALUES ('" . $me_id  . "',  '" . $me_firstname ."','0')";
			mysqli_query($conn, $sql_insert); 
			echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/pseudobotPack.png" class="pseudo" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div><div id="confirm_or_not"></div>';
        }
		else if(mysqli_num_rows($result_owner)==0){
				if(!isset($_POST['starter_bot'])) {
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/pseudobotPack.png" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div>';
				}
				else if(isset($_POST['starter_bot'])) {
					$starter_bot = $_POST['starter_bot'];
					$sql_insert = "INSERT INTO owned_bots (user_id, owned_bot) VALUES ('" . $me_id  . "', '" . $starter_bot . "')";
								mysqli_query($conn, $sql_insert);
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
				}
			}
		else if(mysqli_num_rows($result_owner)>0 && mysqli_num_rows($result_habitat)==0){
				if(!isset($_POST['me_firstname'])) {
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Choose a habitat for your bot!</font></div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.png" alt="spaceship" class="spaceship"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat</button></div>';
				}
				else if(isset($_POST['me_firstname'])) {
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
				}
				else if(isset($_POST['starter_habitat'])) {
					$starter_habitat = $_POST['starter_habitat'];
					$sql_insert = "INSERT INTO owned_habitats (user_id, owned_habitat, yesNo) VALUES ('" . $me_id  . "', '" . $starter_habitat . "', 'yes')";
					mysqli_query($conn, $sql_insert);
				}
			}
		}
		//else if(mysqli_num_rows($result_owner)>0){
				//load main game
		//}
?>