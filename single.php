<?php
require_once 'web/inc/header.php';
?>
<script type="text/javascript" src="web/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
    $(function ()
    {
        $('.scroll-pane').jScrollPane();
    });
</script>
<!-- start details -->
<script src="web/js/slides.min.jquery.js"></script>
<script>
    $(function () {
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>
<link rel="stylesheet" href="web/css/etalage.css">
<script src="web/js/jquery.etalage.min.js"></script>

<script>
function loadRestaurant() {
        var id = '<?php echo $_GET['id'];?>';
        $.ajax({
            url: 'http://localhost/userYii2/api/web/index.php/restaurant/view?id='+id+'',
            type: 'GET',
            cache: false,
            headers: {Authorization: TOKEN},
            success: function (response) {
                var restaurant = response.data;
                var image = "http://localhost/userYii2/backend/web/uploads/"+restaurant.image;
                $(".name").append(restaurant.name);
                $(".link").append(restaurant.name);
                $(".address").append(restaurant.address.name+'-'+ restaurant.address.number +'-'+restaurant.address.street +'-'+ restaurant.address.district.name +'-'+ restaurant.address.district.city.name);
                $(".time").append(restaurant.time_open+'-'+restaurant.time_close);
                $(".category").append(restaurant.category.name);
                $(".price3").append(restaurant.price_min+'-'+restaurant.price_max);
                $(".img").append('<img class="etalage_thumb_image image" src="'+ image +'" class="img-responsive" />'
                        +'<img class="etalage_source_image" src="'+ image +'" class="img-responsive" title="" />');
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
        return false;
    }
</script>
<script>
    jQuery(document).ready(function ($) {

        $('#etalage').etalage({
            thumb_image_width: 360,
            thumb_image_height: 360,
            source_image_width: 900,
            source_image_height: 900,
            show_hint: true,
            click_callback: function (image_anchor, instance_id) {
                alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
            }
        });

    });
</script>
<body>
    <script>
        window.onload = loadRestaurant();
    </script>
    <div class="wrap">
    <div class="mens">    
        <div class="main">
            <div class="wrap">
                <ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / <a href="#">Restaurant</a> / <span class ="link"></span></ul>
                <div class="cont span_2_of_3">
                    <div class="grid images_3_of_2">
                        <ul id="etalage">
                            <li>
                                <a href="#" class="img">
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="desc1 span_3_of_2">
                        <h3 class="m_3 name"></h3>
                        <h3 class ="address">Địa chỉ: </h3>
                        <h3 class ="time">Giờ mở cửa: </h3>
                        <h3 class ="category" >Kiểu Nhà hàng: </h3>
                        <p class="m_5 price3">Giá: </p> 
                        <div class="btn_form">
                            <form>
                                <input type="submit" value="Rate" title="">
                            </form>
                        </div>
                       <!-- <span class="m_link">Mo ta: </span>
                    <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p> -->
                    </div>
                    <div class="clear"></div>	
                    <div class="clients">
                        <h3 class="m_3">Mon an trong nha hang</h3>
                        <ul id="flexiselDemo3">
                            <li><img src="web/images/s5.jpg" /><a href="#">Ten mon</a><p>Gia:</p></li>
                            <li><img src="web/images/s5.jpg" /><a href="#">Ten mon</a><p>Gia:</p></li>
                            <li><img src="web/images/s5.jpg" /><a href="#">Ten mon</a><p>Gia:</p></li>
                            <li><img src="web/images/s5.jpg" /><a href="#">Ten mon</a><p>Gia:</p></li>
                        </ul>
        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo1").flexisel();
                $("#flexiselDemo2").flexisel({
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            $("#flexiselDemo3").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: false,
                autoPlaySpeed: 3000,    		
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 1
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });
            
        });
	</script>
	<script type="text/javascript" src="web/js/jquery.flexisel.js"></script>
     </div>
     <div class="toogle">
     	<h3 class="m_3">Thong tin nha hang</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
     </div>
			
	 <?php
	require_once 'web/inc/menuSearch.php';
	?>
>>>>>>> df01e5c28422c4c420581532696f5ecf9b140abc

			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		<div class="fb-comments" data-href="http://localhost/Foody-client/Client-Service/" data-width="800px" data-numposts="5"></div>
 <?php
require_once 'web/inc/footer.php';
?>
