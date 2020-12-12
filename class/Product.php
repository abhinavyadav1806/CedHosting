<?php

class Product
{
    function addcategory($product_name, $product_link, $connect)
    {
        $sql = 'INSERT INTO tbl_product(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES (1, "'.$product_name.'", "", 1, NOW())';

        if ($connect->query($sql) === TRUE) 
        {
            $return = "success";   
        } 
        else 
        {
            $return= "Error:" .$sql. "<br>" .$connect->error;
        }
        return $return;
        $connect->close();
    }

    function showcategory($connect)
    {
        $arry = array();
        $sql = "SELECT * from tbl_product";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) 
        {
            while ($row= $result->fetch_assoc()) 
            {
                array_push($arry,$row);
            }
            return $arry;
        }
    }

    function deletecategory($id,$connect)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id` = ".$id." ";
        echo $sql;
        $result = $connect->query($sql);
        header("location: create-category.php");   
    }

    function editcategory($edit_id, $product_name, $product_link, $connect)
    {
        $sql = "UPDATE `tbl_product` SET `prod_name` = '".$product_name."', `link` = '".$product_link."' WHERE `id` = '".$edit_id."' ";
        $result=$connect->query($sql);

        if($sql == TRUE)
        {
            echo "<script>alert('Category Updated');</script>";
        }
        else
        {
            echo "<script>alert('Some Error Occured Try Again');</script>";
        }
    }
    
    function addpro_details($pid,$desc,$monthly,$yearly,$sku,$conn)
    {
        $sql = "INSERT INTO `tbl_product_description` (`prod_id`,`description`,`mon_price`,`annual_price`,`sku`)
        VALUES ('".$pid."','".$desc."','".$monthly."','".$yearly."','".$sku."')";

        if ($connect->query($sql) === TRUE) 
        {
            //echo "New record created successfully";
        } else 
        {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function addpro($pid,$pname,$conn)
    {
        $sql = 'INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`, `link`,`prod_available`)
        VALUES ("'.$pid.'", "'.$pname.'", " ","1")';
        if ($connect->query($sql) === TRUE) 
        {
            $last_id = mysqli_insert_id($conn);
            return $last_id;
            //echo "New record created successfully. Last inserted ID is: " . $last_id;
        } else 
        {
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
}