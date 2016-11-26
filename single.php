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
var rating;
function loadRestaurant() {
        var id = '<?php echo $_GET['id'];?>';
        $.ajax({
            url: 'http://localhost/userYii2/api/web/index.php/restaurant/view?id='+id+'',
            type: 'GET',
            cache: false,
            headers: {Authorization: TOKEN},
            success: function (response) {
                var restaurant = response.data;
                var image = "http://localhost/Foody-client/Client-Service/files/"+restaurant.image;
                $(".name").append(restaurant.name);
                $(".link").append(restaurant.name);
                $(".address").append(restaurant.address.name+'-'+ restaurant.address.number +'-'+restaurant.address.street +'-'+ restaurant.address.district.name +'-'+ restaurant.address.district.city.name);
                $(".time").append(restaurant.time_open+'-'+restaurant.time_close);
                $(".category").append(restaurant.category.name);
                $(".price3").append(restaurant.price_min+'$ - '+restaurant.price_max+'$');
                $(".detail").append(restaurant.detail);
                $('#detailImg img').attr("src",image);
                rating = (restaurant.point)/20;
                ratingAction(rating);
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
        return false;
    }
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
                        <ul id="detailImg">
                            <li>
                                <img src = "" style = "height: 390px;" />
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="desc1 span_3_of_2">
                        <h3 class="m_3 name"></h3>
                        <h3 class ="address">Address: </h3>
                        <h3 class ="time">Open time: </h3>
                        <h3 class ="category" >Style: </h3>
                        <p class="m_5 price3">Bound of Price: </p>
                        <div class="rateyo" id = "rateYo">
                            <script>
                                function ratingAction(rating) {
                                    $("#rateYo").rateYo({
                                        rating: rating
                                    });
                                    $(".counter").text(rating);
                                    $("#rateYo1").on("rateyo.init", function () { console.log("rateyo.init"); });
                                    $("#rateYo1").rateYo({
                                    numStars: 5,
                                    precision: 2,
                                    starWidth: "64px",
                                    spacing: "5px",
                                rtl: true,
                                    multiColor: {

                                        startColor: "#000000",
                                        endColor  : "#ffffff"
                                    },
                                    onInit: function () {

                                        console.log("On Init");
                                    },
                                    onSet: function () {

                                        console.log("On Set");
                                    }
                                    }).on("rateyo.set", function () { console.log("rateyo.set"); })
                                    .on("rateyo.change", function () { console.log("rateyo.change"); });

                                    $(".rateyo").rateYo();

                                    $(".rateyo-readonly-widg").rateYo({

                                    rating: rating,
                                    numStars: 5,
                                    precision: 2,
                                    minValue: 1,
                                    maxValue: 5
                                    }).on("rateyo.change", function (e, data) {
                                        console.log(data.rating);
                                    });
                                };
                            </script>
                        </div>
                        <script type="text/javascript" src="web/js/jquery.min.js"></script>
                        <script type="text/javascript" src="web/js/jquery.rateyo.js"></script>
                        
                        <div class="btn_form">
                            <button id = "getRating">Rate</button>
                            <script>
                                $(function () {
                                    var $rateYo = $("#rateYo").rateYo();
                                    $("#getRating").click(function () {
                                        var rating = $rateYo.rateYo("rating");
                                        $.ajax({
                                        url: 'ajax_rate.php',
                                        type: 'POST',
                                        cache: false,
                                        headers: {Authorization: TOKEN},
                                        data: {rating: rating, restId: <?php echo $_GET['id'] ?>},
                                        success: function (data) {
                                            alert("Thanks for your rating");
                                        },
                                        error: function () {
                                            alert('Something went wrong!');
                                        }})
                                        });
                                    });
                            </script>
                        </div>
                    </div>
                    <div class="clear"></div>	
                    <div class="clients">
                        <h3 class="m_3">Our foods</h3>
                        <ul id="flexiselDemo3">
                        <?php
                            $restId = $_GET['id'];
                            $query_spkm = "SELECT food.id, food.name, food.price, food.detail, food.image FROM food WHERE restaurant_id = $restId";
							$result_spkm = $mysqli->query($query_spkm);
							while($arr_spkm = mysqli_fetch_assoc($result_spkm)){
								$id = ($arr_spkm['id']);
								$name = ($arr_spkm['name']);
								$detail = ($arr_spkm['detail']);
								$price = ($arr_spkm['price']);
								$image = ($arr_spkm['image']);
						?>
                            <li><img src="http://localhost/Foody-client/Client-Service/files/<?php echo $image ?>" /><?php echo $name ?><p>Price: <?php echo $price."$"; ?></p></li>
                        <?php } ?>
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
     	<h3 class="m_3">About us</h3>
     	<p class="m_text detail"></p>
     </div>
     </div>
    </div>
    <div class="rsidebar span_1_of_left">
                <div class="top-border"> </div>
                <div class="border">
                    <link href="web/css/default.css" rel="stylesheet" type="text/css" media="all" />
                    <link href="web/css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
                    <script src="web/js/jquery.nivo.slider.js"></script>
                    <script type="text/javascript">
                        $(window).load(function () {
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
                </div>
                <div class="top-border"> </div>
            </div>
        <div class="clear"></div>
    </div>
    </div>
    <div class="fb-comments" data-href="http://localhost/Foody-client/Client-Service/" data-width="800px" data-numposts="5"></div>
 <?php
require_once 'web/inc/footer.php';
?>
