<?php require_once("../../config.php"); ?>

<?php


if(isset($_GET['id'])) {

    $delete_id = $_GET['id'];

    $query = query("DELETE FROM categories WHERE cat_id = " . mysqli_escape( $delete_id )." ");
    confirm($query);

    set_message('<div class="alert alert-danger" role="alert">Product successfully deleted!!!!</div>');
    redirect("../../../public/admin/index.php?categories");

} else {

    redirect("../../../public/admin/index.php?categories");

}





?>