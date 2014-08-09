var sentence1 = "";
var sentence2 = "";

var name1 = "";
var name2 = "";

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
  
  emotes :  unhappy or happy, expectant or surprised
//
*/
//pronouns
var pronoun = [[["I", "you", "he", "she", "it"], ["me", "you", "him", "her", "it"], ["my", "your", "his", "her", "its"], ["mine", "yours", "his", "hers", "its"]], [["We", "you", "they", "they", "they"], ["us", "you", "them", "them", "them"], ["our", "your", "their", "their", "their"], ["ours", "yours", "theirs", "theirs", "theirs"]]];
//verbs
var verbIntrans = [{namer : "snow", lessMore : 2, uglyBeautiful : 9}, {namer : "swim", unableAble : 6, lessMore : 0}, {namer : "fart", uglyBeautiful : -9, lessMore : 0, funnySerious : -10, unhealthyHealthy : 7}, {namer : "think", lessMore : 0, stupidSmart : 10, deadAlive : 10, funnySerious : 0}, {namer : "blunder", badGood : -10, painPleasure : -9, stupidSmart : -10, chaoticOrderly : -10, funnySerious : 9}, {namer : "cook", badGood : 0, unusualUsual : 0, chaoticOrderly : 3}, {namer : "convulse", unhealthyHealthy : -10, badGood : -10, funnySerious : 10, painPleasure : -10, deadAlive : -7, unusualUsual : -7, chaoticOrderly : -9}, {namer : "cooperate", badGood : 1, lessMore : 0, chaoticOrderly : 3}, {namer : "die", sameDifferent : 10, badGood : -10, deadAlive : -10, unableAble : -10, painPleasure : -10, funnySerious : 10}, {namer : "diet", badGood : 3, stupidSmart : 2, unimportantImportant : 2}, {namer : "nod", funnySerious : -3}, {namer : "parody", sameDifferent : 4, painPleasure : 8, unusualUsual : -3, unimportantImportant : 0, funnySerious : -10}, {namer : "part", nearFar : 10}, {namer : "quack", shamePride : -7, stupidSmart : -7, lessMore : 0, unimportantImportant : -6, uglyBeautiful : -3, funnySerious : -8}, {namer : "recover", unhealthyHealthy : 10, badGood : 9, deadAlive : 10, lessMore : 0, unimportantImportant : 8}, {namer : "regrow", sameDifferent : 3, unhealthyHealthy : 6, badGood : 3, smallGreat : 9, unableAble : 6, lessMore : 0}, {namer : "rehearse", unableAble : 7, chaoticOrderly : 8}, {namer : "heal", unhealthyHealthy : 10, badGood : 9, painPleasure : 9, lessMore : 0, insideOutside : -5, unimportantImportant : 8}, {namer : "boast", shamePride : 6}];
var verbTrans = [{namer : "give away", lessMore : -10, badGood : 0, nearFar : 4}, {namer : "brainwash", badGood : -9, deadAlive : -5, stupidSmart : -7,funnySerious : 10, unhealthyHealthy : -10}, {namer : "braid", smallGreat : 0, uglyBeautiful : 8}, {namer : "bug", badGood : -8, unhealthyHealthy : -3}];
var helpingVerbSingular = ["have", "does"];
var helpingVerbPlural = ["had", "did"];
var helpingModal = ["may", "should", "shall", "ought to", "might", "would", "will", "must", "could", "can"];
//emotes
var emote = [{namer : "8-)", unhappyHappy : 10, stupidSmart : 7, painPleasure : 6}, {namer : " : )", unhappyHappy : 10, badGood : 6, painPleasure : 8}, {namer : " : (", unhappyHappy : -10, painPleasure : -8, badGood : -6}, {namer : "-_-", unhappyHappy : -4, badGood : -8, painPleasure : -8}, {namer : " : C", unhappyHappy :  -5, badGood : -5, funnySerious : -5, painPleasure : -5}, {namer : "O_o", expectantSurprised :  10, badGood : -7, unusualUsual : -7, funnySerious : 4}, {namer : " : O", expectantSurprised : 10, unusualUsual : -4}];
//continuations
var continuationCommonNouns = [{name1 :  randSubjPron+" can't see ", name2 : "from here", nearFar : 9, smallGreat : -7, nonexistExist : -5}, {name1 :  randSubjPron+" go through ", name2 : "like crazy", lessMore : -8, badGood : -7, funnySerious : -1}, {name1 : "It's the ", name2 :  randSubjPron+" can only dream of", nonexistExist : -7, uglyBeautiful : 7, painPleasure : 0}, {name1 : "I was sad when my ", name2 : "died", unhappyHappy : -10}, {name1 :  randSubjPron + " gave ", name2 : "away", lessMore : -8, nearFar : -8}, {name1 :  randSubjPron+" threw ", name2 : "away", unimportantImportant : -10, lessMore : -9}, {name1 : randSubjPron+" always " + getHelping() + " ", name2 : "and nothing else"}];
var continuationIntransitiveVPast = [{name1 :  randSubjPron+ " " + getHelping() + " ", name2 : "now", unimportantImportant : 9}];
var continuationPlurals = [{name1 :  randSubjPron+" cook ", name2 : "well", badGood : 8}];
//prepositions
var preposition = [{namer : "about", before : 1, after : 1}, {namer : "but", before : 1, after : -1, sameDifferent : 10}, {namer : "in", insideOutside : -10, nearFar : -10, before : 1, after : 1}, {namer : "below", shamePride : -9, before : 1, after : 1, smallGreat : -6, nonexistExist : -5, unimportantImportant : -5}, {namer : "among", nearFar : -9}, {namer : "concerning", before : 1, after : 1, funnySerious : 3}, {namer : "beneath", shamePride : -8, before : 1, after : 1, smallGreat : -6, nonexistExist : -5, unimportantImportant : -5}, {namer : "yet", before : 1, after : -1, sameDifferent : 10}, {namer : "in spite of", before : 1, after : -1}, {namer : "to", before : 1, after : 1, nearFar : -5}, {namer : "toward", before : 1, after : 1, nearFar : -5}, {namer : "beside", before : 1, after : 1, nearFar : -8}];
//common nouns
var commonNoun = [{namer : "brain", stupidSmart : 8 }, {namer : "core", nearFar : -8, insideOutside : -10, unimportantImportant : 9}, {namer :  "shrimp", funnySerious : -1, smallGreat : -9, unimportantImportant : -9}, {namer : "schedule", unusualUsual : 7, chaoticOrderly : 10}, {namer : "man", badGood : 0, smallGreat : 5, unimportantImportant : 5, deadAlive : 10, badGood : 0, uglyBeautiful : 0, nonexistExist : 10}, {namer : "thing", badGood : 0, smallGreat : 0, nearFar : 0, deadAlive : -5, nonexistExist : 10, uglyBeautiful : 2, insideOutside : 5}, {namer : "child", unhealthyHealthy : 2, badGood : 0, smallGreat : -5, unimportantImportant : 5, deadAlive : 10, badGood : 0, uglyBeautiful : 2, stupidSmart : -2}, {namer : "woman",  unhealthyHealthy : 0, badGood : 0, smallGreat : 4, unimportantImportant : 5, deadAlive : 10, badGood : 0, uglyBeautiful : 0, nonexistExist : 10}, {namer : "part", lessMore : -5, nearFar : -6}, {namer : "group", lessMore : 10, badGood : 0, nonexistExist : 10, unimportantImportant : 0, chaoticOrderly : 2}, {namer : "world", badGood : 0, insideOutside : 5, smallGreat : 10, uglyBeautiful : 7, nonexistExist : 10}, {namer : "home", badGood : 7, smallGreat : 3, unusualUsual : 0, insideOutside : -2, uglyBeautiful : 0}, {namer : "house", badGood : 0, smallGreat : 3, unusualUsual : 0, insideOutside : -2, uglyBeautiful : 0}, {namer : "area", smallGreat : 0}, {namer : "company", funnySerious : 7, unableAble : 4, nonexistExist : 10}, {namer : "place", nearFar : 0, insideOutside : 0, unimportantImportant : 0, chaoticOrderly : 0, uglyBeautiful : 0}, {namer : "hand", deadAlive : 10, painPleasure : 0}, {namer : "school", nearFar : 0, unusualUsual : 0, insideOutside : -4, chaoticOrderly : 5, uglyBeautiful : 0}, {namer : "country", nearFar : 0, insideOutside : 10, unimportantImportant : 0, chaoticOrderly : 0, uglyBeautiful : 6, smallGreat : 9}, {namer : "point", nearFar : 0}, {namer : "member", deadAlive : 10, stupidSmart : 0, unusualUsual : 0, unimportantImportant : 0, uglyBeautiful : 0}, {namer : "state", nearFar : 0,chaoticOrderly : 0}, {namer : "Word", unimportantImportant : 9, uglyBeautiful : 8}, {namer : "family", sameDifferent : -10, nearFar : -7, deadAlive : 10, painPleasure : 0, lessMore : 0, unimportantImportant : 10, uglyBeautiful : 9, nonexistExist : 10}, {namer : "head", nearFar : -10, deadAlive : 10, painPleasure : 0, unimportantImportant : 10, chaoticOrderly : 0, nonexistExist : 10}, {namer : "side", nearFar : -5, insideOutside : 3, uglyBeautiful : 0, nonexistExist : 10}, {namer : "business", funnySerious : 8, unableAble : 0,unimportantImportant : 8, chaoticOrderly : 9, nonexistExist : 0}, {namer : "night", deadAlive : -8, painPleasure : -5,insideOutside : 5, unimportantImportant : 0, uglyBeautiful : 0}, {namer : "question", unusualUsual : 0, unimportantImportant : 0}];
//mass nouns
var massNoun = [{namer : "water", unhealthyHealthy : 10, badGood : 0, nearFar : 0, insideOutside : 0, unimportantImportant : 10, uglyBeautiful : 7, nonexistExist : 10}, {namer : "fire", badGood : -2, nearFar : 0, insideOutside : 0, unimportantImportant : 6, uglyBeautiful : 7, nonexistExist : 10}, {namer : "meat", unhealthyHealthy : -2, badGood : 0, lessMore : 0, unimportantImportant : 5}, {namer : "advice", funnySerious : 6, badGood : 0, stupidSmart : 8, unusualUsual : 0, unimportantImportant : 3}, {namer : "air", badGood : 9, smallGreat : 9, unimportantImportant : 10, nonexistExist : 10}, {namer : "blood", funnySerious : 5, badGood : 0, painPleasure : -8, lessMore : 0, insideOutside : -10, unimportantImportant : 10, uglyBeautiful : -7, nonexistExist : 10}, {namer : "equipment", unimportantImportant : 0, uglyBeautiful : 0}, {namer : "food", unhealthyHealthy : 0, badGood : 0, lessMore : 0, unusualUsual : 0, unimportantImportant : 10}, {namer : "furniture", badGood : 0, nearFar : 0, unusualUsual : 0, insideOutside : -3, unimportantImportant : 0, uglyBeautiful : 0}, {namer : "garbage", unhealthyHealthy : -9, shamePride : -5, badGood : -5, nearFar : 0, lessMore : 0, unusualUsual : 0, uglyBeautiful : -9}, {namer : "graffiti", badGood : -2, uglyBeautiful : 0}, {namer : "grass", badGood : 0, nearFar : 0, lessMore : 0, chaoticOrderly : 0, uglyBeautiful : 0}, {namer : "homework", lessMore : 0, unimportantImportant : 6}, {namer : "housework", badGood : 0, unusualUsual : 7, insideOutside : -10, unimportantImportant : 5, chaoticOrderly : 10}, {namer : "information", unusualUsual : 0, insideOutside : 0, unimportantImportant : 0, chaoticOrderly : 5}, {namer : "knowledge", shamePride : 5, badGood : 4, stupidSmart : 8, lessMore : 0, unimportantImportant : 0, nonexistExist : 10}, {namer : "luggage", smallGreat : 4, lessMore : 3, unusualUsual : 0, unimportantImportant : 0}, {namer : "mathematics", funnySerious :  1, chaoticOrderly : 10}, {namer : "milk", badGood : 0, unimportantImportant : 3}, {namer : "money", badGood : 0, smallGreat : 10, lessMore : 0, unimportantImportant : 8}, {namer : "music", badGood : 1, unusualUsual : 0, unimportantImportant : 0,chaoticOrderly : 0, uglyBeautiful : 4}, {namer : "pollution", unhealthyHealthy : -10, funnySerious : 8, badGood : -9, nearFar : 0, lessMore : 0, insideOutside : 8, uglyBeautiful : -9, nonexistExist : 10}, {namer : "research", badGood : 0, funnySerious : 8, stupidSmart : 9, lessMore : 0, chaoticOrderly : 8}, {namer : "sand", smallGreat : -10, lessMore : 9, uglyBeautiful : 0}, {namer : "soap", smallGreat : -3}, {namer : "software", badGood : 0, stupidSmart : 3, unusualUsual : 0}, {namer : "sugar", unhealthyHealthy : -7, badGood : 0, painPleasure : 8, lessMore : 0, unimportantImportant : 0}, {namer : "traffic", badGood : -5, nearFar : 0, lessMore : 0, insideOutside : 3, chaoticOrderly : -4}];
//abstract nouns
var abstractNoun = [{namer : "time", smallGreat : 10, unimportantImportant : 6}, {namer : "year", smallGreat : 10}, {namer : "way", nearFar : 9, chaoticOrderly : 6}, {namer : "day", nearFar : -3, smallGreat : 0, unimportantImportant : 0, chaoticOrderly : 0}, {namer : "month", nearFar : -2, smallGreat : 0, unimportantImportant : 0, chaoticOrderly : 0}, {namer : "government", smallGreat : 10, deadAlive : 10, badGood : 0, unimportantImportant : 10, unableAble : 10, lessMore : 10}, {namer : "work", unimportantImportant : 8, badGood : 0}, {namer : "life", shamePride : 6, deadAlive : 10, badGood : 0, smallGreat : 0, unimportantImportant : 8, chaoticOrderly : -2}, {namer : "system", badGood : 0, unusualUsual : 2, chaoticOrderly : 9}, {namer : "case", badGood : 0, unusualUsual : 0}, {namer : "number", lessMore : 0}, {namer : "problem", badGood : -8, unimportantImportant : 0, uglyBeautiful : -2}, {namer : "service", funnySerious : 2}, {namer : "party", painPleasure : 6, badGood : 2, chaoticOrderly : -1, insideOutside : 0}, {namer : "week", nearFar : 0, unimportantImportant : 0}, {namer : "end", nearFar : 0, funnySerious : 5, painPleasure : 4, unimportantImportant : 2, uglyBeautiful : 0}, {namer : "fact", funnySerious : 8, unusualUsual : 0, insideOutside : 0}, {namer : "information", unusualUsual : 0, insideOutside : 0, unimportantImportant : 0, chaoticOrderly : 5}, {namer : "power", funnySerious : 6, badGood : 0, smallGreat : 10, painPleasure : 7, lessMore : 8,unimportantImportant : 5}, {namer : "change", badGood : 0, nearFar : 0, lessMore : 0, unusualUsual : 4}, {namer : "interest", badGood : 0, smallGreat : 0, lessMore : 0, unimportantImportant : 2, nonexistExist : 0}, {namer : "development", lessMore : 4, insideOutside : 0}, {namer : "money", badGood : 0, smallGreat : 10, lessMore : 0, unimportantImportant : 8},{namer : "research", badGood : 0, stupidSmart : 9, lessMore : 0, chaoticOrderly : 8}, {namer : "transportation", badGood : 1, nearFar : 0, lessMore : 0, chaoticOrderly : 6}, {namer : "travel", badGood : 1, nearFar : 4, lessMore : 0, chaoticOrderly : 4}, {namer : "trash", unhealthyHealthy : -5, badGood : -5, nearFar : 0, lessMore : 0, uglyBeautiful : -8}];
//plural nouns
var pluralNoun = [{namer : "pages", insideOutside : -6, chaoticOrderly : 2}, {namer : "people", unusualUsual : 8, deadAlive : 10}];
//proper nouns
var properNoun = [{namer : "Mr", funnySerious : 4, badGood : 0, smallGreat : 5, unimportantImportant : 5, deadAlive : 10, badGood : 0, uglyBeautiful : 0}];
//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful
function getHelping() {
	var rand  = Mathf.Floor(Math.Random()*helpingModal.length);
	var rand2 = Random.Range(0, 1);
	if(rand2>0.5){
		return helpingModal[rand];
	}
	else return "";
}
function getPrep()  {
	var rand = Math.Floor(Math.Random()*preposition.length);
	return preposition[rand]["namer"];
}
function getMass() {
	var rand = Math.Floor(Math.Random()*massNoun.length);
	return massNoun[rand]["namer"];
}
function randSubjPron() {
	var rand = Math.Floor(Math.Random()*5);
	var rand2 = Math.Random();
	var sp  = pronoun[0][0][rand];
	if(rand2>0.5){
		sp = pronoun[1][0][rand];
	}
	return sp;
}
function randObjPron() {
	var rand = Math.Floor(Math.Random()*5);
	var rand2  = Math.Random();
	var sp  = pronoun[0][1][rand];
	if(rand2>0.5){
		sp = pronoun[1][1][rand];
	}
	return sp;
}
function Update () {
	//not needed yet
}
function shuffle(array) {
	var n=0;
	var m=0;
	for(; n<array.length; n++)
	{
		var rand = Math.Floor(Math.Random()*array.length);
		m = array[n];
		array[n]=array[rand];
		array[rand]=m;
		return array;
	}
}
function prepareTalk() {
	//Objects with name key and attr :  pronoun, emote, continuationCommonNouns, continuationIntransitiveVPast, continuationPlurals,
	//...preposition, commonNoun, abstractNoun, massNoun, pluralNoun, verbIntrans, verbTrans
	//
	//Pure arrays :  helpingModal, helpingVerbPlural, helpingVerbPlural
	
	var vi=0;
	var vt=0;
	var cc=0;
	var ci=0;
	var cp=0;
	var p=0;
	var c=0;
	var a=0;
	var mn=0;
	var pn=0;
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
	//var rand1 = Mathf.ceil(Mathf.Random*3);
	//if(rand1==1){
		//second sentence should be related to the non-modifying element of the first and its arrangement should not be altered by this.
		var randPron = Math.Floor(Math.Random()*5);
		var randPronSP = Math.Random();
		var pronSubj  = "";
		var pronObj  = "";
		var possessiveSubj  = "";
		if(randPronSP>0.5) {
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
		var ar=0;
		var myVerb = "";
		var myNoun = "";
		var aboutMyNoun=0;
		var whichPropertyNoun="";
		var aboutMyVerb=0;
		var verbIsNegative = false;
		var num=0;
		for(; num<verbTrans.length; num++){
			var arrVerb = [];
			if(verbTrans[num]["badGood"] != null){
				arrVerb.push(verbTrans[num]["badGood"]);
			}
			if(verbTrans[num]["smallGreat"] != null){
				arrVerb.push(verbTrans[num]["smallGreat"]);
			}
			if(verbTrans[num]["nearFar"] != null){
				arrVerb.push(verbTrans[num]["nearFar"]);
			}
			if(verbTrans[num]["deadaLive"] != null){
				arrVerb.push(verbTrans[num]["deadAlive"]);
			}
			if(verbTrans[num]["unimportantImportant"] != null){
				arrVerb.push(verbTrans[num]["unimportantImportant"]);
			}
			if(verbTrans[num]["lessMore"] != null){
				arrVerb.push(verbTrans[num]["lessMore"]);
			}
			arrVerb = shuffle(arrVerb);
			var arb=0;
			if(arrVerb.length > 0) {
				for(; arb<arrVerb.length; arb++){
					if(arrVerb[arb] <= -5 || arrVerb[arb] > 5){
						verbIsNegative=true;
						myVerb=verbTrans[num]["namer"];
						aboutMyVerb=arrVerb[arb];
						break;
					}
					else {
						myVerb="get";
					}
					break;
				}
			}
		}
		num=0;
		var whichNoun = [];
		var arrNoun = [];
		commonNoun = shuffle(commonNoun);
		//get the properties of the common noun
		for(; num<commonNoun.length; num++){
			if(commonNoun[num]["unableAble"] != null){
				whichNoun.push("unableAble");
				arrNoun.push(commonNoun[num]["unableAble"]);
			}
			if(commonNoun[num]["painPleasure"] != null){
				whichNoun.push("painPleasure");
				arrNoun.push(commonNoun[num]["painPleasure"]);
			}
			if(commonNoun[num]["stupidSmart"] != null){
				whichNoun.push("stupidSmart");
				arrNoun.push(commonNoun[num]["stupidSmart"]);
			}
			if(commonNoun[num]["unusualUsual"] != null){
				whichNoun.push("unusualUsual");
				arrNoun.push(commonNoun[num]["unusualUsual"]);
			}
			if(commonNoun[num]["insideOutside"] != null){
				whichNoun.push("insideOutside");
				arrNoun.push(commonNoun[num]["insideOutside"]);
			}
			if(commonNoun[num]["unimportantImportant"] != null){
				whichNoun.push("unimportantImportant");
				arrNoun.push(commonNoun[num]["unimportantImportant"]);
			}
			if(commonNoun[num]["chaoticOrderly"] != null){
				whichNoun.push("chaoticOrderly");
				arrNoun.push(commonNoun[num]["chaoticOrderly"]);
			}
			if(commonNoun[num]["uglyBeautiful"] != null){
				whichNoun.push("uglyBeautiful");
				arrNoun.push(commonNoun[num]["uglyBeautiful"]);
			}
			if(commonNoun[num]["nonexistExist"] != null){
				whichNoun.push("nonexistExist");
				arrNoun.push(commonNoun[num]["nonexistExist"]);
			}
			if(commonNoun[num]["funnySerious"] != null){
				whichNoun.push("funnySerious");
				arrNoun.push(commonNoun[num]["funnySerious"]);
			}
			if(commonNoun[num]["shamePride"] != null){
				whichNoun.push("shamePride");
				arrNoun.push(commonNoun[num]["shamePride"]);
			}
			if(commonNoun[num]["unhealthyHealthy"] != null){
				whichNoun.push("unhealthyHealthy");
				arrNoun.push(commonNoun[num]["unusualUsual"]);
			}
			if(commonNoun[num]["sameDifferent"] != null){
				whichNoun.push("sameDifferent");
				arrNoun.push(commonNoun[num]["sameDifferent"]);
			}
			if(commonNoun[num]["unhappyHappy"] != null){
				whichNoun.push("unhappyHappy");
				arrNoun.push(commonNoun[num]["unhappyHappy"]);
			}
			if(commonNoun[num]["expectantSurprised"] != null){
				whichNoun.push("expectantSurprised");
				arrNoun.push(commonNoun[num]["expectantSurprised"]);
			}
			if(whichNoun.length>0){
				//get the noun
				myNoun=commonNoun[num]["namer"];
				var whi=0;
				var arrWhi = [];
				//get the order we will count the noun's properties
				for(; whi<whichNoun.length; whi++){
					arrWhi.push(whi);
				}
				arrWhi = shuffle(arrWhi);
				/*if one the noun's properties is above 4 or below -4,
				in other words, is a more intense word or phrase in some respect */
				whi=0;
				for(; whi<arrWhi.length; whi++){
					if(arrNoun[whi]>4 || arrNoun[whi]<-4){
						aboutMyNoun=arrNoun[whi];
						whichPropertyNoun=whichNoun[whi];
						//now that we have a match, exit the loop.
						break;
					}
				}
				break;
			}
		}
		//make the first sentence
		var randConn = Random.Range(0, 1);
		var getConn = "";
		if (randConn<0.2){
			 getConn = getPrep() + " that...";
		}
		else if(randConn>=0.2 && randConn<0.4){
			getConn="...";
		}
		else if (randConn>=0.4 && randConn<0.6){
			getConn="?";
		}
		else if (randConn>=0.6){
			getConn=".";
		}
		sentence1 = pronSubj + " " + myVerb + " " + possessiveSubj + " " + myNoun + " " + getConn +  ". ";
		sentence2 = getConn="Please, " + getHelping() + pronSubj + " " + " have " + getMass() + "?";
		var sentences = sentence1 + sentence2;
         return sentences.split(".");
	//}
	/*
	//bad or good, small or great, near or far, dead or alive, unable or able, pain or pleasure, stupid or smart,
//less or more, unusual or usual, inside or outside, unimportant or important, chaotic or orderly, ugly or beautiful, nonexistent or existent, funny or serious, shame or pride, unhealthy or healthy, same or different
emotes :  unhappy or happy, expectant or surprised
	*/
	/*else if(rand1==2){
	}
	else {
	}*/
}
    