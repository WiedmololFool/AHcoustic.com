<?php
$mysql = new mysqli("localhost", "root", '', "TabsDb");
$value1 = 1;
if ($mysql->connect_error)
{
    echo('Error number: ' . $mysql->connect_errno . '<br>');
    die('Error: ' . $mysql->connect_error);
}
