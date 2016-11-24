<?php
    $result = file_get_contents("http://localhost/foody_new/public/api/v1/foods?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvZm9vZHlfbmV3XC9wdWJsaWNcL2FwaVwvdjFcL2F1dGhlbnRpY2F0ZSIsImlhdCI6MTQ3OTg5NDAxMSwiZXhwIjoxNDc5ODk3NjExLCJuYmYiOjE0Nzk4OTQwMTEsImp0aSI6IjRkZTQ3MWI2YWNlZDAyODYzNmM5ZTI1MjQ2OGMyZDkwIn0.nrFe1L1SsMCWEHaQiYwNwuSB1KI7Wxn9LRy1UAt6Uu0");
    $listFoods = json_decode($result, true)['data'];
    var_dump($listFoods);
  ?>
<?php
require_once 'web/inc/header.php';
?>
<?php
require_once 'web/inc/slide.php';
?>
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">New foods</h2>
			<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="single.php">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="web/images/pic.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">asdffdsa</p>
							<div class="price1">
							  <span class="actual">Rate:</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
				<div class="clear"></div>
			</div>	 		 						 			    
		  </div>
			<div class="rsidebar span_1_of_left">
				<div class="top-border"> </div>
				 <div class="border">
	             <link href="web/css/default.css" rel="stylesheet" type="text/css" media="all" />
	             <link href="web/css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
				  <script src="web/js/jquery.nivo.slider.js"></script>
				    <script type="text/javascript">
				    $(window).load(function() {
				        $('#slider').nivoSlider();
				    });
				    </script>
		    <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <img src="web/images/t-img1.jpg"  alt="" />
               	<img src="web/images/t-img2.jpg"  alt="" />
                <img src="web/images/t-img3.jpg"  alt="" />
              </div>
             </div>
              <div class="btn"><a href="single.php">Check it Out</a></div>
             </div>
           <div class="top-border"> </div>
			
	    </div>
	   <div class="clear"></div>
	</div>
	</div>
</div>
 <?php
require_once 'web/inc/footer.php';
?>