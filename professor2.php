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

<?php
  $db = mysqli_connect("localhost", "srinjayk", "Srin@6043", "classroom");
  $username = $_SESSION['username'];
  //echo $username;
?>

<?php
  if($db){
        echo "Successfully connected to server\n";
  }
  else{
        echo "Failed";
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
    <?php
      //echo $username;
      //$user_check_query = "SELECT * FROM $username";
      //$result = mysqli_query($db, $user_check_query);
      //$user = mysqli_fetch_assoc($result);
      //echo $user;
    ?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    <?php
      $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $priority = $user['priority'];
      //echo $priority;
    ?>
    <p>Welcome <strong><?php echo "Your priority is ";echo $priority; ?></strong></p>

</div>
<form method="post" action="professor.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="search">Search</button>
    </div>
  </form>
  <form method="post" action="professor.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="input-group">
      <label>Marks</label>
      <input type="integer" name="marks" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="grade">Grade</button>
    </div>
  </form>
  <form method="post" action="professor.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="remove">Remove</button>
    </div>
  </form>
  <form method="post" action="professor.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="add">Add</button>
    </div>
  </form>
  <p class="content">
  <?php
    if(isset($_POST['search'])){   
      $student = $_POST['student'];   
      $user_check_query = "SELECT * FROM $username WHERE Username='$student' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
        if ($user) {
            echo "Username : ";
            echo $user['Username'];
            echo "<br>";
            echo "Grades : ";
            echo $user['Grades'];
        }
        else{
            echo "it is not there in the database";
        }
    }
  ?>
  <?php
    if(isset($_POST['grade'])){   
      $student = $_POST['student'];  
      $grades = $_POST['marks']; 
      $user_grade_query = "UPDATE $username SET Grades='$grades' WHERE Username='$student' LIMIT 1";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user_check_query = "SELECT * FROM $username WHERE Username='$student' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
        if ($user) {
            echo "Username : ";
            echo $user['Username'];
            echo "<br>";
            echo "Grades : ";
            echo $user['Grades'];
        }
        else{
            echo "it is not there in the database";
        }
    }
  ?>
  <?php
    if(isset($_POST['remove'])){   
      $student = $_POST['student'];
      $user_remove_query = "DELETE FROM $username WHERE Username='$student' LIMIT 1";
      $result = mysqli_query($db, $user_remove_query);
      $user = mysqli_fetch_assoc($result);
        //if ($user) {
            echo "You have removed : ";
            echo $student;
            echo "from your course.";
        /*}
        else{
            echo "it is not there in the database";
        }*/
    }
  ?>

  <?php
    if(isset($_POST['add'])){   
      $student = $_POST['student'];
      $grades = 0;
      $user_remove_query = "INSERT INTO $username (Username, Grades) VALUES('$student', '0');";
      $result = mysqli_query($db, $user_remove_query);
      $user = mysqli_fetch_assoc($result);
        //if ($user) {
            echo "You have removed : ";
            echo $student;
            echo "from your course.";
        /*}
        else{
            echo "it is not there in the database";
        }*/
    }
  ?>
  </p>
</body>
</html>
