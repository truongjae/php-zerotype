<?php
include("controll.php");
$query = new AbstractQuery();
$checkCookie = $query->loginWithCookie();
if($checkCookie != null)
    echo '<li>
        <a href="logoutcookie.php">Logout (<u><i>'.$checkCookie.'</i></u>)</a>
        </li>
        <style>
        #register,#login{
            display: none;
        }
        </style>';
else
    header('Location: login.php');

?>