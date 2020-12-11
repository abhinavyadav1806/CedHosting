<?php
    session_start();

    include('class/Dbcon.php');
    include('class/User.php');

    $Dbcon = new Dbcon();
    $User = new User();
    
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];

    // Verifying email.. 
    if(isset($_GET['email']))
    {        
        // print_r($_SESSION['otp']);
        // echo $email;
        // echo $mobile;

        if(isset($_POST['submit']))
        {
            $type_value = $_POST['value'];
            if($_SESSION['otp'] != $type_value)
            {  
                echo "<script> alert('Email-Verification Failed..!! Please Try Again'); window.location.href = 'verification.php'; </script>";
            }
            else
            {
                $sql = $User->email_approved($email, $Dbcon->connect);
                echo $sql;
                unset($_SESSION['otp']);
            }
        }
    }

    // Re Send OTP on Email
    if(isset($_POST['re_send']))
    {
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
            $mail->addAddress($email); 
                
            $mail->isHTML(true);                                   
            $mail->Subject = 'Otp For Account Verification'; 
            $mail->Body    = 'Hello User, Here is your OTP for account verification--'.$otp.'<br><b>Never Share Your OTP with anyone<b>'; 
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            // header('location: verification.php?email='.$email."&mobile=".$mobile);
        } 
        catch (Exception $e)
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    // Verifying Phone.. 
    if(isset($_GET['mobile']))
    {        
        if(isset($_POST['submit_mobile']))
        {
            $type_value = $_POST['value_mobile'];

            if($_SESSION['otp'] != $type_value)
            {  
                echo "<script> alert('Mobile-Verification Failed..!! Please Try Again'); window.location.href = 'verification.php'; </script>";
            }
            else
            {
                $sql = $User->phone_approved($email, $Dbcon->connect);
                echo $sql;
                unset($_SESSION['otp']);
            }
        }
    }

    // Re Send OTP on Mobile
    if(isset($_POST['re_send_mobile']))
    {   
        $mobile=$_SESSION['mobile'];
        $otp = rand(1000,9999);
        $_SESSION['otp']=$otp;

        $fields = array
        (
            "sender_id" => "FSTSMS",
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
        }}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!---fonts-->
    <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!---fonts-->
    <!--script-->
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
    jQuery(function($) {
        $(".swipebox").swipebox();
    });
    </script>
    <!--script-->
</head>
<?php require "header.php" ?>
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container" style="overflow:hidden;">
            <div class="register">
                <div style="float:left;">
                    <h3 style="color:#585CA7;">Verify by Email</a></h3><br>
                    <p> <?php echo $email?> </p><br>
                    <form method="POST">
                        <input type="text" name="value"><br><br>
                        <input type="submit" value="Submit" name="submit" class="submit"><br><br>

                        <input type="submit" value="Send Again" name="re_send" class="submit">
                    </form>
                </div>

                <div style="float:right;">
                    <h3 style="color:#585CA7;">Verify by Mobile</h3><br>
                    <p> <?php echo $mobile ?> </p><br>
                    <form method="POST">
                        <input type="text" name="value_mobile"><br><br>
                        <input type="submit" value="Submit" name="submit_mobile" class="submit"><br><br>

                        <input type="submit" value="Send Again Phone" name="re_send_mobile" class="submit">
                    </form>
                </div>
                <div class="clearfix"> </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- registration -->
</div>
<!-- login -->
<?php require "footer.php" ?>