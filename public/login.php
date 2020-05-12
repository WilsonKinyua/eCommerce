<?php
require_once("../resources/config.php");

include(TEMPLATE_FRONT . DS . "header.php");

?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							<h3><i class="fa fa-user fa-4x"></i></h3>
                            <h2 class="text-center">Login</h2>
                            <?php echo display_message(); ?>
							<div class="panel-body">
                                <form id="" action="" role="form" autocomplete="off" class="form" method="post" enctype="multipart/form-data">
                                <?php login_user(); ?>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="username" type="text" class="form-control" placeholder="Enter Username">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="submit" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>
									<!-- <div class="form-group">
											<span>
												<a href="forgot_password.php?forgot=<?php //echo uniqid(true); ?>">Forgot Password</a>
											</span>
										</div>  -->

								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
        </div>
        


        </div>

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
