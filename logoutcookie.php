<?php
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
    setcookie('username','',time()-86400);
    setcookie('password','',time()-86400);
    header('Location: login.php');
}
?>
