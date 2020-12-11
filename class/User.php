<?php
    class User
    {
        function Signup($name,$email,$mobile,$password,$cnfm_password,$question,$answer,$connect)
        {
            if($password != $cnfm_password)
            {
                return 'Enter Same Password';
            }

            $sql = "SELECT * FROM tbl_user";
            $result = mysqli_query($connect,$sql);

            if($result->num_rows >0)
            {
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['user']=array('user_email'=>$row['email'], 'user_mobile'=>$row['mobile']);

                    if($_SESSION['user']['user_email'] == $email)
                    {
                        return("User Already Exist..!! Phone And Email has to be unique");
                    }
                    elseif($_SESSION['user']['user_mobile'] == $mobile)
                    {
                        return("User Already Exist..!! Phone And Email has to be unique");
                    }
                }
            }

            $insert = "INSERT INTO tbl_user(`email`, `name`, `mobile`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) 
            VALUES('$email', '$name', '$mobile', 0, NOW(), MD5('$password'), '$question', '$answer')";

            if($connect ->query($insert) === TRUE)
            {
                echo "New Record Added Successfully";
                // header("Location:login.php");
            }
            else
            {
                echo "failed";
            }  
            $connect->close();
        }

        function Login($email,$password,$connect)
        {
            $insert = "SELECT * FROM tbl_user WHERE `email` = '".$email."' AND `password` = MD5('$password') ";
            $result = $connect->query($insert);
 
            if ($result->num_rows >0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $_SESSION['userdata'] = array('userid'=>$row['id'], 'email'=>$row['email'], 'name'=>$row['name'], 'mobile'=>$row['mobile'], 'email_approved' => $row['email_approved'], 'phone_approved' => $row['phone_approved'], 'active' => $row['active'], 'is_admin' => $row['is_admin'], 'sign_up_date' =>$row['sign_up_date'], 'security_question'=>$row['security_question'], 'security_answer'=>$row['security_answer']);
                    if($_SESSION['userdata']['is_admin'] == 1)
                    {
                        header("Location: admin/admin.php");
                    } 
                    if($_SESSION['userdata']['active'] == 1)
                    {
                        header('Location: index.php');   
                    }
                    else
                    {
                        echo "<h1>Admin will let you IN Soon.</h1>";
                    }
                }
            } 
            else 
            {
                return '<script>alert("INVALID LOGIN DETAILS")</script>'; 
            }
            $connect->close(); 
        }

        function email_approved($email,$connect)
        {
            $sql = "UPDATE tbl_user SET `email_approved` = 1 , `active` = 1 WHERE `email`= '".$email."' ";
            echo $sql;

            $result=$connect->query($sql);
            echo "<script> alert('Email-verify successfully..! Please login'); window.location.href = 'login.php'; </script>";  
        }

        function phone_approved($email,$connect)
        {
            $sql = "UPDATE tbl_user SET `phone_approved` = 1 , `active` = 1 WHERE `email`= '".$email."' ";
            echo $sql;

            $result=$connect->query($sql);
            echo "<script> alert('Phone-verify successfully..! Please login'); window.location.href = 'login.php'; </script>";  
        }
    }
?>