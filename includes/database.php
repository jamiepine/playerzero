<?php 
		
require('db_connect.php');

// **************************************************** 
// RETURN FROM DATABASE 
// **************************************************** 

function searchDB($tableName, $columnName, $searchTerm, $returnColumn) { 				// USAGE :: echo searchDB("tableName", "columnName", "searchTerm", 1);
	
    DBconnect();
    
    global $mysqli;																		// global tells PHP to look for variable outside function, in this case: $mysqli
    
    $query = "SELECT * FROM $tableName WHERE $columnName LIKE '$searchTerm'";   
     
    if ($result = $mysqli->query($query)) {    											// performs database query and returns variable $row as an array   
	    
        $row = $result->fetch_row();        
        
        	return ($row[$returnColumn]); 												// choose column from row and return value
    }
}
