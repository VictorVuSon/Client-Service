<?php
require_once 'web/inc/header.php';
$email = $_GET['email'];
?>
<script>
var userId = 0;
function getDetailUser(email) {
	$.ajax({
		url: 'http://localhost/userYii2/api/web/index.php/user/detail',
		type: 'GET',
		cache: false,
		headers: {Authorization: TOKEN},
		data:{email: email},
		success: function (data) {
			userId = data.data.id;
			$('#username').val(data.data.username);
			$('#email').val(data.data.email);
			$('#fullname').val(data.data.username);
		},
		error: function () {
			alert('Something went wrong!');
		}
	});
	return false;
}
// get list res
function loadListRestaurant(){
	$('#profile').hide();
	$('#listRest').show();
	$('#userId').val(userId);
	
}
function delRestaurant(id, email){
	var conf = confirm('Are you sure you want to delete it?');
	if(conf == true){
		$.ajax({
			url: 'ajax_delRestaurant.php',
			type: 'POST',
			cache: false,
			data:{id: id , email: email},
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
function selectDistrict(){
	var id = $( "#selectCity" ).val();
		$.ajax({
			url: 'ajax_selectDistrict.php',
			type: 'POST',
			cache: false,
			data:{id: id},
			success: function (data) {
				$('.district').html(data);
			},
			error: function () {
				alert('Something went wrong!');
			}
		});
		return false;
}
function selectAddress(){
	var id = $( "#selectDistrict" ).val();
		$.ajax({
			url: 'ajax_selectAddress.php',
			type: 'POST',
			cache: false,
			data:{id: id},
			success: function (data) {
				$('.address').html(data);
			},
			error: function () {
				alert('Something went wrong!');
			}
		});
		return false;
}
function loadProfile(){
	$('#profile').show();
	$('#listRest').hide();
}
window.onload = getDetailUser('<?php echo $email; ?>');
</script>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      	<h4 class="title">My Profile</h4>
				<button class="btn btn-default dropdown-toggle" onclick = "loadListRestaurant()">List restaurant</button>
				<button class="btn btn-default dropdown-toggle" onclick = "loadProfile()">Profile</button>
				<div id = "listRest" style = "display:none" >
					<form id = "addNewRest" action = "" method = "post" enctype="multipart/form-data">
						<input type="text" id = "userId" name = "userId" style = "display:none" value = "" />
						<div>
		   			 		<input type="text" required class="form-control" name = "restname" id = "restname" value="" placeholder = "Restaurant name"></div>
		    			<div>
		    				<input type="text" required class="form-control" name = "detail" id = "detail" value="" placeholder = "Detail">
		    			</div>
						<div>
		    				<input type="text" required class="form-control" name = "price_min" id = "price_min" value="" placeholder = "Min price">
		    			</div>
						<div>
		    				<input type="text" required class="form-control" name = "price_max" id = "price_max" value="" placeholder = "Max price">
		    			</div>
						<div>
		    				<input type="time" style = "width: 1055px; margin-bottom: 10px;" required class="form-control" name = "opentime" id = "opentime" value="" placeholder = "Open time">
		    			</div>
						<div>
		    				<input type="time" style = "width: 1055px;" required class="form-control" name = "closetime" id = "closetime" value="" placeholder = "Close time">
		    			</div>
						<div>
		    				<input type="text" required class="form-control" id = "detail" value="" placeholder = "Detail">
		    			</div>
						<div>
		    				<input type="file" style = "width: 1055px;" required name = "restarantImage" class="form-control">
			    		</div>
						<div>
		    				<select name="rest_cat">
							<option value = 0>Category</option>
							<?php $query_spkm = "SELECT * FROM restaurant_category";
									$result_spkm = $mysqli->query($query_spkm);
									while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
										$id = ($arr_spkm['id']);
										$name = ($arr_spkm['name']);
								?>
								<option value = <?php echo $id; ?>><?php echo $name ?></option>
								<?php } ?>
							</select>
			    		</div>
						<div>
		    				<select id = "selectCity" name = "city" onchange = "selectDistrict()">
								<option value = 0>City</option>
								<?php $query_spkm = "SELECT * FROM city";
									$result_spkm = $mysqli->query($query_spkm);
									while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
										$id = ($arr_spkm['id']);
										$name = ($arr_spkm['name']);
								?>
								<option value = <?php echo $id  ?>><?php echo $name; ?></option>
								<?php } ?>
							</select>
			    		</div>
						<div class = "district">
			    		</div>
						<div class = "address">
			    		</div>
						<button class="btn btn-default dropdown-toggle" type = "submit" name = "addRest">Add new</button>
					</form>
					<?php
						// add new restaurant
						if(isset($_POST['addRest'])){
							$restName = $mysqli->real_escape_string($_POST['restname']);
							$detail = $mysqli->real_escape_string($_POST['detail']);
							$rest_cat = $_POST['rest_cat'];
							$address = $_POST['address'];
							$opentime = $_POST['opentime'];
							$price_min = $_POST['price_min'];
							$price_max = $_POST['price_max'];
							$userId = $_POST['userId'];
							$closeTime = $_POST['closetime'];
							$name = null;
							//xử lý hình ảnh.
							if($_FILES['restarantImage']['name']!=""){
								$name = $_FILES['restarantImage']['name'];
								$tmp_name = $_FILES['restarantImage']['tmp_name'];
								//lấy đuôi ảnh
								$arr_name = explode(".", $name);
								$duoianh = $arr_name[count($arr_name)-1];
								$name = "file-".time().".".$duoianh;
								//tạo link save ảnh.
								$destination = $_SERVER['DOCUMENT_ROOT']."/Foody-client/Client-Service/files/$name";
								$result = move_uploaded_file($tmp_name, $destination);
							}
							//truy vấn cơ sở dữ liệu
							$query_add = "INSERT INTO restaurant(name, detail, image, restaurant_category_id, address_id, time_open, time_close, price_min, price_max, userId, point) VALUES ('$restName','$detail','$name',$rest_cat,'$address','$opentime', '$closeTime',$price_min,$price_max,$userId, 0)";
							echo $query_add;
							$result_add = $mysqli->query($query_add);
							if($result_add){
								header("location:http://localhost/Foody-client/Client-Service");
							} 
						}
					
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
							<td><a href = "food.php?restId=<?php echo $id ?>&&name=<?php echo $name; ?>"><?php echo $name ?></a></td>
							<td><?php echo $detail ?></td>
							<td><?php echo $point ?></td>
							<td><button onclick = "delRestaurant(<?php echo $id;?>,'<?php echo $email;?>')">Del</button></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
    		   	<form id = "profile">
    			 <div class="col_1_of_2 span_1_of_2">
		   			 	<div>
		   			 		<input type="text" class="form-control" id = "username" value="Username" placeholder = "Username" disabled = "disabled"></div>
		    			<div>
		    				<input type="text" class="form-control" id = "email" value="" placeholder = "Email" disabled = "disabled">
		    			</div>
						<div>
		    				<input type="text"  class="form-control" id = "fullname" value="" placeholder = "Fullname">
			    		</div>
		    			<div>
		    				<input type="password" class="form-control" value="" id = "password" placeholder="Password" style = "width: 518px; margin-bottom: 10px"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}"  title="Mật khẩu gồm 6 đến 20 ký tự phải có cả chữ cái thường, chữ cái hoa và số" onchange="form.nhapLaiMatKhau.pattern = this.value;">
		    			</div>
		    			<div>
		    				<input type="password" class="form-control" value="" id = "passconfirm" placeholder="Password confirm" style = "width: 518px; margin-bottom: 10px" title="Nhập lại mật khẩu phải trùng với mật khẩu" />
		    			</div>
						<div>
			         		<button type="submit" class="btn btn-default" onclick = "updateUser()">Update</button>
			         	</div>
		    	 </div>
				 <div class="col_2_of_2 span_2_of_2">
				 	
				 </div>
		  		    <div class="clear"></div>
		    </form>
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

