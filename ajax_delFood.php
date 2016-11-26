<?php
require_once 'db.php';
    $id =  $_POST['id'];
    $restId =  $_POST['restId'];
    $query_del = "DELETE FROM food WHERE id = $id";
	$result_del = $mysqli->query($query_del);
	if($result_del){
		?>
        <table class="table table-hover table-bordered listRestaurant">
            <thead>
            <tr>
                <th>Name</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            <?php $query_spkm = "SELECT food.id, food.name, food.price, food.detail, food.image FROM food WHERE restaurant_id = $restId";
                $result_spkm = $mysqli->query($query_spkm);
                while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
                    $id = ($arr_spkm['id']);
                    $name = ($arr_spkm['name']);
                    $detail = ($arr_spkm['detail']);
                    $price = ($arr_spkm['price']);
                    $image = ($arr_spkm['image']);
            ?>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $detail ?></td>
                <td><?php echo $price ?></td>
                <td><button onclick = "delFood(<?php echo $id;?>,'<?php echo $restId;?>')">Del</button></td>
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