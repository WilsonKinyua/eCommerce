<?php require_once("../../resources/config.php"); ?>

<?php 


if(!isset($_GET['id'])) {

    redirect("index.php?users");
}


if(isset($_GET['id'])) {

    $the_id = $_GET['id'];

    $query = query("SELECT * FROM users WHERE user_id = " . mysqli_escape($the_id) . " ");
    confirm($query);
    while($row = fetch_array($query)){ 

      $username         =  $row['username'];
      $first_name       =  $row['first_name'];
      $last_name        = $row['last_name'];
      $password         =  $row['password'];
      $user_photo       = display_image($row['user_photo']);
      $user_email       = $row['user_email'];
        
    }

    edit_user();
}




?>


<h1 class="page-header text-center text-capitalize">
    Edit Profile <span style = 'text-transform: uppercase; font-weight: bold;' ><?php echo $username; ?></span> 
  
</h1>
<div  class="col-md-6 user_image_box">
    
<!-- <span id="user_admin" class='fa fa-user fa-4x'></span> -->
<h1 class="text-capitalize">
     <span style = 'text-transform: uppercase; font-weight: bold;' >User image</span> 
  
</h1>

<br>
<!-- height: 400px; -->
<img style="width: 400px; border-radius: 50%;" src="../../resources/<?php echo $user_photo; ?>" alt="">

</div>


<form action="" method="post" enctype="multipart/form-data">


<?php display_message(); ?>

  <div class="col-md-6">

     <div class="form-group">
     
      <input type="file" name="file">
         
     </div>


     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >
         
     </div>


      <div class="form-group">
          <label for="email">Email</label>
      <input type="email" name="email" class="form-control" value="<?php echo $user_email; ?>"  >
         
     </div>


      <div class="form-group">
          <label for="first name">First Name</label>
      <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"  >
         
     </div>

      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"  >
         
     </div>


      <div class="form-group">
          <label for="password">Password</label>
      <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" >
         
     </div>

      <div class="form-group">

      <a id="user-id" class="btn btn-danger" href="">Delete</a>

      <input type="submit" name="update_user" class="btn btn-primary pull-right" value="Edit User" >
         
     </div>


      

  </div>



</form>





    

