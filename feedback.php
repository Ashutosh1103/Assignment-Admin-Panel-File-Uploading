<?php
 // error variables 
 $nameErr = $emailErr = $messageErr = "";

if(isset($_POST['sub'])){
  $email=$_POST['email'];
  $message=$_POST['message'];
  $name=$_POST['name'];
 
  // email validation 
 if (empty($email)) {
    $emailErr = "Email Address is required.";
    } else if (!preg_match("/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/", $email)) {
    $emailErr = "Invalid Email Address.";
    }

     // name validation 
     if (empty($name)) {
        $nameErr = "Name is required.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameErr = "Only Characters and white spaces are allowed.";
    } 

     // message validation 
     if (empty($message)) {
        $messageErr = "Name is required.";
    } 

    if ($nameErr === "" && $emailErr === "" && $messageErr === "" ) {
        include('feedbacksubmit.php');
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    

    <div class="container z-depth-1 my-5 px-0">

<!--Section: Content-->
<section class="my-md-5" 
  style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/People/12-col/img%20(97).jpg'); background-size: cover; background-position: center center;">

  <div class="rgba-black-strong rounded p-5">

    <!-- Section heading -->
    <h3 class="text-center font-weight-bold text-white mt-3 mb-5">Contact Us</h3>

    <form class="mx-md-5" method="post" action="">

      <div class="row">
        <div class="col-md-6 mb-4">

          <div class="card">
            <div class="card-body px-4">

              <!-- Name -->
              <div class="md-form md-outline mt-0">
                <input type="text" id="name" name="name" class="form-control" placeholder="Your name">
               
                <small id="err" class="form-text text-danger"><?php echo $nameErr; ?></small>
                <br>
               <br>
              </div>
              <!-- Email -->
              <div class="md-form md-outline">
                <input type="text" id="email" name="email" class="form-control" placeholder="Your Email Address">
                
                <small id="err" class="form-text text-danger"><?php echo $emailErr; ?></small>
                <br>
               <br>
              </div>
              <!-- Message -->
              <div class="md-form md-outline">
                <textarea id="message" name="message" class="md-textarea form-control" rows="3" placeholder="Your Message"></textarea>
                
                <small id="err" class="form-text text-danger"><?php echo $messageErr; ?></small>
                <br>
               <br>
              </div>

             <button type="submit" class="btn btn-primary btn-md btn-block ml-0 mb-0" name="sub">Submit inquiry</button>

            </div>
          </div>

        </div>
        <div class="col-md-5 offset-md-1 mt-md-4 mb-4 white-text">

          <h5 class="font-weight-bold">Address</h5>
          <p class="mb-0">NeoSOFT Technologies</p>
          <p class="mb-0">Mumbai, </p>
          <p class="mb-4 pb-2">India</p>

          <h5 class="font-weight-bold">Phone</h5>
          <p class="mb-4 pb-2">+ 01 234 567 89</p>

          <h5 class="font-weight-bold">Email</h5>
          <p>neosoft@gmail.com</p>

        </div>
      </div>

    </form>

  </div>

</section>
<!--Section: Content-->


</div>

</body>
</html>