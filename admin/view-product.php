<?php
    require('header.php');
    require_once("../class/Dbcon.php");
    require_once("../class/Product.php");

    $Dbcon = new Dbcon();
    $Product = new Product();
?>

<!DOCTYPE html>
<html>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <!-- <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div> -->
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">View Product</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Product Name</th>
                                <th scope="col" class="sort" data-sort="budget">Html</th>
                                <th scope="col">Product Launch Date</th>
                                <th scope="col">Monthly Price</th>
                                <th scope="col">Annual Price</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Web Space</th>
                                <th scope="col">Bandwidth</th>
                                <th scope="col">Free Domain</th>
                                <th scope="col">Mailbox</th>
                                <th scope="col">Language / Technology Support</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                $show_product = $Product->show_product($Dbcon->connect);
                                $a='<tr>';
                                foreach($show_product as $key => $val)
                                {
                                    $abc=json_decode($val['description'], true);
                                    // $a.='<td>'.$val['prod_parent_id'].'</td>';
                                    $a.='<td>'.$val['prod_name'].'</td>';
                                    $a.='<td>'.$val['html'].'</td>';
                                    $a.='<td>'.$val['prod_launch_date'].'</td>';
                                    $a.='<td>'.$val['mon_price'].'</td>';
                                    $a.='<td>'.$val['annual_price'].'</td>';
                                    $a.='<td>'.$val['sku'].'</td>';
                                    $a.='<td>'.$abc['web_space'].'</td>';
                                    $a.='<td>'.$abc['band_width'].'</td>';
                                    $a.='<td>'.$abc['free_domain'].'</td>';
                                    $a.='<td>'.$abc['mail'].'</td>';
                                    $a.='<td>'.$abc['l/t_support'].'</td>';
                                    $a.='<td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="delete-edit.php?del='.$val['prod_id'].'">Delete</a>
                                                    
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalLoginForm'.$val['prod_id'].'">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
                                }

                                $a.='</tbody></table></div>';
                                 echo $a;
                                
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php require('footer.php'); ?>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>