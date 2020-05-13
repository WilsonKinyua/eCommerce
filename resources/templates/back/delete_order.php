<?php require_once("../../config.php"); ?>

<?php


if(isset($_GET['id'])) {

    $delete_id = $_GET['id'];

    $query = query("DELETE FROM orders WHERE order_id = " . mysqli_escape( $delete_id )." ");
    confirm($query);

    set_message('<div class="alert alert-success" role="alert">Order successfully deleted!!!!</div>');
    redirect("../../../public/admin/index.php?orders");

} else {

    redirect("../../../public/admin/index.php?orders");

}





?>