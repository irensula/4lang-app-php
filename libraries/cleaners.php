<?php

// preserve whitespace and formatting
function cleanDump($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

// sanitizes user's input
function cleanUpInput($userinput){
    $input = trim($userinput);
    $cleaninput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $cleaninput;
}

// sanitizes the output
function cleanUpOutput($useroutput){
    $output = trim($useroutput);
    $cleanoutput = htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
    return $cleanoutput;
}