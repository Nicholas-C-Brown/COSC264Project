<!DOCTYPE html>

<html>
    <head>
        <title>Log in / Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    </head>
    <body>

<?php
    
//check if required inputs were given, and display appropriate error messages if not.
    if (!filter_input(INPUT_POST, 'username')){
            $display_block = "<p class='echoclass2'>Please enter a username</p>";

    }else if (!filter_input(INPUT_POST, 'email')){
            $display_block = "<p class='echoclass2'>Please enter an email</p>";

    }else if(!filter_input(INPUT_POST, 'password')){
            $display_block = "<p class='echoclass2'>Please enter a password</p>";

    }else if(filter_input(INPUT_POST, 'age')==="Age") {
            $display_block = "<p class='echoclass2'>Please select your age</p>";
    }else{

        $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");

        $account_email = strtolower(filter_input(INPUT_POST, 'email'));

        $sql = "SELECT * FROM accounts WHERE email = '".$account_email."'"; //check if email is already in use
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($result) == 1){ //account already exists with this email
            $display_block = "<p class='echoclass2'>The email address \"".$account_email."\" is already in use, please try again!</p>";
        }else{
            $account_username = filter_input(INPUT_POST, 'username');
            $account_password = filter_input(INPUT_POST, 'password');
            $account_age = filter_input(INPUT_POST, 'age');
            $account_subscribed = filter_input(INPUT_POST, 'subscribe');

            addUser($mysqli, $account_username, $account_email, $account_password, $account_age, $account_subscribed);

        }   
        mysqli_close($mysqli);
    }
?>

<?php
    include("html/header.php");
    echo "$display_block";
    include("html/login.html");
    include("html/footer.html");
?>

<?php 
    function addUser($mysqli, $account_username, $account_email, $account_password, $account_age, $account_subscribed){
        //Subscribe the account to email list if checkbox was ticked
        if ($account_subscribed=="true"){
            $account_subscribed=1;
            
            include("subscribe.php");
            subscribe($account_email);
        }else {$account_subscribed=0;}
        
        //Add the account to the database
        $sql = "INSERT INTO accounts (id, username, email, password, age, subscribed)
            VALUES (NULL,'".$account_username."', '".$account_email."', PASSWORD('".$account_password."'), '".$account_age."', '".$account_subscribed."');";

        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        
        //Show the account created page along with header and footer
        include("html/header.php");
        include("html/accountcreated.html");
        include("html/footer.html");
        exit;
    }
    
     ?>
    </body>
</html>







