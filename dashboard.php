<?php
session_start();
$sid=$_SESSION['sid'];
//$simage=$_SESSION['simage'];

if(empty($sid)){
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    
<?php include('nav.php'); ?>

<!-- Sidebar & Contentarea-->
<div class="row container-fluid">
  <div class="col-4 ">
  <?php include('sidebar.php'); ?>
  
  </div>


  <div class="col-8 bg-white text-white w-100  h-100">
    <?php
    switch(@$_GET['con']){
      
      case 'changeimage' : include('change_image.php');
      break;

      case 'changepass' : include('change_password.php');
      break;

      case 'images' : include('image.php');
      break;

      case 'details' : include('details.php');
      break;

      

      case 'editprofile' : include('edit_profile.php');
      break;

      case 'category' : include('category.php');
      break;
      
      case 'products' : include('products.php');
      break;
      
      case 'orders' : include('orders.php');
      break;

      case 'feedback' : include('feedback.php');
      break;

      case 'feedbacksubmit' : include('feedbacksubmit.php');
      break;

     
    }
    

    
    ?>

   

  </div>
</div>
<?php
include('footer.php');
?>
</body>
</html>