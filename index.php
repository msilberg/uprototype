<!-- Initial release at 2011-12-22 -->
<?php
require_once("core/loader.inc");
$obj = new data();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>U Naviagator Prototype by Uniqoom</title>
    <meta name="author" content="Uniqoom" />
    <?php $obj->style_otp() ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php $obj->js_otp() ?>
    ?>

</head>
<body>
<center>
    <?php $obj->body_otp() ?>
    <div class="all-rights">
        U Prototype - a Free Software <?php echo date('Y') ?>
    </div>
</center>
</body>
</html>