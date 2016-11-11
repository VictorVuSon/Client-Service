<?php
require_once 'web/inc/header.php';
?>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">My Profile</h4>
    		   <form>
    			 <div class="col_1_of_2 span_1_of_2">
		   			 	<div>
		   			 		<input type="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}"></div>
		    			<div>
		    				<input type="text" value="E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}">
		    			</div>
		    			<div>
		    				<input type="text" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
		    			</div>
		    			<div>
		    				<input type="text" value="passwordConfirm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'passwordConfirm';}">
		    			</div>
		    			<div>
		    			<input type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}">
			    		</div>
			         	<div>
			         		<input type="text" value="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}">
			         	</div>
			         	<div>
							<p class="code">Phone Number</p>
			         		<input type="text" value="" class="number">
		          		</div>
		    	 </div>
		    	 <div class="col_1_of_2 span_1_of_2">	
		         	<div class="form-group col-sm-6">
		         		<div><p  class="code">Avata: </p></div>
					     <img src="web/images/a-img.jpg" class="img-thumbnail" id="blah" alt="your avatar" width="300" height="300">
					     <div>
					   		 <input type="file" name="avata" onchange='readURL(this)'>
					    </div>
					</div>		         	
					
		          	<input type="submit" name="Submit" class="button" value="Register"><div class="clear"></div>
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
