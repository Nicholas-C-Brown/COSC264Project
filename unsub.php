<?php

        include ("gmail.php");

        //connect to database
        $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");
               
        $account_email = filter_input(INPUT_COOKIE, 'email');
        
        //check that email is in list
        $check_sql = "SELECT email FROM accounts WHERE email = '".$account_email."' AND subscribed = 1";
        $check_res = mysqli_query($mysqli, $check_sql) or die(mysqli_error($mysqli));

        //get number of results and do action
        if (mysqli_num_rows($check_res) == 1) {
            //free result
            mysqli_free_result($check_res);

            $message = "You have unsubscribed from Roast Generator.\n\n";
            $message .= "From Roastgen";
            $done = gmail($account_email, "Unsubscription from Roast Generator", nl2br($message));

            $check_res_array = mysqli_fetch_array($check_res);
                        
            $update_sql = "UPDATE accounts SET subscribed = '0' WHERE accounts.email = '".$account_email."'";
            $query = mysqli_query($mysqli, $update_sql);
            setcookie("subscribed", 0, time()+60*30, "/", "", 0);
            
                        
            //close connection to MySQL
            mysqli_close($mysqli);
        
        }
        
        include("html/header.php");
        include("html/unsubscribed.html");
        include("html/footer.html");

