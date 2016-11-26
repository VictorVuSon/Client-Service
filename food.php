<?php
require_once 'web/inc/header.php';
$restId = $_GET['restId'];
$restName = $_GET['name'];
?>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      	<h4 class="title"><?php echo $restName; ?></h4>
				<div id = "listRest">
					<form action = "" method = "post" enctype="multipart/form-data">
						<input type="text" id = "userId" name = "userId" style = "display:none" value = "" />
						<div>
		   			 		<input type="text" required class="form-control" name = "foodName" value="" placeholder = "Food name">
						</div>
		    			<div>
		    				<input type="text" required class="form-control" name = "price" value="" placeholder = "Price">
		    			</div>
						<div>
		    				<input type="text" required class="form-control" name = "detail"  value="" placeholder = "Detail">
		    			</div>
						<div>
		    				<input type="file" style = "width: 1055px;" required name = "image" class="form-control">
			    		</div>
						<button class="btn btn-default dropdown-toggle" style = "margin-top: 10px;" type = "submit" name = "addNewfood">Add new</button>
					</form>
					<?php
						// add new restaurant
						if(isset($_POST['addNewfood'])){
							$foodName = $mysqli->real_escape_string($_POST['foodName']);
							$price = $mysqli->real_escape_string($_POST['price']);
							$detail = $_POST['detail'];
							$name = null;
							//xử lý hình ảnh.
							if($_FILES['image']['name']!=""){
								$name = $_FILES['image']['name'];
								$tmp_name = $_FILES['image']['tmp_name'];
								//lấy đuôi ảnh
								$arr_name = explode(".", $name);
								$duoianh = $arr_name[count($arr_name)-1];
								$name = "file-".time().".".$duoianh;
								//tạo link save ảnh.
								$destination = $_SERVER['DOCUMENT_ROOT']."/Foody-client/Client-Service/files/$name";
								$result = move_uploaded_file($tmp_name, $destination);
							}
							//truy vấn cơ sở dữ liệu
							$query_add = "INSERT INTO food(name, price, detail, food_category_id, image, restaurant_id) VALUES ('$foodName','$price','$detail',1, '$name',$restId)";
							$result_add = $mysqli->query($query_add);
							if($result_add){
								header("http://localhost/Foody-client/Client-Service/food.php?restId=$restId&&name=$restName");
							} 
						}
					
					?>
					<script>
						function delFood(id, restId){
							var conf = confirm('Are you sure you want to delete it?');
							if(conf == true){
								$.ajax({
									url: 'ajax_delFood.php',
									type: 'POST',
									cache: false,
									data:{id: id , restId: restId},
									success: function (data) {
										$('.listRestaurant').html(data);
									},
									error: function () {
										alert('Something went wrong!');
									}
								});
								return false;
							}
						}
					</script>
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
				</div>
    	</div>
    </div>
    <script type="text/javascript">
    	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
 <?php
require_once 'web/inc/footer.php';
?>

