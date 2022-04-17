<?php
    include("../controll.php");
    $query = new AbstractQuery();
    $run = $query->deleteCategory($_GET['id']);
    if($run){
        echo "<script>alert('Xóa thành công');
        window.location.href='/zerotype/category/category.php';
        </script>";
    }
    else echo "<script>alert('Xóa thất bại')</script>";
?>