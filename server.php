<?php
session_start();

$errors = array();

$db = mysqli_connect('localhost', 'srinjayk', 'Srin@6043', 'classroom');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $priority = 3;

  if ($_POST['priority'] == "student") {
    $priority = 3;
  }
  else if ($_POST['priority'] == "professor") {
    $priority = 2;
  }
  else{
    array_push($errors, "Please enter the correct role, i.e. please enter either student or a professor.");
  }

  if (empty($username)) { 
    array_push($errors, "Username is required"); 
  }
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password_1)) { 
    array_push($errors, "Password is required"); 
  }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE Username='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { 
    if ($user['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password, priority)
  			  VALUES('$username', '$email', '$password', '$priority')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
