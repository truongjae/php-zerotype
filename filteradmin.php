<?php
$query = new AbstractQuery();
$checkCookie = $query->loginWithCookie();
if($checkCookie != null){
    while($row = $checkCookie->fetch_assoc()) {
        if($row['role']=="USER")
            header('Location: index.php');
    }
}
else
    header('Location: login.php');
?>