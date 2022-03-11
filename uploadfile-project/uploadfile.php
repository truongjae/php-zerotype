<!DOCTYPE html>
<?php
include("controll.php");
$excute = new AbstractQuery();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="">
         <input type="file" name="files">
         <input type="submit" value = "upload" name="submit">
    </form>
    <?php
        if(isset($_POST["submit"])){
            $file_type = $_FILES["files"]["type"];
            $file_size = $_FILES["files"]["size"];

            $check_file = false;

            if($file_type == "image/jpeg" || $file_type == "image/png")
                $check_file = true;
            else{
                echo "format file type exception <br>";
                $check_file = false;
            }
                
            if($file_size <= 2097152)
                $check_file = true;
            else{
                echo "file size must <= 2MB <br>";
                $check_file = false;
            }
            
            if($check_file){
                $file = move_uploaded_file($_FILES["files"]["tmp_name"],"image/".$_FILES["files"]["name"]);
                $run=$excute->insertImage($_FILES["files"]["name"]);
                if($run) echo "upload success";
                else echo "upload fail";

                echo "<img src='image/".$_FILES["files"]["name"]."' width = 600>";
            }
            
        }
        
    ?>
</body>
</html>
