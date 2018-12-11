<?php

// **************************************************** 
// DATABASE CONNECTION
// **************************************************** 	

function DBconnect() {
	
    global $mysqli;																		// global tells PHP to look for variable outside function, in this case: $mysqli
    
    $mysqli = new mysqli(
    
    "playerzeroco.ipagemysql.com", 														// Server
    "zero", 																			// Username
    "zero1234zero", 																	// Password
    "zero"																				// Database
    
    );
      
    if (mysqli_connect_errno()) {														// check connection
   	
    	exit();																			// printf("Connect failed: %s\n", mysqli_connect_error());
    	
	}
}