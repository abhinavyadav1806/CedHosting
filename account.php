<?php
	include("header.php");

	include('class/Dbcon.php');
	include('class/User.php');

	// $Dbcon = new Dbcon();
	// $User = new User();

	// if(isset($_POST['submit']))
    // {
    //     $name = isset($_POST['name']) ? ($_POST['name']) : "";
	// 	$email = isset($_POST['email']) ? ($_POST['email']) : "";
	// 	$mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";
	// 	$password = isset($_POST['password']) ? ($_POST['password']) : "";
	// 	$cnfm_password = isset($_POST['cnfm_password']) ? ($_POST['cnfm_password']) : "";
	// 	$question = isset($_POST['question']) ? ($_POST['question']) : "";
	// 	$answer = isset($_POST['answer']) ? ($_POST['answer']) : "";
		
    //     $sql = $User->Signup($name,$email,$mobile,$password,$cnfm_password,$question,$answer,$Dbcon->connect);
    //     echo $sql;
    // }
?>

<div class="content">
    <!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
			
		  	  	<form action="" method="POST"> 
					<div class="register-top-grid">
						<h3>personal information</h3>
						<div>
							<span>Name<label>*</label></span>
							<input type="text" name="name" > 
						</div>

						<div>
							<span>Email<label>*</label></span>
							<input type="email" name="email" > 
						</div>

						<div>
							<span>Mobile<label>*</label></span>
							<input type="text" name="mobile" maxlength="10" > 
						</div>

						<div class="clearfix"> </div>
						<a class="news-letter" href="#">
							<!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label> -->
						</a>
						</div>
						
						<div class="register-bottom-grid">
							<h3>login information</h3>
							
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" >
							</div>

							<div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="cnfm_password" >
							</div>

							<div>
								<span>Enter Security Question<label>*</label></span>
								<input type="text" name="question" >
							</div>
							
							<div>
								<span>Enter Security Answer<label>*</label></span>
								<input type="text" name="answer" >
							</div>
						</div>
					</div>
				</form>

				<div class="clearfix"></div>

				<div class="register-but">
				   <form action="" method="POST">
					   <input type="submit" value="Register" name="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>  
</div>
<!-- login -->
<?php
    require("footer.php");
?>
</body>
</html>