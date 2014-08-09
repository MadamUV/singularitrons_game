<?php
if(isset($_POST['mySentence'])) {
        $sent1 = $_POST['mySentence'][0];
        $sent2 = $_POST['mySentence'][1];
        $sent1 = urlencode($sent1);
        $sent2 = urlencode($sent2);
        $file1 = "audio/" . robot1_1 . ".mp3";
        $file2 = "audio/" . robot1_2 . ".mp3";
$mp3 = file_get_contents('http://translate.google.com/translate_tts?=' . $file1);
file_put_contents($file1, $mp3);
$mp3_2 = file_get_contents('http://translate.google.com/translate_tts?=' . $file2);
file_put_contents($file2, $mp3_2);
	echo $file1 . "|" . $file2;
}
?>