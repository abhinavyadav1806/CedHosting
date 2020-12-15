<?php
    require_once('header.php');
    require_once('add-product-header.php');

    require_once("../class/Product.php");
    require_once("../class/Dbcon.php");

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

    if(isset($_POST['create-now']))
    {
        $q3_selectProduct = $_POST['q3_selectProduct'];
        $q4_enterProduct = $_POST['q4_enterProduct'];
        $q5_pageUrl = $_POST['q5_pageUrl'];
        $q11_enterMonthly = $_POST['q11_enterMonthly'];
        $q12_enterAnnual = $_POST['q12_enterAnnual'];
        $q13_sku = $_POST['q13_sku'];
        $q16_webSpacein = $_POST['q16_webSpacein'];
        $q17_bandwidthin = $_POST['q17_bandwidthin'];
        $q18_freeDomain = $_POST['q18_freeDomain'];
        $q19_language = $_POST['q19_language'];
        $q20_mailbox = $_POST['q20_mailbox'];

        $Product->addcategory($q3_selectProduct, $q4_enterProduct, $q5_pageUrl, $Dbcon->connect);
        
        $age = array("web_space" => $q16_webSpacein, "band_width" => $q17_bandwidthin, "free_domain" => $q18_freeDomain, "mail" => $q20_mailbox, "l/t_support" => $q19_language);
              
        $desp = json_encode($age);
        
        $Product->insert_product_description($q4_enterProduct, $desp, $q11_enterMonthly, $q12_enterAnnual, $q13_sku, $Dbcon->connect);
    }
?>

<body>
    <!-- action="https://submit.jotform.com/submit/203442420701036/" -->
    <form class="jotform-form" method="post" name="form_203442420701036" id="myTable" accept-charset="utf-8"
        autocomplete="on">
        <input type="hidden" name="formID" value="203442420701036" />
        <input type="hidden" id="JWTContainer" value="" />
        <input type="hidden" id="cardinalOrderNumber" value="" />
        <div role="main" class="form-all">
            <ul class="form-section page-section">
                <li id="cid_1" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-large">
                        <div class="header-text httal htvam">
                            <h1 id="header_1" class="form-header" data-component="header">
                                Create New Product
                            </h1>
                            <div id="subHeader_1" class="form-subHeader">
                                Enter Product Details
                            </div>
                        </div>
                    </div>
                </li>
                <li class="form-line jf-required" data-type="control_dropdown" id="id_3">
                    <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3">
                        Select Product Category
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_3" class="form-input-wide jf-required" data-layout="half">
                        <select class="form-dropdown validate[required] select" id="input_3" name="q3_selectProduct"
                            style="width:310px" data-component="dropdown" required="" aria-labelledby="label_3">
                            <option value=""> Please Select </option>
                            <!-- <option value="Linux Hosting"> Linux Hosting </option>
                            <option value="Windows Hosting"> Windows Hosting </option>
                            <option value="CMS Hosting"> CMS Hosting </option>
                            <option value="WordPress Hosting"> WordPress Hosting </option> -->
                            <?php
                                $Dbcon = new Dbcon();
                                include('class/Product.php');
                                $Product = new Product();
                                $result = $Product->showcategory($Dbcon->connect);
                                foreach ($result as $key => $value) 
                                {
                                    echo "<option value='".$value['id']."'>".$value['prod_name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </li>
                <p id="productcategory"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_4">
                    <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4">
                        Enter Product Name
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_4" class="form-input-wide jf-required" data-layout="half">
                        <input type="text" id="input_4" name="q4_enterProduct" data-type="input-textbox"
                            class="form-textbox validate[required] productname" style="width:310px" size="310" value=""
                            data-component="textbox" aria-labelledby="label_4" required="" placeholder="Add Product Name" pattern="(^([A-z]+\-[0-9]+)$)|(^([A-z])+$)"/>
                    </div>
                </li>
                <p id="productname"></p>

                <li class="form-line" data-type="control_textbox" id="id_5">
                    <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5"> Page URL
                    </label>
                    <div id="cid_5" class="form-input-wide" data-layout="half">
                        <input type="text" id="input_5" name="q5_pageUrl" data-type="input-textbox" class="form-textbox"
                            style="width:310px" size="310" value="" data-component="textbox"
                            aria-labelledby="label_5" />
                    </div>
                </li>

                <li class="form-line" data-type="control_divider" id="id_8">
                    <div id="cid_8" class="form-input-wide" data-layout="full">
                        <div data-component="divider"
                            style="border-bottom:5px solid #e6e6e6;height:5px;margin-left:0px;margin-right:0px;margin-top:5px;margin-bottom:5px">
                        </div>
                    </div>
                </li>

                <li id="cid_9" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-default">
                        <div class="header-text httal htvam">
                            <h2 id="header_9" class="form-header" data-component="header">
                                Product Description
                            </h2>
                            <div id="subHeader_9" class="form-subHeader">
                                Enter Product Description Below
                            </div>
                        </div>
                    </div>
                </li>

                <li class="form-line jf-required" data-type="control_number" id="id_11">
                    <label class="form-label form-label-top form-label-auto" id="label_11" for="input_11">
                        Enter Monthly Price
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_11" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="number" id="input_11" name="q11_enterMonthly" data-type="input-number"
                                class="form-number-input form-textbox validate[required] mpriceid" style="width:310px"
                                size="310" value="" placeholder="ex: 23" data-component="number"
                                aria-labelledby="label_11 sublabel_input_11" required="" step="any"/>
                            <label class="form-sub-label" for="input_11" id="sublabel_input_11" style="min-height:13px"
                                aria-hidden="false"> This would be Monthly Plan </label>
                        </span>
                    </div>
                </li>
                <p id="lablemprice"></p>

                <li class="form-line jf-required" data-type="control_number" id="id_12">
                    <label class="form-label form-label-top form-label-auto" id="label_12" for="input_12">
                        Enter Annual Price
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_12" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="number" id="input_12" name="q12_enterAnnual" data-type="input-number"
                                class=" form-number-input form-textbox validate[required] apriceid" style="width:310px"
                                size="310" value="" placeholder="ex: 23" data-component="number"
                                aria-labelledby="label_12 sublabel_input_12" required="" step="any" />
                            <label class="form-sub-label" for="input_12" id="sublabel_input_12" style="min-height:13px"
                                aria-hidden="false"> This would be Annual Price </label>
                        </span>
                    </div>
                </li>
                <p id="lableaprice"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_13">
                    <label class="form-label form-label-top form-label-auto" id="label_13" for="input_13">
                        SKU
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_13" class="form-input-wide jf-required" data-layout="half">
                        <input type="text" id="input_13" name="q13_sku" data-type="input-textbox"
                            class="form-textbox validate[required] sku" style="width:310px" size="310" value=""
                            data-component="textbox" aria-labelledby="label_13" required="" />
                    </div>
                </li>
                <p id="sku"></p>

                <li class="form-line" data-type="control_divider" id="id_14">
                    <div id="cid_14" class="form-input-wide" data-layout="full">
                        <div data-component="divider"
                            style="border-bottom:1px solid #e6e6e6;height:1px;margin-left:0px;margin-right:0px;margin-top:5px;margin-bottom:5px">
                        </div>
                    </div>
                </li>

                <li id="cid_15" class="form-input-wide" data-type="control_head">
                    <div class="form-header-group  header-default">
                        <div class="header-text httal htvam">
                            <h2 id="header_15" class="form-header" data-component="header">
                                Features
                            </h2>
                        </div>
                    </div>
                </li>

                <li class="form-line jf-required" data-type="control_textbox" id="id_16">
                    <label class="form-label form-label-top form-label-auto" id="label_16" for="input_16">
                        Web Space(in GB)
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_16" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" id="input_16" name="q16_webSpacein" data-type="input-textbox"
                                class="form-textbox validate[required] webid" style="width:310px" size="310" value=""
                                data-component="textbox" aria-labelledby="label_16 sublabel_input_16" required="" />
                            <label class="form-sub-label" for="input_16" id="sublabel_input_16" style="min-height:13px"
                                aria-hidden="false"> Enter 0.5 for 512 MB </label>
                        </span>
                    </div>
                </li>
                <p id="webid"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_17">
                    <label class="form-label form-label-top form-label-auto" id="label_17" for="input_17">
                        Bandwidth (in GB)
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_17" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" id="input_17" name="q17_bandwidthin" data-type="input-textbox"
                                class="form-textbox validate[required] bandid" style="width:310px" size="310" value=""
                                data-component="textbox" aria-labelledby="label_17 sublabel_input_17" required="" />
                            <label class="form-sub-label" for="input_17" id="sublabel_input_17" style="min-height:13px"
                                aria-hidden="false"> Enter 0.5 for 512 MB </label>
                        </span>
                    </div>
                </li>
                <p id="bandid"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_18">
                    <label class="form-label form-label-top form-label-auto" id="label_18" for="input_18">
                        Free Domain
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_18" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" id="input_18" name="q18_freeDomain" data-type="input-textbox"
                                class="domainid form-textbox validate[required]" style="width:310px" size="310" value=""
                                data-component="textbox" aria-labelledby="label_18 sublabel_input_18" required="" />
                            <label class="form-sub-label" for="input_18" id="sublabel_input_18" style="min-height:13px"
                                aria-hidden="false"> Enter 0 if no domain available in this service </label>
                        </span>
                    </div>
                </li>
                <p id="domainid"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_19">
                    <label class="form-label form-label-top form-label-auto" id="label_19" for="input_19">
                        Language / Technology Support
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_19" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" id="input_19" name="q19_language" data-type="input-textbox"
                                class="prodlang form-textbox validate[required]" style="width:310px" size="310" value=""
                                data-component="textbox" aria-labelledby="label_19 sublabel_input_19" required="" />
                            <label class="form-sub-label" for="input_19" id="sublabel_input_19" style="min-height:13px"
                                aria-hidden="false"> Separate by (,) Ex: PHP, MySQL, MongoDB </label>
                        </span>
                    </div>
                </li>
                <p id="prodlang"></p>

                <li class="form-line jf-required" data-type="control_textbox" id="id_20">
                    <label class="form-label form-label-top form-label-auto" id="label_20" for="input_20">
                        Mailbox
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_20" class="form-input-wide jf-required" data-layout="half">
                        <span class="form-sub-label-container" style="vertical-align:top">
                            <input type="text" id="input_20" name="q20_mailbox" data-type="input-textbox"
                                class="prodmail form-textbox validate[required]" style="width:310px" size="310" value=""
                                data-component="textbox" aria-labelledby="label_20 sublabel_input_20" required="" />
                            <label class="form-sub-label" for="input_20" id="sublabel_input_20" style="min-height:13px"
                                aria-hidden="false"> Enter Number of mailbox will be provided, enter 0 if none </label>
                        </span>
                    </div>
                </li>
                <p id="prodmail"></p>

                <li class="form-line" data-type="control_button" id="id_2">
                    <div id="cid_2" class="form-input-wide" data-layout="full">
                        <div data-align="auto"
                            class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                            <button id="submit" type="submit" name="create-now"
                                class="form-submit-button submit-button jf-form-buttons jsTest-submitField"
                                data-component="button" data-content="">
                                Create Now
                            </button>
                        </div>
                    </div>
                </li>
                <li style="display:none">
                    Should be Empty:
                    <input type="text" name="website" value="" />
                </li>
            </ul>
        </div>
        <script>
        JotForm.showJotFormPowered = "new_footer";
        </script>
        <script>
        JotForm.poweredByText = "Powered by JotForm";
        </script>
        <input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="203442420701036" />
        <script type="text/javascript">
        var all_spc = document.querySelectorAll("form[id='203442420701036'] .si" + "mple" + "_spc");
        for (var i = 0; i < all_spc.length; i++) {
            all_spc[i].value = "203442420701036-203442420701036";
        }
        </script>
    </form>
</body>

</html>
<?php include_once('footer.php'); ?>
<script src="https://cdn.jotfor.ms//js/vendor/smoothscroll.min.js?v=3.3.22245"></script>
<script src="https://cdn.jotfor.ms//js/errorNavigation.js?v=3.3.22245"></script>