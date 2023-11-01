<?php 
  require 'connection/connection.php';
?>


<?php 

  if(isset($_GET['user_id'])){
    $userId = $_GET['user_id'];
    $image = $_GET['image'];

    $sql = "DELETE FROM users WHERE id='$userId'";
    $connection->query($sql);

    unlink('photo/'.$image);
    header('location:users.php');
  }


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Raw PHP</title>

  <!-- All CSS Files -->

  <link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	
</head>
<body>

<div class="table mt-5">
<a href="index.php" class="btn btn-primary rounded-0">Add New Users</a>
<h2 class="title bg-dark p-3 mb-0 text-white w-100">All Students</h2>
<table class="table-striped shadow-lg table-dark w-100 mt-0">
  
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

  <?php
    $allUsers = $connection->query("SELECT * FROM users");
    $index = 1;
    while($users = $allUsers->fetch_assoc()) :
        
?>
    <tr>
      <td scope="row"><?php echo $index++; ?></td>
      <td><?php echo $users['name'] ?></td>
      <td><?php echo $users['email'] ?></td>
      <td><?php echo $users['phone'] ?></td>
      <td>
        <img src="photo/<?php echo $users['image'] ?>" alt="" style="width: 50px; height: 50px;">
      </td>
      <td>
        <!-- <a href="" class="btn btn-danger"><i class="far fa-thumbs-down"></i></a> -->
        <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
        <a href="edit.php?user_id=<?php echo $users['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
        <a href="?user_id=<?php echo $users['id'] ?>&image=<?php echo $users['image'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
      </td>
    </tr>

    <?php endwhile; ?>

  </tbody>
</table>
<br>
<br>
<br>
<br>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>