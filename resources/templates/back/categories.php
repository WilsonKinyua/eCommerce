<?php require_once("../../resources/config.php"); ?>
 

<h1 class="page-header">
  Product Categories
    
</h1>

<h5 style="width: 400px;"><?php display_message(); ?></h5>

<div class="col-md-4">



    <form action="" method="post" enctype="multipart/form-data">

    <?php add_categories(); ?>

        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Add Category" name="submit">
        </div>      


    </form>


</div>

<div class="col-md-8">

    <table class="table table-hover">
            <thead>

        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Delete</th>
        </tr>
            </thead>


    <tbody>

       <?php categories(); ?>

    </tbody>

        </table>

</div>
