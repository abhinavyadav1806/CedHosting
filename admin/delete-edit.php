<?php 
    require_once('../class/Product.php');
    require_once('../class/Dbcon.php');

    $Dbcon = new Dbcon();
    $Product = new Product();

    if(!isset($_SESSION['userdata']['name']))
    {
    echo "<script> alert('Please Login To Continue'); window.location.href = '../login.php'; </script>";
    }

    if($_SESSION['userdata']['is_admin'] != 1)
    {
    echo "<script> alert('Please Login To Continue'); window.location.href = '../login.php'; </script>";
    }

    // Category
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $Product->deletecategory($id,$Dbcon->connect);
    }
    if(isset($_GET['editid']))
    {
        $edit_id = $_GET['editid'];
        $Product->editcategory($edit_id,$Dbcon->connect);
    }

    // Product
    if(isset($_GET['del']))
    {
        $del_id = $_GET['del'];
        $Product->deleteproduct($del_id, $Dbcon->connect);
    }
?>