<?php
require_once 'db.php';
    $id =  $_POST['id'];
    $email =  $_POST['email'];
    $query_del = "DELETE FROM restaurant WHERE id = $id";
	$result_del = $mysqli->query($query_del);
	if($result_del){
		?>
        <table class="table table-hover table-bordered listRestaurant">
            <thead>
            <tr>
                <th>Name</th>
                <th>Detail</th>
                <th>Rate</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            <?php $query_spkm = "SELECT restaurant.id as resId, restaurant.name, restaurant.detail, restaurant.point FROM restaurant INNER JOIN user ON user.id = restaurant.userId WHERE user.email = '$email'";
                $result_spkm = $mysqli->query($query_spkm);
                while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
                    $id = ($arr_spkm['resId']);
                    $name = ($arr_spkm['name']);
                    $detail = ($arr_spkm['detail']);
                    $point = ($arr_spkm['point']);
            ?>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $detail ?></td>
                <td><?php echo $point ?></td>
                <td><button onclick = "delRestaurant(<?php echo $id;?>)">Del</button></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php
	}
	else{
		echo("Del error");
	}
?>