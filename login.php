<?php
	session_start();
	
	require_once('class/Dbcon.php');
	require_once('class/User.php');

	$Dbcon = new Dbcon();
	$User = new User();
	
	if(isset($_POST['Login']))
    {
        $email = isset($_POST['email']) ? ($_POST['email']) : "";
		$password = isset($_POST['password']) ? ($_POST['password']) : "";
		
        $sql = $User->Login($email, $password, $Dbcon->connect);
        echo $sql;
    }
	
?>
<!DOCTYPE HTML>
<html>
<head>
<?php 
	include ('header.php');
?>
</head>
<body>
<!---login--->
<div class="content">
	<div class="main-1">
		<div class="container">
			<div class="login-page">
				<div class="account_grid">
					<div class="col-md-6 login-left">
							<h3>new customers</h3>
							<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
							<a class="acount-btn" href="account.php">Create an Account</a>
					</div>
					<div class="col-md-6 login-right">
						<h3>registered</h3>
						<p>If you have an account with us, please log in.</p>
						<form action="" method="POST">
							<div>
								<span>Email<label>*</label></span>
								<input type="email" name="email" id="email" class="lugwt" onkeydown="return alphaonly3(event);" required >
							</div>

							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" class="lugwt" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" minlength="8" maxlength="16" required>
							</div>

							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" name="Login">
						</form>
					</div>	
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- login -->
<div>
	<?php require('footer.php') ?>
</div>
</body>
</html>