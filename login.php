<html>
    <head>
        <title>Add Roast / Roastee</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    </head>
    <body>

<?php

    session_start();
    //check for required fields from the form
    if (!filter_input(INPUT_POST, 'email')){
                $display_block = "<p class='echoclass2'>Please enter your email</p>";

    }else if(!filter_input(INPUT_POST, 'password')){
                $display_block = "<p class='echoclass2'>Please enter your password</p>";

    }else{
        
        $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");
        
        $targetemail = filter_input(INPUT_POST, 'email');
        $targetpasswd = filter_input(INPUT_POST, 'password');
        $sql = "SELECT * FROM accounts WHERE email = '".$targetemail.
            "' AND password = PASSWORD('".$targetpasswd."')";
        
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        //get the number of rows in the result set; should be 1 if a match
        if (mysqli_num_rows($result) == 1) {
            
            //setcookie($name, $value, $expire, $path, $domain, $secure);
            //set authorization cookie using curent Session ID
            setcookie("auth", session_id(), time()+60*30, "/", "", 0);
            $row = mysqli_fetch_array($result);
            setcookie("email", stripslashes($row['email']), time()+60*30, "/", "", 0); 
            setcookie("subscribed", stripslashes($row['subscribed']), time()+60*30, "/", "", 0);
            
            header("Location: roastgenerator.php");
            
            
        }
        
        mysqli_close($mysqli);
   
    } 
    
    ?>
        
        <?php
    //Show the login page along with header and footer
    include("html/header.php");
    echo "$display_block";
    include("html/login.html");
    include("html/footer.html");
?>
    
    </body>
</html>

