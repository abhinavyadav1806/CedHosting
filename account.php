<?php 
    require_once("header.php"); 

    require_once('class/Dbcon.php');
    require_once('class/User.php');

    $Dbcon = new Dbcon();
    $User = new User(); 

    if(isset($_POST['submit']))
    {
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
		$email = isset($_POST['email']) ? ($_POST['email']) : "";
		$mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";
		$password = isset($_POST['password']) ? ($_POST['password']) : "";
		$cnfm_password = isset($_POST['cnfm_password']) ? ($_POST['cnfm_password']) : "";
		$question = isset($_POST['question']) ? ($_POST['question']) : "";
		$answer = isset($_POST['answer']) ? ($_POST['answer']) : "";
		
        $sql = $User->Signup($name,$email,$mobile,$password,$cnfm_password,$question,$answer,$Dbcon->connect);
        echo $sql;
    }
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
                            <input type="text" name="name" class="lugwt" id="name" required onkeydown="return alphaonly(event);">
                        </div>

                        <div>
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" id="mobile" maxlength="10" class="lugwt" onkeydown="return onlynumber(event);" required>
                        </div>

                        <div>
                            <span>Email<label>*</label></span>
                            <input type="email" name="email" id="email" class="lugwt" onkeydown="return alphaonly3(event);" required >
                        </div>

                        <div>
                            <span>Pickup Security Question<label>*</label></span>
                            <select class="question" name="question" required>
                                <option selected disabled>Choose Security Question</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                                <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
                                <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
                                <option value="What was your dream job as a child?">What was your dream job as a child?</option>
                                <option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
                            </select>
                        </div>

                        <div>
                            <span>Answer<label>*</label></span>
                            <input type="text" class="lugwt" name="answer" required pattern="^[a-zA-Z0-9]+$"
                            onkeydown="return alphaonly2(event);">
                        </div>

                        <div class="clearfix"></div>
                        <a class="news-letter" href="#"></a>
                    </div>

                    <div class="register-bottom-grid">
                        <h3>login information</h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="password" class="lugwt" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" minlength="8" maxlength="16" required>
                        </div>

                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" name="cnfm_password" class="lugwt" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" minlength="8" maxlength="16" required>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="register-but">
                    <input type="submit" value="Register" name="submit" class="a">
                    <div class="clearfix"> </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- registration -->
</div>

<?php require "footer.php" ?>