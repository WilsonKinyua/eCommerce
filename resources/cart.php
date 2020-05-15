<?php require_once("config.php"); ?>
<?php



if (isset($_GET['add'])) {


    $query = query("SELECT * FROM products WHERE product_id = " . mysqli_escape($_GET['add']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {

        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {

            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("../public/checkout.php");
        } else {

            set_message("<div class='alert alert-danger'>We only have " . $row['product_quantity'] . " " . $row['product_title'] . " available</div>");
            redirect("../public/checkout.php");
        }
    }

    // $_SESSION['product_' . $_GET['add']] +=1;
    // redirect("index.php");
}

// ============================get request to remove the item from the cart===========================
if (isset($_GET['remove'])) {


    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1) {

        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    } else {

        redirect("../public/checkout.php");
    }
}
// ============================get request to delete the item from the cart===========================

if (isset($_GET['delete'])) {

    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
}

// ============================function to display items on the checkout page===========================
function cart()
{

    $total          = 0;
    $item_quantity  = 0;
    $item_name      = 1;
    $item_number    = 1;
    $amount         = 1;
    $quantity       = 1;

    foreach ($_SESSION as $name => $value) {

        if ($value > 0) {

            if (substr($name, 0, 8) == "product_") {

                $length = strlen($name);
                $id     = substr($name, 8, $length); //the actual id of the product

                $query = query("SELECT * FROM products WHERE product_id = " . mysqli_escape($id) . " ");
                confirm($query);

                while ($row = fetch_array($query)) {

                    $product_image = display_image($row['product_image']);
                    $sub = $row['product_price'] * $value; //this is the subtotal of the product

                    $item_quantity += $value; //item quatity

                    $products = <<<DELIMETER
            
            <tr>
            <td>{$row['product_title']}</td>
            <td><img style="height: 100px; width: 150px"  src="../resources/{$product_image}" alt="No image for now"></td>
            <td>&#36;{$row['product_price']}</td>
            <td>{$value}</td>
            <td>&#36;{$sub}</td>
            <td>
                <a class='btn btn-warning' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>
                <a class='btn btn-success' href="../resources/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a> 
                <a class='btn btn-danger' href="../resources/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a> 
            </td>
            </tr>

            <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
            <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
            <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
            <input type="hidden" name="quantity_{$quantity}" value="{$value}">
                    
DELIMETER;

                    echo $products;

                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;
                }

                $_SESSION['item_total']   =     $total += $sub;
                $_SESSION['item_quantity'] =    $item_quantity;
            }
        }
    }
}

// ============================function to display the paypal button===========================


function show_paypal()
{

    if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1) {
        $paypaly_button = <<<DELIMETER

    <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">

DELIMETER;

        return $paypaly_button;
    }
}



// ============================function to display reports on the ordered items================================


function process_transaction() {

    global $connection;

    if (isset($_GET['tx'])) {

        $amount = $_GET['amt'];
        $currency = $_GET['cc'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];

        $total          = 0;
        $item_quantity  = 0;

        foreach ($_SESSION as $name => $value) {

            if ($value > 0) {

                if (substr($name, 0, 8) == "product_") {

                    $length = strlen($name);
                    $id     = substr($name, 8, $length);

                    $send_order = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency) 
                    VALUES ('{$amount}', '{$transaction}', '{$status}', '{$currency}')");

                    $order_id =  mysqli_insert_id($connection);
                    confirm($send_order);

                    $query = query("SELECT * FROM products WHERE product_id = " . mysqli_escape($id) . " ");
                    confirm($query);

                    while ($row = fetch_array($query)) {

                        $product_price = $row['product_price'];
                        $product_title = $row['product_title'];
                        $product_image = $row['product_image'];
                        $sub = $row['product_price'] * $value;
                        $item_quantity += $value;


                        $insert_query = query("INSERT INTO reports (product_id, order_id, product_price, product_title, product_quantity, product_image) 
                                        VALUES ('{$id}', '{$order_id}', '{$product_price}', '{$product_title}', '{$value}', '{$product_image}')");
                        confirm($insert_query);
                    }

                    $total += $sub;
                    $item_quantity;
                }
            }
        }

        session_destroy();

    } else {

        redirect("index.php");
    }
}




?>
