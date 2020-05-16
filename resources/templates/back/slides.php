<div class="row">


<h3 class="text-center text-capitalize"><?php display_message(); ?></h3>
  <h3 class="text-center text-capitalize">SLIDE PAGE</h3>
  <hr>

  <div class="col-xs-3 ">

 

      <?php add_slides(); ?>

    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Slide Title</label>
        <input type="text" name="slide_title" class="form-control">

      </div>
      <div class="form-group">

        <input class="form-control" type="file" name="file">

      </div>

   

      <div class="form-group ">

        <input type="submit" class="btn btn-primary" name="add_slide">

      </div>

    </form>

  </div>


  <div class="col-xs-8 col-lg-offset-1">

  <?php get_current_slides(); ?>

  </div>

</div><!-- ROW-->

<hr>

<h1>Slides Available</h1>

<div class="row">
<?php get_slide_thumbnails(); ?>


</div>