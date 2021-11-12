<?php
include('connection.php');
$sel=mysqli_query($conn,"SELECT * from users where email='$sid';");
$arr=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<table class="table table-light text-dark table-hover">
 
<tbody>
            
    
                    <tr>
                        <th scope="col">Email</th>
                        <td><?php echo $arr['email']; ?></td>
  
                    </tr>
                    
                    <tr>
                    <th scope="col">User Name</th>
                    <td><?php echo $arr['uname']; ?></td>
                    </tr>

                    <tr>
                    <th scope="col">Name</th>
                    <td><?php echo $arr['name']; ?></td>
                    </tr>

                    <tr>
                        <th scope="col">Age</th>
                        <td><?php echo $arr['age']; ?></td>
                </tr>

                <tr>
                <th scope="col">Gender</th>
                <td><?php echo $arr['gender']; ?></td>
                </tr>

                <tr>
                <th scope="col">City</th>
                <td><?php echo $arr['city']; ?></td>
                </tr>

                <tr>
                <th scope="col">Image</th>
                <td><?php echo $arr['image']; ?></td>
                </tr>

                <tr>
                <th scope="col">Time</th>
                <td><?php echo $arr['created_at']; ?></td>
                </tr>
                
            
           
  </tbody>
</table>
</body>
</html>