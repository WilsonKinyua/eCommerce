<?php require_once("../../config.php"); ?>

<?php


if(isset($_GET['id'])) {

    $delete_id = $_GET['id'];

    $query = query("DELETE FROM users WHERE user_id = " . mysqli_escape( $delete_id )." ");
    confirm($query);

    set_message('<div class="alert alert-danger" role="alert">User successfully deleted!!!!</div>');
    redirect("../../../public/admin/index.php?users");

} else {

    redirect("../../../public/admin/index.php?users");

}





?>