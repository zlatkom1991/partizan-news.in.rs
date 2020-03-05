<?php include('includes/init.php'); ?>

<?php

if($session->isSignedIn()) {

    redirect('index.php');
}


if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
	$password = trim($_POST['password']);

    $user_found = User::verifyUser($username, $password);

    if($user_found) {

        $session->login($user_found);
        redirect('index.php');

    }else {
		
			$message = "Your username or password are incorrect";
        
    }
} else {

    $username = null;
    $password = null;
	$message =  null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/style-login.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
	  <h4>Admin Login</h4>
	  <p class="bg-danger"><?php echo $message;?></p>
    </div>

    <!-- Login Form -->
    <form method="POST">
	<input type="text" id="login" class="fadeIn second" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
      <input type="submit" class="fadeIn fourth" value="Login" name="submit">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

</body>
</html>




