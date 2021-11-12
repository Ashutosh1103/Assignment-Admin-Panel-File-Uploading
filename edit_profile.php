<?php
include('connection.php');


$sel=mysqli_query($conn,"SELECT * from users where email='$sid';");
$arr=mysqli_fetch_assoc($sel);


error_reporting(0);

// input fields 
$name = input_field($_POST["name"]);
$email = input_field($_POST["email"]);
$uname = input_field($_POST["uname"]);

$age = input_field($_POST["age"]);
$gender = input_field($_POST["gender"]);
$city = input_field($_POST["city"]);



// error variables 
$errMsg = $nameErr = $emailErr = $unameErr =  $cityErr =  $ageErr = $genderErr =  "";

// validation
if (isset($_POST["sub"])) {

    // name validation 
    if (empty($name)) {
        $nameErr = "Name is required.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameErr = "Only Characters and white spaces are allowed.";
    } 

    // username validation 
    if (empty($uname)) {
        $unameErr = "Username is required.";
    } else if (!preg_match("/^[a-zA-Z0-9 ]+$/", $uname)) {
        $unameErr = "Only Characters, Numbers and white spaces are allowed.";
    } 

    // email validation 
    if (empty($email)) {
        $emailErr = "Email Address is required.";
    } else if (!preg_match("/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/", $email)) {
        $emailErr = "Invalid Email Address.";
    }

    
  

    // age validation 
    if (empty($age)) {
        $ageErr = "Please Enter your Age.";
    }

    // gender validation 
    if (empty($gender)) {
        $genderErr = "Please Select your Gender.";
    }

    // city validation 
    if (empty($city)) {
        $cityErr = "City is required.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $city)) {
        $cityErr = "Only Characters and white spaces are allowed.";
    } 

   

    if ($nameErr === "" && $emailErr === "" && $unameErr === "" && $ageErr ==  ""  && $genderErr === "" && $cityErr === "") 
    {
        mysqli_query($conn,"UPDATE users set email='$email',uname='$uname',name='$name',age=$age,city='$city',gender='$gender' where email='$sid';");
        $errMsg = "Details Updated";
           
       
    }
    

}



// trim function 
function input_field($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<h1 class="text-dark">Edit</h1>

<form method="post" enctype="multipart/form-data">

                     

<div class="form-outline mb-4">
    <input type="text" id="email" value="<?php echo $arr['email'];?>" class="form-control form-control-lg" name="email" />
    <label class="form-label text-dark" for="email">Email</label>
    <small id="err" class="form-text text-danger"><?php echo $emailErr; ?></small>
  </div>



  <div class="form-outline mb-4">
    <input type="text" id="uname" value="<?php echo $arr['uname'];?>" class="form-control form-control-lg" name="uname"/>
    <label class="form-label text-dark" for="uname">Username</label>
    <small id="err" class="form-text text-danger"><?php echo $unameErr; ?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="name" value="<?php echo $arr['name'];?>" class="form-control form-control-lg" name="name"/>
    <label class="form-label text-dark" for="name">Name</label>
    <small id="err" class="form-text text-danger"><?php echo $nameErr; ?></small>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="age" value="<?php echo $arr['age'];?>" class="form-control form-control-lg" name="age"/>
    <label class="form-label text-dark" for="age">Age</label>
    <small id="err" class="form-text text-danger"><?php echo $ageErr; ?></small>
  </div>

  
 
  <div class="form-group col-md-6 col-sm-12">
  <h5 class="text-dark">Gender</h5>
  <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="male" value="male">
      <label class="form-check-label text-dark" for="male">
          Male
      </label>
  </div>
  <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
      <label class="form-check-label text-dark" for="female">
          Female
      </label>
  </div>
 <small id="err" class="form-text text-danger"><?php echo $genderErr; ?></small>
  </div>

  <br>
  <br>

  <div class="form-outline mb-4">
  <input type="text" id="city" value="<?php echo $arr['city'];?>" name="city" class="form-control form-control-lg" />
  <label class="form-label text-dark" for="city">City</label>
  <small id="err" class="form-text text-danger"><?php echo $cityErr; ?></small>
  </div>

  
      
  

 

  <small id="err" class="form-text text-danger"><?php echo $errMsg; ?></small>
  
  <div class="d-flex justify-content-center">
    <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="SUBMIT" name="sub"></input>
    
  </div>

  

</form>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>