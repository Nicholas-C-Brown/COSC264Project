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
         
        //If no roastee was input show an error message
        if (!filter_input(INPUT_POST, 'roastee')){
                $display .= "<p class='echoclass2'>Please enter a roastee.</p> <br>";
                
            }else{
                
                $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");

                //Check whether the given roastee already exists
                $roastee = filter_input(INPUT_POST, 'roastee');

                $query = mysqli_query($mysqli, "SELECT * FROM roastees WHERE name = '".$roastee."'")
                    or die(mysqli_error($mysqli));

                if(mysqli_num_rows($query) == 1){
                    $display .= "Roastee already exists.";
                    
                }else{
                    //Add roastee to the database
                    $roast_type_id = (int) filter_input(INPUT_POST, 'roast_type');
                    
                    if($roast_type_id > 0){
                        $sql = "INSERT INTO roastees (id, name, roast_type_id) VALUES (NULL, '".$roastee."', '".$roast_type_id."') ";
                        $query = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                        $display .= "<p class='echoclass2'>Roastee added!</p>";
                    }else {$display .= "Please choose a roast type!";}
                }
                 
            }
            //Show add roasts page along with header and footer
            include("html/header.php");
            echo $display;
            include("html/addroasts.html");
            include("html/footer.html");
        
            mysqli_close($mysqli);
            
         ?>
    </body>
</html>



