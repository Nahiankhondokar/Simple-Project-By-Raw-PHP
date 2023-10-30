<?php 
  require 'connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/icons/favicon.ico" type="image/x-icon" />
    <title>Facebook – log in or sign up</title>

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

    <?php

    if(isset($_POST['add'])){

      // form info
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      // file upload
      $image = $_FILES['image'];
      $uniqueFileName = md5(time().rand()).$image['name'];
      move_uploaded_file($image['tmp_name'], 'photo/'.$uniqueFileName);

      // validation
      if(empty($name) || empty($email) || empty($phone) || empty($password)){
          $message =  "<p style='color:red;'>Fields are required</p>";
      }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $message =  "<p style='color:red;'>Invalid email</p>";
      }elseif(filter_var($phone, FILTER_VALIDATE_INT) == false){
        $message =  "<p style='color:red;'>Invalid number</p>";
      }else {
        $sql = "INSERT INTO users(id, name, phone, email, roll, image) VALUES (1, '$name', '$phone', '$email', 'Admin', '$uniqueFileName')";
        $connection->query($sql); 


      }

    }

    ?>

    <!-- Facebook Auth Area -->
    <div class="fb-auth">
        <div class="auth-wraper" style="padding-top: 200px;">
            <div class="auth-left">
                <img src="./assets/icons/facebook.svg" alt="" />
                <h2>
                    Raw PHP Simple Project For Practice
                </h2>
            </div>
            <div class="auth-right">
                <?php
                if(isset($message)){
                  echo $message;
                }
              ?>
                <div class="auth-box">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="auth-form">
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="auth-form">
                            <input type="text" name="email" placeholder="Email" />
                        </div>
                        <div class="auth-form">
                            <input type="text" name="phone" placeholder="Phone number" />
                        </div>
                        <div class="auth-form">
                            <input type="password" placeholder="Password" name="password" />
                        </div>
                        <div class="auth-form">
                            <input type="file" name="image" />
                        </div>
                        <div class="auth-form">
                            <button name="add" type="submit">Log In</button>
                        </div>
                    </form>

                    <a href="#">Forgotten password?</a>

                    <div class="divider"></div>

                    <button>Create New Account</button>
                </div>
                <p>
                    <a href="#">Create a Page</a> for a celebrity, brand or business.
                </p>
            </div>
        </div>
    </div>



</body>

</html>