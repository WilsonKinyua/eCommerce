<?php require_once("../../resources/config.php"); ?>

        <div class="col-md-12">
            <div class="row">
                <h1 style="text-transform: uppercase;" class="page-header text-center">
                  WELCOME TO All Orders  <?php echo $_SESSION['username']; ?>

                </h1>
                <h2 class="text-center"><?php display_message(); ?></h2>
            </div>

            <div class="row">
                <table class="table table-hover">
                    <thead>

                        <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Transaction</th>
                            <th>Currency</th>
                            <th>Status</th>
                            <th>Delete</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                    <?php show_orders(); ?>

                    </tbody>
                </table>
            </div>



        </div>
        <!-- /.container-fluid -->
