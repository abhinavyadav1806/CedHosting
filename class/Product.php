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
    
}