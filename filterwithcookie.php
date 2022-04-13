<?php
include("controll.php");
$query = new AbstractQuery();
$checkCookie = $query->loginWithCookie();
if($checkCookie != null){
    while($row = $checkCookie->fetch_assoc()) {
        if($row['role']=="ADMIN"){
            echo '<li>
            <a href="/zerotype/admin.php">Admin Page</a>
            </li>';
        }
        
        echo '<li>
        <a href="/zerotype/logoutcookie.php">Logout (<u><i>'.$row['username'].'</i></u>)</a>
        </li>
        <style>
        #register,#login{
            display: none;
        }
        </style>';
        break;
    }
}
    
else
    header('Location: login.php');
?>