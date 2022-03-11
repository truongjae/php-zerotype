<?php
include('connect.php');
class AbstractQuery{
    public function register($email,$username,$password,$fullname,$gender,$favorite,$avatar){
        global $conn;
        $checkUsernameAndEmail = true;
        $check = "select * from user where username='$username'";
        $run = mysqli_query($conn,$check);
        if($run->num_rows > 0){
            $checkUsernameAndEmail = false;
            echo '<script>alert("Username đã tồn tại")</script>';
        }
        $check = "select * from user where email='$email'";
        $run = mysqli_query($conn,$check);
        if($run->num_rows > 0){
            $checkUsernameAndEmail = false;
            echo '<script>alert("Email đã tồn tại")</script>';
        }
        if($checkUsernameAndEmail){
            $sql="insert into user(email,username,password,fullname,gender,favorite,avatar) values ('$email','$username','$password','$fullname','$gender','$favorite','$avatar')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        return null;
        
    }
    public function login($username,$password){
        global $conn;
        $sql="select * from user where username = '$username' and password = '$password'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

    public function loginWithCookie(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
            $username= $_COOKIE['username'];
            $password= $_COOKIE['password'];
            $run = $this->login($username,$password);
            return $run->num_rows > 0 ? $username : null;
        }
        return null;
    }
    public function updateAvatar($image,$username){
        global $conn;
        $sql="update user set avatar = '$image' where username='$username'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    
    public function getAvatar($username){
        global $conn;
        $sql="select avatar from user where username = '$username'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}
?>
