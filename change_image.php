<?php
include('connection.php');
  error_reporting(0);
  $fileError=$success="";
  $email=$_SESSION['sid'];
  //$image=$simage;

  if(isset($_POST["submit"])){
    $tmp1=$_FILES['image']['tmp_name'];
    $fname1=$_FILES['image']['name'];
    $ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
    $fn1 =  "$email-" . "." .$ext1;
    

    if(empty($tmp1))
      {
          $fileError="*Image required";
      }
      if($ext1=="jpg" || $ext1=="png" || $ext1=="jpeg")
      {
        if(move_uploaded_file($tmp1,"uploads/$fn1")){
                    
                    mysqli_query($conn,"UPDATE users set image='$fn1' where email ='$email';");
                    
                    $success="Image Changed Successfully!";
                  }
              
          
          else{
            $fileError="*Only jpg, png and jpeg supported";
          }
      }

     
     
     
      
    }//isset close

  function input_field($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Change Image </title>
  </head>
  <body>

<h1 class="  text-dark">Change Image</h1>


<div class="">
<?php
if(!empty($fileError)){
    ?>
    <div class="alert alert-danger"><?php echo $fileError; ?></div>

 <?php   
}
?>
</div>
<form method="post" enctype="multipart/form-data"> 



  <div class="form-outline mb-4">
    <input type="file" id="image" class="form-control form-control-lg" name="image"/>
    <label class="form-label" for="image">Image</label>
                         
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Change Image</button>
  
  <div class="">
<?php
if(!empty($success)){
    ?>
    <div class="text-success"><?php echo $success; ?></div>
 <?php  
}
?>
  </div>
   
    
  </body>
</html>