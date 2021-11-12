<?php
error_reporting(0);
include('connection.php');
$sel=mysqli_query($conn,"SELECT image from users where email='$sid';");
    
        
$arr=mysqli_fetch_assoc($sel);
$image=$arr['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-dark">Image:</h1>
    
    
    <?php
   
        echo "<img style='height:500px;width:500px' src='uploads/$image' >";  
    
       
       
            // $image=$simage;
            
            // echo "<img style='height:500px;width:500px' src='uploads/$image' >";  
        
    ?>
    
</body>
</html>