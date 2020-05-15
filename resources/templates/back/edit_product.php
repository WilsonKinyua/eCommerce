<?php require_once("../../resources/config.php"); ?>

<?php


if(!isset($_GET['id'])) {

  redirect("index.php?products");
}


if(isset($_GET['id'])) {

  $the_id = $_GET['id'];
  $query = query("SELECT * FROM products WHERE product_id = " . mysqli_escape($the_id) . " ");
  confirm($query);

  while($row = fetch_array($query)) {

    $product_title          = mysqli_escape($row['product_title']);
    $product_description    = mysqli_escape($row['product_description']);
    $product_price          = mysqli_escape($row['product_price']);
    $product_caption        = mysqli_escape($row['product_caption']);
    $product_category       = mysqli_escape($row['product_category_id']);
    $product_quantity       = mysqli_escape($row['product_quantity']);
    $product_image          = display_image($row['product_image']);

    
  }

   update_product();
}




?>


<div class="row">
  <h1 class="page-header text-center text-capitalize">
    Edit Product: <span style = 'text-transform: uppercase; font-weight: bold;' ><?php echo $product_title; ?></span> 

  </h1>
</div>

<form action="" method="post" enctype="multipart/form-data">

  <div class="col-md-8">
    <div class="form-group">
      <label for="product-title">Product Title </label>
      <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">

    </div>
    <div class="form-group">
      <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $product_description; ?></textarea>
    </div>

    <div class="form-group row">
      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
      </div>
    </div>
    <!-- addded this===== -->
    <div class="form-group">
           <label for="product-title">Product Short Description(caption)</label>
      <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $product_caption; ?></textarea>
    </div>


  </div>
  <!--Main Content-->

  <!-- SIDEBAR-->
  <aside id="admin_sidebar" class="col-md-4">
    <div class="form-group">
      <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
      <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>
    <!-- Product Categories-->
    <div class="form-group">
      <label for="product-title">Product Category</label>
      <hr>
      <select name="product_category_id" id="" class="form-control">

           <option value="<?php echo $product_category; ?>"><?php echo show_product_category_title($product_category); ?></option>
        <?php display_categories_add_products(); ?>

  

      </select>
    </div>

    <!-- Product Brands-->

    <div class="form-group">
    <label for="product-quantity">Product Quantity</label>
      <hr>
      <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
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
      <img style="width: 100px;" class="img-responsive" src="../../resources/<?php echo $product_image; ?>" alt="">
      <br>
      <input type="file" name="file">

    </div>

  </aside>
  <!--SIDEBAR-->

</form>