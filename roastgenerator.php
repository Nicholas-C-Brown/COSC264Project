<!DOCTYPE html>

<html>
    <head>
        <title>Roast Generator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    </head>
    <body>
        
        <?php
        
        include("html/header.php");
        include("html/roastgenerator.html");
        
        if (!filter_input(INPUT_POST, 'name')) {
                if(isset ($_POST['name'])){
                    $display = "please enter a name";
                }
        }else {
            
            $mysqli = mysqli_connect("localhost", "cs264user", "letmein", "roastgen");
            
            //Check whether the given name is in the list of roastees
            $name = filter_input(INPUT_POST, 'name');
            
            $query = mysqli_query($mysqli, "SELECT * FROM roast_types"
                    . " INNER JOIN roastees ON roast_types.id = roastees.roast_type_id WHERE roastees.name = '".$name."'")
                        or die(mysqli_error($mysqli));
            
            //If they are then retrieve roasts of their roast type
            if(mysqli_num_rows($query) == 1){
                
                $row = mysqli_fetch_array($query);
                $roast_type = stripslashes($row['roast_type_id']);
                
                $query = mysqli_query($mysqli, "SELECT * FROM roasts WHERE roast_type_id = '".$roast_type."'") or die(mysqli_error($mysqli)); 
                $roastArray = array();
                
            }
            //otherwise just retrive all roasts instead
            else{
            
                //Retrieve all roasts from roasts table
                $query = mysqli_query($mysqli, "SELECT * FROM roasts") or die(mysqli_error($mysqli)); 
                $roastArray = array();
            
            }
           
            //add selected roasts into an array
            $idx = 0;
            while($row = mysqli_fetch_array($query)){
                 
                $roastArray[$idx] = stripslashes($row['roast']);
                $idx++;
                
            }
            
            //find size of array
            $size = sizeof($roastArray);
            
            //generate a random number to select a roast
            $randomID = random_int(0, $size-1);
            
            //select the roast
            $roast = $roastArray[$randomID];
            
            //insert the input name in place of the '$'
            $display = "<p class='echoclass'>" . str_replace("$", $name, $roast) . "</p>";
            mysqli_close($mysqli);
        }
        
        echo "<br>
            




                </br>";
        echo $display;
        include("html/footer.html");
        
        ?>
    </body>
</html>
