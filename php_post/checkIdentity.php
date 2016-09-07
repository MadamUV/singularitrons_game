<?php
    include '../php_extras/connect.php';
    if(isset($_POST['me_id'])) {
		$me_id = $_POST['me_id'];
        $sql = "SELECT * FROM levels WHERE user_id='" . $me_id . "' LIMIT 1";
		$sql_user = "SELECT * FROM users WHERE user_id='" . $me_id . "' LIMIT 1";
		$result_user = mysqli_query($conn, $sql_user);
        $result1 = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result1);
		$sql_owner = "SELECT * FROM botid WHERE user_id='" . $me_id . "'";
		$result_owner = mysqli_query($conn, $sql_owner);
		$sql_habitat = "SELECT * FROM ownedhabitats WHERE user_id='" . $me_id . "'";
		$result_habitat = mysqli_query($conn, $sql_habitat);
		$emoteToggleSentence = '<label for="sentence_text" id="sentence_label">Say something: <input name="sentence_text" id="sentence_text" type="text"/></label><button id="submitSentence">Submit sentence</button><br><div id="robots"></div><div id="sentence"></div>';
		$emotes = '<div id="emotes"><table cellpadding="5">
			<tr>
				<td>General icons</td>
				<td><img src="icons/caution.png" alt="caution"><br>/caution</td>
				<td><img src="icons/heart.png" alt="heart"><br>/heart</td>
				<td><img src="icons/inside.png" alt="inside"><br>/inside</td>
				<td><img src="icons/outside.png" alt="outside"><br>/outside</td>
				<td><img src="icons/musical_note.png" alt="music"><br>/music</td>
				<td><img src="icons/shamrock.png" alt="shamrock"><br>/shamrock</td>
			</tr>
			<tr>
				<td><img src="icons/redo.png" alt="redo"><br>/redo</td>
				<td><img src="icons/undo.png" alt="undo"><br>/undo</td>
				<td><img src="icons/star.png" alt="star"><br>/star</td>
				<td><img src="icons/touch_phone.png" alt="phone"><br>/phone</td>
				<td><img src="icons/waiting.png" alt="time"><br>/time</td>
				<td><img src="icons/wider.png" alt="wider"><br>/wider</td>
				<td><img src="icons/taller.png" alt="taller"><br>/taller</td>
			</tr>
			<tr>
				<td>Weather icons</td>
				<td><img src="icons/Ice.png" alt="ice"><br>/ice</td>
				<td><img src="icons/Overcast.png" alt="clouds"><br>/clouds</td>
				<td><img src="icons/Rainbow.png" alt="rainbow"><br>/rainbow</td>
				<td><img src="icons/Sunny.png" alt="sun"><br>/sun</td>
				<td><img src="icons/fire.png" alt="fire"><br>/fire</td>
			</tr>
			<tr>
				<td>Emotes</td>
				<td><img src="icons/afraid.png" alt="afraid"><br>/afraid</td>
				<td><img src="icons/happy.png" alt="happy"><br>/happy</td>
				<td><img src="icons/delighted.png" alt="delighted"><br>/delighted</td>
				<td><img src="icons/disgusted.png" alt="disgusted"><br>/disgusted</td>
				<td><img src="icons/angry.png" alt="angry"><br>/angry</td>
				<td><img src="icons/confused.png" alt="confused"><br>/confused</td>
			</tr>
			<tr>
				<td><img src="icons/miserable.png" alt="miserable"><br>/miserable</td>
				<td><img src="icons/surprised.png" alt="surprised"><br>/surprised</td>
				<td><img src="icons/sad.png" alt="sad"><br>/sad</td>
			</tr>
			<tr>
				<td>Animals</td>
				<td><img src="icons/bird_contour.png" alt="bird"><br>/bird</td>
				<td><img src="icons/bull_contour.png" alt="bull"><br>/bull</td>
				<td><img src="icons/cat_contour.png" alt="cat"><br>/cat</td>
				<td><img src="icons/cow_contour.png" alt="cow"><br>/cow</td>
				<td><img src="icons/duck_contour.png" alt="duck"><br>/duck</td>
			</tr>
			<tr>
				<td><img src="icons/elephant_contour.png" alt="elephant"><br>/elephant</td>
				<td><img src="icons/fish_contour.png" alt="fish"><br>/fish</td>
				<td><img src="icons/horse_contour.png" alt="horse"><br>/horse</td>
				<td><img src="icons/ladybug_contour.png" alt="ladybug"><br>/ladybug</td>
				<td><img src="icons/leopard_contour.png" alt="leopard"><br>/leopard</td>
				<td><img src="icons/lion_contour.png" alt="lion"><br>/lion</td>
			</tr>
			<tr>
				<!-- commenting a few out 
				<td><img src="icons/lobster_contour.png" alt="lobster"></td>
				<td><img src="icons/rabbit_contour.png" alt="rabbit"></td>
				<td><img src="icons/snail_contour.png" alt="snail"></td> -->
				<td><img src="icons/turtle_contour.png" alt="turtle"><br>/turtle</td>
			</tr>
			<tr>
				<td>Numbers</td>
				<td><img src="icons/zero.png" alt="zero"><br>/zero</td>
				<td><img src="icons/one.png" alt="one"><br>/one</td>
				<td><img src="icons/two.png" alt="two"><br>/two</td>
				<td><img src="icons/three.png" alt="three"><br>/three</td>
				<td><img src="icons/four.png" alt="four"><br>/four</td>
			</tr>
			<tr>
				<td></td>
				<td><img src="icons/five.png" alt="five"><br>/five</td>
				<td><img src="icons/six.png" alt="six"><br>/six</td>
				<td><img src="icons/seven.png" alt="seven"><br>/seven</td>
				<td><img src="icons/eight.png" alt="eight"><br>/eight</td>
				<td><img src="icons/nine.png" alt="nine"><br>/nine</td>
			</tr>
		</table>
		</div>';
		//conditionals begin
		if(mysqli_num_rows($result1)==0 && isset($_POST['me_firstname'])){
        	$me_firstname = $_POST['me_firstname'];
			$sql_insert = "INSERT INTO levels (user_id, first_name, level) VALUES ('" . $me_id  . "',  '" . $me_firstname ."','0')";
			mysqli_query($conn, $sql_insert); 
			echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/pseudobotPack.png" class="pseudo" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div><div id="confirm_or_not"></div>';
        }
		else if(mysqli_num_rows($result_user)==0){
			if(!isset($_POST['starter_bot'])) {
				echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>You are about to be a<br>proud owner of a Singularitron robot!<br>Please select your starter pack from the right!</div><div id="starter_item"><img src="assets_and_scenes/robotMain.png" class="pseudo" alt="seven hundred power coins and one pseudobot"></div><div id="starter_buttons"><button id="select_starter">Select starter item</button><br><button id="next_starter">Next starter item</button></div>';
			}
			else if(isset($_POST['starter_bot']) && !(isset($_POST['starter_name']))) {
				$starter_bot = $_POST['starter_bot'];
				if($starter_bot=="pseudo") {
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='pseudo'/>";
					$bot_image = '<img src="assets_and_scenes/pseudobotPack.png" alt="pseudobot preview">';
				}
				else if($starter_bot=="connect"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='connect'/>";
					$bot_image = '<img src="assets_and_scenes/connectPack.png" alt="connectotalx preview">';
				}
				else if($starter_bot=="molly"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='molly'/>";
					$bot_image = '<img src="assets_and_scenes/mollyPack.png" alt="mollybot preview">';
				}
				else if($starter_bot=="fred"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='fred'/>";
					$bot_image = '<img src="assets_and_scenes/fredPack.png" alt="clever fred preview">';
				}
				echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Now select your starter robot\'s name:<br><input id="robot_name" name="robot_name" type="text"/><br><div id="check_this_name"></div></div><div id="starter_name">' . $bot_image . '</div><button id="select_name">Enter name</button>' . $starter_bot_thing;
				$sql_namer = "INSERT INTO users (user_id, type_of_first_robot) VALUES ('" . $me_id  . "', '" . $starter_bot . "')";
				mysqli_query($conn, $sql_namer);
			}
		}
		else if(mysqli_num_rows($result_user)>0 && mysqli_num_rows($result_owner)==0 && mysqli_num_rows($result_habitat)==0){
			$starter_row = mysqli_fetch_assoc($result_user);
			$starter_bot = $starter_row['type_of_first_robot'];
			if(isset($_POST['me_firstname'])) {
				if($starter_bot=="pseudo") {
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='pseudo'/>";
					$bot_image = '<img src="assets_and_scenes/pseudoPack.png" alt="pseudobot preview">';
				}
				else if($starter_bot=="connect"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='connect'/>";
					$bot_image = '<img src="assets_and_scenes/connectPack.png" alt="connectotalx preview">';
				}
				else if($starter_bot=="molly"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='molly'/>";
					$bot_image = '<img src="assets_and_scenes/mollyPack.png" alt="mollybot preview">';
				}
				else if($starter_bot=="fred"){
					$starter_bot_thing = "<input id='starter_bot_remember' name='starter_bot_remember' type='hidden' value='fred'/>";
					$bot_image = '<img src="assets_and_scenes/fredPack.png" alt="clever fred preview">';
				}
				echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Now select your starter robot\'s name:<br><input id="robot_name" name="robot_name" type="text"/><br><div id="check_this_name"></div></div><div id="starter_name">' . $bot_image . '</div><button id="select_name">Enter name</button>' . $starter_bot_thing;
			}
			else if(isset($_POST['starter_name']) && isset($_POST['starter_bot'])) {
				$starter_bot = $_POST['starter_bot'];
				$starter_name = $_POST['starter_name'];
				$sql_insert = "INSERT INTO botid (user_id, bot_type, bot_word_type, bot_name) VALUES ('" . $me_id . "', '" . $starter_bot . "', 'default', '" . $starter_name . "')";
				mysqli_query($conn, $sql_insert);
				echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Greetings, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
			}
		}
		else if(mysqli_num_rows($result_user)>0 && mysqli_num_rows($result_owner)>0 && mysqli_num_rows($result_habitat)==0){
			if(isset($_POST['me_firstname'])){
				echo '<img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Welcome!</font><br>Welcome back, my friend!<br>Please select your<br> robot habitat from the right!</div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.jpg" alt="spaceship" class="spaceship"></div><div id="starter_habitat_buttons"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat choice</button></div>';
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
							echo '<img src="assets_and_scenes/singular_spaceship_time.gif" alt="spaceship with flaming exhaust">' . $emoteToggleSentence . $emotes;
						}
						else if($row_habitat["habitat"]=="backyard"){
							echo '<img src="assets_and_scenes/singular_backyard.gif" alt="green grassy backyard">' . $emoteToggleSentence . $emotes;
						}
						else if($row_habitat["habitat"]=="city"){
							echo '<img src="assets_and_scenes/singularitrons_roadway3.png" alt="busy city with window lights">' . $emoteToggleSentence . $emotes;
						}
						else if($row_habitat["habitat"]=="lab"){
							echo '<img src="assets_and_scenes/singularitrons_mad_science.gif" alt="green grassy backyard">' . $emoteToggleSentence . $emotes;
						}
					}
				}
			}
		}
		else if(mysqli_num_rows($result_habitat)>0 && mysqli_num_rows($result_user)>0 && mysqli_num_rows($result_owner)>0){
				//load main game		
			while ($row_habitat = mysqli_fetch_assoc($result_habitat)) {
				if($row_habitat["yes_no"]=="yes"){
					if($row_habitat["habitat"]=="spaceship"){
						echo '<img src="assets_and_scenes/singular_spaceship_time.gif" alt="spaceship with flaming exhaust">' . $emoteToggleSentence . $emotes;
					}
					else if($row_habitat["habitat"]=="backyard"){
						echo '<img src="assets_and_scenes/singular_backyard.gif" alt="green grassy backyard">' . $emoteToggleSentence . $emotes;
					}
					else if($row_habitat["habitat"]=="city"){
						echo '<img src="assets_and_scenes/singularitrons_roadway3.png" alt="busy city with window lights">' . $emoteToggleSentence . $emotes;
					}
					else if($row_habitat["habitat"]=="lab"){
						echo '<img src="assets_and_scenes/singularitrons_mad_science.gif" alt="green grassy backyard">' . $emoteToggleSentence . $emotes;
					}
				}
			}
		}
	}
?>
