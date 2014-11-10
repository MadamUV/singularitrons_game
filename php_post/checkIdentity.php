<?php
    include '../php_extras/connect.php';
    if(isset($_POST['me_id'])) {
		$me_id = $_POST['me_id'];
        $sql = "SELECT * FROM levels WHERE user_id='" . $me_id . "' LIMIT 1";
        $result1 = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result1);
		$sql_owner = "SELECT * FROM bot_identification WHERE user_id='" . $me_id . "'";
		$result_owner = mysqli_query($conn, $sql_owner);
		$sql_habitat = "SELECT * FROM ownedhabitats WHERE user_id='" . $me_id . "'";
		$result_habitat = mysqli_query($conn, $sql_habitat);
		//conditionals begin
		if(mysqli_num_rows($result1)==0 && isset($_POST['me_firstname'])){
        	$me_firstname = $_POST['me_firstname'];
			$sql_insert = "INSERT INTO levels (user_id, first_name, level) VALUES ('" . $me_id  . "',  '" . $me_firstname ."','0')";
			mysqli_query($conn, $sql_insert); 
			echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/pseudobotPack.png" class="pseudo" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div><div id="confirm_or_not"></div>';
        }
		else if(mysqli_num_rows($result_owner)==0){
				if(!isset($_POST['starter_bot'])) {
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/robotMain.png" class="pseudo" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div>';
				}
				else if(isset($_POST['starter_bot']) && !(isset($_POST['starter_name']))) {
					$starter_bot = $_POST['starter_bot'];
					if($starter_bot=="pseudo") {
						$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='pseudo'/>";
						$bot_image = '<img src="assets_and_scenes/robotMain.png" alt="pseudobot preview">';
					}
					else if($starter_bot=="connect"){
						$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='connect'/>";
						$bot_image = '<img src="assets_and_scenes/connectotalx.png" alt="connectotalx preview">';
					}
					else if($starter_bot=="molly"){
						$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='molly'/>";
						$bot_image = '<img src="assets_and_scenes/mollybot_char.png" alt="mollybot preview">';
					}
					else if($starter_bot=="fred"){
						$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='fred'/>";
						$bot_image = '<img src="assets_and_scenes/cleverfredPack.png" alt="clever fred preview">';
					}
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Now select your starter robot\'s name:<br><input id="robot_name" name="robot_name" type="text"/><br><div id="check_this_name"></div></div><div id="starter_name">' . $bot_image . '</div><button id="select_name">Enter name</button>' . $starter_bot_thing;
				}
				else if(isset($_POST['starter_name']) && isset($_POST['starter_bot'])){
					$starter_bot = $_POST['starter_bot'];
					$starter_name = $_POST['starter_name'];
					$sql_insert = "INSERT INTO bot_identification (user_id, bot_type, bot_word_type, bot_name) VALUES ('" . $me_id . "', '" . $starter_bot . "', 'default', '" . $starter_name . "')";
					mysqli_query($conn, $sql_insert);
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
				}
			}
		else if(mysqli_num_rows($result_owner)>0 && mysqli_num_rows($result_habitat)==0){
				if(isset($_POST['me_firstname'])) {
					echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="20">Welcome<br>back!</font><br>Select your  robot\'s habitat!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
				}
				else if(isset($_POST['starter_habitat'])) {
					$starter_habitat = $_POST['starter_habitat'];
					$sql_insert = "INSERT INTO ownedhabitats (user_id, habitat, yes_no) VALUES ('" . $me_id  . "', '" . $starter_habitat . "', 'yes')";
					mysqli_query($conn, $sql_insert);
					$sql_habitat = "SELECT * FROM ownedhabitats WHERE user_id='" . $me_id . "'";
					$result_habitat = mysqli_query($conn, $sql_habitat);
							while ($row_habitat = mysqli_fetch_assoc($result_habitat)) {
						if($row_habitat["yes_no"]=="yes"){
							if($row_habitat["habitat"]=="spaceship"){
								echo '<img src="assets_and_scenes/singular_spaceship_time.gif" alt="spaceship with flaming exhaust"><div id="robots"></div>';
							}
							else if($row_habitat["habitat"]=="backyard"){
								echo '<img src="assets_and_scenes/singular_backyard.gif" alt="green grassy backyard"><div id="robots"></div>';
							}
							else if($row_habitat["habitat"]=="city"){
								echo '<img src="assets_and_scenes/singularitrons_roadway3.png" alt="busy city with window lights"><div id="robots"></div>';
							}
							else if($row_habitat["habitat"]=="lab"){
								echo '<img src="assets_and_scenes/singularitrons_mad_science.gif" alt="green grassy backyard"><div id="robots"></div>';
							}
						}
					}
				}
			}
		}
		if(mysqli_num_rows($result_habitat)>0){
			//load main game
			while ($row_habitat = mysqli_fetch_assoc($result_habitat)) {
				if($row_habitat["yes_no"]=="yes"){
					$emoteToggleSentence = '<label for="sentence_text" id="sentence_label">Say something: <input name="sentence_text" id="sentence_text" type="text"/></label><button id="submitSentence">Submit sentence</button><button id="emoteToggle">Show emote window</button><br><div id="robots"></div><div id="sentence"></div>';
					if($row_habitat["habitat"]=="spaceship"){
						echo '<img src="assets_and_scenes/singular_spaceship_time.gif" alt="spaceship with flaming exhaust">' . $emoteToggleSentence;
					}
					else if($row_habitat["habitat"]=="backyard"){
						echo '<img src="assets_and_scenes/singular_backyard.gif" alt="green grassy backyard">' . $emoteToggleSentence;
					}
					else if($row_habitat["habitat"]=="city"){
						echo '<img src="assets_and_scenes/singularitrons_roadway3.png" alt="busy city with window lights">' . $emoteToggleSentence;
					}
					else if($row_habitat["habitat"]=="lab"){
						echo '<img src="assets_and_scenes/singularitrons_mad_science.gif" alt="green grassy backyard">' . $emoteToggleSentence;
					}
				}
			}
		}
?>
