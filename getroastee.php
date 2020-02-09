<?php

function contains($needle, $haystack)
{
    $needle = strtolower($needle);
    $haystack = strtolower($haystack);
    return strpos($haystack, $needle) !== false;
}

$mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");
  
$query = mysqli_query($mysqli, "SELECT * FROM roastees") or die(mysqli_error($mysqli));
 
$a = array();
  
$idx = 0;
while($row = mysqli_fetch_array($query)){
    $a[$idx] = stripslashes($row['name']);
    $idx++;
}

$q = $_GET["q"];
$hint = "";
$name = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $len=strlen($q);
  foreach($a as $name) { 
      
    if (contains($q, $name)) {  
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
      
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "No Suggestion..." : "Suggested Roastee(s): " . $hint;
mysqli_close($mysqli);