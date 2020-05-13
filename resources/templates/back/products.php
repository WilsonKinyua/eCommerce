<?php require_once("../../resources/config.php"); ?>

 <div class="row">

<h1 class="page-header">
   All Products

</h1>
<h2 class="text-center"><?php display_message(); ?></h2>
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Image</th>
           <th>Quantity</th>
           <th>Edit</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>

    <?php show_products(); ?>


  </tbody>
</table>
             </div>

   