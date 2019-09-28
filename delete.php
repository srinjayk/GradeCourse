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
<?php
  if(isset($_POST['delete'])){
    //echo "Successfully connected to server\n";
    $username=$_POST['username'];
    $db = mysqli_connect("localhost", "srinjayk", "Srin@6043", "classroom");

    if($db){
      //echo "Successfully connected to server\n";
    }
    else{
      echo "Failed";
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['username'] === $username) {
        //array_push($errors, "Username already exists");
        echo $username;
        echo "<br>";
        $user_delete_query = "DELETE FROM users WHERE username='$username' LIMIT 1";
        $result_delete = mysqli_query($db, $user_delete_query);
        echo "Congrats! ";
        echo "You have deleted";
        echo $username;
        echo "\n";
      }
      else{
        echo "it is not there in the database";
      }
    }
  }
?>
</body>
</html>