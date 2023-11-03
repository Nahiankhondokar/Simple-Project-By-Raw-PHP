<?php 
  require 'connection/connection.php';
?>



<?php 

  if(isset($_GET['user_id'])){
    $userId = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE id='$userId'";
    $data = $connection->query($sql);
    $user = $data->fetch_assoc();

  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/icons/favicon.ico" type="image/x-icon" />
    <title>Update User</title>

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

    <?php

    if(isset($_POST['add'])){

      // form info
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $userId = $_GET['user_id'];

      // file upload
      $image = $_FILES['image'];
      $uniqueFileName = md5(time().rand()).$image['name'];
      move_uploaded_file($image['tmp_name'], 'photo/'.$uniqueFileName);

      // validation
      if(empty($name) || empty($email) || empty($phone)){
          $message =  "<p style='color:red;'>Fields are required</p>";
      }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $message =  "<p style='color:red;'>Invalid email</p>";
      }elseif(filter_var($phone, FILTER_VALIDATE_INT) == false){
        $message =  "<p style='color:red;'>Invalid number</p>";
      }else {
        $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', image='$uniqueFileName' WHERE id='$userId '";
        $connection->query($sql); 

        header('location:users.php');
      }

    }

    ?>

    <!-- Facebook Auth Area -->
    <div class="fb-auth">
        <div class="auth-wraper" style="padding-top: 200px;">
            <div class="auth-left">
                <img src="./assets/icons/facebook.svg" alt="" />
                <h2>
                    Update User
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
                            <input type="text" name="name" placeholder="Name" value="<?php echo $user['name']; ?>" />
                        </div>
                        <div class="auth-form">
                            <input type="text" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" />
                        </div>
                        <div class="auth-form">
                            <input type="text" name="phone" placeholder="Phone number" value="<?php echo $user['phone']; ?>" />
                        </div>
                        <img src="photo/<?php echo $user['image']; ?>" alt="" style="width: 100px; height: 100px;">
                        <div class="auth-form">
                            <input type="file" name="image" value="<?php echo $user['image']; ?>" />
                        </div>
                        <div class="auth-form">
                            <button name="add" type="submit">Update</button>
                            <br><br>
                            <a href="users.php" style="background-color: green; color: white;     padding: 5px 30px; border-radius: 5px; margin:auto;">User List</a>
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