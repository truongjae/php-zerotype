<?php
include('connect.php');
class AbstractQuery{
    public function INSERT($name,$email,$subject,$note){
        global $conn;
        $sql="insert into tb_contact(name,email,subject,note) values ('$name','$email','$subject','$note')";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function REGISTER($email,$username,$password){
        global $conn;
        $sql="insert into user(email,username,password) values ('$email','$username','$password')";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function LOGIN($username,$password){
        global $conn;
        $sql="select username,password from user where username = '$username' and password = '$password'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function loginWithCookie(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
            $username= $_COOKIE['username'];
            $password= $_COOKIE['password'];
            $excute = new AbstractQuery();
            $run = $excute->LOGIN($username,$password);
            return $run->num_rows > 0 ? $username : null;
        }
        return null;
    }
    public function insertImage($image){
        global $conn;
        // $sql="update user set avatar = $image where id=$id";
        $sql = "insert into user(avatar) values('$image')";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}
?>
