<?php
	require_once 'db.php';
	?>
	<?php
    $rating = $_POST['rating'];
    $restId = $_POST['restId'];
	$query_add_cat = "UPDATE restaurant SET point = point + $rating WHERE id = $restId";
	$result_add_cat = $mysqli->query($query_add_cat);
	?>