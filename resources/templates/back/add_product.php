<?php require_once("../../resources/config.php"); ?>


<div class="row">
  <h1 class="page-header text-center text-capitalize">
    Add Product

  </h1>
</div>

<form action="" method="post" enctype="multipart/form-data">

      <?php add_product(); ?>

  <div class="col-md-8">
    <div class="form-group">
      <label for="product-title">Product Title </label>
      <input type="text" name="product_title" class="form-control">

    </div>
    <div class="form-group">
      <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group row">
      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>
    <!-- addded this===== -->
    <div class="form-group">
           <label for="product-title">Product Short Description(caption)</label>
      <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"></textarea>
    </div>


  </div>
  <!--Main Content-->

  <!-- SIDEBAR-->
  <aside id="admin_sidebar" class="col-md-4">
    <div class="form-group">
      <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
      <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>
    <!-- Product Categories-->
    <div class="form-group">
      <label for="product-title">Product Category</label>
      <hr>
      <select name="product_category_id" id="" class="form-control">


        <?php display_categories_add_products(); ?>

  

      </select>
    </div>

    <!-- Product Brands-->

    <div class="form-group">
    <label for="product-quantity">Product Quantity</label>
      <hr>
      <input type="number" name="product_quantity" class="form-control">
    </div>

    <!-- Product Tags -->
    <!-- <div class="form-group">
      <label for="product-caption">Product Keywords(caption)</label>
      <hr>
      <input type="text" name="product_caption" class="form-control">
    </div> -->
    <hr>
    <!-- Product Image -->
    <div class="form-group">
   
      <label for="product-title">Product Image</label>
      <hr>
      <input type="file" name="file">

    </div>

  </aside>
  <!--SIDEBAR-->

</form>