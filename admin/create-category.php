<?php 
    require_once("header.php");
    require_once("../class/Dbcon.php");
    require_once("../class/Product.php");

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

    if(isset($_POST['create']))
    {
        // $product_category = $_POST['product_category'];
        $product_name = $_POST['product_name'];
        $product_html = $_POST['product_html'];
        
        $id=1;
        $result = $Product->addcategory($id, $product_name, $product_html, $Dbcon->connect);
        echo $result;
    }

    if(isset($_POST['submitt']))
    {
        $id=isset($_POST['id'])?$_POST['id']:'';
        $product_name = $_POST['product_name'];
        $product_html = $_POST['product_html'];

        $result = $Product->editcategory($id, $product_name, $product_html, $Dbcon->connect);
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
            <input class="category_name form-control" type="text" id="example-text-input" name="product_name">
        </div>
        <p id="category_name"></p>

        <div class="form-group">
            <label for="example-email-input" class="form-control-label">html</label>
            <input class="form-control" type="url" id="example-email-input" name="product_html">
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

<!-- Display Table Dynamically -->
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Html</th>
                <th scope="col">Availability</th>
                <th scope="col">Date Added</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php 
                $show_category = $Product->showcategory($Dbcon->connect);
                foreach ($show_category as $key => $value) 
                {
                    echo 
                    "<tr>
                        <td>".$value['prod_name']."</td>
                        <td>".$value['html']."</td>
                        <td>".$value['prod_available']."</td>
                        <td>".$value['prod_launch_date']."</td>

                        <td class='text-right'>
                            <div class='dropdown'>
                                <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='fas fa-ellipsis-v'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                    <a class='dropdown-item' href='delete-edit.php?id=".$value['id']."'>Delete</a>
                                    <a class='dropdown-item' data-toggle='modal' href='delete-edit.php?editid=".$value['id']."' data-target='#modalLoginForm".$value['id']."'>Edit</a></td>                             
                                </div>
                            </div>
                        </td>
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
                                            <label data-error="wrong" data-success="right" for="product_html">html</label>
                                            <input type ="text" value="'.$value['html'].'" name="product_html"  id="product_html" class="form-control validate id ml-4">                                       
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

