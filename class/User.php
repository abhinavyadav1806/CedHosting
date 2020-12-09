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
                    $_SESSION['user']=array('usermobile'=>$row['mobile']);

                    if($_SESSION['user']['usermobile'] == $mobile)
                    {
                        return("User Already Exist..!!");
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
    }
?>