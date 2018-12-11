<?php

// Strpos shorthand function, pretty neat!
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}





// HELLO WORLD
// We use this to test global variables. Apparently, anytime we want to issue the final output from a function, we must first tell PHP that we're talking about the GLOBAL version of that variable, previously defined in console.php as global. Weird, but don't question it!
function helloWorld($jeff) {
    global $reply;
    global $userinput;
    $replyy = "{$jeff} memes {$userinput}";
    return $replyy;
}
// USAGE: $reply = helloWorld("test");


