<?php 
    require_once("header.php");

    require_once("../class/Dbcon.php");
    require_once("../class/Product.php");

    $Dbcon = new Dbcon();
    $Product = new Product();

    if(isset($_POST['create']))
    {
        // $product_category = $_POST['product_category'];
        $product_name = $_POST['product_name'];
        $product_link = $_POST['product_link'];

        $result = $Product->addcategory($product_name, $product_link, $Dbcon->connect);
        echo $result;
    }

    if(isset($_POST['submitt']))
    {
        $id=isset($_POST['id'])?$_POST['id']:'';
        $product_name = $_POST['product_name'];
        $product_link = $_POST['product_link'];

        $result = $Product->editcategory($id, $product_name, $product_link, $Dbcon->connect);
        echo $result;
    }
?>

<!-- Page Content -->
<div class="alert alert-success w-50 mt-3 mx-auto category success" role="alert" id="success" hidden>
    <strong>Category Created Successfully!</strong>
</div>

<div class="alert alert-danger w-50 mt-3 mx-auto category error" role="alert" id="wrong" hidden>
    <strong>Something went wrong!</strong>
</div>

<div class="w-50 mx-auto py-5">
    <form action="" method="POST">

        <div class="form-group">
            <label class="form-control-label" for="input-username">Category</label>
            <input type="text" name="product_category" id="input-username" class="form-control" value="hosting"
                readonly>
        </div>

        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category Name</label>
            <input class="form-control" type="text" id="example-text-input" name="product_name">
        </div>

        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Link</label>
            <input class="form-control" type="url" id="example-email-input" name="product_link">
        </div>

        <!-- <div class="form-group">
            <label class="form-control-label">Product Availability</label><br>
            <label class="custom-toggle">
                <input type="checkbox" name="check">
                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
            </label>
        </div> -->

        <div class="form-group w-100">
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="create" id="create" value="CREATE">
        </div>
    </form>
</div>
<hr>

<!-- Display Table Dynamically -->
<div class="mx-auto">
    <table id="subcategorytable" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Category ID</th>
                <th class="th-sm">Category Parent ID</th>
                <th class="th-sm">Category Name</th>
                <th class="th-sm">Link</th>
                <th class="th-sm">Availability</th>
                <th class="th-sm">Date Added</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $show_category = $Product->showcategory($Dbcon->connect);
                foreach ($show_category as $key => $value) 
                {
                    echo 
                    "<tr>
                        <td>".$value['id']."</td>
                        <td>".$value['prod_parent_id']."</td>
                        <td>".$value['prod_name']."</td>
                        <td>".$value['link']."</td>
                        <td>".$value['prod_available']."</td>
                        <td>".$value['prod_launch_date']."</td>

                        <td><a href='delete-category.php?id=".$value['id']."' class='btn btn-danger btn-rounded mb-4 sa'>Delete</a>
                        <a href='delete-category.php?editid=".$value['id']."' class='btn btn-default btn-rounded mb-4' data-toggle='modal' data-target='#modalLoginForm".$value['id']."'>Edit</a></td>
                    </tr>";

                    $b='
                    <div class="modal fade" id="modalLoginForm'.$value['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Edit</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST">
                                    <div class="modal-body mx-3">

                                    <div class="md-form mb-5">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type ="hidden" value="'.$value['id'].'" name="id" id="defaultForm-email" class="form-control validate id ml-4" readonly >
                                 
                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Id--'.$value['id'].'</label>
                                  </div>

                                        <div class="md-form mb-5">
                                            <i class="fas fa-envelope prefix grey-text"></i>
                                            <label data-error="wrong" data-success="right" for="product_name">Category Name</label>
                                            <input type ="text" value="'.$value['prod_name'].'" name="product_name" id="product_name" class="form-control validate id ml-4 >                                                   
                                        </div>

                                        <div class="md-form mb-4">
                                            <i class="fas fa-lock prefix grey-text"></i>
                                            <label data-error="wrong" data-success="right" for="product_link">Link</label>
                                            <input type ="text" value="'.$value['link'].'" name="product_link"  id="product_link" class="form-control validate id ml-4">                                       
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <input type ="Submit" name="submitt" class="btn btn-default">
                                    </div>
                                </form>
                        </div>
                    </div>
                    </div>';
                    echo $b;
                }
            ?>
        </tbody>
    </table>
</div>


<!-- Footer -->
<?php include "footer.php";?>

<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#subcategorytable').DataTable();
})
</script>