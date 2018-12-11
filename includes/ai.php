<?php
  require('database.php');
  require('stop_words.php');
  require('responses.php');

// SANITIZE INPUT
// ****************************************************
$inputPunc = $return["command"]; 
$input_noPunc = preg_replace('/[^a-z0-9]+/i', ' ', strtolower($inputPunc));      // remove punctuation & make lowercase
$input_explode = explode(' ',trim($input_noPunc));                                  // explode string to array of words
$input_keywords = array_diff($input_explode, $stop_words);
//DEBUG
$return["keywords"] = $input_keywords;
$return["input_noPunc"] = $input_noPunc;


// ARE WE IN CONVERSATION? 															// If yes, BREAK here and include question_sequence.php 
// ****************************************************

// 1. call user database, pass IP address 
// 2. if more than 10 minutes since last response BREAK 
// 3. DATABASE COLUMNS NEEDED: inConversation(boolean), startConveration(boolean),converationTOPIC(string),converationDESCRIPTOR(string),questionID(string)
// 4. startConveration is triggered first by a yes or no answer (topic is already logged)
// 5. converationDESCRIPTOR 
//  questionID: each question has an ID, if the a question ID is found in the DB the designated next question will contain that ID


// YES OR NO?
// **************************************************** 

// 1. If the response is yes or no do the following:
// 2. 


// **************************************************** 
// DATABASE CHECKS
// **************************************************** 	

// IS TOPIC?
foreach ($input_keywords as $skey => $keyword) {                                     // loop through the array 
    $databasematch = searchDB("zero_topics", "name", $keyword, 1);                   // search database for individual keyword
   if (strpos($keyword, $databasematch) !== false) {                                 // match database keyword with array keyword
      // match found, log as current topic           
      $topic = $keyword;                                                             // Store as $topic
      $isTopic = true;
      //DEBUG
      $return["topic"] = $topic;
      break;
   } 
}
if ($topic === null) {  // If no definition is found, set definition false
	   $isTopic = false;
}

// CHECK DICTIONARY
foreach ($input_keywords as $skey => $keyword) {                                     // loop through the array 
    $databasematch = searchDB("entries", "word", $keyword, 0);                   // search database for individual keyword
   if (strpos($keyword, $databasematch) !== false) {                                 // match database keyword with array keyword
      $definition = searchDB("entries", "word", $keyword, 2);
      $definition = lcfirst($definition); 
      $definition_keyword = searchDB("entries", "word", $keyword, 0);
      break;
   } 
} 


// mulikeyword test Eg "Jamie Pine" or "James Mathew Pine"
// for each word, test for stop word, create new array with true/false for stopword
// if two flase in a row
// OR create a loop. If keyword add to new array, next word will be appended to string. UNLESS *If stop word, next word +cancel keyword string builder.  
// EVEN BETTER replace stop words with a space, double space indicates new phrase

	
// **************************************************** 
// WORDBANK CHECKS
// **************************************************** 

// CONTAINS POSTIVE AJECTIVE?
$positiveIntersect = array_intersect($positiveWordArray, $input_keywords); 
$positiveRandomKey = array_rand($positiveIntersect);
$positiveRandom = $positiveIntersect[$positiveRandomKey];
if (empty($positiveIntersect)) {
    $isPositive = false;    
   } else {
    $positive = $positiveRandom; 
    //log word in database                                                      
    $isPositive = true;
    //DEBUG
    $return["positiveWords"] = $positiveIntersect;
}

// CONTAINS NEGATIVE AJECTIVE?
$negativeIntersect = array_intersect($negativeWordArray, $input_keywords); 
$negativeRandomKey = array_rand($negativeIntersect);
$negativeRandom = $negativeIntersect[$negativeRandomKey];
if (empty($negativeIntersect)) {
    $isNegative = false;    
   } else {
	$negative = $negativeRandom;
    //log word in database                                                       
    $isNegative = true;
}

// CONTAINS NEUTRAL AJECTIVE?
$neutralIntersect = array_intersect($neutralWordArray, $input_keywords); 
$neutralRandomKey = array_rand($neutralIntersect);
$neutralRandom = $neutralIntersect[$neutralRandomKey];
if (empty($neutralIntersect)) {
    $isNeutral = false;    
   } else {
    $neutral = $neutralRandom; 
    //log word in database                                                        // Store as $topic
    $isNeutral = true;
}

// **************************************************** 
// CONTEXT ANALYSATION
// **************************************************** 
  

// IS QUESTION?
$question_keywords = array("what", "what's", "when", "where", "why", "how", "is", "do", "are", "who", "will", "which", "am");
if (in_array($input_explode[0], $question_keywords, true) or strpos($inputPunc, '?') !== false) {
   $isQuestion = true;
   $return["isQuestion"] = true; //DEBUG
} else {
  $isQuestion = false;
}

// IS ABOUT ME? (the AI)
$me_keywords = array("you", "your", "youre");
foreach ($me_keywords as $skey => $keyword) {                                   
   if (strpos($input_noPunc, $keyword) !== false) {  
    	$isAboutMe = true;
    	$return["isAboutMe"] = true; //DEBUG
 	} // DO NOT ADD ELSE STATMENT FOR THIS METHOD(foreach): we only want to know when we have a match
}
   if ($keyword === null) {  // If no definition is found, set false
	   $isAboutMe = false;
}
// IS ABOUT USER? 
$user_keywords = array("me", "i am", "i");
foreach ($user_keywords as $skey => $keyword) {                                   
   if (strpos($input_noPunc, $keyword) !== false) {  
    	$isAboutUser = true;
    	$return["isAboutUser"] = true; //DEBUG
 	} // DO NOT ADD ELSE STATMENT FOR THIS METHOD(foreach): we only want to know when we have a match
}
   if ($keyword === null) {  // If no definition is found, set false
	   $isAboutUser = false;
}
// THOUGHTS? 
$thought_keywords = array("think", "believe", "opinion", "opinion", "thought", "thoughts", "thinks");
foreach ($user_keywords as $skey => $keyword) {                                   
   if (strpos($input_noPunc, $keyword) !== false) {  
    	$isThought = true;
    	$return["isThought"] = true; //DEBUG
 	} // DO NOT ADD ELSE STATMENT FOR THIS METHOD(foreach): we only want to know when we have a match
}
   if ($keyword === null) {  // If no definition is found, set false
	   $isThought = false;
}

// IS THE QUESTION ASKING FOR A DEFINITION?
$definition_keywords = array("definition of", "define", "tell me about", "what is", "what are");
foreach ($definition_keywords as $skey => $keyword) {                                   
   if (strpos($input_noPunc, $keyword) !== false) {  
    	$isDefinition = true;
 	} // DO NOT ADD ELSE STATMENT FOR THIS METHOD(foreach): we only want to know when we have a match
}
   if ($keyword === null) {  // If no definition is found, set definition false
	   $isDefinition = false;
}


// IS ABOUT KNOWLEDGE?
if (in_array("know", $input_explode)) {
    $isAboutKnowledge = true;
    $return["isAboutKnowledge"] = true; //DEBUG
 } else {
    $isAboutKnowledge = false;
}


// LEVEL TWO TESTS 																								 	
// **************************************************** 	

if ($isQuestion == true) {
	
	//WHAT? (Keemstar is) & (what is Keemstar)
	
	//WHY (*Only log after a what in a question sequence, AI responds with "but why?")
	
	//WHEN
	
	//WHERE
	
	//HOW
}


// **************************************************** 
// RESPONSES																								 	// FALSE MUST ALWAYS COME BEFORE TRUE
// **************************************************** 	

if ($isTopic == true) {                                                                    
    $reply = "{$what} about {$topic}?";
}
if ($isDefinition == true) {                                                                    
    $reply = "{$what} about {$definition_keyword}?";
}

if ($isQuestion == true and $isTopic == false) {                                                                    // A QUESTION ABOUT SOMETHING ZERO DOESN'T KNOW
    $reply = "{$goodquestion} this is not a topic I'm familiar with. Do you want to answer a few questions about it?";
    // perform word test
}
if ($isQuestion == true and $isTopic == false and $isAboutMe == true) {                                             // AN UNKNOWN QUESTION ABOUT ZERO
    $reply = "You want to know something about me?";
    // perform word test
    // if ajective
    // I'm not $word, do you think I am?
    // You think I'm $word?
}
if ($isQuestion == true and $isTopic == true and $isAboutMe == true) {                                              // ASKING IF ZERO IS A TOPIC
    $reply = "am I {$topic}?? I don't think so..";
    // if statment can go here
}
if ($isAboutMe == true and $isPositive == true) {                                              // ASKING IF ZERO IS A TOPIC
    $reply = "I'm {$positive}?? How kind of you!";
    // if statment can go here
}
if ($isTopic == true and $isPositive == true) {                                              // ASKING IF ZERO IS A TOPIC
    $reply = "so you think {$topic} is {$positive}?";
    // if statment can go here
}
if ($isTopic == true and $isNegative == true) {                                              // ASKING IF ZERO IS A TOPIC
    $reply = "wait, you think {$topic} is {$negative}?";
    // if statment can go here
}
if ($isAboutKnowledge == true and $isAboutMe == true and $isQuestion == true and $isTopic == false) {				// ASKING ZERO KNOWS ABOUT UNKNOWN TOPIC
    $reply = "Nothing yet, do you want to tell me?";
}
if ($isAboutKnowledge == true and $isAboutMe == true and $isQuestion == true and $isTopic == true) {				// ASKING ZERO KNOWS ABOUT TOPIC
    $reply = "{$yes}, I know about {$topic}";
}

// DEFINITION RESPONSE
if ($isTopic == false and $isDefinition == true) {				                                                    // ASKING ZERO KNOWS ABOUT UNKNOWN TOPIC
    $reply = "{$knowThat} {$definition_keyword} is {$definition}";
} 


// LEVEL THREE TESTS
// **************************************************** 

