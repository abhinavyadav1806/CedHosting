<?php

class Product
{
    function addcategory($prod_parent_id, $product_name, $check, $connect)
    {
        $sql = 'INSERT INTO tbl_product(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ("'.$prod_parent_id.'", "'.$product_name.'", "", "'.$check.'", NOW())';

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
                array_push($arry,$row) ;
            }
            return $arry;
        }
    }
}