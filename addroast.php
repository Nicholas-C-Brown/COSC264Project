<!DOCTYPE html>

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
        
            //If no roast was input display error message
            if (!filter_input(INPUT_POST, 'roast')){
                $display .= "<p class='echoclass2'>Please enter a roast. </p><br>";
  
            }else{
                
                $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");

                //Check whether the given roast already exists
                $roast = filter_input(INPUT_POST, 'roast');

                $query = mysqli_query($mysqli, "SELECT * FROM roasts WHERE roast = '".$roast."'")
                    or die(mysqli_error($mysqli));

                if(mysqli_num_rows($query) == 1){
                    $display .= "Roast already exists.";
                   
                }else{
                    //Add the roast into the database
                    $roast_type_id = (int) filter_input(INPUT_POST, 'roast_type');
                    
                    if($roast_type_id>0){
                        $sql = "INSERT INTO roasts (id, roast, roast_type_id) VALUES (NULL, '".$roast."', '".$roast_type_id."') ";
                        $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                        $display .= "<p class='echoclass2'>Roast added!</p>";
                    }
                }
            }
            
            //Show the addroasts page along with header and footer
            include("html/header.php");
            echo $display;
            include("html/addroasts.html");
            include("html/footer.html");
        
            mysqli_close($mysqli);
            
         ?>
    </body>
</html>



