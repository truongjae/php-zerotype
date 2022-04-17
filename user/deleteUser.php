<?php
    include("../controll.php");
    $query = new AbstractQuery();
    $run = $query->deleteUserById($_GET['id']);
    if($run){
        echo "<script>alert('Xóa thành công');
        window.location.href='/zerotype/user/user.php';
        </script>";
    }
    else echo "<script>alert('Xóa thất bại')</script>";
?>