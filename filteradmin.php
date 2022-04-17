<?php
$query = new AbstractQuery();
$checkCookie = $query->loginWithCookie();
if($checkCookie != null){
    while($row = $checkCookie->fetch_assoc()) {
        if($row['role']=="USER")
            header('Location: /zerotype/index.php');
    }
}
else
    header('Location: /zerotype/login.php');
?>