<?php 
if (is_ajax()) {
  if (isset($_POST["response"]) && !empty($_POST["response"])) { //Checks if response value exists
    $response = $_POST["response"];
    switch($response) { //Switch case for value of action
      case "null": test_function(); break;
    }
  }
}
//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){
  $return = $_POST;


// AI OR COMMAND???

// If "load" command
$commandword = explode(' ',trim($return["command"]));
strtolower($commandword);
  if ($commandword[0] == "/load"){
    $return["commandtype"] = $commandword[0];
    $link = $commandword[1];
    $return["link"] = $link;
    $return["response"] = "Loading $link...";

// If "clear" command
} elseif ($commandword[0] == "/clear"){
    $return["commandtype"] = "clear";
    $return["response"] = "For some reason, this will never be seen";

// Process AI request
} else {
  global $reply;
  global $userinput;
  $userinput = $return["command"];
  require('ai.php');
  $return["response"] = $reply;
}
  
$return["json"] = json_encode($return);
  echo json_encode($return);
}
/* close db connection */
$mysqli->close();
?>