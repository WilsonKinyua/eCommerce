<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php"); ?>


<!--Navigation -->



<!-- Contact Section -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contact Us</h2>
            <h3 class="section-subheading"> <?php echo display_message(); ?> </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form name="sentMessage" id="contactForm" method="post">

                <?php send_messsage(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Your Subject *" id="subject" required data-validation-required-message="Please enter the subject.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button type="submit" name="submit" class="btn btn-xl btn-primary">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php"); ?>