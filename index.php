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
			$("#sentence_text").keydown(function(){
				var theSentence = $(this).val();
				//replacement
				//use a for loop
				var iconArray = [["/caution", '<img src="icons/caution.png" alt="caution">'], ["/heart", '<img src="icons/heart.png" alt="heart">'], ["/inside", '<img src="icons/inside.png" alt="inside">'], ["/music", '<img src="icons/musical_note.png" alt="music">'], ["/shamrock", '<img src="icons/shamrock.png" alt="shamrock">'], ["/redo", '<img src="icons/redo.png" alt="redo">'], ["/undo", '<img src="icons/undo.png" alt="undo">'], ["/star", '<img src="icons/star.png" alt="star">'], ["/phone", '<img src="phone/caution.png" alt="phone">'], ["/time", '<img src="icons/waiting.png" alt="time">'], ["/wider", '<img src="icons/wider.png" alt="wider">'], ["/taller", '<img src="icons/taller.png" alt="taller">'], ["/ice", '<img src="icons/Ice.png" alt="ice">'], ["/clouds", '<img src="icons/Overcast.png" alt="clouds">'], ["/rainbow", '<img src="icons/Rainbow.png" alt="rainbow">'], ["/sun", '<img src="icons/Sunny.png" alt="sun">'], ["/fire", '<img src="icons/fire.png" alt="fire">'], ["/afraid", '<img src="icons/afraid.png" alt="afraid">'], ["/happy", '<img src="icons/happy.png" alt="happy">'], ["/delighted", '<img src="icons/delighted.png" alt="delighted">'], ["/disgusted", '<img src="icons/disgusted.png" alt="disgusted">'], ["/angry", '<img src="icons/angry.png" alt="angry">'], ["/confused", '<img src="icons/confused.png" alt="confused">'], ["/bird", '<img src="icons/bird_contour.png" alt="bird">'], ["/bull", '<img src="icons/bull_contour.png" alt="caution">'], ["/cat", '<img src="icons/cat_contour.png" alt="cat">'], ["/cow", '<img src="icons/cow_contour.png" alt="cow">'], ["/duck", '<img src="icons/duck_contour.png" alt="duck">'], ["/elephant", '<img src="icons/elephant_contour.png" alt="elephant">'], ["/fish", '<img src="icons/fish_contour.png" alt="fish">'], ["/horse", '<img src="icons/horse_contour.png" alt="horse">'], ["/ladybug", '<img src="icons/ladybug_contour.png" alt="ladybug">'], ["/leopard", '<img src="icons/leopard_contour.png" alt="leopard">'], ["/lion", '<img src="icons/lion_contour.png" alt="lion">'], ["/zero", '<img src="icons/zero.png" alt="zero">'], ["/one", '<img src="icons/one.png" alt="one">'], ["/two", '<img src="icons/two.png" alt="two">'], ["/three ", '<img src="icons/three.png" alt="three">'], ["/four", '<img src="icons/four.png" alt="four">'], ["/five", '<img src="icons/five.png" alt="five">'], ["/six", '<img src="icons/six.png" alt="six">'], ["/seven", '<img src="icons/seven.png" alt="seven">'], ["/eight", '<img src="icons/eight.png" alt="eight">'], ["/nine", '<img src="icons/nine.png" alt="nine">'], ["/miserable", '<img src="icons/miserable.png" alt="miserable">'], ["/surprised", '<img src= "icons/surprised.png" alt="surprised">'], ["/outside", '<img src="icons/outside.png" alt="outside">'], ["/sad", '<img src="icons/sad.png" alt="sad">']]; //alter theSentence.
				var i=0;
				var theSentenceProcessed=theSentence;
				for(i=0; i<iconArray.length; i++){
					theSentenceProcessed = theSentenceProcessed.replace(iconArray[i][0], iconArray[i][1]);
				}
				/*$.post("ProfanityFilter-develop/src/mofodojodino/ProfanityFilter/Check.php", {my_sentence : theSentenceProcessed}, function(data6){
					$("#sentence").html(data6);
				});*/
				/*
				|
				|
				|
				|      Here we go......
				|
				|
				|
				|
				|
				|
				var Check = {
					var in_between_regex : /[\\s|\||!|@|#|\$|%|^|&|\*|\(|\)|\-|+|_|=|\{|\}|\[|\]|:|;|\'|\"|<|>|\?|,|\.|\/|~|`]/,
					var badwords : [],
										replacements : [
					'á' : '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|æ|Æ|α|Δ|Λ|λ)+{$}',
					'a' : '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|æ|Æ|α|Δ|Λ|λ)+{$}', //this will be used later to generate a regex
					'b' : '(b|b\.|b\-|8|\|3|ß|Β|β)+{$}',                               // I think that {$} means "nothing"
					'c' : '(c|c\.|c\-|Ç|ç|ć|Ć|č|Č|¢|€|<|\(|{|©)+{$}',
					'd' : '(d|d\.|d\-|&part;|\|\)|Þ|þ|Ð|ð)+{$}',
					'e' : '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
					'è' : '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
					'é' : '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
					'f' : '(f|f\.|f\-|ƒ)+{$}',
					'g' : '(g|g\.|g\-|6|9)+{$}',
					'h' : '(h|h\.|h\-|Η)+{$}',
					'í' : '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï|ī|Ī|į|Į)+{$}',
					'i' : '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï|ī|Ī|į|Į)+{$}',
					'j' : '(j|j\.|j\-)+{$}',
					'k' : '(k|k\.|k\-|Κ|κ)+{$}',
					'l' : '(l|1\.|l\-|!|\||\]\[|]|£|∫|Ì|Í|Î|Ï|ł|Ł)+{$}',
					'm' : '(m|m\.|m\-)+{$}',
					'n' : '(n|n\.|n\-|η|Ν|Π|ñ|Ñ|ń|Ń)+{$}',
					'ñ' : '(n|n\.|n\-|η|Ν|Π|ñ|Ñ|ń|Ń)+{$}',
					'ó' : '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø|ô|Ô|ö|Ö|ò|Ò|ó|Ó|œ|Œ|ø|Ø|ō|Ō|õ|Õ)+{$}',
					'o' : '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø|ô|Ô|ö|Ö|ò|Ò|ó|Ó|œ|Œ|ø|Ø|ō|Ō|õ|Õ)+{$}',
					'p' : '(p|p\.|p\-|ρ|Ρ|¶|þ)+{$}',
					'q' : '(q|q\.|q\-)+{$}',
					'r' : '(r|r\.|r\-|®)+{$}',
					's' : '(s|s\.|s\-|5|\$|§|ß|Ś|ś|Š|š)+{$}',
					't' : '(t|t\.|t\-|Τ|τ)+{$}',
					'u' : '(u|u\.|u\-|υ|µ|û|ü|ù|ú|ū|Û|Ü|Ù|Ú|Ū)+{$}',
					'ú' : '(u|u\.|u\-|υ|µ|û|ü|ù|ú|ū|Û|Ü|Ù|Ú|Ū)+{$}',
					'v' : '(v|v\.|v\-|υ|ν)+{$}',
					'w' : '(w|w\.|w\-|ω|ψ|Ψ)+{$}',
					'x' : '(x|x\.|x\-|Χ|χ)+{$}',
					'y' : '(y|y\.|y\-|¥|γ|ÿ|ý|Ÿ|Ý)+{$}',
					'z' : '(z|z\.|z\-|Ζ|ž|Ž|ź|Ź|ż|Ż)+{$}'
					],
					function hasProfanity(string){
						$.getJSON("ProfanityFilter-develop/badwords2.json", function(bad){
							var badness = JSON.parse(bad);
							var thebadlist = badness.badwords;
							var badwords_arr = [];
							var badnumber = thebadlist.length;
							for(var i=0; i<badnumber; i++){
								/*$badwords[ $i ] = '/' . preg_replace(
									array_keys($this->replacements),
									array_values($this->replacements),
									$this->badwords[ $i ]                //a single word in the bad word list
								) . '/i';
								$badwords[ $i ] = str_replace('{$}', self::IN_BETWEEN_REGEX, $badwords[ $i ]);
								
								badwords_arr[i] = new RegExp('/' . thebadlist[i].replace(new RegExp(Object.keys(this.replacements).toString), new RegExp(Object.values(this.replacements).toString)) . '/i');
								badwords_arr[i] = badwords_arr[i].replace(/{$}/, this.in_between_regex);
							}
							for(var key in badwords_arr)  {
								var profanity = badwords_arr[key];
								string = string.replace(profanity, "*****");
							}
						});
						return string;
					}*/
					
				//}
				var thebadlistSmall = [
					"anal",
					"arse",
					"crap",
					"bum", 
					"fag", 
					"homo", 
					"pros",
					"scat", 
					"spac"
				]
				var thebadlist = [
					"carajo", 
					"maricón", 
					"pendejo", 
					"coño", 
					"mierda", 
					"puta", 
					"putas", 
					"jodes", 
					"jodo", 
					"joda", 
					"jodió", 
					"joder", 
					"cabrón", 
					"jódete", 
					"chocha", 
					"mamao", 
					"maldito", 
					"marihuana", 
					"infierno", 
					"verga", 
					"zorra", 
					"baboso", 
					"bastardo", 
					"culo", 
					"cagaste", 
					"cagas", 
					"cago", 
					"concha", 
					"ingle", 
					"poonta", 
					"tengo ganas", 
					"tienes ganas", 
					"tonta", 
					"viete a la mierda", 
					"fous le camps", 
					"fous le camps et morte", 
					"c'e-toi", 
					"salope", 
					"pisser", 
					"pisse", 
					"pissas", 
					"chier", 
					"le nichon", 
					"nichon", 
					"le sein", 
					"le robert", 
					"la doudoune", 
					"la chatte", 
					"les couilles", 
					"service trois pièces", 
					"branleur", 
					"branleuse", 
					"putain", 
					"pute", 
					"le bordel", 
					"bordel", 
					"foutre la merde", 
					"je vuex lecher ton foutre", 
					"fous le camps et morte", 
					"nique ta mere", 
					"ta gueule", 
					"des conneries", 
					"C'est con", 
					"T'es con", 
					"gros con", 
					"sale con", 
					"nique ta mère", 
					"niquée", 
					"enculé", 
					"abbo", 
					"abortionist", 
					"abuser", 
					"alabama hotpocket", 
					"alligatorbait", 
					"analannie", 
					"analsex", 
					"anus", 
					"areola",  
					"arsebagger", 
					"arsebandit", 
					"arseblaster", 
					"arsecowboy", 
					"arsefuck", 
					"arsefucker", 
					"arsehat", 
					"arsehole", 
					"arseholes", 
					"arsehore", 
					"arsejockey", 
					"arsekiss", 
					"arsekisser", 
					"arselick", 
					"arselicker", 
					"arselover", 
					"arseman", 
					"arsemonkey", 
					"arsemunch", 
					"arsemuncher", 
					"arsepacker", 
					"arsepirate", 
					"arsepuppies", 
					"arseranger", 
					"arses", 
					"arsewhore", 
					"arsewipe", 
					"assassinate",
					"assassination",
					"assbagger",
					"assbandit",
					"assblaster",
					"assclown",
					"asscowboy",
					"assfuck",
					"assfucker",
					"asshat",
					"asshole",
					"assholes",
					"asshore",
					"assjockey",
					"asskiss",
					"asskisser",
					"assklown",
					"asslick",
					"asslicker",
					"asslover",
					"assman",
					"assmonkey",
					"assmunch",
					"assmuncher",
					"asspacker",
					"asspirate",
					"asspuppies",
					"assranger",
					"asswhore",
					"asswipe", 
					"backdoorman", 
					"badfuck", 
					"baldy", 
					"ball licker", 
					"balllicker", 
					"ballsack", 
					"banging", 
					"barelylegal", 
					"barface", 
					"barfface", 
					"bastard", 
					"bazongas", 
					"bazooms", 
					"beastality", 
					"beastial", 
					"beastiality", 
					"beatoff", 
					"beat your meat", 
					"bestial", 
					"bestiality", 
					"biatch", 
					"bicurious", 
					"big parts", 
					"bigbastard", 
					"big butt", 
					"bitch", 
					"bitcher", 
					"bitches", 
					"bitchez", 
					"bitchin", 
					"bitching", 
					"bitchslap", 
					"bitchy", 
					"biteme",
					"bite me",
					"blackout", 
					"blow job", 
					"blowjob", 
					"bohunk", 
					"bollick", 
					"bollock", 
					"bollocks", 
					"bondage", 
					"boner", 
					"boob", 
					"boobies", 
					"boobs", 
					"booby", 
					"bootycall", 
					"bountybar", 
					"breastjob", 
					"breastlover", 
					"breastman", 
					"brothel", 
					"bugger", 
					"buggered", 
					"buggery", 
					"bukake", 
					"bullcrap", 
					"bulldike", 
					"bulldyke", 
					"bullshit", 
					"/bullshit", 
					"bumblefuck", 
					"bumfuck", 
					"bungabunga", 
					"bunghole", 
					"butchbabes", 
					"butchdike", 
					"butchdyke", 
					"buttbang", 
					"butt-bang", 
					"buttcheeks", 
					"buttface", 
					"buttfuck", 
					"butt-fuck", 
					"buttfucker", 
					"butt-fucker", 
					"buttfuckers", 
					"butt-fuckers", 
					"butthead", 
					"buttman", 
					"buttmunch", 
					"buttmuncher", 
					"buttpirate", 
					"buttplug", 
					"buttstain", 
					"byatch", 
					"cacker", 
					"camel toe", 
					"cameljockey", 
					"cameltoe", 
					"carpet muncher", 
					"carpetmuncher", 
					"chav", 
					"cherrypopper", 
					"chickslick", 
					"clamdigger", 
					"clamdiver", 
					"clit", 
					"clitoris", 
					"clogwog", 
					"clunge", 
					"cockblock", 
					"cockblocker", 
					"cockcowboy", 
					"cockfight", 
					"cockhead", 
					"cockknob", 
					"cocklicker", 
					"cocklover", 
					"cocknob", 
					"cockqueen", 
					"cockrider", 
					"cocksman", 
					"cocksmith", 
					"cocksmoker", 
					"cocksucer", 
					"cocksuck ", 
					"cocksucked ", 
					"cocksucker", 
					"cocksucking", 
					"cocktease", 
					"cocky", 
					"coitus", 
					"commie", 
					"condom", 
					"coon", 
					"coondog", 
					"copulate", 
					"crackpipe", 
					"crackwhore", 
					"crack-whore",  
					"crappy", 
					"crotchjockey", 
					"crotchmonkey", 
					"crotchrot", 
					"cumbubble", 
					"cumfest", 
					"cumjockey", 
					"cumm", 
					"cumquat", 
					"cumqueen", 
					"cumshot", 
					"cunilingus", 
					"cunillingus", 
					"cunnilingus", 
					"cunntt", 
					"cunt", 
					"cunteyed", 
					"cuntface", 
					"cuntfuck", 
					"cuntfucker", 
					"cuntlick ", 
					"cuntlicker ", 
					"cuntlicking ", 
					"cuntsucker", 
					"cybersex", 
					"cyberslimer", 
					"dago", 
					"dammit", 
					"damnation", 
					"damnit", 
					"darkie", 
					"darky", 
					"datnigga", 
					"deapthroat", 
					"deepthroat", 
					"defecate", 
					"dego", 
					"devilworshipper", 
					"dickbrain", 
					"dickforbrains", 
					"dickfuck", 
					"dickhead", 
					"dickless", 
					"dicklick", 
					"dicklicker", 
					"dicktard", 
					"dickwad", 
					"dickweed", 
					"dildo", 
					"dipshit", 
					"dipstick", 
					"dixiedike", 
					"dixiedyke", 
					"doggiestyle", 
					"doggystyle", 
					"douche", 
					"douch", 
					"douchebag", 
					"douchbag", 
					"drag queen", 
					"dragqueen", 
					"dragqween", 
					"dripdick", 
					"dumb", 
					"dumbbitch", 
					"dumbfuck", 
					"easyslut", 
					"eatballs", 
					"eatme", 
					"eatpussy", 
					"ejaculate", 
					"ejaculated", 
					"ejaculating ", 
					"ejaculation", 
					"enema", 
					"excrement", 
					"executioner", 
					"exhibitionist", 
					"extremist", 
					"facefucker", 
					"facist", 
					"faeces", 
					"fagging", 
					"faggot", 
					"fagot", 
					"fannyfucker", 
					"fart", 
					"farted ", 
					"farting ", 
					"farty ", 
					"fastfuck", 
					"fat", 
					"fatfuck", 
					"fatfucker", 
					"fatso", 
					"feces", 
					"felatio ", 
					"felch", 
					"felcher", 
					"felching", 
					"fellatio", 
					"feltch", 
					"feltcher", 
					"feltching", 
					"fetish", 
					"fingerfuck ", 
					"fingerfucked ", 
					"fingerfucker ", 
					"fingerfuckers", 
					"fingerfucking ", 
					"fister", 
					"fistfuck", 
					"fistfucked ", 
					"fistfucker ", 
					"fistfucking ", 
					"fisting", 
					"flasher", 
					"flatulence", 
					"flid", 
					"flyd", 
					"flydie", 
					"flydye", 
					"fondle", 
					"footaction", 
					"footfuck", 
					"footfucker", 
					"footlicker", 
					"foreskin", 
					"fornicate", 
					"foursome", 
					"freakfuck", 
					"freakyfucker", 
					"freefuck", 
					"fubar", 
					"fucck", 
					"fuck", 
					"fucka", 
					"fuckable", 
					"fuckbag", 
					"fuckbuddy", 
					"fucked", 
					"fuckedup", 
					"fucker", 
					"fuckers", 
					"fuckface", 
					"fuckfest", 
					"fuckfreak", 
					"fuckfriend", 
					"fuckhead", 
					"fuckher", 
					"fuckin", 
					"fuckina", 
					"fucking", 
					"fuckingbitch", 
					"fuckingcunt", 
					"fuckinnuts", 
					"fuckinright", 
					"fuckit", 
					"fuckknob", 
					"fuckme ", 
					"fuckmehard", 
					"fuckmonkey", 
					"fuckoff", 
					"fuckpig", 
					"fucks", 
					"fucktard", 
					"fuckwhore", 
					"fuckyou", 
					"fudge packer", 
					"fudgepacker", 
					"fugly", 
					"fuk", 
					"fuks", 
					"funfuck", 
					"fuuck", 
					"gang bang", 
					"gangbang", 
					"gangbanged ", 
					"gangbanger", 
					"gatorbait", 
					"gaymuthafuckinwhore", 
					"gay sex", 
					"gayfuck", 
					"gaysex ", 
					"genital", 
					"genitals", 
					"getiton", 
					"givehead", 
					"glazeddonut", 
					"godammit", 
					"goddamit", 
					"goddammit", 
					"goddamn", 
					"goddamned", 
					"goddamnes", 
					"goddamnit", 
					"goddamnmuthafucker", 
					"goldenshower", 
					"gonorrehea", 
					"gonzagas", 
					"gook", 
					"gotohell", 
					"greaseball", 
					"gringo", 
					"grostulation", 
					"gypo", 
					"gypp", 
					"gyppie", 
					"gyppo", 
					"gyppy", 
					"hammering you", 
					"hammering kids", 
					"hammer you", 
					"hammer kids", 
					"hammer your opening", 
					"hammers you", 
					"hammer me", 
					"hammers me", 
					"handjob", 
					"hardon", 
					"hater", 
					"hatred", 
					"headfuck", 
					"herpes", 
					"hijack", 
					"hijacker", 
					"hijacking", 
					"hillbillies", 
					"hindoo", 
					"hitler", 
					"hitlerism", 
					"hitlerist", 
					"hiv", 
					"HIV", 
					"hobo", 
					"hoes", 
					"holestuffer", 
					"homobangers", 
					"honger", 
					"honkers", 
					"honkey", 
					"honky", 
					"hookers", 
					"horney", 
					"horniest", 
					"horny", 
					"horseshit", 
					"hosejob", 
					"hotdamn", 
					"hotpussy", 
					"hottotrot", 
					"huge in your dreams", 
					"huge meat", 
					"huge balls", 
					"huge nuts", 
					"hanging people", 
					"hang you", 
					"hung them", 
					"parts standing up", 
					"round parts", 
					"husky", 
					"hymen", 
					"iblowu", 
					"idiot", 
					"incest", 
					"insest", 
					"intercourse", 
					"internet wife", 
					"interracial", 
					"inthe", 
					"inthebuff", 
					"in heat", 
					"jack", 
					"jackoff", 
					"jackshit", 
					"japcrap", 
					"jerkoff", 
					"jesuschrist", 
					"jigaboo", 
					"jiggabo", 
					"jihad", 
					"jijjiboo", 
					"jism", 
					"jizim", 
					"jizjuice", 
					"jizm ", 
					"jizz", 
					"jizzim", 
					"jizzum", 
					"jubblies", 
					"juggalo", 
					"junglebunny", 
					"kiddy fiddler", 
					"kinky", 
					"kiss", 
					"kondum", 
					"krap", 
					"krappy", 
					"kraut", 
					"kumbubble", 
					"kumbullbe", 
					"kummer", 
					"kumming", 
					"kums", 
					"kunilingus", 
					"kunnilingus", 
					"kunt", 
					"kyke", 
					"labia", 
					"lactate", 
					"lady boy", 
					"ladyboy", 
					"lapdance", 
					"lesbain", 
					"lesbayn", 
					"lesbin", 
					"lesbo", 
					"lezbe", 
					"lezbefriends", 
					"lezbo", 
					"lezz", 
					"lezzer", 
					"lezzo", 
					"libido", 
					"lickme", 
					"limpdick", 
					"livesex", 
					"lmfao", 
					"loadedgun", 
					"lovebone", 
					"lovegoo", 
					"lovegun", 
					"lovejuice", 
					"lovemuscle", 
					"lovepistol", 
					"loverocket", 
					"low life", 
					"lowlife", 
					"lubejob", 
					"lucifer", 
					"luckycameltoe", 
					"mafia", 
					"your fuzzy area", 
					"malicious", 
					"manhater", 
					"manpaste", 
					"marijuana", 
					"mastabate", 
					"mastabater", 
					"master bates", 
					"masterbate", 
					"masterbates", 
					"mastrabator", 
					"masturbate", 
					"masturbating", 
					"mattressprincess", 
					"mattress princess", 
					"meatbeater", 
					"meatrack", 
					"mgger", 
					"mggor", 
					"milf", 
					"mofo", 
					"molest", 
					"molestation", 
					"molester", 
					"molestor", 
					"moneyshot", 
					"mooncricket", 
					"moron", 
					"mothaforking", 
					"mothaforked", 
					"mother fucking", 
					"mother-fucking", 
					"mothafuck", 
					"mothafucka", 
					"mothafuckaz", 
					"mothafucked ", 
					"mothafucker", 
					"mothafuckin", 
					"mothafucking ", 
					"mothafuckings", 
					"motherfuck", 
					"motherfucked", 
					"motherfucker", 
					"motherfuckin", 
					"motherfucking", 
					"motherfuckings", 
					"motherlovebone", 
					"muffdive", 
					"muffdiver", 
					"muffindiver", 
					"mufflikcer", 
					"muncher", 
					"murder", 
					"murderer", 
					"murdering", 
					"muthafucker", 
					"muthaforker", 
					"nastybitch", 
					"nastyho", 
					"nastyslut", 
					"nastywhore", 
					"nazi", 
					"necro", 
					"negroes", 
					"negroid", 
					"nigga", 
					"niggah", 
					"niggaracci", 
					"niggard", 
					"niggarded", 
					"niggarding", 
					"niggardliness", 
					"niggardliness's", 
					"niggardly", 
					"niggards", 
					"niggard's", 
					"niggaz", 
					"nigger", 
					"niggerhead", 
					"niggerhole", 
					"niggers", 
					"nigger's", 
					"niggle", 
					"niggled", 
					"niggles", 
					"niggling", 
					"nigglings", 
					"niggor", 
					"niggur", 
					"niglet", 
					"nignog", 
					"nigr", 
					"nigra", 
					"nigre", 
					"nipple", 
					"nipplering", 
					"nittit", 
					"nlgger", 
					"niggertrash", 
					"nlggor", 
					"nofuckingway", 
					"nonce", 
					"nookey", 
					"nookie", 
					"nudger", 
					"nutblender", 
					"nut case", 
					"nutcase", 
					"nutfucker", 
					"ontherag", 
					"orgasim ", 
					"orgasm", 
					"orgies", 
					"orgy", 
					"osama bin laden", 
					"paedo", 
					"paedofile", 
					"paedophile", 
					"paki", 
					"palesimian", 
					"panti", 
					"pearlnecklace", 
					"peckerwood", 
					"peedo", 
					"peehole", 
					"peni5", 
					"penile", 
					"penis", 
					"penises", 
					"perv", 
					"perversion", 
					"pervert", 
					"perverts", 
					"pervs", 
					"phonesex", 
					"phuk", 
					"phuked", 
					"phuking", 
					"phukked", 
					"phukking", 
					"phungky", 
					"phuq", 
					"pi55", 
					"picaninny", 
					"piccaninny", 
					"pickaninny", 
					"pikey", 
					"piky", 
					"pimper", 
					"pimpjuic", 
					"pimpjuice", 
					"pimpsimp", 
					"pimptard", 
					"pindick", 
					"piss", 
					"pissed", 
					"pisser", 
					"pisses ", 
					"pisshead", 
					"pissin ", 
					"pissing", 
					"pissoff", 
					"playboy", 
					"playboys ", 
					"play boy", 
					"play bunny", 
					"play girl", 
					"playboy", 
					"playbunny", 
					"playgirl", 
					"plumper", 
					"pocketpool", 
					"poontang", 
					"pooperscooper", 
					"pooping", 
					"poorwhitetrash", 
					"poostabber", 
					"popimp", 
					"porchmonkey", 
					"porn", 
					"pornflick", 
					"pornking", 
					"porno", 
					"pornography", 
					"pornprincess", 
					"premature", 
					"prickhead",  
					"prostitute", 
					"protestant", 
					"pu55i", 
					"pu55y", 
					"pube", 
					"pubiclice", 
					"puke", 
					"puntang", 
					"purinaprincess", 
					"pussie", 
					"pussies", 
					"pussyeater", 
					"pussyfucker", 
					"pussylicker", 
					"pussylips", 
					"pussylover", 
					"pussypounder", 
					"pusy", 
					"queef", 
					"queer", 
					"quim", 
					"racism", 
					"racist", 
					"racists", 
					"rag head", 
					"raghead", 
					"rape", 
					"raped", 
					"raper", 
					"rapist", 
					"rearend", 
					"rearentry", 
					"rear-entry", 
					"rectum", 
					"redneck", 
					"rednecks", 
					"rentafuck", 
					"retard", 
					"retarded", 
					"retards", 
					"rimjob", 
					"rimming", 
					"robber", 
					"russki", 
					"russkie", 
					"sadist", 
					"sadom", 
					"saeema butt", 
					"saeema butts", 
					"sandm", 
					"sandnigger", 
					"sandniggers", 
					"satan", 
					"satanic", 
					"scag", 
					"schlong", 
					"screwyou", 
					"screwtard", 
					"screwjob", 
					"screw you", 
					"scrotum", 
					"scum", 
					"scumbag", 
					"seaman staines", 
					"semen", 
					"sexed", 
					"sexfarm", 
					"sexfarms", 
					"sexhound", 
					"sexhouse", 
					"sexing", 
					"sexkitten", 
					"sex kitten", 
					"sexpot", 
					"sexslave", 
					"sextogo", 
					"sextoy", 
					"sex toy", 
					"sextoys", 
					"sexwhore", 
					"sexymoma", 
					"sexy-slim", 
					"seymour butts", 
					"shag", 
					"shagger", 
					"shaggin", 
					"shagging", 
					"shat", 
					"shhit", 
					"shit", 
					"shitcan", 
					"shitdick", 
					"shite", 
					"shiteater", 
					"shited", 
					"shitface", 
					"shitfaced", 
					"shitfit", 
					"shitforbrains", 
					"shitfuck", 
					"shitfucker", 
					"shitfull", 
					"shithapens", 
					"shithappens", 
					"shithead", 
					"shithouse", 
					"shiting", 
					"shitlist", 
					"shitola", 
					"shitoutofluck", 
					"shits", 
					"shitstain", 
					"shitted", 
					"shitter", 
					"shitting", 
					"shitty ", 
					"shortfuck", 
					"sissy", 
					"sixsixsix", 
					"sixtynine", 
					"sixtyniner", 
					"skank", 
					"skankbitch", 
					"skankfuck", 
					"skankwhore", 
					"skanky", 
					"skankybitch", 
					"skankywhore", 
					"skinflute", 
					"skum", 
					"skumbag", 
					"slanteye", 
					"slantyeye", 
					"slapper", 
					"slavedriver", 
					"sleezebag", 
					"sleezeball", 
					"slideitin", 
					"slimeball", 
					"slimebucket", 
					"slopehead", 
					"slopey", 
					"slopy", 
					"slut", 
					"sluts", 
					"slutt", 
					"slutting", 
					"slutty", 
					"slutwear", 
					"slutwhore", 
					"smackthemonkey", 
					"smelly", 
					"smut", 
					"snatchpatch", 
					"snot", 
					"snowback", 
					"snownigger", 
					"sodom", 
					"sodomise", 
					"sodomite", 
					"sodomize", 
					"sodomy", 
					"sonofabitch", 
					"sonofbitch",  
					"spacca", 
					"spaghettibender", 
					"spaghettinigger", 
					"spank", 
					"spankthemonkey", 
					"spastic", 
					"southern exit", 
					"southern parts", 
					"spazza", 
					"sperm", 
					"spermacide", 
					"spermbag", 
					"spermhearder", 
					"spermherder", 
					"spig", 
					"spigotty", 
					"spik", 
					"spitter", 
					"splittail", 
					"spooge", 
					"spreadeagle", 
					"spunk", 
					"squaw", 
					"stabber", 
					"stiffy", 
					"strapon", 
					"stripclub", 
					"stripper", 
					"stroking", 
					"stupid", 
					"stupidfuck", 
					"stupidfucker", 
					"suckdick", 
					"sucker", 
					"suckme", 
					"suckmy", 
					"suckmydick", 
					"suckmytit", 
					"suckoff", 
					"swallower", 
					"swastika", 
					"syphilis", 
					"tampon", 
					"tantra", 
					"tarbaby", 
					"tard", 
					"teat", 
					"terror", 
					"terrorist", 
					"teste", 
					"testicle", 
					"testicles", 
					"testicular", 
					"thai bride", 
					"thick as", 
					"thicklips", 
					"thicko", 
					"thirdeye", 
					"thirdleg", 
					"threesome", 
					"timbernigger", 
					"titbitnipply", 
					"titfuck", 
					"titfucker", 
					"titfuckin", 
					"titjob", 
					"titlicker", 
					"titlover", 
					"tits", 
					"tittie", 
					"titties", 
					"titty", 
					"tonguethrust", 
					"tonguethruster", 
					"tonguetramp", 
					"torture", 
					"torturing", 
					"torturous", 
					"tosser", 
					"tosspot", 
					"towel head", 
					"towelhead", 
					"trailertrash", 
					"tramp", 
					"trannie", 
					"tranny", 
					"trannys", 
					"trannies", 
					"transvestite", 
					"transvestites", 
					"trisexual", 
					"trots", 
					"trouser snake", 
					"tuckahoe", 
					"tunneloflove", 
					"turd", 
					"turnon", 
					"twat", 
					"twink", 
					"twinkie", 
					"twobitwhore", 
					"unfuckable", 
					"upskirt", 
					"upthe", 
					"upthebutt", 
					"urinate", 
					"urine", 
					"usama bin laden", 
					"uterus", 
					"vagina", 
					"vaginal", 
					"vaginally", 
					"vibrater", 
					"vibrator", 
					"vietcong", 
					"violate", 
					"violation", 
					"virginbreaker", 
					"vomit", 
					"vulva", 
					"wank", 
					"wanker", 
					"wanking", 
					"waysted", 
					"welcher", 
					"wetback", 
					"wetspot", 
					"whacker", 
					"whigger", 
					"whiskeydick", 
					"whiskydick", 
					"whitenigger", 
					"whitetrash", 
					"whitey", 
					"whop", 
					"whore", 
					"whorefucker", 
					"whorehouse", 
					"wife beater", 
					"williewanker", 
					"wuss", 
					"wuzzie", 
					"xrated", 
					"x-rated", 
					"yellowman", 
					"your hole", 
					"suck my balloons", 
					"suck my balls", 
					"enter inside you", 
					"zigabo", 
					"zipper head", 
					"zipperhead"
				];			
				var badnumber = thebadlist.length;
				//var splitSentence = theSentenceProcessed.split(" ");
				var superbadlist = [];
				/*
				'/á/' => '(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|æ|Æ|α|Δ|Λ|λ)+{$}',
				'/a/' => '(á|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|æ|Æ|α|Δ|Λ|λ)+{$}', //this will be used later to generate a regex
				'/b/' => '(b|b\.|b\-|8|\|3|ß|Β|β)+{$}',                               // I think that {$} means "nothing"
				'/c/' => '(c|c\.|c\-|Ç|ç|ć|Ć|č|Č|¢|€|<|\(|{|©)+{$}',
				'/d/' => '(d|d\.|d\-|&part;|\|\)|Þ|þ|Ð|ð)+{$}',
				'/e/' => '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
				'/è/' => '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
				'/é/' => '(e|e\.|e\-|3|€|È|è|É|é|Ê|ê|ë|Ë|ē|Ē|ė|Ė|ę|Ę|∑)+{$}',
				'/f/' => '(f|f\.|f\-|ƒ)+{$}',
				'/g/' => '(g|g\.|g\-|6|9)+{$}',
				'/h/' => '(h|h\.|h\-|Η)+{$}',
				'/í/' => '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï|ī|Ī|į|Į)+{$}',
				'/i/' => '(i|i\.|i\-|!|\||\]\[|]|1|∫|Ì|Í|Î|Ï|ì|í|î|ï|ī|Ī|į|Į)+{$}',
				'/j/' => '(j|j\.|j\-)+{$}',
				'/k/' => '(k|k\.|k\-|Κ|κ)+{$}',
				'/l/' => '(l|1\.|l\-|!|\||\]\[|]|£|∫|Ì|Í|Î|Ï|ł|Ł)+{$}',
				'/m/' => '(m|m\.|m\-)+{$}',
				'/n/' => '(n|n\.|n\-|η|Ν|Π|ñ|Ñ|ń|Ń)+{$}',
				'/ñ/' => '(n|n\.|n\-|η|Ν|Π|ñ|Ñ|ń|Ń)+{$}',
				'/ó/' => '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø|ô|Ô|ö|Ö|ò|Ò|ó|Ó|œ|Œ|ø|Ø|ō|Ō|õ|Õ)+{$}',
				'/o/' => '(o|o\.|o\-|0|Ο|ο|Φ|¤|°|ø|ô|Ô|ö|Ö|ò|Ò|ó|Ó|œ|Œ|ø|Ø|ō|Ō|õ|Õ)+{$}',
				'/p/' => '(p|p\.|p\-|ρ|Ρ|¶|þ)+{$}',
				'/q/' => '(q|q\.|q\-)+{$}',
				'/r/' => '(r|r\.|r\-|®)+{$}',
				'/s/' => '(s|s\.|s\-|5|\$|§|ß|Ś|ś|Š|š)+{$}',
				'/t/' => '(t|t\.|t\-|Τ|τ)+{$}',
				'/u/' => '(u|u\.|u\-|υ|µ|û|ü|ù|ú|ū|Û|Ü|Ù|Ú|Ū)+{$}',
				'/ú/' => '(u|u\.|u\-|υ|µ|û|ü|ù|ú|ū|Û|Ü|Ù|Ú|Ū)+{$}',
				'/v/' => '(v|v\.|v\-|υ|ν)+{$}',
				'/w/' => '(w|w\.|w\-|ω|ψ|Ψ)+{$}',
				'/x/' => '(x|x\.|x\-|Χ|χ)+{$}',
				'/y/' => '(y|y\.|y\-|¥|γ|ÿ|ý|Ÿ|Ý)+{$}',
				'/z/' => '(z|z\.|z\-|Ζ|ž|Ž|ź|Ź|ż|Ż)+{$}',
				);
				*/
				var a_letter = ["4", "@", "Á", "á", "À", "Â", "à", "Â", "â", "Ä", "ä", "Ã", "ã", "Å", "å", "æ", "Æ", "α", "Δ", "Λ", "λ"];
				var b_letter = ["8", "3", "ß", "Β", "β"];
				var c_letter = ["Ç", "ç", "ć", "Ć", "č", "Č", "¢", "€", "<", "(", "©"];
				var d_letter = ["\)", "|)", "Þ", "þ", "Ð", "ð"];
				var e_letter = ["3", "€", "È", "è", "É", "é", "Ê", "ê", "ë", "Ë", "ē", "Ē", "ė", "Ė", "ę", "Ę", "∑"];
				var f_letter = ["ƒ"];
				var g_letter = ["6", "9"];
				var h_letter = ["Η", "ĥ", "ħ", "Ĥ", "Ħ", "ƕ", "ȟ", "Ҥ", "Ԋ", "ᴴ"];
				var i_letter = ["i.", "i-", "!", "|", "]", "1", "∫", "Ì", "Í", "Î", "Ï", "ì", "í", "î", "ï", "ī", "Ī", "į", "Į"];
				var k_letter = ["Κ", "κ"];
				var n_letter = ["Ν", "Π", "ñ", "Ñ", "ń", "Ń"];
				var o_letter = ["0", "Ο", "Φ", "¤", "°", "ø", "ô", "Ô", "ö", "Ö", "ò", "Ò", "ó", "Ó", "ø", "Ø", "ō", "Ō", "õ", "Õ"];
				var p_letter = ["Ρ", "¶"];
				var r_letter = ["®"];
				var s_letter = ["$", "§", "ß", "Ś", "ś", "Š", "š"];
				var t_letter = ["Τ", "τ"];
				var u_letter = ["û", "ü", "ù", "ú", "ū", "Û", "Ü", "Ù", "Ú", "Ū"];
				var v_letter = ["υ", "ν"];
				var w_letter = ["ω", "ψ", "Ψ"];
				var y_letter = ["¥", "γ", "ÿ", "ý", "Ÿ", "Ý"];
				var z_letter = ["Ζ", "ž", "Ž", "ź", "Ź", "ż", "Ż"];
				//
				sentenceSplit = theSentenceProcessed.split(" ");
				for(var i=0; i<badnumber; i++){
					/*  If at any point the replaced string matches the curseword contained in a word,
						while replacing the replacements with the target letter; removing hyphens, asterisks,
						tildes, and underscores; and finally, replacing vovels and n's with
						accented with non accented and tilde n letters:
						mark that word's place in the list of words in the original sentence and take appropriate action.
					*/
					for (var mm=0; mm<sentenceSplit.length; mm++){
						sentenceSplitSplit = sentenceSplit[mm].split();
						var f = [];
						while (f === []){
							for (var nn; nn<sentenceSplitSplit.length; nn++){
								for (var a=0; a<a_letter.length; a++){
									sentenceSplitSplit[nn].replace(a_letter[a], "a");
								}
								for (var b=0; b<b_letter.length; b++){
									sentenceSplitSplit[nn].replace(b_letter[b], "b");
								}
								for (var c=0; c<c_letter.length; c++){
									sentenceSplitSplit[nn].replace(c_letter[c], "c");
								}
								for (var d=0; d<d_letter.length; d++){
									sentenceSplitSplit[nn].replace(d_letter[d], "d");
								}
								for (var e=0; e<e_letter.length; e++){
									sentenceSplitSplit[nn].replace(e_letter[e], "e");
								}
								for (var f=0; f<f_letter.length; f++){
									sentenceSplitSplit[nn].replace(f_letter[f], "f");
								}
								for (var g=0; g<a_letter.length; g++){
									sentenceSplitSplit[nn].replace(g_letter[g], "g");
								}
								for (var h=0; h<a_letter.length; h++){
									sentenceSplitSplit[nn].replace(h_letter[h], "h");
								}
								for (var i=0; i<a_letter.length; i++){
									sentenceSplitSplit[nn].replace(i_letter[i], "i");
								}
								for (var k=0; k<a_letter.length; k++){
									sentenceSplitSplit[nn].replace(k_letter[k], "k");
								}
								for (var n=0; n<a_letter.length; n++){
									sentenceSplitSplit[nn].replace(n_letter[n], "n");
								}
								for (var o=0; o<a_letter.length; o++){
									sentenceSplitSplit[nn].replace(o_letter[o], "o");
								}
								for (var p=0; p<a_letter.length; p++){
									sentenceSplitSplit[nn].replace(p_letter[p], "p");
								}
								for (var r=0; r<a_letter.length; r++){
									sentenceSplitSplit[nn].replace(r_letter[r], "r");
								}
								for (var s=0; s<a_letter.length; s++){
									sentenceSplitSplit[nn].replace(s_letter[s], "s");
								}
								for (var t=0; t<a_letter.length; t++){
									sentenceSplitSplit[nn].replace(t_letter[t], "t");
								}
								for (var u=0; u<a_letter.length; u++){
									sentenceSplitSplit[nn].replace(u_letter[u], "u");
								}
								for (var v=0; v<a_letter.length; v++){
									sentenceSplitSplit[nn].replace(v_letter[v], "v");
								}
								for (var w=0; w<a_letter.length; w++){
									sentenceSplitSplit[nn].replace(w_letter[w], "w");
								}
								for (var y=0; y<a_letter.length; y++){
									sentenceSplitSplit[nn].replace(y_letter[y], "y");
								}
								for (var z=0; z<a_letter.length; z++){
									sentenceSplitSplit[nn].replace(z_letter[z], "z");
								}
							}
						}
					}
					//theSentenceProcessed = theSentenceProcessed.replace(thebadlist[i], "****");
				}
				//use src attribute
				$("#sentence").html(theSentenceProcessed);
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
