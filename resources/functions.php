<?php

// ===================================function to set message=============================================

function set_message($msg) {

    if(!empty($msg)) {

        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }

}

// ===================================function to display message=============================================


function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);

    }
}


// ===================================function to redirect=============================================

function redirect($location){

    header("Location: $location");

}

// =================================== helper function for query========================================

function query($sql){

    global $connection;
    return mysqli_query($connection,$sql);

}


// =================================== confirm connection===============================================


function confirm($result){

    global $connection;
    if(!$result){
        die("QUERY FAILED" .mysqli_error($connection));
    }
}

// =================================== prevent mysql injection===============================================

function mysqli_escape($string){
    global $connection;

    return mysqli_real_escape_string($connection,$string);
}


// =================================== fetch array===============================================


function fetch_array($result){

return mysqli_fetch_array($result);

}
// =================================== FRONTEND FUNCTIONS==============================================
// =================================== FRONTEND FUNCTIONS==============================================
// =================================== FRONTEND FUNCTIONS==============================================
// =================================== FRONTEND FUNCTIONS==============================================
// =================================== FRONTEND FUNCTIONS==============================================






// =================================== function to display the products===============================================



function get_products() {

  $query =  query("SELECT * FROM products");
  confirm($query);

  while($row = fetch_array($query)) {

        $product = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img style="height:90px" src="" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                 <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Add to cart</a>
            </div>
    
    
           
        </div>
    </div>
    

DELIMETER;

        echo $product;
  }
}
// =================================== function to display the products===============================================

function get_categories() {
    $query = query("SELECT * FROM categories");
    confirm($query);
    while($row = fetch_array($query)) {

        $category = <<<DELIMETER1

        <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER1;
echo $category;
    }
}

// =================================== function to display the products in cat page===============================================
function get_products_in_cat_page() {


  $query =  query("SELECT * FROM products WHERE product_category_id = ".mysqli_escape($_GET['id'])." ");
  confirm($query);

  while($row = fetch_array($query)) {

    $product = <<<DELIMETER

    <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="{$row['product_image']}" alt="">
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="item.php?id={$row['product_id']}" class="btn btn-primary">Add To Cart
                </a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>

DELIMETER;
  
echo $product;


}

}

// =================================== function to display the products in shop page===============================================

function get_products_in_shop_page() {


    $query =  query("SELECT * FROM products ");
    confirm($query);
  
    while($row = fetch_array($query)) {
  
      $product = <<<DELIMETER
  
      <div class="col-md-3 col-sm-6 hero-feature">
      <div class="thumbnail">
          <img src="{$row['product_image']}" alt="">
          <div class="caption">
              <h3>{$row['product_title']}</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <p>
                  <a href="item.php?id={$row['product_id']}" class="btn btn-primary">Add To Cart
                  </a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
              </p>
          </div>
      </div>
  </div>
  
  DELIMETER;
    
  echo $product;
  
  
  }
  
  }

  // =================================== function tologin the user===============================================


  function login_user() {

      if(isset($_POST['submit'])) {

         $username = trim(mysqli_escape($_POST['username']));
         $password = trim(mysqli_escape($_POST['password']));

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);

        if(mysqli_num_rows($query) == 0 ) {

            set_message("<div class='alert alert-danger'>Your password or Email is wrong</div>");
            redirect("login.php");

            
        } else {

            $_SESSION['username'] = $username;

            // set_message("Welcome to admin " . $username . " ");
            redirect("admin");
        }
        
      }

  }

  // =================================== function to send the message to the email===============================================

  function send_messsage() {

    if(isset($_POST['submit'])) {
    
      $to            = "wilsonkinyuam@gmail.com";
      $from_name     =  $_POST['name'];
      $email         =  $_POST['email'];
      $subject       =  $_POST['subject'];
      $message       =  $_POST['message'];

      $headers = "From: {$from_name} {$email}";

      $result = mail($to, $subject, $message, $headers);

      if(!$result) {

        set_message("<div class='alert alert-danger'>Your message has not been sent at all. Please try again!!!</div>");
        redirect("contact.php");
      } else {

          set_message("<div class='alert alert-success'>Your message has been sent..Will get back to you shortly!!!</div>");
          redirect("contact.php");
      }

     }

  }


// =================================== LOGOUT FUNCTIONS==============================================

  function logout() {
      session_destroy();
      redirect("../../public");
  }




// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
?>