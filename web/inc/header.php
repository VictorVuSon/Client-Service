<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php require_once 'db.php';?>
<?php 
	session_start();
	ob_start();
?>
<html>
    <head>
        <title>My Foody</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="web/css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="web/js/jquery.min.js"></script>
        <!-- start menu -->
        <link href="web/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="web/js/megamenu.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- rate -->
        <link rel="stylesheet" href="web/css/jquery.rateyo.min.css"/>
        <script type="text/javascript" src="web/js/jquery.rateyo.js"></script>
        <script>$(document).ready(function () {
        $(".megamenu").megamenu();
    });</script>
        <!--start slider -->
        <link rel="stylesheet" href="web/css/fwslider.css" media="all">
        <script src="web/js/jquery-ui.min.js"></script>
        <script src="web/js/css3-mediaqueries.js"></script>
        <script src="web/js/fwslider.js"></script>
        <script src="web/js/js_const.js"></script>
        
        
        <script type="text/javascript">
            $(function(){
                $('.container').rating();
            });
        </script>
        <script src="web/js/jquery.easydropdown.js"></script>
        <script>
</script>
    </head>
    <body>

        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=959808807458199";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                loginSuccess();
            } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
               document.getElementById('status').innerHTML = '<li id = "login"><a href="login.php">Log In</a></li> |'
                                    +'<li id = "signup"><a href="register.php">Sign Up</a></li> |'
                                    +'<li><a href="#" onclick = "login()">Login as facebook</a></li>';
            } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
                document.getElementById('status').innerHTML = '<li id = "login"><a href="login.php">Log In</a></li> |'
                                    +'<li id = "signup"><a href="register.php">Sign Up</a></li> |'
                                    +'<li><a href="#" onclick = "login()">Login as facebook</a></li>';
            }
        }
        function createFaceUser(response) {
            console.log(response);
            $.ajax({
                url: 'http://localhost/userYii2/api/web/index.php/user/create',
                type: 'POST',
                cache: false,
                headers: {Authorization: TOKEN},
                data:{email: response.email, username:response.name, password: response.id, fullname: response.name, role_id: 2, status: 1},
                error: function () {
                    alert('Something went wrong!');
                }
            });
            return false;
        }
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        function logout(){
            FB.logout(function(response) {
                checkLoginState();
            });
        }
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '959808807458199',
            cookie     : true,  // enable cookies to allow the server to access 
                                // the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

        };

        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function loginSuccess() {
            FB.api('/me',{fields: 'id,name,email'}, function(response) {
                createFaceUser(response);
                document.getElementById('status').innerHTML = '<ul id = "status">'
                                    +'<li><a href="profile.php?email='+response.email+'">Welcome: '+response.name+'</a></li> | '
                                    +'<li><a href="#" onclick = "logout()">Logout</a></li>'
                                +'</ul>';
            });
        }
        function login() {
            FB.login(function(response) {
                if (response.authResponse) {
                    loginSuccess();
                } else {
                }
            }, { scope: 'email' });
        }
        </script>
        <div class="header-top">
            <div class="wrap"> 
                <div class="cssmenu">
                    <ul id = "status">
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.php"><img src="web/images/foody.png" style="width:150px" alt=""/></a>
                    </div>
                    <div class="menu">
                        <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Homepage</a></li>
                            <li><a class="color4" href="">New restaurant</a>
                            </li>				
                            <li><a class="color5" href="">Style restaurant</a>
                                <div class="megapanel">
                                    <div class="col1">
                                        <div class="h_nav">
                                            <h4>Nha Hang</h4>
                                            <ul>
                                                <li><a href="">Italian</a></li>
                                                <li><a href="">Japan</a></li>
                                                <li><a href="">China</a></li>
                                                <li><a href="">Spanis</a></li>
                                                <li><a href="">Francais</a></li>
                                            </ul>	
                                        </div>							
                                    </div>
                                </div>
                            </li>
                            <li><a class="color6" href="">Top restaurant</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom-right">
                    <div class="search">	  
                        <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Search';
                                        }">
                        <input type="submit" value="Subscribe" id="submit" name="submit">
                        <div id="response"> </div>
                    </div>
                    <div class="tag-list">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
