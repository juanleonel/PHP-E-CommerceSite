<?php
session_start();
if (isset($_SESSION['data']))
{
    unset($_SESSION['data']);
    session_destroy();
}
header('Location: itemlist.php');