require_once 'web/inc/header.php';
?>
<?php
require_once 'web/inc/slide.php';
?>
<script type="text/javascript">
    function addElement(id, name, address, rate, image, isChange, divId) {
        var div = '<div class="col_1_of_3 span_1_of_3">'
                + '<a href="single.php?id=' + id + '">'
                + '<div class="inner_content clearfix">'
                + '<div class="product_image">'
                + '<img src="'+image+'" alt=""/>'
                + '</div>'
                + '<div class="sale-box"><span class="on_sale title_shop">New</span></div>'
                + '<div class="price">'
                + '<div class="cart-left">'
                + '<p class="title">' + name + '</p>'
                + '<div class="price1">'
                + '<span class="actual">Dia chi: ' + address + '</span>'
                + '</div>'
                + '<div class="price1">'
                + '<span class="actual rate">Rate: ' + rate + '</span>'
                + '</div>'
                + '</div>'
                + '<div class="cart-right"> </div>'
                + '<div class="clear"></div>'
                + '</div>'
                + '</div>'
                + '</a>'
                + '</div>';
        if (isChange === true) {
            $('<div class = "clear"></div><div class = "top-box" id = "'+(divId)+'"></div>').insertAfter('#' + (divId-1));
            div = '<div class="col_1_of_3 span_1_of_3">'
                    + '<a href="single.php?id=' + id + '">'
                    + '<div class="inner_content clearfix">'
                    + '<div class="product_image">'
                    + '<img src="'+image+'" alt=""/>'
                    + '</div>'
                    + '<div class="sale-box"><span class="on_sale title_shop">New</span></div>'
                    + '<div class="price">'
                    + '<div class="cart-left">'
                    + '<p class="title">' + name + '</p>'
                    + '<div class="price1">'
                    + '<span class="actual">Dia chi: ' + address + '</span>'
                    + '</div>'
                    + '<div class="price1">'
                    + '<span class="actual rate">Rate: ' + rate + '</span>'
                    + '</div>'
                    + '</div>'
                    + '<div class="cart-right"> </div>'
                    + '<div class="clear"></div>'
                    + '</div>'
                    + '</div>'
                    + '</a>'
                    + '</div></div>';
        }
        $('#' + divId).append(div);
    }

    function loadHomePage() {
        var position = 0;
        var divId = 0;
        var isChange = false;
        $.ajax({
            url: 'http://localhost/userYii2/api/web/index.php/restaurant/index',
            type: 'GET',
            cache: false,
            headers: {Authorization: TOKEN},
            success: function (data) {
                var arrRestaurant = data.data;
                console.log(arrRestaurant);
                arrRestaurant.forEach(function (restaurant) {
                    isChange = false;
                    position++;
                    if((((position - 1) % 3) === 0) && (position != 1)){
                        isChange = true;
                        divId ++ ;
                    }
                    var name = restaurant.name;
                    var id = restaurant.id;
                    var address = restaurant.address.name+'-'+ restaurant.address.number +'-'+restaurant.address.street +'-'+ restaurant.address.district.name +'-'+ restaurant.address.district.city.name;
                    var rate = restaurant.point ;
                    var image = "http://localhost/userYii2/backend/web/uploads/"+restaurant.image;
                    addElement(id, name, address, rate, image, isChange, divId);
                });
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
        return false;
    }
</script>
<div class="main">
    <script>
        window.onload = loadHomePage();
    </script>
    <div class="wrap">
        <div class="section group">
            <div class="cont span_2_of_3">
                <h2 class="head">Nha hang moi</h2>
                <div class="top-box" id = "0">
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