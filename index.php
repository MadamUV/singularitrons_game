<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Singularitrons</title>
        <link rel="stylesheet" href="../style.css" type="text/css" media="screen">
        <script src="../scripts/jquery.js"></script>
</head>
<body>
        <div id="callback"><img src="assets_and_scenes/singular_singularitrons2_3.jpg" alt="singulatrons have arrived and the robots want companionship and to talk"></div>
        <script>
		
		$(document).ready(function(){
			$("#emoteToggle").hide();
			$("#emotes").hide();
		});
                function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      useAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1489562004591644',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  $("#login_button").click(function(){
  	FB.login(function(response){
    	statusChangeCallback(response);
	});
  });
};

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // on login success
  function useAPI() {
    FB.api('/me', function(response) {
            var me_id = response.id;
            var me_firstname = response.first_name;
			var apiDiv_content = $("#apiDiv").html();
            $("#buttonDiv").html('Logged in');
            $.post("php_post/checkIdentity.php", {me_id : me_id, me_firstname : me_firstname}, function(data) {
				//if (apiDiv_content == ""){
					document.getElementById('callback').innerHTML=data;
				//}
			$("#sentence_text").keyup(function(){
				var theSentence = $(this).val();
				//replacement
				//use a for loop
				var iconArray = [["/caution", '<img src="icons/caution.png" alt="caution">'], ["/heart", '<img src="icons/heart.png" alt="heart">'], ["/inside", '<img src="icons/inside.png" alt="inside">'], ["/music", '<img src="icons/musical_note.png" alt="music">'], ["/shamrock", '<img src="icons/shamrock.png" alt="shamrock">'], ["/redo", '<img src="icons/redo.png" alt="redo">'], ["/undo", '<img src="icons/undo.png" alt="undo">'], ["/star", '<img src="icons/star.png" alt="star">'], ["/phone", '<img src="phone/caution.png" alt="phone">'], ["/time", '<img src="icons/waiting.png" alt="time">'], ["/wider", '<img src="icons/wider.png" alt="wider">'], ["/taller", '<img src="icons/taller.png" alt="taller">'], ["/ice", '<img src="icons/Ice.png" alt="ice">'], ["/clouds", '<img src="icons/Overcast.png" alt="clouds">'], ["/rainbow", '<img src="icons/Rainbow.png" alt="rainbow">'], ["/sun", '<img src="icons/Sunny.png" alt="sun">'], ["/fire", '<img src="icons/fire.png" alt="fire">'], ["/afraid", '<img src="icons/afraid.png" alt="afraid">'], ["/happy", '<img src="icons/happy.png" alt="happy">'], ["/delighted", '<img src="icons/delighted.png" alt="delighted">'], ["/disgusted", '<img src="icons/disgusted.png" alt="disgusted">'], ["/angry", '<img src="icons/angry.png" alt="angry">'], ["/confused", '<img src="icons/confused.png" alt="confused">'], ["/bird", '<img src="icons/bird_contour.png" alt="bird">'], ["/bull", '<img src="icons/bull_contour.png" alt="caution">'], ["/cat", '<img src="icons/cat_contour.png" alt="cat">'], ["/cow", '<img src="icons/cow_contour.png" alt="cow">'], ["/duck", '<img src="icons/duck_contour.png" alt="duck">'], ["/elephant", '<img src="icons/elephant_contour.png" alt="elephant">'], ["/fish", '<img src="icons/fish_contour.png" alt="fish">'], ["/horse", '<img src="icons/horse_contour.png" alt="horse">'], ["/ladybug", '<img src="icons/ladybug_contour.png" alt="ladybug">'], ["/leopard", '<img src="icons/leopard_contour.png" alt="leopard">'], ["/lion", '<img src="icons/lion_contour.png" alt="lion">'], ["/zero", '<img src="icons/zero.png" alt="zero">'], ["/one", '<img src="icons/one.png" alt="one">'], ["/two", '<img src="icons/two.png" alt="two">'], ["/three ", '<img src="icons/three.png" alt="three">'], ["/four", '<img src="icons/four.png" alt="four">'], ["/five", '<img src="icons/five.png" alt="five">'], ["/six", '<img src="icons/six.png" alt="six">'], ["/seven", '<img src="icons/seven.png" alt="seven">'], ["/eight", '<img src="icons/eight.png" alt="eight">'], ["/nine", '<img src="icons/nine.png" alt="nine">'], ["/miserable", '<img src="icons/miserable.png" alt="miserable">'], ["/surprised", '<img src= "icons/surprised.png" alt="surprised">'], ["/outside", '<img src="icons/outside.png" alt="outside">'], ["/sad", '<img src="icons/sad.png" alt="sad">']]; //alter theSentence.
				var i=0;
				var theSentenceProcessed=theSentence;
				for(i=0; i<iconArray.length; i++){
					theSentenceProcessed = theSentenceProcessed.replace(iconArray[i][0], iconArray[i][1]);
				}
				$("#sentence").html(theSentenceProcessed);
				//use src attribute 
			});
			$("#submitSentence").click(function(){
				var sentence = $("#sentence").html();
				$.post("ProfanityFilter-develop/src/mofodojodino/ProfanityFilter/Check.php", {my_sentence : sentence}, function(data){
					$("#sentence").html(data);
				});
			});
			$("#select_habitat").click(function(){
						var starter_habitat = $("#starter_habitat img").attr("class");
						$.post("php_post/checkIdentity.php", {me_id : me_id, starter_habitat : starter_habitat}, function(data3) {
					document.getElementById('callback').innerHTML=data3;
						});
					});
					$("#next_habitat").click(function(){
				//
						if($("#starter_habitat img").attr("class")=="spaceship"){
							   $("#starter_habitat img").attr("alt", "backyard").attr("class", "backyard").attr("src", "assets_and_scenes/habitat2.jpg").fadeIn();
							   $("#welcome").html('<p>Backyard lawn suitable for a<br>friendly pet robot at home.</p>');
						}
						else if($("#starter_habitat img").attr("class")=="backyard"){
							   $("#starter_habitat img").attr("alt", "city").attr("class", "city").attr("src", "assets_and_scenes/habitat3.jpg").fadeIn();
							   $("#welcome").html("<p>View of the city.</p>");
						}
						else if($("#starter_habitat img").attr("class")=="city"){
							   $("#starter_habitat img").attr("alt", "mad scientist lab").attr("class", "lab").attr("src", "assets_and_scenes/habitat4.jpg").fadeIn();
								$("#welcome").html('<p>Mad science is<br>always fun.</p>');
						}
						else {
							   $("#starter_habitat img").attr("alt", "spaceship").attr("class", "spaceship").attr("src", "assets_and_scenes/habitat1.jpg").fadeIn();
							   $("#welcome").html('<p>What better place<br>to be as a robot?</p>');
							   //Note that background images needn't be all one file. They can be layered, and
							   //while containing perhaps some flash objects for the main bacground, can also
							   //have some objects further in the foregorund for the robot to interact with.
						}
					});
			$("#select_starter").click(function(){
				var starter_bot = $("#starter_item img").attr("class");
				$.post("php_post/checkIdentity.php", {me_id : me_id, starter_bot : starter_bot}, function(data2) {
            document.getElementById('callback').innerHTML=data2;
					$("#select_habitat").click(function(){
						var starter_habitat = $("#starter_habitat img").attr("class");
						$.post("php_post/checkIdentity.php", {me_id : me_id, starter_habitat : starter_habitat}, function(data3) {
					document.getElementById('callback').innerHTML=data3;
						});
					});
					$("#next_habitat").click(function(){
				//
						if($("#starter_habitat img").attr("class")=="spaceship"){
							   $("#starter_habitat img").attr("alt", "backyard").attr("class", "backyard").attr("src", "assets_and_scenes/habitat2.jpg").fadeIn();
							   $("#welcome").html('<p>Backyard lawn suitable for a<br>friendly pet robot at home.</p>');
						}
						else if($("#starter_habitat img").attr("class")=="backyard"){
							   $("#starter_habitat img").attr("alt", "city").attr("class", "city").attr("src", "assets_and_scenes/habitat3.jpg").fadeIn();
							   $("#welcome").html("<p>View of the city.</p>");
						}
						else if($("#starter_habitat img").attr("class")=="city"){
							   $("#starter_habitat img").attr("alt", "mad scientist lab").attr("class", "lab").attr("src", "assets_and_scenes/habitat4.jpg").fadeIn();
								$("#welcome").html('<p>Mad science is<br>always fun.</p>');
						}
						else {
							   $("#starter_habitat img").attr("alt", "spaceship").attr("class", "spaceship").attr("src", "assets_and_scenes/habitat1.jpg").fadeIn();
							   $("#welcome").html('<p>What better place<br>to be as a robot?</p>');
							   //Note that background images needn't be all one file. They can be layered, and
							   //while containing perhaps some flash objects for the main bacground, can also
							   //have some objects further in the foregorund for the robot to interact with.
						}
					});
				});
            });
			//starter bots will need to have separate tables for their ids, or same table perhaps.
			$("#next_starter").click(function(){
				//
                if($("#starter_item img").attr("class")=="pseudo"){
                       $("#starter_item img").attr("alt", "four hundred fifty power coins and one Connectotalx robot").attr("class","connect").attr("src", "assets_and_scenes/connectPack.png").fadeIn();
						   $("#welcome").html('<p>Connectotalx repeats anything it hears<br>except for common cursewords.</p>');
                }
                else if($("#starter_item img").attr("class")=="connect"){
                       $("#starter_item img").attr("alt", "five hundred power coins and one Molly bot").attr("class", "molly").attr("src", "assets_and_scenes/mollyPack.png").fadeIn();
					$("#welcome").html("<p>Mollybot doesn't learn,<br>but switches personalities.</p>");
                }
                else if($("#starter_item img").attr("class")=="molly"){
                       $("#starter_item img").attr("alt", "eight hundred power coins and one Clever Fred robot").attr("class", "fred").attr("src", "assets_and_scenes/fredPack.png").fadeIn();
					$("#welcome").html('<p>Clever Fred tries to tell jokes.</p>');
                }
                else {
                    $("#starter_item img").attr("alt", "seven hundred power coins and one pseudobot").attr("class", "pseudo").attr("src", "assets_and_scenes/pseudobotPack.png").fadeIn();
					$("#welcome").html('<p>Pseudobot speaks by checking to what degree<br>a word represents something.</p>');
                }
            });
			$("#emoteToggle").click(function() {
				$("#emotes").toggle("slow");
			});
        });//take care of the conditionals in the php script	
	});
}	
       </script>
       <style>
               #welcome {
                       color: yellow;
                       position: absolute;
                       left: 30px;
                       top: 100px;
               }
			   #emoteToggle {
					postion:absolute;
					top:390px;
					left:0;
					width:745px;
			   }
			   #emotes {
					<!-- top:435px;
					left:0; -->
					width:745px;
					background-color:white;
			   }
			   #sentence {
					position:absolute;
					z-index:9;
					background-color:white;
					color:black;
					width:400px;
					height:150px;
					left:50px;
					top:50px;
			   }
               #buttonDiv {
                       background-color: cyan;
                       position: absolute;
                       left: 610px;
                       top: 345px;
                       }
				#starter_item, #starter_habitat {
						position: absolute;
						top:110px;
                               }
                       #starter_item {
						left:435px;
                       }
                       #starter_habitat {
                               left:295px;
                       }
				#starter_buttons, #starter_habitat_buttons {
						position: absolute;
						top:270px;
				}
               #starter_buttons {
					left:435px;
               }
               #starter_habitat_buttons {
                               left:295px;
               }
               button {
                       padding:6px;
               }
        </style>
        
        <div id="buttonDiv"><button id="login_button">Login</button></div>
		<div id="emotes"><table cellpadding="5">
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
		</div>
		<input id="testEmotes" name="testEmotes" value="0" type="hidden"/>
		<div id="attr">Some icons in this game were created by Aha-Soft: <a href="http://www.softicons.com/game-icons/free-game-icons-by-aha-soft">See here</a>
		<br>And some created by Icons-Land: <a href="http://www.icons-land.com">See here</a></div>
        <fb:comments href="https://www.intelligent-ecards.com/game/comments" numposts="7" colorscheme="light">
       </fb:comments>
        <div id='apiDiv'></div>
</body>
</html>
