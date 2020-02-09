<?php
    function subscribe($account_email){
        //trying to subscribe; validate email address

        include ("gmail.php");

        //connect to database
        $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");
               
        //check that email is in list
        $check_sql = "SELECT email FROM accounts WHERE email = '".$account_email."' AND subscribed = 1";
        $check_res = mysqli_query($mysqli, $check_sql) or die(mysqli_error($mysqli));

        //get number of results and do action
        if (mysqli_num_rows($check_res) != 1) {
            //free result
            mysqli_free_result($check_res);

            $message = "Thanks for joining Roasting Generator!\n\n";
            $message .= "From Roastgen";
            $done = gmail($account_email, "Subscription to Roast Generator", nl2br($message));

            $check_res_array = mysqli_fetch_array($check_res);
                        
            //if updating email to subscribe then update database
            if(stripslashes($check_res_array['subscribed']) == 0){
                $update_sql = "UPDATE accounts SET subscribed = '1' WHERE accounts.email = '".$account_email."'";
                $query = mysqli_query($mysqli, $update_sql);
                setcookie("subscribed", 1, time()+60*30, "/", "", 0);
            }
                        
            //close connection to MySQL
            mysqli_close($mysqli);
        }
    }