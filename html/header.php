<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="ribbon">
                <h1>Roast Generator</h1>
		<ul>
			<li><a href="roastgenerator.php">Home</a></li>
			<li><a href="info.php">About</a></li>
                       
			<?php 
                        session_start();
                        
              
                       
                        //Determine if the user is logged in and if so show an account tab and the add roasts (secret) page                   
                        if (filter_input(INPUT_COOKIE, 'auth') === session_id()) { ?>
                        <li><a href="addroastroasteepage.php">Add</a></li>
                        <li><a>Account
				<ul><li>
                                        <?php if(filter_input(INPUT_COOKIE, 'subscribed') == 1){
                                            //If user is already subscribed show a unsub button    
                                            ?>
                                        <a href="unsub.php">Unsubscribe</a>
                                        <br>
                                        
                                        </br>
                                        <?php }else{ 
                                            //If user isn't subscribed show a sub button
                                        ?>
                                        <a href="sub.php">Subscribe</a>
                                        <br>
                                        
                                        </br>
                                        <?php } ?>
					<a href="logout.php">Sign out</a>
				</li></ul>
			</a></li>
                        <?php }else{ 
                            //If the user isn't logged in show the log in tab instead
                            ?>
                        <li><a href="loginregisterpage.php">Log In</a></li>
                        <?php } ?>
		</ul>
            </div>
        </header>
    </body>
</html>





