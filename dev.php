<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
  <h2>Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p>Welcome <strong><?php echo $_SESSION['priority']; ?></strong></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    <?php
      $db = mysqli_connect("localhost", "srinjayk", "Srin@6043", "db_3");
      $username = $_SESSION['username'];
      $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $priority = $user['priority'];
      //echo $priority;
    ?>
    <p>Welcome <strong><?php echo "Your priority is ";echo $priority; ?></strong></p>

</div>
  <form method="post" action="dev.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="search">Search</button>
    </div>
  </form>
  <p class="content">
  <?php
    if(isset($_POST['search'])){
      //echo "Successfully connected to server\n";
      $username=$_POST['username'];
      $db = mysqli_connect("localhost", "srinjayk", "Srin@6043", "classroom");

      if($db){
        echo "Successfully connected to server\n";
      }
      else{
        echo "Failed";
      }
      echo "<br>";
      $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);


      if(($priority == 1) || ($priority == 2)){
        if ($user) {
          if ($user['username'] === $username) {
            echo "Username : ";
            echo $username;
            echo "<br>";
            echo "Email : ";
            echo $user['email'];
            echo "<br>";
            echo "Priority : ";
            echo $user['priority'];
          }
          else{
            echo "it is not there in the database";
          }
        }
        else{
            echo "it is not there in the database";
        }
      }
      else{
        echo "You are not allowed to search in the database";
      }
    }
  ?>
  </p>
</body>
</html>
