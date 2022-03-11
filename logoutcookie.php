<?php
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
    setcookie('username','',time()-3600);
    setcookie('password','',time()-3600);
    header('Location: login.php');
}
?>
