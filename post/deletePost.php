<?php
    include("../controll.php");
    $query = new AbstractQuery();
    $run = $query->deletePostById($_GET['id']);
    if($run){
        echo "<script>alert('Xóa thành công');
        window.location.href='../admin.php';
        </script>";
       
        }
    else echo "<script>alert('Xóa thất bại')</script>";
?>