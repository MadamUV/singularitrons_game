<?php

//pseudo-listen is a complex set of scripts governing a system of meaning in the bot.
//In order to add a word, enter a string followed by exactly 6 integers, each followed by a comma. IMPORTANT!!! : This is crucial to get exactly right, one extra or missing integer and the entire script will malfunction and the bot will say numbers and nonsense sentences. If you can't be totally accurate with your insertions into the below table, make a backup of the code before-hand.

//The first item to insert into the list is a noun-type word in double-quotes.
//The second item is an integer representing a scale on the word from
//the least (-10, representing badness) to greatest (10, representing goodness of the word.)
//The third item is another numeric range from -10 (most stupid) to 10 (most smart.)
//Fourth item: (-10, undignified) to (10, most dignified)
//Fifth item: another number, I actually forget what it is used for, but it isn't used anyway
//so feel free to use it however you like.
//unnecessary or necessary is probably it
//Sixth: ugly to beautiful scale
//Seventh: private - public scale
//
$noun_1 = array(array("baby", 4, 2, 0, 0, 7, 0), array("back", 0, 0, 3, 4, 0, 0), array("backbone", 2, 0, 0, 5, 0, 0), array("badge", 3, 0, 6, 0, 2, 5), array("balloon", 2, 0, 0, -3, 2, 0), array("bath", 0, 0, -2, 2, 0, -9), array("bathroom", 0, 0, -2, 2, 0, -9), array("bathtub", 0, 0, -2, 2, 0, -9), array("battery", 0, 0, 0, 7, 0, 0), array("battle", 0, 0, 5, 0, -4, 3), array("beach", 3, 0, 0, 0, 7, 10), array("bear", -3, -1, 0, 0, 0, 0), array("beard", 0, 0, 4, 0, 3, 9), array("beast", -5, -4, -4, 0, -8, 0), array("beauty", 7, 0, 7, 0, 10, 4), array("bed", 0, 0, 0, 4, 2, -8), array("bedroom", 0, 0, 0, 4, 2, -9), array("blood", -6, 0, 0, 7, -7, -6), array("boat", 0, 0, 0, 5, 2, 2), array("body", 0, 0, 0, 10, 0, 7));

if (isset($_POST["bot1"])){
	$bot1 = explode($_POST["bot1"]);
	//later, check in js whether the text has cleared before either bot comminicates again.
}
for($m=0; $m<count($bot1); $m++) {
	for($n=0; $n<count($noun1); $n++) {
            if(strtolower($bot1[$m])==$noun1[$n][0])
            { 
            //new
			
            $bot = array("bot", 7, 5, 3, 0, 6, 0);
			
                    if(($noun1[$n][2]) == 0 && $noun1[$n][3] == 0)
                    {
                       $say = array("Well I don't think being a ", "If I am just a ", "If I'm a ");
                       $say2 = array(" is the same as being alive.", " is alive, for starters.", " makes me competent enough to answer that question.", " makes me capable of answering that question.", " allows me to be able to answer that, but I'm a bot so I just did.");
					   $rand = rand(0, count($say)-1);
					   $rand2 = rand(0, count($say2)-1);
                       return $say[$rand] . $noun1[$n][0] . $say2[$rand2];
                    }
                    else if($noun1[$n][2] < 0)
                    {
                        $say = array("Thing is I am smarter than this ", "I got more smarts than this ", "I'm smarter than a ");
                        $say2 = array(" really I am", "I'm not stupid.", "I'm not dumb what do you take me for?", " so really what you take me for?", " by a long shot.");
					   $rand = rand(0, count($say)-1);
					   $rand2 = rand(0, count($say2)-1);
                       return $say[$rand] . $noun1[$n][0] . $say2[$rand2];
                    }
                    else if((integer)llList2String(bot, 6) > (integer)index(noun_1, i, 7, 6))
                    {
                        $say = array("But I'm prettier than a ", "Well what about you? are you prettier than a ", "I'm better-looking than a ");
					   $rand = rand(0, count($say)-1);
                       return $say[$rand] . $noun1[$n][0];
                    }
                }
                    
            //endnnew
            if  ()
                {
                    $bad = array();
                    array_push($bad, "Your love is a ");
                    array_push($bad, "In the evening the summer sun burns me like the ");
                    array_push($bad, "Trolls attack swiftly like most every ");
                    array_push($bad, "Madness is the quality of the ");
                    array_push($bad, "Pain and suffering come with every ");
                    array_push($bad, "That isn't good, that ");
                    array_push($bad, "I wish it were better than that ");
                    array_push($bad, "Scary as a ");
                    array_push($bad, "Disturbing ");
                    array_push($bad, "Oh God, it's a ");
                    array_push($bad, "It's not good, the ");
                    array_push($bad, "There isn't a good ");
                    array_push($bad, "Its the worst ever ");
                    array_push($bad, "Baddest ever ");
                    array_push($bad, "Have you known the worst ever ");
                    array_push($bad, "Worst. Ever. ");
                    array_push($bad, "What a bad ");
                    array_push($bad, "Sounds really bad if it's a ");
                    //if((string)llGetLinkPrimitiveParams(2, [PRIM_DESC]) == "0")
					//Instead of this, use database.
                    {
                    llSay(0, llList2String(bad, (integer)llFrand(llGetListLength(bad)-1)) + index(noun_1, i, 7, 0));
                   llMessageLinked(2, 0, llList2String(bad, (integer)llFrand(llGetListLength(bad)-1)) + index(noun_1, i, 7, 0), array("");
                    llResetScript();
                    }
                }
            if  ((integer)index(noun_1, i, 7, 6) < -6)
                {
                    list private = [];
                    private += "I wish I were alone in my ";
                    private += "I want to withdraw into my ";
                    private += "Once in a while I need to be alone in my ";
                    private += "It's nice to withdraw once in a while into your ";
                    private += "Looking within my ";
                    if((string)llGetLinkPrimitiveParams(2, [PRIM_DESC]) == "0")
                    {
                    llSay(0, llList2String(private, (integer)llFrand(llGetListLength(private)-1)) + index(noun_1, i, 7, 0));
                    llMessageLinked(2, 0, llList2String(private, (integer)llFrand(llGetListLength(private)-1)) + index(noun_1, i, 7, 0), array("");
                    llResetScript();
                    }
                }
                     if  ((integer)index(noun_1, i, 7, 5) > 6)
                {
                    list beauty = [];
                    beauty += "I can just imagine the ";
                    beauty += "At night, the  ";
                    beauty += "My life";
                    beauty += "There is no end to it. Your lips are like the beautiful ";
                    beauty += "Its lovely to see any ";
                    beauty += "What a lovely ";
                    beauty += "Pretty ";
                    beauty += "Nice pretty ";
                    beauty += "Lovely ";
                    beauty += "You're as beautiful as a ";
                    beauty += "*hugs* like a beautiful ";
                    beauty += "My dear, you are as lovely as a ";
                    beauty += "Lovely as a stunning ";
                    beauty += "You are as stunning as a ";
                    beauty += "You possess the beauty of a ";
                    beauty += "You are as amazing to behold as a ";
                    beauty += "Behold the loveliness of a ";
                    if((string)llGetLinkPrimitiveParams(2, [PRIM_DESC]) == "0")
                    {
                    llSay(0, llList2String(beauty, (integer)llFrand(llGetListLength(beauty)-1)) + index(noun_1, i, 7, 0));
                    llMessageLinked(2, 0, llList2String(beauty, (integer)llFrand(llGetListLength(beauty)-1)) + index(noun_1, i, 7, 0), array("");
                    llResetScript();
                    }
                }
                    if  ((integer)index(noun_1, i, 7, 2) < -3)
                {
                    list stupid = [];
                    stupid += "You're definitely smarter than a ";
                    stupid += "Do they think much, this ";
                    stupid += "Intelligence belongs in you, not in a ";
                    stupid += "I think you're smarter than a ";
                    stupid += "You're smart, at least compared to a ";
                    stupid += "You're a smart onem but what about a ";
                    
                    if((string)llGetLinkPrimitiveParams(2, [PRIM_DESC]) == "0")
                    {
                    llSay(0, llList2String(stupid, (integer)llFrand(llGetListLength(stupid)-1)) + index(noun_1, i, 7, 0));
        llMessageLinked(2, 0, llList2String(stupid, (integer)llFrand(llGetListLength(stupid)-1)) + index(noun_1, i, 7, 0), array("");
                    llResetScript();
                    }
                }
            }    
        }
    }
}
?>