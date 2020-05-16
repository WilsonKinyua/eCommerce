<?php require_once("../../resources/config.php"); ?>

        <div class="col-md-12">
            <div class="row">
                <h1 style="text-transform: uppercase;" class="page-header text-center">
                  WELCOME TO All Reports  <?php echo $_SESSION['username']; ?>

                </h1>
                <h2 class="text-center"><?php display_message(); ?></h2>
            </div>

            <div class="row">
                <table class="table table-hover">
                    <thead>

                        <tr>
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Order Id</th>
                        <th>Price</th>
                        <th>Product title</th>
                        <th>Product quantity</th>
                        <th>Delete</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                    <?php get_reports(); ?>

                    </tbody>
                </table>
            </div>



        </div>
        <!-- /.container-fluid -->
