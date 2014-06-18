<?php
function __autoload($name)
{
    require_once("core/$name.php");
}
