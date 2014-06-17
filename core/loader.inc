<?php
function __autoload($name)
{
    require_once("/var/www/public_html/uprototype/core/$name.php");
}
