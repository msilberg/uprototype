<?php
require_once("/var/www/public_html/uprototype/core/loader.inc");
$obj=new data();
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
    <!-- Date: 2011-12-22 -->
</head>
<body>
<center>
    <?php $obj->body_otp() ?>
    <div class="all-rights">
        All rights reserved. Uniqoom Ltd. 2010-<?php echo date('Y') ?>
    </div>
</center>
</body>
</html>