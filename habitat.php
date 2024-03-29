<?php
    require 'facebook/base_facebook.php';
	include 'php_extras/connect.php';
	
	$facebook = new Facebook(array(
		'appId' => '1519287708285740',
		'secret' => 'dc8cb0d2d85d55455b686f1e7ed07b3c',
		'cookie' => true
	));
	$me_id = $facebook->getUser();

        if($me_id){
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Singularitrons</title>
        <link rel="stylesheet" href="../style.css" type="text/css" media="screen">
        <script src="../scripts/jquery.js"></script>
</head>
<body>
        <div id="callback"><img src="assets_and_scenes/welcomeSingularitrons.jpg" width="745" height="389" alt="banner for singularitrons"><div id="welcome"><font size="34">Choose a habitat for your bot!</font></div><div id="starter_habitat"><img src="assets_and_scenes/habitat1.png" alt="spaceship" class="spaceship"><button id="select_habitat">Select starter habitat</button><br><button id="next_habitat">Next habitat</button></div></div>
        <script>
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
				if (apiDiv_content == ""){
					document.getElementById('callback').innerHTML=data;
				}
					$("#select_habitat").click(function(){
						var starter_bot = $("#starter_habitat img").attr("class");
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
							   $("#welcome").html("<p>View of city skycrapers.</p>");
						}
						else if($("#starter_habitat img").attr("class")=="city"){
							   $("#starter_habitat img").attr("alt", "mad scientist lab").attr("class", "mad scientist lab").attr("src", "assets_and_scenes/habitat4.jpg").fadeIn();
								$("#welcome").html('<p>Mad science is<br>always fun.</p>');
						}
						else {
							   $("#starter_habitat img").attr("alt", "spaceship").attr("class", "spaceship").attr("src", "assets_and_scenes/habitat1.png").fadeIn();
							   $("#welcome").html('<p>What better place to be as a robot?</p>');
							   //Note that background images needn't be all one file. They can be layered, and
							   //while containing perhaps some flash objects for the main bacground, can also
							   //have some objects further in the foregorund for the robot to interact with.
						}
				});
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
               #buttonDiv {
                       background-color: cyan;
                       position: absolute;
                       left: 610px;
                       top: 333px;
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
        <fb:comments href="https://www.intelligent-ecards.com/game/comments" numposts="7" colorscheme="light">
       </fb:comments>
        <div id='apiDiv'></div>
</body>
</html>