<?php

$sentence1 = "";
$sentence2 = "";
$name1 = "";
$name2 = "";

$helpingVerbSingular = array("have", "does");
$helpingVerbPlural = array("had", "did");
$helpingModal = array("may", "should", "shall", "ought to", "might", "would", "will", "must", "could", "can");
//pronouns
$pronoun = array(array(array("I", "you", "he", "she", "it"), array("me", "you", "him", "her", "it"), array("my", "your", "his", "her", "its"), array("mine", "yours", "his", "hers", "its")), array("We", "you", "they", "they", "they"), array("us", "you", "them", "them", "them"), array("our", "your", "their", "their", "their"), array("ours", "yours", "theirs", "theirs", "theirs"));
$massNoun = array(array(namer => "water", unhealthyHealthy => 10, badGood => 0, nearFar => 0, insideOutside => 0, unimportantImportant => 10, uglyBeautiful => 7, nonexistExist => 10), array(namer => "fire", badGood => -2, nearFar => 0, insideOutside => 0, unimportantImportant => 6, uglyBeautiful => 7, nonexistExist => 10), array(namer => "meat", unhealthyHealthy => -2, badGood => 0, lessMore => 0, unimportantImportant => 5), array(namer => "advice", funnySerious => 6, badGood => 0, stupidSmart => 8, unusualUsual => 0, unimportantImportant => 3), array(namer => "air", badGood => 9, smallGreat => 9, unimportantImportant => 10, nonexistExist => 10), array(namer => "blood", funnySerious => 5, badGood => 0, painPleasure => -8, lessMore => 0, insideOutside => -10, unimportantImportant => 10, uglyBeautiful => -7, nonexistExist => 10), array(namer => "equipment", unimportantImportant => 0, uglyBeautiful => 0), array(namer => "food", unhealthyHealthy => 0, badGood => 0, lessMore => 0, unusualUsual => 0, unimportantImportant => 10), array(namer => "furniture", badGood => 0, nearFar => 0, unusualUsual => 0, insideOutside => -3, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "garbage", unhealthyHealthy => -9, shamePride => -5, badGood => -5, nearFar => 0, lessMore => 0, unusualUsual => 0, uglyBeautiful => -9), array(namer => "graffiti", badGood => -2, uglyBeautiful => 0), array(namer => "grass", badGood => 0, nearFar => 0, lessMore => 0, chaoticOrderly => 0, uglyBeautiful => 0), array(namer => "homework", lessMore => 0, unimportantImportant => 6), array(namer => "housework", badGood => 0, unusualUsual => 7, insideOutside => -10, unimportantImportant => 5, chaoticOrderly => 10), array(namer => "information", unusualUsual => 0, insideOutside => 0, unimportantImportant => 0, chaoticOrderly => 5), array(namer => "knowledge", shamePride => 5, badGood => 4, stupidSmart => 8, lessMore => 0, unimportantImportant => 0, nonexistExist => 10), array(namer => "luggage", smallGreat => 4, lessMore => 3, unusualUsual => 0, unimportantImportant => 0), array(namer => "mathematics", funnySerious => 1, chaoticOrderly => 10), array(namer => "milk", badGood => 0, unimportantImportant => 3), array(namer => "money", badGood => 0, smallGreat => 10, lessMore => 0, unimportantImportant => 8), array(namer => "music", badGood => 1, unusualUsual => 0, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 4), array(namer => "pollution", unhealthyHealthy => -10, funnySerious => 8, badGood => -9, nearFar => 0, lessMore => 0, insideOutside => 8, uglyBeautiful => -9, nonexistExist => 10), array(namer => "research", badGood => 0, funnySerious => 8, stupidSmart => 9, lessMore => 0, chaoticOrderly => 8), array(namer => "sand", smallGreat => -10, lessMore => 9, uglyBeautiful => 0), array(namer => "soap", smallGreat => -3), array(namer => "software", badGood => 0, stupidSmart => 3, unusualUsual => 0), array(namer => "sugar", unhealthyHealthy => -7, badGood => 0, painPleasure => 8, lessMore => 0, unimportantImportant => 0), array(namer => "traffic", badGood => -5, nearFar => 0, lessMore => 0, insideOutside => 3, chaoticOrderly => -4));
//prepositions
$preposition = array(array(namer => "about", before => 1, after => 1), array(namer => "but", before => 1, after => -1, sameDifferent => 10), array(namer => "in", insideOutside => -10, nearFar => -10, before => 1, after => 1), array(namer => "below", shamePride => -9, before => 1, after => 1, smallGreat => -6, nonexistExist => -5, unimportantImportant => -5), array(namer => "among", nearFar => -9), array(namer => "concerning", before => 1, after => 1, funnySerious => 3), array(namer => "beneath", shamePride => -8, before => 1, after => 1, smallGreat => -6, nonexistExist => -5, unimportantImportant => -5), array(namer => "yet", before => 1, after => -1, sameDifferent => 10), array(namer => "in spite of", before => 1, after => -1), array(namer => "to", before => 1, after => 1, nearFar => -5), array(namer => "toward", before => 1, after => 1, nearFar => -5), array(namer => "beside", before => 1, after => 1, nearFar => -8));

function getHelping() {
    //"use strict";
    $rand = rand(0, count($helpingModal));
    $rand2 = rand(0, 1);
    if ($rand2 == 1) {
		return $helpingModal[$rand];
	}
	else if (rand2 <= 0.5) {
            return "";
    }
}
function getPrep() {
    //"use strict";
	$rand = Math.floor(Math.random() * preposition.length);
	return preposition[rand].namer;
}
function getMass() {
    //"use strict";
	$rand = Math.floor(Math.random() * massNoun.length);
	return massNoun[rand].namer;
}
function randSubjPron() {
    //"use strict";
	$rand = Math.floor(Math.random() * 5);
	$rand2 = Math.random();
	$sp  = pronoun[0][0][rand];
	if (rand2 > 0.5) {
		sp = pronoun[1][0][rand];
	}
	return sp;
}
function randObjPron() {
    //"use strict";
	$rand = Math.floor(Math.random() * 5);
	$rand2  = Math.random();
	$sp = pronoun[0][1][rand];
	if (rand2 > 0.5) {
		sp = pronoun[1][1][rand];
	}
	return sp;
}

//
//************* Also, some of these attributes will, when paired with others, change their value to -10, 0, or 10.
//Set default values where conditional changes to an attribute are in question. Take care of those changes inside the parallel
//lists (js objects) reserved for thoughts. Don't forget to save thoughts in playerprefs.
//
//
/*
//
  bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
  less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful, nonexistent or existent, funny or serious, shame or pride, unhealthy or healthy, same or different
  
  emotes =>  unhappy or happy, expectant or surprised
//
*/
//verbs
$verbIntrans = [array(namer => "snow", lessMore => 2, uglyBeautiful => 9), array(namer => "swim", unableAble => 6, lessMore => 0), array(namer => "fart", uglyBeautiful => -9, lessMore => 0, funnySerious => -10, unhealthyHealthy => 7), array(namer => "think", lessMore => 0, stupidSmart => 10, deadAlive => 10, funnySerious => 0), array(namer => "blunder", badGood => -10, painPleasure => -9, stupidSmart => -10, chaoticOrderly => -10, funnySerious => 9), array(namer => "cook", badGood => 0, unusualUsual => 0, chaoticOrderly => 3), array(namer => "convulse", unhealthyHealthy => -10, badGood => -10, funnySerious => 10, painPleasure => -10, deadAlive => -7, unusualUsual => -7, chaoticOrderly => -9), array(namer => "cooperate", badGood => 1, lessMore => 0, chaoticOrderly => 3), array(namer => "die", sameDifferent => 10, badGood => -10, deadAlive => -10, unableAble => -10, painPleasure => -10, funnySerious => 10), array(namer => "diet", badGood => 3, stupidSmart => 2, unimportantImportant => 2), array(namer => "nod", funnySerious => -3), array(namer => "parody", sameDifferent => 4, painPleasure => 8, unusualUsual => -3, unimportantImportant => 0, funnySerious => -10), array(namer => "part", nearFar => 10), array(namer => "quack", shamePride => -7, stupidSmart => -7, lessMore => 0, unimportantImportant => -6, uglyBeautiful => -3, funnySerious => -8), array(namer => "recover", unhealthyHealthy => 10, badGood => 9, deadAlive => 10, lessMore => 0, unimportantImportant => 8), array(namer => "regrow", sameDifferent => 3, unhealthyHealthy => 6, badGood => 3, smallGreat => 9, unableAble => 6, lessMore => 0), array(namer => "rehearse", unableAble => 7, chaoticOrderly => 8), array(namer => "heal", unhealthyHealthy => 10, badGood => 9, painPleasure => 9, lessMore => 0, insideOutside => -5, unimportantImportant => 8), array(namer => "boast", shamePride => 6}];
$verbTrans = [array(namer => "give away", lessMore => -10, badGood => 0, nearFar => 4), array(namer => "brainwash", badGood => -9, deadAlive => -5, stupidSmart => -7, funnySerious => 10, unhealthyHealthy => -10), array(namer => "braid", smallGreat => 0, uglyBeautiful => 8), array(namer => "bug", badGood => -8, unhealthyHealthy => -3}];
//emotes
$emote = [array(namer => "8-)", unhappyHappy => 10, stupidSmart => 7, painPleasure => 6), array(namer => " => )", unhappyHappy => 10, badGood => 6, painPleasure => 8), array(namer => " => (", unhappyHappy => -10, painPleasure => -8, badGood => -6), array(namer => "-_-", unhappyHappy => -4, badGood => -8, painPleasure => -8), array(namer => " => C", unhappyHappy =>  -5, badGood => -5, funnySerious => -5, painPleasure => -5), array(namer => "O_o", expectantSurprised =>  10, badGood => -7, unusualUsual => -7, funnySerious => 4), array(namer => " => O", expectantSurprised => 10, unusualUsual => -4}];
//continuations
$continuationCommonNouns = [{name1 =>  randSubjPron() + " can't see ", name2 => "from here", nearFar => 9, smallGreat => -7, nonexistExist => -5), {name1 =>  randSubjPron() + " go through ", name2 => "like crazy", lessMore => -8, badGood => -7, funnySerious => -1), {name1 => "It's the ", name2 =>  randSubjPron() + " can only dream of", nonexistExist => -7, uglyBeautiful => 7, painPleasure => 0), {name1 => "I was sad when my ", name2 => "died", unhappyHappy => -10), {name1 =>  randSubjPron() + " gave ", name2 => "away", lessMore => -8, nearFar => -8), {name1 =>  randSubjPron() + " threw ", name2 => "away", unimportantImportant => -10, lessMore => -9), {name1 => randSubjPron() + " always " + getHelping() + " ", name2 => "and nothing else"}];
$continuationIntransitiveVPast = [{name1 =>  randSubjPron+ " " + getHelping() + " ", name2 => "now", unimportantImportant => 9}];
$continuationPlurals = [{name1 =>  randSubjPron() +" cook ", name2 => "well", badGood => 8}];
//common nouns
$commonNoun = [array(namer => "brain", stupidSmart => 8 ), array(namer => "core", nearFar => -8, insideOutside => -10, unimportantImportant => 9), array(namer =>  "shrimp", funnySerious => -1, smallGreat => -9, unimportantImportant => -9), array(namer => "schedule", unusualUsual => 7, chaoticOrderly => 10), array(namer => "man", smallGreat => 5, unimportantImportant => 5, deadAlive => 10, badGood => 0, uglyBeautiful => 0, nonexistExist => 10), array(namer => "thing", badGood => 0, smallGreat => 0, nearFar => 0, deadAlive => -5, nonexistExist => 10, uglyBeautiful => 2, insideOutside => 5), array(namer => "child", unhealthyHealthy => 2, smallGreat => -5, unimportantImportant => 5, deadAlive => 10, badGood => 0, uglyBeautiful => 2, stupidSmart => -2), array(namer => "woman",  unhealthyHealthy => 0, smallGreat => 4, unimportantImportant => 5, deadAlive => 10, badGood => 0, uglyBeautiful => 0, nonexistExist => 10), array(namer => "part", lessMore => -5, nearFar => -6), array(namer => "group", lessMore => 10, badGood => 0, nonexistExist => 10, unimportantImportant => 0, chaoticOrderly => 2), array(namer => "world", badGood => 0, insideOutside => 5, smallGreat => 10, uglyBeautiful => 7, nonexistExist => 10), array(namer => "home", badGood => 7, smallGreat => 3, unusualUsual => 0, insideOutside => -2, uglyBeautiful => 0), array(namer => "house", badGood => 0, smallGreat => 3, unusualUsual => 0, insideOutside => -2, uglyBeautiful => 0), array(namer => "area", smallGreat => 0), array(namer => "company", funnySerious => 7, unableAble => 4, nonexistExist => 10), array(namer => "place", nearFar => 0, insideOutside => 0, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 0), array(namer => "hand", deadAlive => 10, painPleasure => 0), array(namer => "school", nearFar => 0, unusualUsual => 0, insideOutside => -4, chaoticOrderly => 5, uglyBeautiful => 0), array(namer => "country", nearFar => 0, insideOutside => 10, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 6, smallGreat => 9), array(namer => "point", nearFar => 0), array(namer => "member", deadAlive => 10, stupidSmart => 0, unusualUsual => 0, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "state", nearFar => 0,chaoticOrderly => 0), array(namer => "Word", unimportantImportant => 9, uglyBeautiful => 8), array(namer => "family", sameDifferent => -10, nearFar => -7, deadAlive => 10, painPleasure => 0, lessMore => 0, unimportantImportant => 10, uglyBeautiful => 9, nonexistExist => 10), array(namer => "head", nearFar => -10, deadAlive => 10, painPleasure => 0, unimportantImportant => 10, chaoticOrderly => 0, nonexistExist => 10), array(namer => "side", nearFar => -5, insideOutside => 3, uglyBeautiful => 0, nonexistExist => 10), array(namer => "business", funnySerious => 8, unableAble => 0,unimportantImportant => 8, chaoticOrderly => 9, nonexistExist => 0), array(namer => "night", deadAlive => -8, painPleasure => -5,insideOutside => 5, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "question", unusualUsual => 0, unimportantImportant => 0}];
//mass nouns

//abstract nouns
$abstractNoun = [array(namer => "time", smallGreat => 10, unimportantImportant => 6), array(namer => "year", smallGreat => 10), array(namer => "way", nearFar => 9, chaoticOrderly => 6), array(namer => "day", nearFar => -3, smallGreat => 0, unimportantImportant => 0, chaoticOrderly => 0), array(namer => "month", nearFar => -2, smallGreat => 0, unimportantImportant => 0, chaoticOrderly => 0), array(namer => "government", smallGreat => 10, deadAlive => 10, badGood => 0, unimportantImportant => 10, unableAble => 10, lessMore => 10), array(namer => "work", unimportantImportant => 8, badGood => 0), array(namer => "life", shamePride => 6, deadAlive => 10, badGood => 0, smallGreat => 0, unimportantImportant => 8, chaoticOrderly => -2), array(namer => "system", badGood => 0, unusualUsual => 2, chaoticOrderly => 9), array(namer => "case", badGood => 0, unusualUsual => 0), array(namer => "number", lessMore => 0), array(namer => "problem", badGood => -8, unimportantImportant => 0, uglyBeautiful => -2), array(namer => "service", funnySerious => 2), array(namer => "party", painPleasure => 6, badGood => 2, chaoticOrderly => -1, insideOutside => 0), array(namer => "week", nearFar => 0, unimportantImportant => 0), array(namer => "end", nearFar => 0, funnySerious => 5, painPleasure => 4, unimportantImportant => 2, uglyBeautiful => 0), array(namer => "fact", funnySerious => 8, unusualUsual => 0, insideOutside => 0), array(namer => "information", unusualUsual => 0, insideOutside => 0, unimportantImportant => 0, chaoticOrderly => 5), array(namer => "power", funnySerious => 6, badGood => 0, smallGreat => 10, painPleasure => 7, lessMore => 8,unimportantImportant => 5), array(namer => "change", badGood => 0, nearFar => 0, lessMore => 0, unusualUsual => 4), array(namer => "interest", badGood => 0, smallGreat => 0, lessMore => 0, unimportantImportant => 2, nonexistExist => 0), array(namer => "development", lessMore => 4, insideOutside => 0), array(namer => "money", badGood => 0, smallGreat => 10, lessMore => 0, unimportantImportant => 8), array(namer => "research", badGood => 0, stupidSmart => 9, lessMore => 0, chaoticOrderly => 8), array(namer => "transportation", badGood => 1, nearFar => 0, lessMore => 0, chaoticOrderly => 6), array(namer => "travel", badGood => 1, nearFar => 4, lessMore => 0, chaoticOrderly => 4), array(namer => "trash", unhealthyHealthy => -5, badGood => -5, nearFar => 0, lessMore => 0, uglyBeautiful => -8}];
//plural nouns
$pluralNoun = [array(namer => "pages", insideOutside => -6, chaoticOrderly => 2), array(namer => "people", unusualUsual => 8, deadAlive => 10}];
//proper nouns
$properNoun = [array(namer => "Mr", funnySerious => 4, smallGreat => 5, unimportantImportant => 5, deadAlive => 10, badGood => 0, uglyBeautiful => 0}];
//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful
function shuffle(array) {
    //"use strict";
	$n = 0;
	$m = 0;
        $rand = Math.floor(Math.random()*array.length);
	for(n = 0; n < array.length; n++)
	{
		m = array[n];
		array[n] = array[rand];
		array[rand] = m;
	}
	return array;
}
function prepareTalk() {
    //"use strict";
	//Objects with name key and attr =>  pronoun, emote, continuationCommonNouns, continuationIntransitiveVPast, continuationPlurals,
	//...preposition, commonNoun, abstractNoun, massNoun, pluralNoun, verbIntrans, verbTrans
	//
	//Pure arrays =>  helpingModal, helpingVerbPlural, helpingVerbPlural
	
	continuationCommonNouns = shuffle(continuationCommonNouns);
	continuationIntransitiveVPast = shuffle(continuationIntransitiveVPast);
	continuationPlurals = shuffle(continuationPlurals);
	preposition = shuffle(preposition);
	commonNoun = shuffle(commonNoun);
	abstractNoun = shuffle(abstractNoun);
	massNoun = shuffle(massNoun);
	pluralNoun = shuffle(pluralNoun);
	verbIntrans = shuffle(verbIntrans);
	verbTrans = shuffle(verbTrans);
	emote = shuffle(emote);
	//$rand1 = Mathf.ceil(Mathf.Random*3);
	//if (rand1==1){
		//second sentence should be related to the non-modifying element of the first and its arrangement should not be altered by this.
		$randPron = Math.floor(Math.random()*5);
		$randPronSP = Math.random();
		$pronSubj = "";
		$pronObj = "";
		$possessiveSubj  = "";
		if (randPronSP > 0.5) {
			//first number is singular/plural, 2nd is subject/object/possessive, 3rd is which person
			pronSubj = pronoun[0][0][randPron];
			pronObj = pronoun[0][1][randPron];
			possessiveSubj = pronoun[0][2][randPron];
		}
		else {
			pronSubj = pronoun[1][0][randPron];
			pronObj = pronoun[1][1][randPron];
			possessiveSubj = pronoun[1][2][randPron];
		}
		$ar = 0;
		$myVerb = "";
		$myNoun = "";
		$aboutMyNoun = 0;
		$whichPropertyNoun = "";
		$aboutMyVerb = 0;
		$verbIsNegative = false;
		$num = 0;
		$arrVerb = [];
		$arb = 0;
		for(num = 0; num < verbTrans.length; num++){
			arrVerb = [];
			if (verbTrans[num].badGood !== null){
				arrVerb.push(verbTrans[num].badGood);
			}
			if (verbTrans[num].smallGreat !== null){
				arrVerb.push(verbTrans[num].smallGreat);
			}
			if (verbTrans[num].nearFar !== null){
				arrVerb.push(verbTrans[num].nearFar);
			}
			if (verbTrans[num].deadaLive !== null){
				arrVerb.push(verbTrans[num].deadAlive);
			}
			if (verbTrans[num].unimportantImportant !== null){
				arrVerb.push(verbTrans[num].unimportantImportant);
			}
			if (verbTrans[num].lessMore !== null){
				arrVerb.push(verbTrans[num].lessMore);
			}
			arrVerb = shuffle(arrVerb);
			arb = 0;
			if (arrVerb.length > 0) {
				for(arb=0; arb < arrVerb.length; arb++){
					if (arrVerb[arb] <= -5 || arrVerb[arb] > 5){
						verbIsNegative = true;
						myVerb = verbTrans[num].namer;
						aboutMyVerb=arrVerb[arb];
						break;
					}
					else {
						myVerb="get";
						//break;
					}
				}
			}
		}
		num=0;
		$whichNoun = [];
		$arrNoun = [];
		commonNoun = shuffle(commonNoun);
		$whi = 0;
		$arrWhi = [];
		//get the properties of the common noun
		for(num = 0; num < commonNoun.length; num++){
			if (commonNoun[num].unableAble !== null){
				whichNoun.push("unableAble");
				arrNoun.push(commonNoun[num].unableAble);
			}
			if (commonNoun[num].painPleasure !== null){
				whichNoun.push("painPleasure");
				arrNoun.push(commonNoun[num].painPleasure);
			}
			if (commonNoun[num].stupidSmart !== null){
				whichNoun.push("stupidSmart");
				arrNoun.push(commonNoun[num].stupidSmart);
			}
			if (commonNoun[num].unusualUsual !== null){
				whichNoun.push("unusualUsual");
				arrNoun.push(commonNoun[num].unusualUsual);
			}
			if (commonNoun[num].insideOutside !== null){
				whichNoun.push("insideOutside");
				arrNoun.push(commonNoun[num].insideOutside);
			}
			if (commonNoun[num].unimportantImportant !== null){
				whichNoun.push("unimportantImportant");
				arrNoun.push(commonNoun[num].unimportantImportant);
			}
			if (commonNoun[num].chaoticOrderly !== null){
				whichNoun.push("chaoticOrderly");
				arrNoun.push(commonNoun[num].chaoticOrderly);
			}
			if (commonNoun[num].uglyBeautiful !== null){
				whichNoun.push("uglyBeautiful");
				arrNoun.push(commonNoun[num].uglyBeautiful);
			}
			if (commonNoun[num].nonexistExist !== null){
				whichNoun.push("nonexistExist");
				arrNoun.push(commonNoun[num].nonexistExist);
			}
			if (commonNoun[num].funnySerious !== null){
				whichNoun.push("funnySerious");
				arrNoun.push(commonNoun[num].funnySerious);
			}
			if (commonNoun[num].shamePride !== null){
				whichNoun.push("shamePride");
				arrNoun.push(commonNoun[num].shamePride);
			}
			if (commonNoun[num].unhealthyHealthy !== null){
				whichNoun.push("unhealthyHealthy");
				arrNoun.push(commonNoun[num].unusualUsual);
			}
			if (commonNoun[num].sameDifferent !== null){
				whichNoun.push("sameDifferent");
				arrNoun.push(commonNoun[num].sameDifferent);
			}
			if (commonNoun[num].unhappyHappy !== null){
				whichNoun.push("unhappyHappy");
				arrNoun.push(commonNoun[num].unhappyHappy);
			}
			if (commonNoun[num].expectantSurprised !== null){
				whichNoun.push("expectantSurprised");
				arrNoun.push(commonNoun[num].expectantSurprised);
			}
			if (whichNoun.length>0){
				//get the noun
				myNoun = commonNoun[num].namer;
				arrWhi = [];
				//get the order we will count the noun's properties
				for (whi = 0; whi < whichNoun.length; whi++){
					arrWhi.push(whi);
				}
				arrWhi = shuffle(arrWhi);
				/*if one the noun's properties is above 4 or below -4,
				in other words, is a more intense word or phrase in some respect */
				whi=0;
				for(whi = 0; whi < arrWhi.length; whi++){
					if (arrNoun[whi] > 4 || arrNoun[whi] < -4){
						aboutMyNoun = arrNoun[whi];
						whichPropertyNoun = whichNoun[whi];
						//now that we have a match, exit the loop.
						break;
					}
				}
				break;
			}
		}
		//make the first sentence
		$randConn = Math.random();
		$getConn = "";
		if (randConn < 0.2){
			 getConn = getPrep() + " that...";
		}
		else if (randConn >= 0.2 && randConn < 0.4){
			getConn = "...";
		}
		else if (randConn >= 0.4 && randConn < 0.6){
			getConn = "?";
		}
		else if (randConn >= 0.6){
			getConn = ".";
		}
		sentence1 = pronSubj + " " + myVerb + " " + possessiveSubj + " " + myNoun + " " + getConn +  ". ";
		sentence2 = getConn="Please, " + getHelping() + pronSubj + " " + " have " + getMass() + "?";
		$sentences = sentence1 + sentence2;
         return sentences;
	//}
	/*
	//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful, nonexistent or existent, funny or serious, shame or pride, unhealthy or healthy, same or different
emotes =>  unhappy or happy, expectant or surprised
	*/
	/*else if (rand1==2){
	}
	else {
	}*/
}
       $sentence = prepareTalk();
       document.getElementById("mySay").innerHTML(sentence);$sentence1 = "";
$sentence2 = "";
$name1 = "";
$name2 = "";

$helpingVerbSingular = ["have", "does"];
$helpingVerbPlural = ["had", "did"];
$helpingModal = ["may", "should", "shall", "ought to", "might", "would", "will", "must", "could", "can"];
//pronouns
$pronoun = [[["I", "you", "he", "she", "it"], ["me", "you", "him", "her", "it"], ["my", "your", "his", "her", "its"], ["mine", "yours", "his", "hers", "its"]], [["We", "you", "they", "they", "they"], ["us", "you", "them", "them", "them"], ["our", "your", "their", "their", "their"], ["ours", "yours", "theirs", "theirs", "theirs"]]];
$massNoun = [array(namer => "water", unhealthyHealthy => 10, badGood => 0, nearFar => 0, insideOutside => 0, unimportantImportant => 10, uglyBeautiful => 7, nonexistExist => 10), array(namer => "fire", badGood => -2, nearFar => 0, insideOutside => 0, unimportantImportant => 6, uglyBeautiful => 7, nonexistExist => 10), array(namer => "meat", unhealthyHealthy => -2, badGood => 0, lessMore => 0, unimportantImportant => 5), array(namer => "advice", funnySerious => 6, badGood => 0, stupidSmart => 8, unusualUsual => 0, unimportantImportant => 3), array(namer => "air", badGood => 9, smallGreat => 9, unimportantImportant => 10, nonexistExist => 10), array(namer => "blood", funnySerious => 5, badGood => 0, painPleasure => -8, lessMore => 0, insideOutside => -10, unimportantImportant => 10, uglyBeautiful => -7, nonexistExist => 10), array(namer => "equipment", unimportantImportant => 0, uglyBeautiful => 0), array(namer => "food", unhealthyHealthy => 0, badGood => 0, lessMore => 0, unusualUsual => 0, unimportantImportant => 10), array(namer => "furniture", badGood => 0, nearFar => 0, unusualUsual => 0, insideOutside => -3, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "garbage", unhealthyHealthy => -9, shamePride => -5, badGood => -5, nearFar => 0, lessMore => 0, unusualUsual => 0, uglyBeautiful => -9), array(namer => "graffiti", badGood => -2, uglyBeautiful => 0), array(namer => "grass", badGood => 0, nearFar => 0, lessMore => 0, chaoticOrderly => 0, uglyBeautiful => 0), array(namer => "homework", lessMore => 0, unimportantImportant => 6), array(namer => "housework", badGood => 0, unusualUsual => 7, insideOutside => -10, unimportantImportant => 5, chaoticOrderly => 10), array(namer => "information", unusualUsual => 0, insideOutside => 0, unimportantImportant => 0, chaoticOrderly => 5), array(namer => "knowledge", shamePride => 5, badGood => 4, stupidSmart => 8, lessMore => 0, unimportantImportant => 0, nonexistExist => 10), array(namer => "luggage", smallGreat => 4, lessMore => 3, unusualUsual => 0, unimportantImportant => 0), array(namer => "mathematics", funnySerious => 1, chaoticOrderly => 10), array(namer => "milk", badGood => 0, unimportantImportant => 3), array(namer => "money", badGood => 0, smallGreat => 10, lessMore => 0, unimportantImportant => 8), array(namer => "music", badGood => 1, unusualUsual => 0, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 4), array(namer => "pollution", unhealthyHealthy => -10, funnySerious => 8, badGood => -9, nearFar => 0, lessMore => 0, insideOutside => 8, uglyBeautiful => -9, nonexistExist => 10), array(namer => "research", badGood => 0, funnySerious => 8, stupidSmart => 9, lessMore => 0, chaoticOrderly => 8), array(namer => "sand", smallGreat => -10, lessMore => 9, uglyBeautiful => 0), array(namer => "soap", smallGreat => -3), array(namer => "software", badGood => 0, stupidSmart => 3, unusualUsual => 0), array(namer => "sugar", unhealthyHealthy => -7, badGood => 0, painPleasure => 8, lessMore => 0, unimportantImportant => 0), array(namer => "traffic", badGood => -5, nearFar => 0, lessMore => 0, insideOutside => 3, chaoticOrderly => -4}];
//prepositions
$preposition = [array(namer => "about", before => 1, after => 1), array(namer => "but", before => 1, after => -1, sameDifferent => 10), array(namer => "in", insideOutside => -10, nearFar => -10, before => 1, after => 1), array(namer => "below", shamePride => -9, before => 1, after => 1, smallGreat => -6, nonexistExist => -5, unimportantImportant => -5), array(namer => "among", nearFar => -9), array(namer => "concerning", before => 1, after => 1, funnySerious => 3), array(namer => "beneath", shamePride => -8, before => 1, after => 1, smallGreat => -6, nonexistExist => -5, unimportantImportant => -5), array(namer => "yet", before => 1, after => -1, sameDifferent => 10), array(namer => "in spite of", before => 1, after => -1), array(namer => "to", before => 1, after => 1, nearFar => -5), array(namer => "toward", before => 1, after => 1, nearFar => -5), array(namer => "beside", before => 1, after => 1, nearFar => -8}];

function getHelping() {
        //"use strict";
    $rand = Math.floor(Math.random() * helpingModal.length);
    $rand2 = Math.random();
    if (rand2 > 0.5) {
		return helpingModal[rand];
	}
	/*else if (rand2 <= 0.5) {
            return "";
    }*/
}
function getPrep() {
        //"use strict";
	$rand = Math.floor(Math.random() * preposition.length);
	return preposition[rand].namer;
}
function getMass() {
        //"use strict";
	$rand = Math.floor(Math.random() * massNoun.length);
	return massNoun[rand].namer;
}
function randSubjPron() {
        //"use strict";
	$rand = Math.floor(Math.random() * 5);
	$rand2 = Math.random();
	$sp  = pronoun[0][0][rand];
	if (rand2 > 0.5) {
		sp = pronoun[1][0][rand];
	}
	return sp;
}
function randObjPron() {
        //"use strict";
	$rand = Math.floor(Math.random() * 5);
	$rand2  = Math.random();
	$sp = pronoun[0][1][rand];
	if (rand2 > 0.5) {
		sp = pronoun[1][1][rand];
	}
	return sp;
}

//
//************* Also, some of these attributes will, when paired with others, change their value to -10, 0, or 10.
//Set default values where conditional changes to an attribute are in question. Take care of those changes inside the parallel
//lists (js objects) reserved for thoughts. Don't forget to save thoughts in playerprefs.
//
//
/*
//
  bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
  less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful, nonexistent or existent, funny or serious, shame or pride, unhealthy or healthy, same or different
  
  emotes =>  unhappy or happy, expectant or surprised
//
*/
//verbs
$verbIntrans = [array(namer => "snow", lessMore => 2, uglyBeautiful => 9), array(namer => "swim", unableAble => 6, lessMore => 0), array(namer => "fart", uglyBeautiful => -9, lessMore => 0, funnySerious => -10, unhealthyHealthy => 7), array(namer => "think", lessMore => 0, stupidSmart => 10, deadAlive => 10, funnySerious => 0), array(namer => "blunder", badGood => -10, painPleasure => -9, stupidSmart => -10, chaoticOrderly => -10, funnySerious => 9), array(namer => "cook", badGood => 0, unusualUsual => 0, chaoticOrderly => 3), array(namer => "convulse", unhealthyHealthy => -10, badGood => -10, funnySerious => 10, painPleasure => -10, deadAlive => -7, unusualUsual => -7, chaoticOrderly => -9), array(namer => "cooperate", badGood => 1, lessMore => 0, chaoticOrderly => 3), array(namer => "die", sameDifferent => 10, badGood => -10, deadAlive => -10, unableAble => -10, painPleasure => -10, funnySerious => 10), array(namer => "diet", badGood => 3, stupidSmart => 2, unimportantImportant => 2), array(namer => "nod", funnySerious => -3), array(namer => "parody", sameDifferent => 4, painPleasure => 8, unusualUsual => -3, unimportantImportant => 0, funnySerious => -10), array(namer => "part", nearFar => 10), array(namer => "quack", shamePride => -7, stupidSmart => -7, lessMore => 0, unimportantImportant => -6, uglyBeautiful => -3, funnySerious => -8), array(namer => "recover", unhealthyHealthy => 10, badGood => 9, deadAlive => 10, lessMore => 0, unimportantImportant => 8), array(namer => "regrow", sameDifferent => 3, unhealthyHealthy => 6, badGood => 3, smallGreat => 9, unableAble => 6, lessMore => 0), array(namer => "rehearse", unableAble => 7, chaoticOrderly => 8), array(namer => "heal", unhealthyHealthy => 10, badGood => 9, painPleasure => 9, lessMore => 0, insideOutside => -5, unimportantImportant => 8), array(namer => "boast", shamePride => 6}];
$verbTrans = [array(namer => "give away", lessMore => -10, badGood => 0, nearFar => 4), array(namer => "brainwash", badGood => -9, deadAlive => -5, stupidSmart => -7, funnySerious => 10, unhealthyHealthy => -10), array(namer => "braid", smallGreat => 0, uglyBeautiful => 8), array(namer => "bug", badGood => -8, unhealthyHealthy => -3}];
//emotes
$emote = [array(namer => "8-)", unhappyHappy => 10, stupidSmart => 7, painPleasure => 6), array(namer => " => )", unhappyHappy => 10, badGood => 6, painPleasure => 8), array(namer => " => (", unhappyHappy => -10, painPleasure => -8, badGood => -6), array(namer => "-_-", unhappyHappy => -4, badGood => -8, painPleasure => -8), array(namer => " => C", unhappyHappy =>  -5, badGood => -5, funnySerious => -5, painPleasure => -5), array(namer => "O_o", expectantSurprised =>  10, badGood -> -7, unusualUsual -> -7, funnySerious -> 4), array(namer -> " -> O", expectantSurprised -> 10, unusualUsual -> -4}];
//continuations
$continuationCommonNouns = [{name1 ->  randSubjPron() + " can't see ", name2 -> "from here", nearFar -> 9, smallGreat -> -7, nonexistExist -> -5), {name1 ->  randSubjPron() + " go through ", name2 -> "like crazy", lessMore -> -8, badGood -> -7, funnySerious -> -1), {name1 -> "It's the ", name2 ->  randSubjPron() + " can only dream of", nonexistExist -> -7, uglyBeautiful -> 7, painPleasure -> 0), {name1 -> "I was sad when my ", name2 -> "died", unhappyHappy -> -10), {name1 ->  randSubjPron() + " gave ", name2 -> "away", lessMore -> -8, nearFar -> -8), {name1 ->  randSubjPron() + " threw ", name2 -> "away", unimportantImportant -> -10, lessMore -> -9), {name1 -> randSubjPron() + " always " + getHelping() + " ", name2 -> "and nothing else"}];
$continuationIntransitiveVPast = [{name1 ->  randSubjPron+ " " + getHelping() + " ", name2 -> "now", unimportantImportant -> 9}];
$continuationPlurals = [{name1 ->  randSubjPron() +" cook ", name2 -> "well", badGood -> 8}];
//common nouns
$commonNoun = [array(namer -> "brain", stupidSmart -> 8 ), array(namer -> "core", nearFar -> -8, insideOutside -> -10, unimportantImportant -> 9), array(namer ->  "shrimp", funnySerious -> -1, smallGreat -> -9, unimportantImportant -> -9), array(namer -> "schedule", unusualUsual -> 7, chaoticOrderly -> 10), array(namer -> "man", smallGreat -> 5, unimportantImportant -> 5, deadAlive -> 10, badGood -> 0, uglyBeautiful -> 0, nonexistExist -> 10), array(namer -> "thing", badGood -> 0, smallGreat -> 0, nearFar -> 0, deadAlive -> -5, nonexistExist -> 10, uglyBeautiful -> 2, insideOutside -> 5), array(namer -> "child", unhealthyHealthy -> 2, smallGreat -> -5, unimportantImportant -> 5, deadAlive -> 10, badGood -> 0, uglyBeautiful -> 2, stupidSmart -> -2), array(namer -> "woman",  unhealthyHealthy -> 0, smallGreat -> 4, unimportantImportant -> 5, deadAlive -> 10, badGood -> 0, uglyBeautiful -> 0, nonexistExist -> 10), array(namer -> "part", lessMore -> -5, nearFar -> -6), array(namer -> "group", lessMore -> 10, badGood -> 0, nonexistExist -> 10, unimportantImportant -> 0, chaoticOrderly -> 2), array(namer -> "world", badGood -> 0, insideOutside -> 5, smallGreat -> 10, uglyBeautiful -> 7, nonexistExist -> 10), array(namer -> "home", badGood -> 7, smallGreat -> 3, unusualUsual -> 0, insideOutside -> -2, uglyBeautiful -> 0), array(namer -> "house", badGood -> 0, smallGreat -> 3, unusualUsual -> 0, insideOutside -> -2, uglyBeautiful -> 0), array(namer -> "area", smallGreat -> 0), array(namer -> "company", funnySerious -> 7, unableAble -> 4, nonexistExist -> 10), array(namer -> "place", nearFar -> 0, insideOutside -> 0, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 0), array(namer => "hand", deadAlive => 10, painPleasure => 0), array(namer => "school", nearFar => 0, unusualUsual => 0, insideOutside => -4, chaoticOrderly => 5, uglyBeautiful => 0), array(namer => "country", nearFar => 0, insideOutside => 10, unimportantImportant => 0, chaoticOrderly => 0, uglyBeautiful => 6, smallGreat => 9), array(namer => "point", nearFar => 0), array(namer => "member", deadAlive => 10, stupidSmart => 0, unusualUsual => 0, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "state", nearFar => 0,chaoticOrderly => 0), array(namer => "Word", unimportantImportant => 9, uglyBeautiful => 8), array(namer => "family", sameDifferent => -10, nearFar => -7, deadAlive => 10, painPleasure => 0, lessMore => 0, unimportantImportant => 10, uglyBeautiful => 9, nonexistExist => 10), array(namer => "head", nearFar => -10, deadAlive => 10, painPleasure => 0, unimportantImportant => 10, chaoticOrderly => 0, nonexistExist => 10), array(namer => "side", nearFar => -5, insideOutside => 3, uglyBeautiful => 0, nonexistExist => 10), array(namer => "business", funnySerious => 8, unableAble => 0,unimportantImportant => 8, chaoticOrderly => 9, nonexistExist => 0), array(namer => "night", deadAlive => -8, painPleasure => -5,insideOutside => 5, unimportantImportant => 0, uglyBeautiful => 0), array(namer => "question", unusualUsual => 0, unimportantImportant => 0}];
//mass nouns

//abstract nouns
$abstractNoun = [array(namer => "time", smallGreat => 10, unimportantImportant => 6), array(namer => "year", smallGreat => 10), array(namer => "way", nearFar => 9, chaoticOrderly => 6), array(namer => "day", nearFar => -3, smallGreat => 0, unimportantImportant => 0, chaoticOrderly => 0), array(namer => "month", nearFar => -2, smallGreat => 0, unimportantImportant => 0, chaoticOrderly => 0), array(namer => "government", smallGreat => 10, deadAlive => 10, badGood => 0, unimportantImportant => 10, unableAble => 10, lessMore => 10), array(namer => "work", unimportantImportant => 8, badGood => 0), array(namer => "life", shamePride => 6, deadAlive => 10, badGood => 0, smallGreat => 0, unimportantImportant => 8, chaoticOrderly => -2), array(namer => "system", badGood => 0, unusualUsual => 2, chaoticOrderly => 9), array(namer => "case", badGood => 0, unusualUsual => 0), array(namer => "number", lessMore => 0), array(namer => "problem", badGood => -8, unimportantImportant => 0, uglyBeautiful => -2), array(namer => "service", funnySerious => 2), array(namer => "party", painPleasure => 6, badGood => 2, chaoticOrderly => -1, insideOutside => 0), array(namer => "week", nearFar => 0, unimportantImportant => 0), array(namer => "end", nearFar => 0, funnySerious => 5, painPleasure => 4, unimportantImportant => 2, uglyBeautiful => 0), array(namer => "fact", funnySerious => 8, unusualUsual => 0, insideOutside => 0), array(namer => "information", unusualUsual => 0, insideOutside => 0, unimportantImportant => 0, chaoticOrderly => 5), array(namer => "power", funnySerious => 6, badGood => 0, smallGreat => 10, painPleasure => 7, lessMore => 8,unimportantImportant => 5), array(namer => "change", badGood => 0, nearFar => 0, lessMore => 0, unusualUsual => 4), array(namer => "interest", badGood => 0, smallGreat => 0, lessMore => 0, unimportantImportant => 2, nonexistExist => 0), array(namer => "development", lessMore => 4, insideOutside => 0), array(namer => "money", badGood => 0, smallGreat => 10, lessMore => 0, unimportantImportant => 8), array(namer => "research", badGood => 0, stupidSmart => 9, lessMore => 0, chaoticOrderly => 8), array(namer => "transportation", badGood => 1, nearFar => 0, lessMore => 0, chaoticOrderly => 6), array(namer => "travel", badGood => 1, nearFar => 4, lessMore => 0, chaoticOrderly => 4), array(namer => "trash", unhealthyHealthy => -5, badGood => -5, nearFar => 0, lessMore => 0, uglyBeautiful => -8}];
//plural nouns
$pluralNoun = [array(namer => "pages", insideOutside => -6, chaoticOrderly => 2), array(namer => "people", unusualUsual => 8, deadAlive => 10}];
//proper nouns
$properNoun = [array(namer => "Mr", funnySerious => 4, smallGreat => 5, unimportantImportant => 5, deadAlive => 10, badGood => 0, uglyBeautiful => 0}];
//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful
function shuffle(array) {
    "use strict";
	$n = 0;
	$m = 0;
        $rand = Math.floor(Math.random()*array.length);
	for(n = 0; n < array.length; n++)
	{
		m = array[n];
		array[n] = array[rand];
		array[rand] = m;
	}
	return array;
}
function prepareTalk() {
    "use strict";
	//Objects with name key and attr =>  pronoun, emote, continuationCommonNouns, continuationIntransitiveVPast, continuationPlurals,
	//...preposition, commonNoun, abstractNoun, massNoun, pluralNoun, verbIntrans, verbTrans
	//
	//Pure arrays =>  helpingModal, helpingVerbPlural, helpingVerbPlural
	
	continuationCommonNouns = shuffle(continuationCommonNouns);
	continuationIntransitiveVPast = shuffle(continuationIntransitiveVPast);
	continuationPlurals = shuffle(continuationPlurals);
	preposition = shuffle(preposition);
	commonNoun = shuffle(commonNoun);
	abstractNoun = shuffle(abstractNoun);
	massNoun = shuffle(massNoun);
	pluralNoun = shuffle(pluralNoun);
	verbIntrans = shuffle(verbIntrans);
	verbTrans = shuffle(verbTrans);
	emote = shuffle(emote);
	//$rand1 = Mathf.ceil(Mathf.Random*3);
	//if (rand1==1){
		//second sentence should be related to the non-modifying element of the first and its arrangement should not be altered by this.
		$randPron = Math.floor(Math.random()*5);
		$randPronSP = Math.random();
		$pronSubj = "";
		$pronObj = "";
		$possessiveSubj  = "";
		if (randPronSP > 0.5) {
			//first number is singular/plural, 2nd is subject/object/possessive, 3rd is which person
			pronSubj = pronoun[0][0][randPron];
			pronObj = pronoun[0][1][randPron];
			possessiveSubj = pronoun[0][2][randPron];
		}
		else {
			pronSubj = pronoun[1][0][randPron];
			pronObj = pronoun[1][1][randPron];
			possessiveSubj = pronoun[1][2][randPron];
		}
		$ar = 0;
		$myVerb = "";
		$myNoun = "";
		$aboutMyNoun = 0;
		$whichPropertyNoun = "";
		$aboutMyVerb = 0;
		$verbIsNegative = false;
		$num = 0;
		$arrVerb = [];
		$arb = 0;
		for(num = 0; num < verbTrans.length; num++){
			arrVerb = [];
			if (verbTrans[num].badGood !== null){
				arrVerb.push(verbTrans[num].badGood);
			}
			if (verbTrans[num].smallGreat !== null){
				arrVerb.push(verbTrans[num].smallGreat);
			}
			if (verbTrans[num].nearFar !== null){
				arrVerb.push(verbTrans[num].nearFar);
			}
			if (verbTrans[num].deadaLive !== null){
				arrVerb.push(verbTrans[num].deadAlive);
			}
			if (verbTrans[num].unimportantImportant !== null){
				arrVerb.push(verbTrans[num].unimportantImportant);
			}
			if (verbTrans[num].lessMore !== null){
				arrVerb.push(verbTrans[num].lessMore);
			}
			arrVerb = shuffle(arrVerb);
			arb = 0;
			if (arrVerb.length > 0) {
				for(arb=0; arb < arrVerb.length; arb++){
					if (arrVerb[arb] <= -5 || arrVerb[arb] > 5){
						verbIsNegative = true;
						myVerb = verbTrans[num].namer;
						aboutMyVerb=arrVerb[arb];
						break;
					}
					/*else {
						myVerb="get";
						//break;
					}*/
				}
			}
		}
		num=0;
		$whichNoun = [];
		$arrNoun = [];
		commonNoun = shuffle(commonNoun);
		$whi = 0;
		$arrWhi = [];
		//get the properties of the common noun
		for(num = 0; num < commonNoun.length; num++){
			if (commonNoun[num].unableAble !== null){
				whichNoun.push("unableAble");
				arrNoun.push(commonNoun[num].unableAble);
			}
			if (commonNoun[num].painPleasure !== null){
				whichNoun.push("painPleasure");
				arrNoun.push(commonNoun[num].painPleasure);
			}
			if (commonNoun[num].stupidSmart !== null){
				whichNoun.push("stupidSmart");
				arrNoun.push(commonNoun[num].stupidSmart);
			}
			if (commonNoun[num].unusualUsual !== null){
				whichNoun.push("unusualUsual");
				arrNoun.push(commonNoun[num].unusualUsual);
			}
			if (commonNoun[num].insideOutside !== null){
				whichNoun.push("insideOutside");
				arrNoun.push(commonNoun[num].insideOutside);
			}
			if (commonNoun[num].unimportantImportant !== null){
				whichNoun.push("unimportantImportant");
				arrNoun.push(commonNoun[num].unimportantImportant);
			}
			if (commonNoun[num].chaoticOrderly !== null){
				whichNoun.push("chaoticOrderly");
				arrNoun.push(commonNoun[num].chaoticOrderly);
			}
			if (commonNoun[num].uglyBeautiful !== null){
				whichNoun.push("uglyBeautiful");
				arrNoun.push(commonNoun[num].uglyBeautiful);
			}
			if (commonNoun[num].nonexistExist !== null){
				whichNoun.push("nonexistExist");
				arrNoun.push(commonNoun[num].nonexistExist);
			}
			if (commonNoun[num].funnySerious !== null){
				whichNoun.push("funnySerious");
				arrNoun.push(commonNoun[num].funnySerious);
			}
			if (commonNoun[num].shamePride !== null){
				whichNoun.push("shamePride");
				arrNoun.push(commonNoun[num].shamePride);
			}
			if (commonNoun[num].unhealthyHealthy !== null){
				whichNoun.push("unhealthyHealthy");
				arrNoun.push(commonNoun[num].unusualUsual);
			}
			if (commonNoun[num].sameDifferent !== null){
				whichNoun.push("sameDifferent");
				arrNoun.push(commonNoun[num].sameDifferent);
			}
			if (commonNoun[num].unhappyHappy !== null){
				whichNoun.push("unhappyHappy");
				arrNoun.push(commonNoun[num].unhappyHappy);
			}
			if (commonNoun[num].expectantSurprised !== null){
				whichNoun.push("expectantSurprised");
				arrNoun.push(commonNoun[num].expectantSurprised);
			}
			if (whichNoun.length>0){
				//get the noun
				myNoun = commonNoun[num].namer;
				arrWhi = [];
				//get the order we will count the noun's properties
				for (whi = 0; whi < whichNoun.length; whi++){
					arrWhi.push(whi);
				}
				arrWhi = shuffle(arrWhi);
				/*if one the noun's properties is above 4 or below -4,
				in other words, is a more intense word or phrase in some respect */
				whi=0;
				for(whi = 0; whi < arrWhi.length; whi++){
					if (arrNoun[whi] > 4 || arrNoun[whi] < -4){
						aboutMyNoun = arrNoun[whi];
						whichPropertyNoun = whichNoun[whi];
						//now that we have a match, exit the loop.
						break;
					}
				}
				break;
			}
		}
		//make the first sentence
		$randConn = Math.random();
		$getConn = "";
		if (randConn < 0.2){
			 getConn = getPrep() + " that...";
		}
		else if (randConn >= 0.2 && randConn < 0.4){
			getConn = "...";
		}
		else if (randConn >= 0.4 && randConn < 0.6){
			getConn = "?";
		}
		else if (randConn >= 0.6){
			getConn = ".";
		}
		sentence1 = pronSubj + " " + myVerb + " " + possessiveSubj + " " + myNoun + " " + getConn +  ". ";
		sentence2 = getConn="Please, " + getHelping() + pronSubj + " " + " have " + getMass() + "?";
		$sentences = sentence1 + sentence2;
        document.getElementById('mySay').innerHTML = sentences;
	//}
	/*
	//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful, nonexistent or existent, funny or serious, shame or pride, unhealthy or healthy, same or different
emotes =>  unhappy or happy, expectant or surprised
	*/
	/*else if (rand1==2){
	}
	else {
	}*/
}

?>