<?php
require_once 'web/inc/header.php';
?>
<script>
    function register() {
        var username = $('.username').val();
        var password = $('.password').val();
		var passwordConfirm = $('.passwordConfirm').val();
		var email = $('.email').val();
		var role = 1;
		var status = 1;
		if(username==""&& password=="" && fullname=="" && email==""){
			$('#error').html("<h4 style = 'color:red'>Please fill all the informations </h4>");
		}else{
			if(password != passwordConfirm) $('#error').html("<h4 style = 'color:red'>Password and Password confirm is not the same</h4>");
			else{
					$.ajax({
					url: 'http://localhost/userYii2/api/web/index.php/user/create',
					type: 'POST',
					cache: false,
					headers: {Authorization: TOKEN},
					data: {email: email,username: username, password: password, role_id:role, status: status },
					success: function (response) {
						var user = response.data;
						if(typeof user.id === "undefined"){
							if(typeof user.email != "undefined")$('#errorEmail').html("<h4 style = 'color:red'>'"+user.email+"'</h4>");
							if(typeof user.username != "undefined")$('#errorName').html("<h4 style = 'color:red'>'"+user.username+"'</h4>");
						} else {
							window.location.replace("http://localhost/Client-Service/login.php");
						}
					},
					error: function () {
						alert('Something went wrong!');
					}
				});
				return false;
			}
		}
	}
</script>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create an Account</h4>
    		   <form>
			   		<fieldset class="input">
					   <div id ="error"></div>
		   			 	<div>
		   			 		<input type="text" name="username" placeholder ="Username" class ="username">
							<div id ="errorName"></div>
						</div>
		    			<div>
		    				<input type="text" name="email"  class = "email" placeholder = "E-Mail">
							<div id ="errorEmail"></div>
		    			</div>
		    			<div>
		    				<input type="text" name="password" class ="password" placeholder ="Password">
		    			</div>
		    			<div>
		    				<input type="text" name="passwordConfirm" class ="passwordConfirm" placeholder ="Password confirm" >
		    			</div>
						<div class="col_1_of_2 span_1_of_2">	
							<input type="button" name="Register" onclick ='register();' class="button" value="Register"><div class="clear"></div>
						</div>
		  		    <div class="clear"></div>
				<fieldset class="input">
		    </form>
    	</div>
    </div>
 <?php
require_once 'web/inc/footer.php';
?>