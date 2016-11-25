<?php
require_once 'web/inc/header.php';
$email = $_GET['email'];
?>
<script>
// get detail user
function getDetailUser(email) {
	$.ajax({
		url: 'http://localhost/userYii2/api/web/index.php/user/detail',
		type: 'GET',
		cache: false,
		headers: {Authorization: TOKEN},
		data:{email: email},
		success: function (data) {
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
// get detail user
function updateUser() {
	$.ajax({
		url: 'http://localhost/userYii2/api/web/index.php/user/detail',
		type: 'GET',
		cache: false,
		headers: {Authorization: TOKEN},
		data:{email: email},
		success: function (data) {
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
window.onload = getDetailUser('<?php echo $email; ?>');
</script>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">My Profile</h4>
    		   <form name = "form">
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
			         		<button type="submit" class="btn btn-default">Update</button>
			         	</div>
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
