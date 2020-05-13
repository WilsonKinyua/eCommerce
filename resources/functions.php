<?php


// ===================================function to get the last ID inserted into the database=========(didn't use it)===================

function last_id_insert() {

    global $connection;
    return mysqli_insert_id($connection);
}

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

        <div  class="col-sm-4 col-lg-4 col-md-4">
        <div style="height: 350px" class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img style="height: 170px" src="../resources/uploads/{$row['product_image']}" alt="No image for now"></a>
            <div class="caption">
                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                 <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
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
    <img style="height: 170px" src="../resources/uploads/{$row['product_image']}" alt="No image">
        <div class="caption">
            <h3>{$row['product_title']}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add To Cart
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
          <img style="height: 170px" src="../resources/uploads/{$row['product_image']}" alt="No image">
          <div class="caption">
              <h3>{$row['product_title']}</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <p>
                  <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add To Cart
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

    //     $to      = 'wilsonkinyuam@gmail.com';
    //     $subject =  $_POST['subject'];
    //     $message =  $_POST['message'];
    //     $headers = array(
    //     'From' => $_POST['name'],
    //     'Reply-To' => $_POST['email']
        
    //     );

    //    $result = mail($to, $subject, $message, $headers);
    
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



// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================
// =================================== BACKEND FUNCTIONS==============================================



// =================================== LOGOUT FUNCTIONS==============================================

function logout() {
    session_destroy();
    redirect("../../public");
}


// ============================function to display orders in the admin area================================



function show_orders() {

  $query = query("SELECT * FROM orders");
  confirm($query);

  while($row = fetch_array($query)) {

      $orders = <<<DELIMETER

          <tr>
              <td>{$row['order_id']}</td>
              <td>{$row['order_amount']}</td>
              <td>{$row['order_transaction']}</td>
              <td>{$row['order_currency']}</td>
              <td>{$row['order_status']}</td>
              <td><a href="../../resources/templates/back/delete_order.php?id={$row['order_id']}"><button class="btn btn-danger">Delete</button></a></td>
          </tr>



DELIMETER;
      echo $orders;




  }
}

// ============================function to pull the image from the folder================================

function display_image($picture) {

    global $upload_directory;
    
    return $upload_directory  . DS . $picture;
    
    
    
    }
    

// ============================function to display products in the admin area================================


function show_products() {

    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)) {
        
        // $product_image = display_image($row['product_image']);
        $products = <<<DELIMETER
            <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_category_id']}</td>
            <td>{$row['product_price']}</td>
            <td> <img height='100px' width='160px' src="../../resources/uploads/{$row['product_image']}" alt="No image"></td>
            <td>{$row['product_quantity']}</td>
            <td><a href="index.php?edit_product&id={$row['product_id']}"><button class="btn btn-primary">Edit Product</button></a></td>
            <td><a href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
DELIMETER;
      echo $products;
    }

    
}


// ============================function to display categories in the add categories admin area================================


function display_categories_add_products() {


    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)) {

      $cat_id         = $row['cat_id'];
      $cat_title      = $row['cat_title'];

      echo "<option value='{$cat_id}'>{$cat_title}</option>";
     
    }


}

// ============================function to add products in the admin area================================


function add_product() {

    if(isset($_POST['publish'])) {

       $product_title       = mysqli_escape($_POST['product_title']);
       $product_description = mysqli_escape($_POST['product_description']);
       $product_price       = mysqli_escape($_POST['product_price']);
       $product_category    = mysqli_escape($_POST['product_category_id']);
       $product_quantity    = mysqli_escape($_POST['product_quantity']);
       $product_caption     = mysqli_escape($_POST['short_desc']);
       $product_shippingfee = 0;

       $product_image        = mysqli_escape($_FILES['file']['name']);
       $product_image_temp   = mysqli_escape($_FILES['file']['tmp_name']);

       move_uploaded_file($product_image_temp  , UPLOAD_DIRECTORY . DS . $product_image);

      $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, product_caption, product_quantity, shipping_fee, product_image) 
                VALUES('{$product_title}', '{$product_category}', '{$product_price}', '{$product_description}', '{$product_caption}', '{$product_quantity}', '{$product_shippingfee}', '{$product_image}')");
      set_message('<div class="alert alert-success" role="alert">New Product has been created!!!! </div>');
      confirm($query);
      redirect("index.php?products");

    }

}
?>