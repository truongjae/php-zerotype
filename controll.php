<?php
include('connect.php');
class AbstractQuery{
    public function INSERT($name,$email,$subject,$note){
        global $conn;
        $sql="insert into tb_contact(name,email,subject,note) values ('$name','$email','$subject','$note')";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function checkExist($field,$value){
        global $conn;
        $sql = "select * from user where $field='$value'";
        $run = mysqli_query($conn,$sql);
        if($run->num_rows > 0){
            echo '<script>alert("'.$field.' đã tồn tại")</script>';
            return false;
        }
        return true;
    }
    public function register($email,$username,$password,$fullname,$gender,$favorite,$avatar){
        global $conn;
        if($this->checkExist("email",$email) && $this->checkExist("username",$username)){
            $sql="insert into user(email,username,password,fullname,gender,favorite,avatar,role) values ('$email','$username','".md5($password)."','$fullname','$gender','$favorite','$avatar','USER')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        return null;
        
    }
    public function login($username,$password){
        global $conn;
        $sql="select * from user where username = '$username' and password = '".md5($password)."'";
        $run = mysqli_query($conn,$sql);
        if($run->num_rows > 0){
            while($row = $run->fetch_assoc()) {
                setcookie("username",$row['username'],time()+3600);
                setcookie("password",$row['password'],time()+3600);
                break;
            }
            return true;
        }
        return false;
    }
    public function loginGetValue($username,$password){
        global $conn;
        $sql="select * from user where username = '$username' and password = '$password'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function loginWithCookie(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {	
            $username= $_COOKIE['username'];
            $password= $_COOKIE['password'];
            $run = $this->loginGetValue($username,$password);
            return $run->num_rows > 0 ? $run : null;
        }
        return null;
    }
    public function updateAvatar($image,$username,$password){
        global $conn;
        $sql="update user set avatar = '$image' where username='$username' and password='$password'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getAllNews(){
        global $conn;
        $sql="select * from news";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getNewsById($id){
        global $conn;
        $sql="select * from news where id='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getFullNameFromUsername($username){
        global $conn;
        $sql="select fullname from user where username='$username'";
        $run = mysqli_query($conn,$sql);
        while($row = $run->fetch_assoc()) {
            return $row['fullname'];
        }
        return null;
    }
    public function getNewsByTop3(){
        global $conn;
        $sql="select * from news order by date desc limit 0,3";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

}
?>
