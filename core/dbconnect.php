<?php
class dbconnect
{
    function __construct()
    {
        $link=mysql_connect("localhost","root","qwerty");
        mysql_select_db("uprototype",$link);
    }
}
