<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Lucide</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Lucide " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
<style>
/* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

@media (min-width: 1281px) {
  
.loginlogo{
    max-width: 100%;

    
}
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
    .loginlogo{
    max-width: 100%;

    
}
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
  
    .loginlogo{
    max-width: 100%;
    }
  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

      .loginlogo{
    max-width: 100%;
      }
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  
    .loginlogo{
    max-width: 100%;
    }
  
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
  
    .loginlogo{
    max-width: 100%;
    }

  
}

input[type=text] {
  background-color: #f1f0f5;
  color: white;
}

input[type=password] {
  background-color: #f1f0f5;
  color: white;
}
    </style>

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?=base_url() . 'assets/admin/assets/'?>../assets/pages/img/login/bg1.jpg)" style="padding: 93px;"></div>
                </div>
                
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix" style="background-color:#3f3c44; text-align:center;">
            
                
<?php
if (!empty($errors)) {

    ?>
                 <div class="alert alert-danger display-show">
                    <button class="close" data-close="alert"></button><?=$errors?>
                    </div>
 <?php
} elseif ($this->session->flashdata('Error')) {
    ?>


                 <div class="alert alert-danger display-show">
                    <button class="close" data-close="alert"></button><?= $this->session->flashdata('Error')?>
                    </div>


    <?php
}
?>
                    <div class="login-content">

    <img class="loginlogo" src="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/img/login/metrocard.png" style="padding: 90px;"/>


                        <form action="<?=base_url('common/login/action')?>" class="login-form" method="post">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <?php echo validation_errors(); ?></h3>


<?php
if (!empty($errors)) {

    ?>
                 <div class="alert alert-danger display-show">
                    <button class="close" data-close="alert"></button><?=$errors?>
                    </div>
 <?php
} elseif ($this->session->flashdata('Error')) {
    ?>


                 <div class="alert alert-danger display-show">
                    <button class="close" data-close="alert"></button><?= $this->session->flashdata('Error')?>
                    </div>


    <?php
}
?>

</div>
</div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="MobileNo" required/> </div>
                                <div class="col-xs-6 logo">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1" /> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <!-- <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div> -->
                                    <button class="btn green" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3 class="font-green">Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                            </div>
                        </form> -->
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-12 bs-reset">


                              <div class="copyright"><p style="color: azure;"> 2019 © Developed By Lucid Technologies</p></div>  
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/respond.min.js"></script>
<script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/excanvas.min.js"></script> 
<script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>pages/scripts/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
            var Login = function () {
    var r = function () {
        $(".login-form").validate({
            errorElement: "span",
            errorClass: "help-block",
            focusInvalid: !1,
            rules: {
                username: {
                    required: !0
                },
                password: {
                    required: !0
                },
                remember: {
                    required: !1
                }
            },
            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },
            invalidHandler: function (r, e) {
                $(".alert-danger", $(".login-form")).show()
            },
            highlight: function (r) {
                $(r).closest(".form-group").addClass("has-error")
            },
            success: function (r) {
                r.closest(".form-group").removeClass("has-error"), r.remove()
            },
            errorPlacement: function (r, e) {
                r.insertAfter(e.closest(".input-icon"))
            },
            submitHandler: function (r) {
                r.submit()
            }
        }), $(".login-form input").keypress(function (r) {
            if (13 == r.which) return $(".login-form").validate().form() && $(".login-form").submit(), !1
        }), $(".forget-form input").keypress(function (r) {
            if (13 == r.which) return $(".forget-form").validate().form() && $(".forget-form").submit(), !1
        }), $("#forget-password").click(function () {
            $(".login-form").hide(), $(".forget-form").show()
        }), $("#back-btn").click(function () {
            $(".login-form").show(), $(".forget-form").hide()
        })
    };
    
    return {
        init: function () {
            r(), $(".login-bg").backstretch(["<?=base_url('assets/admin/assets/pages/img/login/bg1.jpg')?>", "<?=base_url('assets/admin/assets/pages/img/login/bg2.jpg')?>", "<?=base_url('assets/admin/assets/pages/img/login/bg3.jpg')?>"], {
                fade: 1e3,
                duration: 8e3
            }), $(".forget-form").hide()
        }
    }
}();
jQuery(document).ready(function () {
    Login.init()
});




        </script>
    <!-- Google Code for Universal Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- End -->

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W276BJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W276BJ');</script>
<!-- End -->
</body>


</html>