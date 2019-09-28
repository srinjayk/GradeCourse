<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    input[type=email] {
      border: 2px solid blue;
      border-radius: 4px;
      background-color: #3CBC8D;
      color: white;
    }

    body{
      background-color: orange;
      font-size: 20px;
    }

    form.borders{
      border-style: solid;
      border-width: medium;
      padding: 10px 10px;
      border-radius: 20px;
      text-align: center;
      border-color: orange;
    }h1{
      font-family: "Courier New";
      text-align: center;
      font-size: 50px;
    }
  </style>
</head>
<body>
<h1>GradeCourse</h1>
  <div class="two">
  	<h2>Register</h2>
  </div>

  <form class="borders" method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="form-group">
  	  <label>Username</label>
  	  <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Email</label>
  	  <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Password</label>
  	  <input type="password" class="form-control" name="password_1">
  	</div>
  	<div class="form-group">
  	  <label>Confirm password</label>
  	  <input type="password" class="form-control" name="password_2">
  	</div>
    <div class="form-group">
      <label>Job</label><br>
      *Either "student" or "professor"
      <input type="text" class="form-control" name="priority" value="<?php echo $priority; ?>">
    </div>
  	<div class="form-group">
  	  <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
  	</div>
  	<p>
  		<h4>Already have an account</h4> <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
