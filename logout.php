<?php

session_destroy();
session_start();
session_regenerate_id();
//reset the 'auth' cookie
setcookie("auth", 0, time()+60*30, "/", "", 0);

//show logged out page along with header and footer
include("html/header.php");
include("html/loggedout.html");
include("html/footer.html");
        
        
        

