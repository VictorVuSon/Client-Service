<?php
require_once 'web/inc/header.php';
?>
	</div>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create an Account</h4>
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
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	
		    		<div>
		    			<input type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}">
		    		</div>
		         	<div>
		         		<input type="text" value="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}">
		         	</div>
		         	<div>
		         		<input type="text" value="Phonenumber" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phonenumber';}">
		         	</div>
		          	<input type="submit" name="Submit" class="button" value="Register"><div class="clear"></div>
		          </div>
		  		    <div class="clear"></div>
		    </form>
    	</div>
    </div>
 <?php
require_once 'web/inc/footer.php';
?>