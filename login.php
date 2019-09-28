<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      border: 2px solid blue;
      border-radius: 4px;
      background-color: #3CBC8D;
      color: white;
    }

    input[type=password] {
      border: 2px solid blue;
      border-radius: 4px;
      background-color: #3CBC8D;
      color: white;
    }

    body{
      background-color: orange;
    }

    form.borders{
      border-style: solid;
      border-width: medium;
      padding: 10px 10px;
      border-radius: 20px;
      text-align: center;
      border-color: orange;
    }

    h1{
      font-family: "Courier New";
      text-align: center;
      font-size: 50px;
    }
  </style>
<body>
<h1>GradeCourse</h1>
  <div class="two">
  	<h2>Login</h2>
  </div>

  <form class="borders" method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="form-group">
  		<label><h4>Username</h4></label>
  		<input type="text" class="form-control" name="username" >
  	</div>
  	<div class="form-group">
  		<label><h4>Password</h4></label>
  		<input type="password" class="form-control" name="password">
  	</div>
  	<div class="form-group">
  		<button type="submit" class="btn btn-primary" name="login_user">Login</button>
  	</div>
  	<p>
  		<h4>Create an account</h4>  <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
