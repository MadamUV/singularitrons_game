<?php
	//a b c d e f g h i j k l m n o p
if (isset($_POST['comb'])) {
	if(isset($_POST['me_id'])) {
		include '../php_extras/connect.php';
		$comb_original = $_POST['comb'];
		$me_id = $_POST['me_id'];
		$sql = "SELECT * FROM botid WHERE user_id='" . $me_id . "' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		//either way I have to export to JSON
		$check_against = array("/caution" => '<img src="icons/caution.png" alt="caution">', "/heart" => '<img src="icons/heart.png" alt="heart">', "/inside" => '<img src="icons/inside.png" alt="inside">', "/music" => '<img src="icons/musical_note.png" alt="music">', "/shamrock" => '<img src="icons/shamrock.png" alt="shamrock">', "/redo" => '<img src="icons/redo.png" alt="redo">', "/undo" => '<img src="icons/undo.png" alt="undo">', "/star" => '<img src="icons/star.png" alt="star">', "/phone" => '<img src="phone/caution.png" alt="phone">', "/time" => '<img src="icons/waiting.png" alt="time">', "/wider" => '<img src="icons/wider.png" alt="wider">', "/taller" => '<img src="icons/taller.png" alt="taller">', "/ice" => '<img src="icons/Ice.png" alt="ice">', "clouds" => '<img src="icons/Overcast.png" alt="clouds">', "/rainbow" => '<img src="icons/Rainbow.png" alt="rainbow">', "/sun" => '<img src="icons/Sunny.png" alt="sun">', "/fire" => '<img src="icons/fire.png" alt="fire">', "/afraid" => '<img src="icons/afraid.png" alt="afraid">', "/happy" => '<img src="icons/happy.png" alt="happy">', "/delighted" => '<img src="icons/delighted.png" alt="delighted">', "/disgusted" => '<img src="icons/disgusted.png" alt="disgusted">', "/angry" => '<img src="icons/angry.png" alt="angry">', "/confused" => '<img src="icons/confused.png" alt="confused">', "/bird" => '<img src="icons/bird_contour.png" alt="bird">', "/bull" => '<img src="icons/bull_contour.png" alt="bull">', "/cat" => '<img src="icons/cat_contour.png" alt="cat">', "/cow" => '<img src="icons/cow_contour.png" alt="cow">', "/duck" => '<img src="icons/duck_contour.png" alt="duck">', "/elephant" => '<img src="icons/elephant_contour.png" alt="elephant">', "/fish" => '<img src="icons/fish_contour.png" alt="fish">', "/horse" => '<img src="icons/horse_contour.png" alt="horse">', "/ladybug" => '<img src="icons/ladybug_contour.png" alt="ladybug">', "/leopard" => '<img src="icons/leopard_contour.png" alt="leopard">', "/lion" => '<img src="icons/lion_contour.png" alt="lion">', "/zero" => '<img src="icons/zero.png" alt="zero">', "/one" => '<img src="icons/one.png" alt="one">', "/two" => '<img src="icons/two.png" alt="two">', "/three" => '<img src="icons/three.png" alt="three">', "/four" => '<img src="icons/four.png" alt="four">', "/five" => '<img src="icons/five.png" alt="five">', "/six" => '<img src="icons/six.png" alt="six">', "/seven" => '<img src="icons/seven.png" alt="seven">', "/eight" => '<img src="icons/eight.png" alt="eight">', "/nine" => '<img src="icons/nine.png" alt="nine">', "/miserable" => '<img src="icons/miserable.png" alt="miserable">', "/surprised" => '<img src= "icons/surprised.png" alt="surprised">', "/outside" => '<img src="icons/outside.png" alt="outside">', "/sad" => '<img src="icons/sad.png" alt="sad">');
		$comb_unoriginal = $comb_original;
		/*
		//replace the image sources with the word they represent, preceded by a backslash.
		foreach($check_against as $key => $value) {
			$comb_unoriginal = str_replace($value, " " . $key . " ", $comb_unoriginal);
		}
		//remove extra spaces*/
		$comb_unoriginal = preg_replace("/\s+/", " ", $comb_unoriginal);
		//convert apostrophes and quotes
		$remove_punctuation = array("'", '"');
		$comb_unoriginal = str_replace($remove_punctuation, "\"", $comb_unoriginal);
		$icons_written = array();
		foreach($check_against as $key => $value) {
			if(strpos($comb_unoriginal, $value) != false){
				$comb_unoriginal = str_replace($value, $key, $comb_unoriginal); //replaced directly from $comb_unoriginal instead of $comb1
				array_push($icons_written, $key);
			}
		}
		$comb1 = explode(" ", $comb_unoriginal);
                //
                //
                //
                
            function combinations($input_array, $row) {
				$main_array = array();
                if(count($input_array)!==0 && count($input_array)<=12) {
                    if(count($input_array)===1) {
                        $main_array = array($input_array[0]);
                    }
                    else if(count($input_array)===2){
                        $main_array = array(
                                        array($input_array[0], "____"),
                                        array("____", $input_array[1]),
                                        $input_array
                                      );
                    }
                    else if(count($input_array)===3){
                        $main_array = array(
                                        array($input_array[0], "____"),
                                        array("____", $input_array[1], "____"),
                                        array($input_array[0], $input_array[1], "____"),
                                        array("____", $input_array[1], $input_array[2]),
                                        array($input_array[0], "____", $input_array[2]),
                                        $input_array
                                      );
                    }// use array_unique for duplicate inner arrays later
                    else if(count($input_array)===4){
                        $main_array = array(
                                        array($input_array[0], "____"),
                                        array("____", $input_array[1], "____"),
                                        array("____", $input_array[2], "____"),
                                        array("____", $input_array[3]),
                                        array($input_array[0], $input_array[1], "____"),
                                        array("____", $input_array[1], $input_array[2], "____"),
                                        array("____", $input_array[2], $input_array[3]),
                                        array("____", $input_array[1], $input_array[2], $input_array[3]),
                                        array($input_array[0], "_____", $input_array[2], $input_array[3]),
                                        array($input_array[0], "_____", $input_array[2], "____"),
                                        array($input_array[0], "_____", $input_array[3]),
                                        $input_array
                                      );
                    }
                    if(count($input_array)>4){
							$main_array = array();
                            
                            $first = array("____", $input_array[2], "____");
							$second = array("____", $input_array[3], "____");
							$third = array("____", $input_array[4]);
							$fourth = array("____", $input_array[1], "____", $input_array[3], "____");
							$fifth = array("____", $input_array[2], "____", $input_array[4]);
							$sixth = array($input_array[0], $input_array[1], "____", $input_array[3], "____");
							$seventh = array($input_array[0], "____", $input_array[2], $input_array[3], "____");
                            array_push($main_array, $first, $second, $third, $fourth, $fifth, $sixth, $seventh);
							$other_first = array($input_array[0], $input_array[1], "____", $input_array[3], $input_array[4]);
					}
							if(count($input_array)===5){
								array_push($main_array, $other_first);
							}
							
                            if(count($input_array)>5){
								$first = array($input_array[0], $input_array[1], "____", $input_array[4], $input_array[5]);
								$second = array("____", $input_array[5]);
								$third = array($input_array[0], "____");
								$fourth = array("____", $input_array[5]);
                                array_push($main_array, $first, $second, $third, $fourth);
								//Only if the input is exactly six do we array_push these values
								$other_first = array("____", $input_array[1], "____", $input_array[4], $input_array[5]);
								$other_second = array("____", $input_array[4], $input_array[5]);
								if(count($input_array)===6){
									array_push($main_array, $other_first, $other_second);
								}
                            }
                            if(count($input_array)>6){
                                    array_push($main_array, array("____", $input_array[5], $input_array[6]), array("____", $input_array[1], "____", $input_array[5], $input_array[6]), array($input_array[0], $input_array[1], $input_array[3], $input_array[4], "____", $input_array[5]), array("____", $input_array[2], $input_array[3], $input_array[4], "____", $input_array[6]), array($input_array[0], "____"), array("____", $input_array[6]), array("____", $input_array[4], $input_array[5], $input_array[6]), array("____", $input_array[4], "____", $input_array[6]));
                            }
                            if(count($input_array)>7){
                                array_push($main_array, array("____", $input_array[6], $input_array[7]), array("____", $input_array[5], "____", $input_array[7]), array("____", $input_array[4], $input_array[5], $input_array[6], $input_array[7]), array("____", $input_array[3], $input_array[4], "____", $input_array[7]), array("____", $input_array[7]), array("____", $input_array[4], $input_array[5], "____", $input_array[7]), array("____", $input_array[4], "____", $input_array[6], $input_array[7]), array($input_array[0], "____", $input_array[7]), array($input_array[1], "____", $input_array[7]), array($input_array[2], "____", $input_array[7]), array($input_array[4], "____", $input_array[7]));
                            }
                            if(count($input_array)>8){
								$other_first = array("____", $input_array[5], "____", $input_array[8]);
								if(count($input_array)===9){
									array_push($main_array, $other_first);
								}
								$first = array("____", $input_array[7], $input_array[8]);
								$second = array("____", $input_array[3], $input_array[4], "____", $input_array[8]);
								$third = array("____", $input_array[7]);
								$fourth = array("____", $input_array[4], $input_array[5], "____", $input_array[8]);
								$fifth = array("____", $input_array[5], $input_array[6], $input_array[7], $input_array[8]);
								$sixth = array($input_array[0], "____", $input_array[8]);
								$seventh = array("____", $input_array[1], "____", $input_array[8]);
								$eighth = array("____", $input_array[2], "____", $input_array[8]);
								$ninth = array("____", $input_array[1], $input_array[2], "____", $input_array[5], $input_array[6], $input_array[7], "____");
								$tenth = array("____", $input_array[4], "____", $input_array[8]);
								$eleventh = array("____", $input_array[0], $input_array[1], "____", $input_array[8]);
                                array_push($main_array, $first, $second, $third, $fourth, $fifth, $sixth, $seventh, $eighth, $ninth, $tenth, $eleventh);
                            }
                            if(count($input_array)===10){
                                array_push($main_array, array("____", $input_array[8], $input_array[9]), array("____", $input_array[5], $input_array[6], "____", $input_array[8], $input_array[9]), array($input_array[0], $input_array[1], $input_array[2], "____", $input_array[6], $input_array[7], $input_array[8], "____"), array("____", $input_array[3], $input_array[4], "____", $input_array[8]), array("____", $input_array[9]), array("____", $input_array[4], $input_array[5], "____", $input_array[9]), array("____", $input_array[5], $input_array[6], $input_array[7], "____", $input_array[9]), array("____", $input_array[0], "____", $input_array[9]), array("____", $input_array[1], "____", $input_array[9]), array("____", $input_array[2], "____", $input_array[9]), array("____", $input_array[4], "____", $input_array[8], $input_array[9]), array($input_array[0], "____", $input_array[2], "____", $input_array[9]));
                            }
                            if(count($input_array)>10){
                                if(count($input_array)===11){
									array_push($main_array, array("____", $input_array[7], $input_array[8], $input_array[9], $input_array[10]), array("____", $input_array[8], "____", $input_array[10]), array("____", $input_array[3], $input_array[4], "____", $input_array[8]), array("____", $input_array[9]), array("____", $input_array[4], $input_array[5], "____", $input_array[9]), array("____", $input_array[5], $input_array[6], $input_array[7], "____", $input_array[10]), array($input_array[0], "____", $input_array[10]), array("____", $input_array[1], "____", $input_array[9], $input_array[10]), array("____", $input_array[2], "____", $input_array[10]), array("____", $input_array[4], "____", $input_array[8], $input_array[9], $input_array[10]), array($input_array[0], "____", $input_array[6], "____", $input_array[10]));
									 }
								array_push($main_array, array($input_array[0], $input_array[1], $input_array[2], "____", $input_array[6], $input_array[7], $input_array[8], "____"));

                            }
                            if(count($input_array)>11){
								array_push($main_array, array($input_array[0], $input_array[1], "____", $input_array[9], $input_array[10], "____"));
								if(count($input_array)===12){	
                                    array_push($main_array, array("____", $input_array[4], "____", $input_array[9], $input_array[10], $input_array[11]), array("____", $input_array[9], "____", $input_array[11]), array("____", $input_array[3], $input_array[4], "____", $input_array[8]), array("____", $input_array[9]), array("____", $input_array[4], $input_array[5], "____", $input_array[9]), array("____", $input_array[3], $input_array[4], $input_array[5], $input_array[6], $input_array[7], "____", $input_array[11]), array($input_array[0], "____", $input_array[11]), array("____", $input_array[1], "____", $input_array[9], $input_array[10]), array("____", $input_array[3], "____", $input_array[11]), array("____", $input_array[6], "____", $input_array[8], $input_array[9], $input_array[10], $input_array[11]), array($input_array[0], "____", $input_array[4], $input_array[5], "____", $input_array[10], $input_array[11]));
								}
                            }
					}
				else if(count($input_array)>12 && count($input_array)<20){
				    if($row["bot_word_type"]=="gold"){
						for($i=0; $i<count($input_array)-2; $i++){
							$sub_array = $input_array;
							$rand = rand(1, count($input_array)-10);
							$rand2 = rand(0, count($input_array)-1); //array_splice offset
							$rand3 = rand(1, 3); //array_splice length
							while(count(array_unique($sub_array))>4){ //while sentence retains approximately 1 to 8 words besides blanks
							$sub_array = array_splice($input_array, $rand2, $rand3, "____");
								if($input_array[0] != $sub_array[0] && $sub_array[0] != "____"){
									array_unshift($sub_array,  "____");
								}
								if($input_array[count($input_array)-1] != $sub_array[count($sub_array)-1]){
									array_push($sub_array, "____");
								}
							}
							if(array_unique($sub_array) != array("____") && !(in_array($sub_array, $main_array)) && count($sub_array)>0){
								$sub_array2 = array($sub_array[0]);
								for($nth=1; $nth<count($sub_array); $nth++){
									if(!($sub_array[$nth-1]=="____" && $sub_array[$nth]=="____")){
										array_push($sub_array2, $sub_array[$nth]);
									}
								}
								array_push($main_array, $sub_array2);
							}
							$sub_array = $input_array;
							$rand_middle = rand(count($input_array)-11, count($input_array)-7);
							$rand_middle_length = rand (1, 6);
							$sub_array = array_splice($sub_array, $rand_middle, $rand_middle_length, "____");
							if(array_unique($sub_array) != array("____") && !(in_array($sub_array, $main_array))){
								array_push($main_array, $sub_array);
							}
						}
					}
				}
				return $main_array;
            }
		/*
			Make sure at some point to separate one robot's json from another
			And sell coins to buy robots that can listen to sentence that are 20 to 30 words long
			Robots can't interact with each other in the same room. Have user pick which robot to talk to on login.
			Robots must be named. The name in combination with the Facebook user id key will identify the robot.
			No two robots belonging to anyonne can have the same name. If a name is taken, popup an alert.
			Bot name should not exceed 20 characters.
		*/
			$the_array = combinations($comb1, $row);
			foreach ($the_array as $combinations_for_table){
				$encode = json_encode($combinations_for_table);
				print_r($the_array);
				if(count($icons_written)>0 && count($the_array)>0){
					$encode2 = json_encode($icons_written);
					$sql_select = "SELECT * FROM `json_additions` WHERE `addition`='" . $encode . "' AND `icons`='" . $encode2 . "'";
					$result_select = mysqli_query($conn, $sql_select);
					$item_with_less = json_decode($row2["addition"]);
					for($g=0; $g<count($item_with_less); $g++){
						$added_blank = array_splice($item_with_less, $g, 0, "____");
						$encode3 = json_encode($added_blank);
						$sql_select2 = "SELECT * FROM `json_additions` WHERE addition='" . $encode3 . "' AND icons='" . $encode2 . "'";
						$result_select2 = mysqli_query($conn, $sql_select2);
						while($row2 = mysqli_fetch_assoc($result_select2)){
							if($added_blank == $combinations_for_table && mysqli_num_rows($result_select)==0){
								$sql = "INSERT INTO json_additions (addition, icons) VALUES ('" . $encode3 . "', '" . $encode2 . "')";
								mysqli_query($conn, $sql);
							}
						}
					}
					if(mysqli_num_rows($result_select)==0){
						$sql = "INSERT INTO json_additions (addition, icons) VALUES ('" . $encode . "', '" . $encode2 . "')";
						mysqli_query($conn, $sql);
					}
					else {
						$sql = "INSERT INTO json_additions (addition, icons) VALUES ('" . $encode . "', 'none')";
						mysqli_query($conn, $sql);
					}
				}
            }
			//put next code here
			$meaning_array = array(
			"/bird" => array("cuteness" => 8, "vivacity" => 10, "power" => -3, "width" => 2, "height" => 2),
			"/leopard" => array("speed" => 9, "power" => 10, "social" => -5, "width" => 4, "height" => 3),
			"/caution" => array("speed" => -9, "vivacity" => 7),
			"/heart" => array("social" => 10, "communication" => 10, "inside" => 10, "love" => 10, "desire" => 9, "temperature" => 8),
			"/inside" => array("outside" => -10),
			"/outside" => array("outside" => 10),
			"/music" => array("social" => 10, "communication" => 9),
			"/shamrock" => array("luck" => 10, "width" => 1, "height" => 1),
			//undo and redo have special functional meaning
			"/star" => array("popularity" => 10, "desire" => 9, "hope" => 4, "distance" => 10),
			"/phone" => array("communication" => 10, "social" => 10),
			//time will have a special function, as well
			"/wider" => array("vertical" => -10, "width" => 10),
			"/taller" => array("vertical" => 10, "height" => 10),
			"/ice" => array("kindness" => -10, "temperature" => -8, "wetness" => 0),
			"/clouds" => array("happiness" => -6, "clarity" => -4, "temperature" => 8, "wetness" => 0),
			//special function of temperature modifies wetness
			"/rainbow" => array("happiness" => 9, "distance" => 5, "hope", "holiness" => 8),
			"/sun" => array("temperature" => 10, "happiness" => 8, "distance" => 9, "holiness" => 8, "width" => 10, "height" => 10),
			"/fire" => array("temperature" => 9, "desire" => 9),
			//afraid will have special function, and happy will be in both places.
			"/happy" => array("happiness" => 7),
			"/delighted" => array("happiness" => 10),
			//disgust will have a special function
			"/angry" => array("happiness" => -9, "anger" => 10),
			"/confused" => array("clarity" => -10),
			"/miserable" => array("happiness" => -10),
			//surprrised special function
			"/sad" => array("happiness" => -8),
			"/bull" => array("vivacity" => 10, "wetness" => 0, "anger" => 8, "domestic" => -10, "width" => 6, "speed" => 6),
			"/cat" => array("wetness" => 0, "social" => -2, "love" => 3, "vivacity" => 10, "intelligence" => 7, "domestic" => 10, "width" => 3, "height" => 2),
			"/cow" => array("wetness" => 0, "vivacity" => 10, "holiness" => 9, "domestic" => -10),
			"/duck" => array("vivacity" => 10, "wetness" => 8, "cuteness" => 7, "power" => -3, "domestic" => -4),
			"/elephant" => array("wetness" => 0, "vivacity" => 10, "intelligence" => 9, "holiness" => 9, "domestic" => -10),
			"/fish" => array("wetness" => 10, "vivacity" => 10, "intelligence" => -6, "power" => -7, "domestic" => 5),
			"/horse" => array("wetness" => 0, "domestic" => 5, "vivacity" => 10, "speed" => 5),
			"/ladybug" => array("wetness" => 0, "luck" => 10, "power" => -9, "vivacity" => 10, "width" => 1, "height" => 1, "cuteness" => 9),
			"/lion" => array("wetness" => 0, "power" => 9, "vivacity" => 10, "width" => 5, "height" => 6, "speed" => 7),
			"/turtle" => array("vivacity" => 10, "speed" => -9, "power" => -7, "wetness" => 4),
			"/zero" => array("number" => 0),
			"/one" => array("number" => 1),
			"/two" => array("number" => 2),
			"/three" => array("number" => 3),
			"/four" => array("number" => 4),
			"/five" => array("number" => 5),
			"/six" => array("number" => 6),
			"/seven" => array("number" => 7),
			"/eight" => array("number" => 8),
			"/nine" => array("number" => 9)
			);
			if(count($icons_array)>0){
				$arrayempty = array();
				foreach($meaning_array as $key => $value){
					$valkey = array_keys($value);
					foreach($valkey as $key2 => $value2){
						array_push($arrayempty, $value2);
					}
				}
				$arrayfull = array_unique($arrayempty);
				$arrayfull = array_values($arrayfull);
				$array_combine_keys = array();
				$array_combine_values = array();
				$array_keyval_associatiion = array();
				//remember to prevent the bot entering the wrong data because of a repeat sentence
				foreach($meaning_array as $key => $value){ //from the list
					foreach($icons_written as $single_icon_assoc){ //all icons associated with the sentence
						foreach($arrayfull as $fullval){ // all keys from the list values
							if($key == $single_icon_assoc && in_array($fullval, array_keys($value))){ //if the key icon in the list equals one from the sentence 
								foreach($array_keyval_associatiion as $assoc){
									if(in_array($fullval, $assoc)){
										$insertion = $array_combine_values[$assoc[0]] + $value[$fullval];
										if($insertion > 10){
											$insertion = 10;
										}
										else if($insertion < -10){
											$insertion = -10;
										}
										$array_combine_values[$assoc[0]] = $insertion;
									}
									else {
										array_push($array_combine_keys, $fullval);
										array_push($array_combine_values, $value[$fullval]);
									}
									array_push($array_keyval_associatiion, array(count($array_combine_keys)-1, $fullval, $value[$fullval]));
								}
							}
						}
					}
				}
				$combined_array = array_combine($array_combine_keys, $array_combine_values);
				/* Next part is to add a field to the database for learned associations and insert these results into that field.    CHECK
				
				   After the bot (or later, bots, differentiate later), knows associations, it can make inferences by recognizing modifiers
				   Don't forget to create special functions for some of the icons that can't be expressed in associations like the others.
				   The sentences must also have a hierarchy, and this will be yet another field in the database. Since these fields are not
				   always used, they can be null.
				   if the bot detects that one sentence patterns appearance in a sentence it knows the associations of, the change in the other
				   patterns translates into a modifier of the first combo, and the modifier and it's meaning will be stored in yet another
				   field in the table that can be null. This information will need a json string containing keys being icon names and values being
				   their positive or negative change to the associative meaning, and if the change applies to all associative meanings, the key
				   becomes, "all." Remember in these cases to update and not insert into the table. If a modifying pattern is detected 4 times,
				   the datatable is updated to recognize that sentence combination as a modifier. Actually, these "can be null" operations shouuld
				   be put in a separate table, since there can't be replicas there like there are in the table that's just for associating word combos
				   with icons.
				   When adding modifier meanings to the json string, decode it, modify it, re-encode it, and update the field in the datatable.
				   Add another field as an integer to represent whether or not the entry is a modifier
				*/
			}
		}
	}

?>
