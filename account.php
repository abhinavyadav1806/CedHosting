<?php 
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';

    if(isset($_POST['submit']))
    {
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
		$email = isset($_POST['email']) ? ($_POST['email']) : "";
        $mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : ""; 
        $_SESSION['mobile'] = $mobile;
		$password = isset($_POST['password']) ? ($_POST['password']) : "";
		$cnfm_password = isset($_POST['cnfm_password']) ? ($_POST['cnfm_password']) : "";
		$question = isset($_POST['question']) ? ($_POST['question']) : "";
		$answer = isset($_POST['answer']) ? ($_POST['answer']) : "";
		
        $sql = $User->Signup($name,$email,$mobile,$password,$cnfm_password,$question,$answer,$Dbcon->connect);
        echo $sql;

        $otp = rand(1000,9999);
        $_SESSION['otp']=$otp;
        $mail = new PHPMailer();
        try 
        {                                       
            $mail->isSMTP(true);                                             
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                              
            $mail->Username   = 'abhinav1806yadav@gmail.com';                  
            $mail->Password   = 'nawabeluck';                         
            $mail->SMTPSecure = 'tls';                               
            $mail->Port       = 587;   
            
            $mail->setfrom('abhinav1806yadav@gmail.com', 'CedHosting');            
            $mail->addAddress($email); 
            $mail->addAddress($email, $name); 
                
            $mail->isHTML(true);                                   
            $mail->Subject = 'Otp For Account Verification'; 
            $mail->Body    = 'Hello User, Here is your OTP for account verification--'.$otp.'<br><b>Never Share Your OTP with anyone<b>'; 
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            if($password != $cnfm_password)
            {
                return '<script> alert("Enter Same Password") </script>';
            }
            else
            {
                header('location: verification.php?email='.$email."&mobile=".$mobile);
            }
        } 
        catch (Exception $e)
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        // FOR Phone OTP
        $mobile = $_SESSION['mobile'];
        $otp = $_SESSION['otp'];

        $fields = array
        (
            "sender_id" => "FST-SMS",
            "message" => "This is Test message".$otp,
            "language" => "english",
            "route" => "p",
            "numbers" => "$mobile",
        );    
        $curl = curl_init();
        
        curl_setopt_array($curl, array
        (
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array
            (
                "authorization: ndRE9vcUm8kyrhxZTFqa0ftWSHiJBpQu547jgN6CAO2IzsKXlPGkyTj3BdIM5c7ARxHCVJa6X8S1fEuw",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) 
        {
            echo "cURL Error #:" . $err;
        } else 
        {
            echo $response;
        }
    }
?>

<?php include("header.php"); ?>
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
                            <input type="text" name="name" class="lugwt" id="name" required
                                onkeydown="return alphaonly(event);">
                        </div>

                        <div>
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" id="mobile" maxlength="10" class="lugwt"
                                onkeydown="return onlynumber(event);" required>
                        </div>

                        <div>
                            <span>Email<label>*</label></span>
                            <input type="email" name="email" id="email" class="lugwt"
                                onkeydown="return alphaonly3(event);" required>
                        </div>

                        <div>
                            <span>Pickup Security Question<label>*</label></span>
                            <select class="question" name="question" required>
                                <option selected disabled>Choose Security Question</option>
                                <option value="What was your childhood nickname?">What was your childhood nickname?
                                </option>
                                <option value="What is the name of your favourite childhood friend?">What is the name of
                                    your favourite childhood friend?</option>
                                <option value="What was your favourite place to visit as a child?">What was your
                                    favourite place to visit as a child?</option>
                                <option value="What was your dream job as a child?">What was your dream job as a child?
                                </option>
                                <option value="What is your favourite teacher's nickname?">What is your favourite
                                    teacher's nickname?</option>
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
                            <input type="password" name="password" class="lugwt"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                minlength="8" maxlength="16" required>
                        </div>

                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" name="cnfm_password" class="lugwt"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                minlength="8" maxlength="16" required>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="register-but">
                        <input type="submit" value="Register" name="submit" class="submit">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- registration -->
</div>

<script>
    var count_mob = 0;
    var count = 0;
    var temp = 0;
    var i = 0;
    var i2 = 0;
    var count2 = 0;

    function validate() {
        if (Number.isInteger(parseInt($('#sans').val()))) {
            alert('Enter Answer in Correct Fornat');
            $('#sans').val("");
            return false;
        } else {
            return true;
        }
    }

    function alphaonly(button) {
        var code = button.which;
        if (count > 0 && code == 32 && (i2 == 0 || i2 == 1)) {
            count = 0;
            i2++;
            return true;
        }
        console.log(button.which);

        if ((code > 64 && code < 91) || (code < 123 && code > 96) || (code == 08) || (code == 09)) {
            count++;
            return true;
        } else {
            return false;
        }
    }

    function onlynumber(button) {
        var code = button.which;

        if (code > 31 && (code < 48 || code > 57) && (code < 96 || code > 105))
            return false;
        return true;
        var myval = $(this).val();
    }

    function alphaonly2(button) {
        console.log(button.which);
        var code = button.which;
        if (count > 0 && code == 32) {
            count = 0;
            return true;
        } else if (code == 32) {
            return false;
        } else {
            count++;
            return true;
        }
    }

    function alphaonly3(button) {
        var code = button.which;

        if (count > 0 && code == 190) {
            console.log(count);
            count = 0;
            return true;
        }
        console.log(button.which);

        if ((code > 64 && code < 91) || (code < 123 && code > 96) || (code == 08) || (code == 09) || (code > 47 && code <
                58) || code == 37 || code == 39) {
            count++;
            console.log(count);
            return true;
        } else {
            return false;
        }
    }

    $("#mobile").bind("keyup", function(e) {
        mobile = $("#mobile").val();

        var fchar = $("#mobile").val().substr(0, 1);
        var schar = $("#mobile").val().substr(1, 1);

        if (fchar == 0) {
            $('#mobile').attr('maxlength', '11');
            if (schar == 0) {
                $("#mobile").val(0);
                if (fchar == "") {
                    $("#mobile").val("");
                }

            }
        } else {
            $('#mobile').attr('maxlength', '10');
        }

        if (mobile.length > 9) {
            for (i = 0; i <= mobile.length; i++) {
                if (mobile.substr(i, 1) == mobile.substr(i + 1, 1)) {
                    count2++;
                    console.log(count2);
                    if (count2 == 9) {
                        count2 = 0;
                        alert('Invalid Phone no.');
                        $("#mobile").val("");
                        mobile = '';
                        console.log(mobile.length);
                    }
                } else if (mobile.substr(i, 1) != mobile.substr(i + 1, 1)) {
                    count2 = 0;
                }
            }
        }
    });

    $("#email").bind("keypress keyup keydown", function(e) {
        var email = $('#email').val();
        var regtwodots = /^(?!.*?\.\.).*?$/;
        var lemail = email.length;
        if ((email.charAt(0) == ".") || !(regtwodots.test(email))) {
            alert("invalid email");
            $('#email').val("");
            return;
        }
    });

    $('.lugwt').on("cut copy paste drag drop", function(e) {
        e.preventDefault();
    });
</script>

<?php require "footer.php" ?>