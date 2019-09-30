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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
      $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      $priority = $user['Priority'];
    ?>

</div>
<br>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Username</label>
      <input type="text" name="student" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="search">Search</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="content">
      <label>Course</label>
      <input type="text" name="course" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="add">Add Student</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="content">
      <label>Course</label>
      <input type="text" name="course" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="remstudent">Remove Student</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Course</label>
      <input type="text" name="professor" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="remprofessor">Remove Course</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="make_professor">Make Professor</button>
    </div>
  </form>  
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="make_admin">Make Admin</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Coursename</label>
      <input type="text" name="course" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="create_course">Create Course</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Coursename</label>
      <input type="text" name="course" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="get_students">Get Students</button>
    </div>
  </form>
  <form class="form-group" method="post" action="admin.php">
    <?php include('errors.php'); ?>
    <div class="content">
      <label>Student</label>
      <input type="text" name="student" >
    </div>
    <div class="content">
      <button type="submit" class="btn" name="get_grades">Get Grades</button>
    </div>
  </form>
  <div class="content">
  <?php
    if(isset($_POST['make_professor'])){   
      $student = $_POST['username'];
      $student = mysqli_real_escape_string($db, $_POST['username']);  
      $user_grade_query = "UPDATE users SET Priority='2' WHERE Username='$student' LIMIT 1";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user_check_query = "SELECT * FROM users WHERE Username='$student' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
        if ($user) {
            echo "Username : ";
            echo $user['Username'];
            echo "<br>";
            echo "Priority : ";
            echo $user['Priority'];
        }
        else{
            echo "The person is not present in the database.";
        }
    }
  ?>
  <?php
    if(isset($_POST['make_admin'])){   
      $student = $_POST['username'];
      $student = mysqli_real_escape_string($db, $_POST['username']);  
      $user_grade_query = "UPDATE users SET Priority='1' WHERE Username='$student' LIMIT 1";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user_check_query = "SELECT * FROM users WHERE Username='$student' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
        if ($user) {
            echo "Username : ";
            echo $user['Username'];
            echo "<br>";
            echo "Priority : ";
            echo $user['Priority'];
        }
        else{
            echo "The person is not present in the database.";
        }
    }
  ?>
  <?php
    if(isset($_POST['remstudent'])){   
      $student = $_POST['student'];
      $student = mysqli_real_escape_string($db, $_POST['student']); 
      $course = $_POST['course'];
      $course = mysqli_real_escape_string($db, $_POST['course']); 
      $user_grade_query = "SELECT * FROM $course WHERE Username='$student' LIMIT 1";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user = mysqli_fetch_assoc($result_grade);
        if ($user) {
            echo "You have removed ";
            echo $student;
            echo " from the course ";
            echo $course;
            $user_grade_query = "DELETE FROM $course WHERE Username='$student' LIMIT 1";
            $result_grade = mysqli_query($db, $user_grade_query);
        }
        else{
            echo "The student is not present in the required position.";
        }
    }
  ?>
  <?php
    if(isset($_POST['add'])){   
      $student_add = $_POST['student'];
      $student_add = mysqli_real_escape_string($db, $_POST['student']); 
      $course = $_POST['course'];
      $course = mysqli_real_escape_string($db, $_POST['course']); 

      $user_course_query = "SELECT * FROM $course WHERE Username='$student_add'";
      $student_lookup = mysqli_query($db, $user_course_query);
      $student = mysqli_fetch_assoc($student_lookup);

      $user_lookup_query = "SELECT * FROM users WHERE Username='$student_add'";
      $result_lookup = mysqli_query($db, $user_lookup_query);
      $user_lookup = mysqli_fetch_assoc($result_lookup);

      $course_lookup_query = "SELECT * FROM courses WHERE Coursename='$course'";
      $course_lookup = mysqli_query($db, $course_lookup_query);
      $lookup_course = mysqli_fetch_assoc($course_lookup);

      if($lookup_course){
        if($user_lookup){
          if(!($student)){
            $user_grade_query = "INSERT INTO $course (Username, Grades) VALUES('$student_add', '0')";
            $result_grade = mysqli_query($db, $user_grade_query);
            $user = mysqli_fetch_assoc($result_grade);
            echo "You have added ";
            echo $student_add;
            echo " to the course ";
            echo $course;
          }
          else{
            echo "The student is already present in the course in which you are willing to add. You cannot add the same student twice.";
          }
        }
        else{
          echo "Error 1 Either the user is not registered or the course is not created";
        }
      }
      else{
        echo "Error 2 Either the user is not registered or the course is not created";
      }
    }
  ?>
  <?php
    if(isset($_POST['remprofessor'])){   
      $professor = $_POST['professor'];
      $professor = mysqli_real_escape_string($db, $_POST['professor']); 
      $user_grade_query = "DROP TABLE $professor";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user = mysqli_fetch_assoc($result);
      $user_grade_query = "DELETE FROM courses WHERE Coursename='$professor' LIMIT 1";
      $result_grade = mysqli_query($db, $user_grade_query);
            echo "You have removed ";
            echo $professor;
            echo " from the datbase.";
    }
  ?>
  <?php 
    if(isset($_POST['create_course'])){   
      $course = $_POST['course'];
      $course = mysqli_real_escape_string($db, $_POST['course']); 

      $user_course_query = "SELECT * FROM users WHERE Username='$course'";
      $student_lookup = mysqli_query($db, $user_course_query);
      $student = mysqli_fetch_assoc($student_lookup);

      $course_query = "SELECT * FROM courses WHERE Coursename='$course'";
      $course_lookup = mysqli_query($db, $course_query);
      $course_new = mysqli_fetch_assoc($course_lookup);

      if(!($course_new)){
        if($student){
          $user_grade_query = "CREATE TABLE IF NOT EXISTS $course (`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,`Username` varchar(100) NOT NULL, `Grades` int(11) NOT NULL)";
          $result_grade = mysqli_query($db, $user_grade_query);
          $user_course_query = "INSERT INTO courses (Coursename) VALUES('$course');";
          $result_course = mysqli_query($db, $user_course_query);
          $user = mysqli_fetch_assoc($result_grade);
          echo "You have made a new course ";
          echo $course;
          echo " in the database.";
        }
        else{
          echo "The concerned course is not yet registered with the system.";
        }
      }
      else{
        echo "The concerned course is already registered with the system. You cannot register it again.";
      }
    }
  ?>

  <?php 
    if(isset($_POST['search'])){   
      $username = $_POST['student'];
      $username = mysqli_real_escape_string($db, $_POST['student']); 
      $user_grade_query = "SELECT * FROM users WHERE Username='$username'";
      $result_grade = mysqli_query($db, $user_grade_query);
      $user = mysqli_fetch_assoc($result_grade);
      if($user){
        echo $user['Username'];
        echo "<br>";
        $priority = $user['Priority'];
        if($priority == 1){
          echo $username;
          echo " is an admin.";
        }
        if($priority == 2){
          echo $username;
          echo " is a professor.";
        }
        if($priority == 3){
          echo $username;
          echo " is a student.";
        }
      }
      else{
        echo $username;
        echo " is not present in the databse.";
        echo "<br>";
        echo "He must register with the database first.";
      }
    }
  ?>

  <?php
    $course = $_POST['course'];
    $course = mysqli_real_escape_string($db, $_POST['course']); 
    if(isset($_POST['get_students'])){ 
      $query = "SELECT * FROM $course";
 
 
      echo '<table> 
            <tr> 
                <td> <font face="Arial">Student</font> </td> 
                <td> <font face="Arial">Grades</font> </td>
            </tr>';
 
      if ($result = $db->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $field1name = $row['Username'];
          $field2name = $row['Grades'];
 
          echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td>
                </tr>';
        }
        $result->free();
      }
    }
  ?>

  <?php
    if(isset($_POST['get_grades'])){ 
      $student = $_POST['student'];  
      $student = mysqli_real_escape_string($db, $_POST['student']); 
      $query = "SELECT * FROM courses";
 
 
      echo '<table> 
            <tr> 
                <td> <font face="Arial">Course</font> </td> 
                <td> <font face="Arial">Grades</font> </td>
            </tr>';
 
      if ($result = $db->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $course = $row['Coursename'];
          $field2name = $row['Grades'];
          $user_query = "SELECT * FROM $course WHERE Username = '$student'";
          $result_user = mysqli_query($db, $user_query);
          $user = mysqli_fetch_assoc($result_user);

          if($user){
            echo '<tr> 
                  <td>'.$course.'</td> 
                  <td>'.$user['Grades'].'</td>
                </tr>';
          }
        }
        $result->free();
      }
    }
  ?>
  </div>
</body>
</html>
