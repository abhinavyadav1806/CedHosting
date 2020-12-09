<?php
    // class User
    // {
    //     function Signup($name,$email,$mobile,$password,$cnfm_password,$question,$answer,$connect)
    //     {
    //         if($password != $cnfm_password)
    //         {
    //             return 'Enter Same Password';
    //         }

    //         // $sql = "SELECT * FROM tbl_user";
    //         // $result = mysqli_query($connect,$sql);

    //         // if($result->num_rows >0)
    //         // {
    //         //     while($row=$result->fetch_assoc())
    //         //     {
    //         //         $_SESSION['user']=array('username'=>$row['user_name'], 'isblock'=>$row['is_block']);

    //         //         $trimed_username = trim($username);
    //         //         $strtolower = strtolower($trimed_username);
                    
    //         //         if($_SESSION['user']['username'] == $strtolower)
    //         //         {
    //         //             return "Enter Unique User Name";
    //         //         }
    //         //     }
    //         // }

    //         $insert = "INSERT INTO tbl_user(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) 
    //         VALUES('$email', '$name', '$mobile', NOW(), '$mobile', 0, MD5('$password'), 0)";

    //         if($connect ->query($insert) === TRUE)
    //         {
    //             // echo "New Record Added Successfully";
    //             header("Location:login.php");
    //         }
    //         else
    //         {
    //             echo "failed";
    //         }  
    //         $connect->close();
    //     }
    // }
?>