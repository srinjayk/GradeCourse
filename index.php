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
  <style>
    a:link, a:visited {
      background-color: #f44336;
      color: white;
      padding: 10px 10px;
      border-radius: 6px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    a:hover, a:active {
      background-color: red;
    }

    div.one {
      border-style: solid;
      border-width: 5px;
    }

    div.two {
      border-style: solid;
      border-width: medium;
      padding: 10px 10px;
      border-radius: 6px;
      text-align: center;
      border-color: orange;
    }

    input[type=text] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 15px;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    div.content{
      width: 500px;
      border-radius: 5px;
      background-color: #ffffff;
      padding: 20px;
      font-size: 20px;
    }

    div.content1{
      width: 100%;
      text-align: center;
      border-radius: 5px;
      background-color: #ffffff;
      padding: 20px;
    }

    body{
      background-color: orange;
      font-size: 20px;
    }

    form.form-group{
      width: 600px;
      border-style: solid;
      border-width: medium;
      padding: 10px 10px;
      border-radius: 20px;
      text-align: center;
      border-color: orange;
      text-align: center;
    }

    table {
      width: 100%;
      border: 1px solid black;
    }

    th {
      height: 100px;
      border: 1px solid black;
    }
    td {
      height: 50px;
      vertical-align: bottom;
      border: 1px solid black;
      padding: 10px;
      font-size: 20px;
    }
    h1{
      font-family: "Courier New";
      text-align: center;
      font-size: 50px;
    }
  </style>
</head>
<body>
<h1>GradeCourse</h1>

<div class="content1">
  <h2>Home Page</h2>
</div>
<br>
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
      <p> <a href="index.php?logout='1'">logout</a> </p>
    <?php endif ?>
    <?php
      $db = mysqli_connect("localhost", "srinjayk", "Srin@6043", "classroom");
      $username = $_SESSION['username'];
      $user_check_query = "SELECT * FROM users WHERE Username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $priority = $user['Priority'];
      echo "Email : ";
      echo $user['Email'];
      echo "<br>";
    ?>

    <?php
      if($priority==1){
        echo "You are the admin of the database. You can do a lot of things in the database. Proceed to your page to perform your action.";
        echo "<br>";
        //<a href="sql.php">Link</a>;
        echo '<a href="admin.php">Admin</a>';
      }
      if($priority==2){
        echo "You are professor of a course. You can do a lot of things in the database. Proceed to your page to perform your action.";
        echo "<br>";
        echo '<a href="professor.php">Professor</a>';
      }
      if($priority==3){
        echo "You are a student. You can see the grades for your courses.";
        echo "<br>";
        echo '<a href="student.php">Student</a>';
      }
    ?>
</div>
  
</body>
</html>
