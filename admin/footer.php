<?php ?>
<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                    target="_blank">Creative Tim</a>
            </div>
        </div>
        <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                        class="nav-link" target="_blank">MIT License</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/js-cookie/js.cookie.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="assets/js/argon.js?v=1.2.0"></script>
</body>

<script>

$(".select").focusout(function() 
{
  $category = $(".select").val();
  if ($category == "" || $category == null) 
  {
    $("#productcategory").html("Select Category");
    $("#productcategory").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  } 
  else 
  {
    $("#prodCategory").hide();
    $(this).css('border', 'solid 3px yellow');
    $("#submit").attr("disabled", false);
  }
});

$(".productname").focusout(function() 
{
  $productname = $(".productname").val();
  var ans1 = $productname.replace(/ /g, '');
  var ans2 = Number(ans1);
  if ($productname == "" || $productname == null) 
  {
    $("#productname").html("Enter Product Name");
    $("#productname").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  } 
  else if (!$productname.match(/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/)) 
  {
    $("#productname").html(
        "Only Alpha-numeric/ alphabetic and space between words is allowed");
    $("#productname").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  } 
  else if (Number.isInteger(ans2)) 
  {
    $("#productname").html(
        "Only Alpha-numeric/ alphabetic and space between words is allowed");
    $("#productname").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  } 
  else 
  {
    $("#productname").hide();
    $(this).css('border', 'solid 3px yellow');
    $("#submit").attr("disabled", false);
  }
});

$(".mpriceid").focusout(function() 
{
  $mprice = $(".mpriceid").val();
  $first = $mprice.substr(0, 1);
  $second = $mprice.substr(1, 1);
  if ($mprice == "" || $mprice == 0) 
  {
    $("#lablemprice").html("Enter Monthly Price");
    $("#lablemprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) 
  {
    $("#lablemprice").html("Price can only be Integer.");
    $("#lablemprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if ($first == 0 && $second == 0) 
  {
    $("#lablemprice").html("Initially No two zero are allowed");
    $("#lablemprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else 
  {
    $("#lablemprice").hide();
    $(this).css('border', 'solid 2px yellow');
    $("#submit").attr("disabled", false);
  }
});

$(".apriceid").focusout(function() 
{
  $aprice = $(".apriceid").val();
  $first = $aprice.substr(0, 1);
  $second = $aprice.substr(1, 1);
  if ($aprice == "" || $aprice == 0) 
  {
    $("#lableaprice").html("*Enter annual Price");
    $("#lableaprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) 
  {
    $("#lableaprice").html("Price can be only integer ");
    $("#lableaprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if ($first == 0 && $second == 0) 
  {
    $("#lableaprice").html("Initially No two zero are allowed");
    $("#lableaprice").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  }
  else 
  {
    $("#lableaprice").hide();
    $(this).css('border', 'solid 2px yellow');
    $("#submit").attr("disabled", false);
  }
});

$('.sku').focusout(function(){
  $sku = $('.sku').val();
  if($sku == "" || $sku == null)
  {
    $('#sku').html('Enter SKU Please');
    $('#sku').show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  }
  else if (!$sku.match(/^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$/)) 
  {
    $('#sku').html('Invalid');
    $('#sku').show();
    $('#submit').attr('disabled',true);
    $(this).css('border', 'solid 2px red');
  }
  else
  {
    $("#sku").hide();
    $(this).css('border', 'solid 3px yellow');
    $("#submit").attr("disabled", false);
  }
});

$(".webid").focusout(function() 
{
  $web = $(".webid").val();
  $first = $web.substr(0, 1);
  $second = $web.substr(1, 1);
  if ($web == "" || $web == 0) 
  {
    $("#webid").html("*Enter web space.");
    $("#webid").show();
    $("#webid").attr("disabled", true)
    $(this).css('border', 'solid 3px red');
  }
  else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) 
  {
    $("#webid").html("*Web Space can be only integer and only one dot(.) allowed");
    $("#webid").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if ($first == 0 && $second == 0) 
  {
    $("#webid").html("*In starting you cant have two zero");
    $("#webid").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else 
  {
    $("#webid").hide();
    $(this).css('border', 'solid 2px yellow');
    $("#submit").attr("disabled", false);
  }
})

$(".bandid").focusout(function() 
{
  $band = $(".bandid").val();
  $first = $band.substr(0, 1);
  $second = $band.substr(1, 1);
  if ($band == "" || $band == 0) 
  {
    $("#bandid").html("Enter  bandwidth.");
    $("#bandid").show();
    $("#submit").attr("disabled", true);
    $(this).css('border', 'solid 2px red');
  } 
  else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) 
  {
    $("#bandid").html("Bandwidth can be only integer.");
    $("#bandid").show();
    $("#submit").attr("disabled", true);
    $(this).css('border', 'solid 2px red');
  } 
  else if ($first == 0 && $second == 0) 
  {
    $("#bandid").html("NO two Zeros.");
    $("#bandid").show();
    $("#submit").attr("disabled", true);
    $(this).css('border', 'solid 2px red');
  } 
  else 
  {
    $("#bandid").hide();
    $(this).css('border', 'solid 2px yellow');
    $("#submit").attr("disabled", false);
  }
})

$(".domainid").focusout(function() 
{
  $profree = $(".domainid").val();
  $first = $profree.substr(0, 1);
  console.log($first);

  if ($first.match(/^[a-zA-Z]+$/)) 
  {
    $pattern = /^[a-zA-Z]+$/;
  } 
  else if ($first.match(/^[0-9]+$/)) 
  {
    $pattern = /^[0-9]+$/;
  }
  if ($profree == "") 
  {
    $("#domainid").html("Select Free Domain as 0 if not required");
    $("#domainid").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count7 = 0;
  } 
  else if (!$profree.match($pattern)) 
  {
    $("#domainid").html("Select Valid Free Domain");
    $("#domainid").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count7 = 0;
  } 
  else 
  {
    $("#domainid").hide();
    $(this).css('border', 'solid 2px yellow');
    count7 = 1;
    $("#submit").attr("disabled", false);
  }
});

$(".prodlang").focusout(function() 
{
  $prolang = $(".prodlang").val();
  if ($prolang == "") 
  {
    $("#prodlang").html("Select lang Space in GB");
    $("#prodlang").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count8 = 0;
  } 
  else if (!$prolang.match(/^[a-zA-Z ,]+[a-zA-Z]+$/)) 
  {
    $("#prodlang").html("Select Valid language");
    $("#prodlang").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count8 = 0;
  } 
  else 
  {
  $("#prodlang").hide();
  $(this).css('border', 'solid 2px yellow');
  count8 = 1;
  $("#submit").attr("disabled", false);
  }
});

$(".prodmail").focusout(function() 
{
  $promail = $(".prodmail").val();
  if ($promail == "") 
  {
    $("#prodmail").html("*Select Mail");
    $("#prodmail").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count9 = 0;
  } 
  else if (!$promail.match(/^[0-9]+$/)) 
  {
    $("#prodmail").html("*Select Valid Mail box");
    $("#prodmail").show();
    $("#submit").attr("disabled", true);

    $(this).css('border', 'solid 2px red');
    count9 = 0;
  } 
  else 
  {
    $("#prodmail").hide();
    $(this).css('border', 'solid 2px yellow');
    count9 = 1;
    $("#submit").attr("disabled", false);
  }
});

// Category Name 
$(".category_name").focusout(function() 
{
  $category_name = $(".category_name").val();
  var ans1 = $category_name.replace(/ /g, '');
  var ans2 = Number(ans1);
  if ($category_name == "" || $category_name == null) 
  {
    $("#category_name").html("Enter Product Name");
    $("#category_name").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if (!$category_name.match(/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/)) 
  {
    $("#category_name").html(
        "Only Alpha-numeric/ alphabetic and space between words is allowed");
    $("#category_name").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else if (Number.isInteger(ans2)) 
  {
    $("#category_name").html(
        "Only Alpha-numeric/ alphabetic and space between words is allowed");
    $("#category_name").show();
    $("#submit").attr("disabled", true)
    $(this).css('border', 'solid 2px red');
  } 
  else 
  {
    $("#category_name").hide();
    $(this).css('border', 'solid 2px yellow');
    $("#submit").attr("disabled", false);
  }
});
</script>

</html>