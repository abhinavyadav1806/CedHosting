<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!---fonts-->
<!--script-->
<script src="js/modernizr.custom.97074.js"></script>
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!-- ICON -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<!--lightboxfiles-->
<script type="text/javascript">
	$(function() {
	$('.team a').Chocolat();
	});
</script>	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
<script type="text/javascript">
	$(function() {
	
		$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

	});
</script>						
<!--script-->


<!---header--->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <i class="sr-only">Toggle navigation</i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </button>				  
                    <div class="navbar-brand">
                        <h1><a href="index.php">Ced</a><a class="hosting" href="index.php">Hosting</a></h1>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
                        <li><a href="about.php">About</a></li>

                        <li><a href="services.php">Services</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
                            <ul class="dropdown-menu">
                                <?php
                                    $Dbcon = new Dbcon();
                                    include('class/Product.php');
                                    $Product = new Product();
                                    $result = $Product->showcategory($Dbcon->connect);
                                    foreach ($result as $key => $value) 
                                    {
                                        echo "<li><a href=".$value['link'].">".$value['prod_name']."</a></li>";
                                    }
                                ?>
                            </ul>			
                        </li>

                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="linuxhosting.php">Linux hosting</a></li>
                                <li><a href="wordpresshosting.php">WordPress Hosting</a></li>
                                <li><a href="windowshosting.php">Windows Hosting</a></li>
                                <li><a href="cmshosting.php">CMS Hosting</a></li>
                            </ul>			
                        </li> -->

                        <li><a href="pricing.php">Pricing</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <!-- <li><a href="login.php" id="login">Login</a></li>
                        <li><a style="visibility: hidden" id="logout">logout </a></li> -->

                        <?php
                            if (isset($_SESSION['userdata'])) 
                            {
                                if ($_SESSION['userdata']['is_admin'] == 0) 
                                { ?>
                                    <li><a href="logout.php">Logout</a></li>
                                    <?php 
                                }
                            } 
                            else 
                            { 
                                ?> 
                                <li>
                                    <a href="login.php">Login</a></li>
                                <?php 
                            }
                        ?>
                    </ul>	  
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
<!---header--->
