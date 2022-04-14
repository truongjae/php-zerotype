<?php
    include("../controll.php");
    $query = new AbstractQuery();
    $run = $query->deleteComment($_GET['id'],$_GET['news']);
    if($run)
    echo "<script>window.location.href='../post.php?id=".$_GET['news']."';</script>";
?>