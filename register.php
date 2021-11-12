<?php
include('connection.php');
include('cap.php');

error_reporting(0);

// input fields 
$name = input_field($_POST["name"]);
$email = input_field($_POST["email"]);
$uname = input_field($_POST["uname"]);
$password = input_field($_POST["password"]);
$age = input_field($_POST["age"]);
$gender = input_field($_POST["gender"]);
$city = input_field($_POST["city"]);

$tmp = $_FILES["image"]["tmp_name"];
$fname = $_FILES["image"]["name"];

// error variables 
$errMsg = $nameErr = $emailErr = $unameErr = $passwordErr = $cityErr = $imageErr = $ageErr = $genderErr = $capErr = "";

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

    
    // password validation 
    if (empty($password)) {
        $passwordErr = "Password is required.";
    } else if (!preg_match("/^[a-zA-Z0-9]{3,16}+$/", $password)) {
        $passwordErr = "Length of password should be between 4, 16 characters.";
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

    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $fn =  "$email-" . "." .$ext;

    if ($nameErr === "" && $emailErr === "" && $unameErr === "" && $passwordErr  === "" && $ageErr ==  "" && $imageErr === ""  && $genderErr === "" && $cityErr === "") 
    {
        if($_POST['cap']===$_POST['capsum']){
            
            if ($ext == "jpg" || $ext == "png" || $ext == "jpeg"){
                if(mysqli_query($conn,"insert into users(email,password,uname,name,age,gender,city,image) values ('$email','$password','$uname','$name',$age,'$gender','$city','$fn')")){
                  
                  move_uploaded_file($tmp, "uploads/$fn");
                  
                  header("Location:welcome.php?uid=$email");
                  }
                  else{
                    $errMsg = "Email and Username should be Unique.";
                  }
            } 
             else {
               $imageErr = "Please Select image file png, jpg or jpeg";
             }
          }
        else{
          $capErr = "Wrong Answer";
        }
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>New Users</title>
    
    
  </head>
  <body>
   <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Register Here</h1>
            </div>
      </div> 

      
              
  <!--Registration Form -->
      <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
              <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                      <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    

                      <form method="post" enctype="multipart/form-data">

                     

                      <div class="form-outline mb-4">
                          <input type="text" id="email" class="form-control form-control-lg" name="email" />
                          <label class="form-label" for="email">Email</label>
                          <small id="err" class="form-text text-danger"><?php echo $emailErr; ?></small>
                        </div>

                        

                        

                        <div class="form-outline mb-4">
                          <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                          <label class="form-label" for="password">Password</label>
                          <small id="err" class="form-text text-danger"><?php echo $passwordErr; ?></small>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="text" id="uname" class="form-control form-control-lg" name="uname"/>
                          <label class="form-label" for="uname">Username</label>
                          <small id="err" class="form-text text-danger"><?php echo $unameErr; ?></small>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="text" id="name" class="form-control form-control-lg" name="name"/>
                          <label class="form-label" for="name">Name</label>
                          <small id="err" class="form-text text-danger"><?php echo $nameErr; ?></small>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="text" id="age" class="form-control form-control-lg" name="age"/>
                          <label class="form-label" for="age">Age</label>
                          <small id="err" class="form-text text-danger"><?php echo $ageErr; ?></small>
                        </div>

                        
                       
                        <div class="form-group col-md-6 col-sm-12">
                        <h5>Gender</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                       <small id="err" class="form-text text-danger"><?php echo $genderErr; ?></small>
                        </div>

                        <br>
                        <br>

                        <div class="form-outline mb-4">
                        <input type="text" id="city" name="city" class="form-control form-control-lg" />
                        <label class="form-label" for="city">City</label>
                        <small id="err" class="form-text text-danger"><?php echo $cityErr; ?></small>
                        </div>

                        
                            
                        <div class="form-outline mb-4">
                          <input type="file" id="image" class="form-control form-control-lg" name="image"/>
                          <label class="form-label" for="image">Image</label>
                          <small id="err" class="form-text text-danger"><?php echo $imageErr; ?></small>
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="image">Captcha : <b><?php echo $pat; ?></b></label>
                          <input type="text" id="cap" class="form-control form-control-lg" name="cap"/>
                          <input type="hidden" id="cap" class="form-control form-control-lg" name="capsum" value="<?php echo $capsum; ?>"/>
                          
                          <small id="err" class="form-text text-danger"><?php echo $capErr; ?></small>
                        </div>

                        <small id="err" class="form-text text-danger"><?php echo $errMsg; ?></small>
                        
                        <div class="d-flex justify-content-center">
                          <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="SUBMIT" name="sub"></input>
                          
                        </div>

                        

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
            
    <?php
    include('footer.php')
    ?>
    
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>