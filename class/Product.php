<?php

class Product
{
    function addcategory($id, $product_name, $product_html, $connect)
    {
        $sql = 'INSERT INTO tbl_product(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) 
        VALUES ("'.$id.'", "'.$product_name.'", "", 1, NOW())';
        
        if ($connect->query($sql) === TRUE) 
        {
            $return = "success";   
            $last_id = $connect->insert_id;
            $_SESSION['id'] = $last_id;
            echo "<script>alert('Category entered');</script>";
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
        $sql = "SELECT * from tbl_product WHERE prod_available = 1";
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

    function editcategory($edit_id, $product_name, $product_html, $connect)
    {
        $sql = "UPDATE `tbl_product` SET `prod_name` = '".$product_name."', `html` = '".$product_html."' WHERE `id` = '".$edit_id."' ";
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

    function insert_product_description($q4_enterProduct, $desp, $q11_enterMonthly, $q12_enterAnnual, $q13_sku, $connect)
    {
        $sql = "INSERT INTO tbl_product_description( `prod_id`, `description`, `mon_price`, `annual_price`, `sku`)
        VALUES ('".$_SESSION['id']."','".$desp."','".$q11_enterMonthly."','".$q12_enterAnnual."','".$q13_sku."')";
       
        $result=$connect->query($sql);
        echo $connect->error;
    }

    function show_product($connect)
    {
        $array = array();
        $sql = "SELECT * FROM tbl_product INNER JOIN tbl_product_description on tbl_product.id = tbl_product_description.prod_id";
        $result = $connect->query($sql);
        if($result->num_rows >0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($array,$row);
            }
            return $array;
        }
    }

    function deleteproduct($del_id, $connect)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id`='".$del_id."'";
        $result = $conn->query($sql);

        $sql1 = "DELETE FROM `tbl_product_description` WHERE `prod_id`='".$del_id."'";
        $result = $conn->query($sql1);
        echo "<script>alert('product Deleted Successfully..!!');</script>";
        header("Location: view-product.php");
    }
}