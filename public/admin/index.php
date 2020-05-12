<?php
require_once("../../resources/config.php");

include(TEMPLATE_BACK . "/header.php");


if(!$_SESSION['username']) {

    redirect("../login.php");
}

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           WELCOME TO ADMIN DASHBOARD <?php echo $_SESSION['username']; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                
                if($_SERVER['REQUEST_URI'] == "/ecomm/public/admin/" || $_SERVER['REQUEST_URI'] == "/ecomm/public/admin/index.php" ) {



                    include(TEMPLATE_BACK . "/admin_content.php"); 

                }


                if(isset($_GET['orders'])) {

                    include(TEMPLATE_BACK . "/orders.php"); 

                }

                if(isset($_GET['products'])) {

                    include(TEMPLATE_BACK . "/products.php"); 

                }

                if(isset($_GET['add_product'])) {

                    include(TEMPLATE_BACK . "/add_product.php"); 

                }

                if(isset($_GET['categories'])) {

                    include(TEMPLATE_BACK . "/categories.php"); 

                }

                if(isset($_GET['users'])) {

                    include(TEMPLATE_BACK . "/users.php"); 

                }
              
                
                
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>