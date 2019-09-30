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
  <div class="two">
  	<h2>Login</h2>
  </div>

  <form class="form-group" method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="content">
  		<label><h4>Username</h4></label>
  		<input type="text" class="form-control" name="username" >
  	</div>
  	<div class="content">
  		<label><h4>Password</h4></label>
  		<input type="password" class="form-control" name="password">
  	</div>
  	<div class="content">
  		<button type="submit" class="btn btn-primary" name="login_user">Login</button>
  	</div>
  	<p>
  		<h4>Create an account</h4>  <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
