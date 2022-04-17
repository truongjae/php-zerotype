<?php      
class UploadFile{
    public function upload($choice){
        $file_type = $_FILES["file"]["type"];
        $file_size = $_FILES["file"]["size"];
        if(!($file_type == "image/jpeg") && !($file_type == "image/png")){
            echo "<script>alert('format file exception')</script>"; 
            return null;
        }
        if(!($file_size <= 2097152)){
            echo "<script>alert('file size must <= 2MB')</script>";   
            return null;
        }
        global $query;
        if($choice=="update")
            $file = move_uploaded_file($_FILES["file"]["tmp_name"],"../image/".$_FILES["file"]["name"]);
        else
            $file = move_uploaded_file($_FILES["file"]["tmp_name"],"image/".$_FILES["file"]["name"]);
        return "image/".$_FILES["file"]["name"];
    }
}
?>