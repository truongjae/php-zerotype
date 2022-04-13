<?php
    include("../controll.php");
    $query = new AbstractQuery();
    $run = $query->publicPostById($_GET['id']);
    if($run){
        echo "<script>alert('Duyệt bài thành công');
        window.location.href='/zerotype/admin.php';
        </script>";
    }
    else echo "<script>alert('Duyệt bài thất bại')</script>";
?>