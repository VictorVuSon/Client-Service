<?php
require_once 'web/inc/header.php';
?>
</div>
<script>
    function loadLogin() {
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url: 'http://localhost/userYii2/api/web/index.php/site/login',
            type: 'POST',
            cache: false,
            data: {username: username, password: password},
            success: function (response) {
                var userLogin = response.data.user;
                if(typeof userLogin === "undefined"){
                    $('#err').html("<h4 style = 'color:red'>User or password invalid</h4>");
                } else {
                    sessionStorage.setItem('user', JSON.stringify(userLogin));
                    var obj = JSON.parse(sessionStorage.user);
                    window.location.replace("http://localhost/Client-Service/");
                }
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
        return false;
    }
</script>
<div class="login">
    <div class="wrap">
        <div class="col_1_of_login span_1_of_login">
            <h4 class="title">New Customers</h4>
            <p>  Đăng kí đẻ trở thành thành viên của chúng tôi</p>
            <div class="button1">
                <a href="register.php"><input type="submit" name="Submit" value="Create an Account"></a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col_1_of_login span_1_of_login">
            <div class="login-title">
                <h4 class="title">Login your account</h4>
                <div id="loginbox" class="loginbox">
                    <div id="result"></div>
                        <fieldset class="input">
                            <div id ="err"></div>
                            <p id="login-form-username">
                                <label for="modlgn_username">Username</label>
                                <input id="username" type="text" name="username" class="inputbox" size="18" autocomplete="off">
                            </p>
                            <p id="login-form-password">
                                <label for="modlgn_passwd">Password</label>
                                <input id="password" type="password" name="password" class="inputbox" size="18" autocomplete="off">
                            </p>
                            <div class="remember">
                                <p id="login-form-remember">
                                    <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
                                </p>
                                <input type="button" name="Submit" onclick ='loadLogin()' class="button" value="Login"><div class="clear"></div>
                            </div>
                        </fieldset>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
require_once 'web/inc/footer.php';
?>