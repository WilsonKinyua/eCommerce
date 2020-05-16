<?php require_once("../../config.php");


if(isset($_GET['id'])) {


$query = query("DELETE FROM reports WHERE report_id = " . mysqli_escape($_GET['id']) . " ");
confirm($query);


set_message('<div class="alert alert-danger" role="alert">Report successfully deleted!!!!</div>');
redirect("../../../public/admin/index.php?reports");


} else {

redirect("../../../public/admin/index.php?reports");


}






 ?>