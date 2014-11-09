<?php
	//a b c d e f g h i j k l m n o p
if (isset($_POST['comb'])) {
	if(isset($_POST['me_id'])) {
		include '../php_extras/connect.php';
		$comb_original = $_POST['comb'];
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
		foreach($check_against as $key => $value) {
			if(strpos($comb_unoriginal, $value) != false){
				$comb_unoriginal = str_replace($value, $key, $comb_unoriginal); //replaced directly from $comb_unoriginal instead of $comb1
				$icons_written = $key;
			}
		}
		$comb1 = explode(" ", $comb_unoriginal);
		print_r($comb1);
                //
                //
                //
                
                function combinations($input_array) {
                if(count($input_array)!==0) {
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
                    else if(count($input_array)>4){
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
                            if(count($input_array)>12){
                                    array_push($main_array, array("____", $input_array[6], $input_array[7], "____", $input_array[10], $input_array[11], $input_array[12]), array($input_array[0], $input_array[1], "____", $input_array[6], $input_array[10], "____"), array("____", $input_array[3], $input_array[4], "____", $input_array[8], "____"), array("____", $input_array[9], $input_array[10
									], $input_array[11], "____"), array("____", $input_array[4], $input_array[5], "____", $input_array[11], "____"));
									if(count($input_array)===12){
										array_push($main_array, array("____", $input_array[3], $input_array[4], $input_array[5], $input_array[6], $input_array[7], "____", $input_array[11]), array($input_array[0], "____", $input_array[12], $input_array[13]), array("____", $input_array[1], "____", $input_array[9], $input_array[10], $input_array[11], $input_array[12]), $input_array[13], array("____", $input_array[7], "____", $input_array[12]), array("____", $input_array[8], $input_array[9], $input_array[10], $input_array[11], $input_array[12]), array($input_array[0], "____", $input_array[5], "____", $input_array[13]));
									}
                            }
                            if(count($input_array)>13){
                                array_push($main_array,
									array($input_array[0], "____", $input_array[12], "____"),
									array("____", $input_array[2], $input_array[3], "____", $input_array[5], "____", $input_array[8], $input_array[9], $input_array[10], $input_array[11], $input_array[12], $input_array[13], "____"),
									array("____",  $input_array[12], "____")
								);
								if(count($input_array)===14){
									array_push($main_array, 
										array("____", $input_array[2], "____", $input_array[13]),
										array("____", $input_array[3], "____", $input_array[13]),
										array("____", $input_array[4], $input_array[5], $input_array[6], "____", $input_array[13]),
										array("____", $input_array[5], "____", $input_array[13]),
										array("____", $input_array[7], "____", $input_array[13]),
										array("____", $input_array[8], "____", $input_array[13]),
										array("____", $input_array[11], "____", $input_array[13]),
										array($input_array[0], "____", $input[2], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[10], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[1], "____", $input[5], "____", $input_array[9], $input_array[10], $input_array[11], $input_array[12], $input_array[13]),
										array($input_array[1], "____", $input[4], "____", $input_array[11], $input_array[12], $input_array[13]),
										array($input_array[0], "____", $input_array[10], "____", $input_array[13]),
										array("____", $input_array[2], "____", $input_array[6], $input_array[7], $input_array[8], "____", $input_array[13]),
										array("____", $input_array[5], "____", $input_array[7], $input_array[8], $input_array[9], $input_array[10], "____", $input_array[13]),
										array("____", $input_array[4], $input_array[5], $input_array[6], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[9], $input_array[10], $input_array[11], $input_array[12], $input_array[13]),
										array("____", $input_array[6], $input_array[7], $input_array[8], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[3], $input_array[4], $input_array[5], $input_array[6], "____", $input_array[13]),
										array("____", $input_array[4], "____", $input_array[10], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[1], $input_array[2], $input_array[3],  "____", $input_array[13]),
										array("____", $input_array[12], $input_array[13]),
										array("____", $input_array[9], $input_array[10], $input_array[11], "____", $input_array[13]),
										array("____", $input_array[4], $input_array[5], "____", $input_array[13]),
										array("____", $input_array[7], $input_array[8], "____", $input_array[13]),
										array("____", $input_array[3], $input_array[4], $input_array[5], $input_array[6], "____", $input_array[13]),
										array("____", $input_array[6], $input_array[7], "____", $input_array[12], $input_array[13]),
										array("____", $input_array[5], $input_array[6], "____", $input_array[10], "____", $input_array[12], $input_array[13])
									);
								}
								if(count($input_array)>14){
                                array_push($main_array,
									array("____", $input_array[2], $input_array[3], "____", $input_array[13], "____"),
									array("____", $input_array[10], $input_array[13], "____"),
									array("____",  $input_array[11], "____", $input_array[13], "____")
									);
								if(count($input_array)===15){
									array_push($main_array, 
										array("____", $input_array[3], $input_array[4], $input_array[5], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[10], $input_array[11], "____", $input_array[14]),
										array("____", $input_array[6], $input_array[7], "____", $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[2], "____", $input_array[14]),
										array("____", $input_array[4], "____", $input_array[14]),
										array("____", $input_array[9], "____", $input_array[14]),
										array("____", $input_array[10], "____", $input_array[14]),
										array($input_array[0], "____", $input[3], $input_array[4], $input_array[5], "____", $input_array[9], $input_array[10], $input_array[11], $input_array[12], $input_array[13]),
										array("____", $input_array[5], "____", $input_array[12], $input_array[13], $input_array[14]),
										array($input_array[0], "____", $input_array[2], "____", $input_array[10], $input_array[11], $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[3], $input[4], "____", $input_array[10], $input_array[11], "____", $input_array[14]),
										array($input_array[0], "____", $input_array[9], $input_array[10], $input_array[11], "____", $input_array[14]),
										array("____", $input_array[2], "____", $input_array[6], $input_array[7], $input_array[8], "____", $input_array[13]),
										array("____", $input_array[5], "____", $input_array[7], $input_array[8], $input_array[9], $input_array[10], "____", $input_array[13]),
										array("____", $input_array[2], $input_array[3], $input_array[4], $input_array[5], $input_array[6], "____", $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[10], $input_array[11], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[5], $input_array[6], $input_array[7], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[1], $input_array[2], "____", $input_array[4], $input_array[5], $input_array[6], "____", $input_array[13], $input_array[14]),
										array($input_array[0], "____", $input_array[4], $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[1], $input_array[2], $input_array[3], $input_array[4], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[11], "____", $input_array[14]),
										array("____", $input_array[9], $input_array[10], "____", $input_array[14]),
										array("____", $input_array[3], $input_array[4], $input_array[5], $input_array[6], "____", $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[7], $input_array[8], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[10], "____", $input_array[13], $input_array[14]),
										array("____", $input_array[4], $input_array[5], $input_array[6], "____", $input_array[11], $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[1], $input_array[2], "____", $input_array[11], "____", $input_array[12], $input_array[13], $input_array[14]),
										array("____", $input_array[11], "____", $input_array[14]),
										array($input_array[0], "____", $input_array[14])
									);
								}
							}
                       }
					else if (count($input_array)>15){
						return "Please enter 15 words or less so I can form small enough sentences.";
					}
                }
			}
            return $main_array;
        }
			$the_array = combinations($comb1);
				foreach ($the_array as $combinations_for_table){
					$encode = json_encode($combinations_for_table);
					if(count($icons_written)>0){
						$sql = "INSERT INTO json_additions (addition, icons) VALUES ('" . $encode . "', '" . $icons_written . "')";
						mysqli_query($conn, $sql);
					}
					else {
						$sql = "INSERT INTO json_additions (addition, icons) VALUES ('" . $encode . "', 'none')";
						mysqli_query($conn, $sql);
					}
                }
				
		}
	}

?>
