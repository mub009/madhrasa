
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
        <title>Metronic Admin Theme #1 | User Lock Screen 1</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/css/lock.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="">
        <div class="page-lock">
            <div class="page-logo">
                <a class="brand" href="index.html">
                    <img src="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/img/logo-big.png" alt="logo" /> </a>
            </div>
            <div class="page-body">
                <div class="lock-head"> Locked </div>
                <div class="lock-body">
                    <div class="lock-cont">
                        <div class="lock-item">
                            <div class="pull-left lock-avatar-block">
                                <img src="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/media/profile/photo3.jpg" class="lock-avatar"> </div>
                        </div>
                        <div class="lock-item lock-item-full">
                            <form class="lock-form pull-left" action="index.html" method="post">
                                <h4>Amanda Smith</h4>
                                <div class="form-group">
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn red uppercase">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="lock-bottom">
                    <a href="">Not Amanda Smith?</a>
                </div>
            </div>
            <div class="page-footer-custom"> 2014 &copy; Metronic. Admin Dashboard Template. </div>
        </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url() . 'assets/admin/assets/'?>../assets/pages/scripts/lock.min.js" type="text/javascript"></script>
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