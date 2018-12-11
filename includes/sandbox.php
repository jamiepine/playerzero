<?php 
  require('database.php');
  require('stop_words.php');
  
$input_noPunc = "memes memememe"; 
$input_noPunc = preg_replace('/[^a-z0-9]+/i', ' ', strtolower($input_noPunc));      // remove punctuation & make lowercase
$input_explode = explode(' ',trim($input_noPunc));
$input_keywords = array_diff($input_explode, $stop_words);         

foreach ($input_keywords as $skey => $keyword) {
	echo "</br>{$keyword}";                                    // loop through the array 
    $databasematch = searchDB("entries", "word", $keyword, 0);                
   if (strpos($keyword, $databasematch) !== false) {  
	  $def = searchDB("entries", "word", $keyword, 2);                               // match database keyword with array keyword
      echo " MATCHED: {$keyword} Definition: {$def}";
     
   } else {
   }
}
?> </br></br> <?php
  
$array1 = array("a" => "green", "g", "blue");
$array2 = array("b" => "green", "yellow", "red");


$result = array_intersect($array1, $array2);
if (empty($result)) {
  echo "arrays don't match";
} else {
  echo "arrays match";
}

?> <br><br><br><?php

// DO WE HAVE A DEFINITION FOR ANY OF THESE WORDS?
foreach ($input_keywords as $skey => $keyword) {                                     // loop through the array 
    $databasematch = searchDB("entries", "word", $keyword, 0);                   // search database for individual keyword
   if (strpos($keyword, $databasematch) !== false) {                                 // match database keyword with array keyword
      $definition = searchDB("entries", "word", $keyword, 2);
      $definition = lcfirst($definition); 
      $definition_keyword = searchDB("entries", "word", $keyword, 0);
      echo $definition_keyword;
      break;
   } 
}
if ($definition === null) {													// If no definition is found, set definition false
	   $isDefinition = false;
   }
if ($isDefinition == false) {
	echo "empty";
}

// For question sequence what IS keemstar?
// Database stores every result for what people say about a topic, what a topic IS, what a topic LIKES, what a topic, HAS, what a topic THINKS
// AI identifies most common occuring words for each field and logs them in the topics table