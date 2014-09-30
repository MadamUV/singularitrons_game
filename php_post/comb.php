<?php
	//a b c d e f g h i j k l m n o p
if (isset($_POST['comb'])){
	if(isset($_POST['me_id'])) {
		include '../php_extras/connect.php';
		$comb_original = $_POST['comb'];
		//either way I have to export to JSON
		$check_against = array("/caution" => '<img src="icons/caution.png" alt="caution">', "/heart" => '<img src="icons/heart.png" alt="heart">', "/inside" => '<img src="icons/inside.png" alt="inside">', "/music" => '<img src="icons/musical_note.png" alt="music">', "/shamrock" => '<img src="icons/shamrock.png" alt="shamrock">', "/redo" => '<img src="icons/redo.png" alt="redo">', "/undo" => '<img src="icons/undo.png" alt="undo">', "/star" => '<img src="icons/star.png" alt="star">', "/phone" => '<img src="phone/caution.png" alt="phone">', "/time" => '<img src="icons/waiting.png" alt="time">', "/wider" => '<img src="icons/wider.png" alt="wider">', "/taller" => '<img src="icons/taller.png" alt="taller">', "/ice" => '<img src="icons/Ice.png" alt="ice">',  "clouds" => '<img src="icons/Overcast.png" alt="clouds">', "/rainbow" => '<img src="icons/Rainbow.png" alt="rainbow">', "/sun" => '<img src="icons/Sunny.png" alt="sun">', "/fire" => '<img src="icons/fire.png" alt="fire">', "/afraid" => '<img src="icons/afraid.png" alt="afraid">', "/happy" => '<img src="icons/happy.png" alt="happy">', "/delighted" => '<img src="icons/delighted.png" alt="delighted">', "/disgusted" => '<img src="icons/disgusted.png" alt="disgusted">', "/angry" => '<img src="icons/angry.png" alt="angry">', "/confused" => '<img src="icons/confused.png" alt="confused">', "/bird" => '<img src="icons/bird_contour.png" alt="bird">', "/bull" => '<img src="icons/bull_contour.png" alt="bull">', "/cat" => '<img src="icons/cat_contour.png" alt="cat">', "/cow" => '<img src="icons/cow_contour.png" alt="cow">', "/duck" => '<img src="icons/duck_contour.png" alt="duck">', "/elephant" => '<img src="icons/elephant_contour.png" alt="elephant">', "/fish" => '<img src="icons/fish_contour.png" alt="fish">', "/horse" => '<img src="icons/horse_contour.png" alt="horse">', "/ladybug" => '<img src="icons/ladybug_contour.png" alt="ladybug">', "/leopard" => '<img src="icons/leopard_contour.png" alt="leopard">', "/lion" => '<img src="icons/lion_contour.png" alt="lion">', "/zero" => '<img src="icons/zero.png" alt="zero">', "/one" => '<img src="icons/one.png" alt="one">', "/two" => '<img src="icons/two.png" alt="two">', "/three" => '<img src="icons/three.png" alt="three">', "/four" => '<img src="icons/four.png" alt="four">', "/five" => '<img src="icons/five.png" alt="five">', "/six" => '<img src="icons/six.png" alt="six">', "/seven" => '<img src="icons/seven.png" alt="seven">', "/eight" => '<img src="icons/eight.png" alt="eight">', "/nine" => '<img src="icons/nine.png" alt="nine">', "/miserable" => '<img src="icons/miserable.png" alt="miserable">', "/surprised" => '<img src= "icons/surprised.png" alt="surprised">', "/outside" => '<img src="icons/outside.png" alt="outside">', "/sad" => '<img src="icons/sad.png" alt="sad">');
		$comb_unoriginal = $comb_original;
		$icons_written = array();
		$icons_key = array();
		//replace the image sources with the word they represent, preceded by a backslash.
		foreach($check_against as $key => $value){
			$comb_unoriginal = str_replace($value, " " . $key . " ", $comb_unoriginal);
		}
		//remove extra spaces
		$comb_unoriginal = preg_replace("/\s+/", " ", $comb_unoriginal);
		//convert apostrophes and quotes
		$remove_punctuation = array("'", '"');
		$comb_unoriginal = str_replace($remove_punctuation, "\"", $comb_unoriginal);
		$comb1 = explode(" ", $comb_unoriginal);
		$keys = array_keys($check_against);
		for($m=0; $m<count($comb1); $m++){
			foreach($keys as $key){
				if($comb1[$m]==$key){
					array_push($icons_written, $key);
					array_push($icons_key, $m);
				}
			}
		}
		$num = count($comb1);
		$comb = array();
		for($a=0; $a<$num; $a++){
			array_push($comb, $a);
		}
		///$comb has right number of numbers
			$two_pow = pow(2, $num);
			$pow_array = array();
			$rand = array();
			for($a=0; $a<26; $a++){
				array_push($rand, rand(2, $two_pow));
			}
			for($b=0; $b<count($rand); $b++){
				$decbin = decbin($rand[$b]);
				array_push($pow_array, str_split($decbin));
			}
			print_r($pow_array);
			if(count($pow_array>$num)){
				array_slice($pow_array, $num);
			}
			//bad: print_r($pow_array);
			//
			//
			//
			
			$combination_final = array();
			$combination_single = array();
			for($a=0; $a<count($pow_array); $a++){
				foreach($pow_array[$a] as $key => $value){
						if($value===0){
							array_push($combination_single, "____");
						}
						else if($value===1){
							array_push($combination_single, $comb1[$key]);
						}
				}
				array_push($combination_final, $combination_single);
			}
		$icons_encode = implode(",", $icons_written);
		foreach($combination_final as $combination_each){
			$encode = json_encode($combination_each);
			$sql = "INSERT INTO json_additions (addition, icons) VALUES ('".$encode."', '".$icons_encode."')";
			mysqli_query($conn, $sql);
		}
		//add me_id in similar table
	}
}
?>