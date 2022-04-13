<?php
include('connect.php');
include('sendemail.php');
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
            $sendMail = new SendEMail();
            $sendMail->send($username,$email,"Đăng ký tài khoản thành công","Tài khoản của mày đã được đăng ký thành công");
            return $run;
        }
        return null;
    }
    public function updateProfile($fullname,$email,$newPassword,$gender,$favorite,$username,$oldPassword){
        global $conn;
        $checkOldEmail = $this->loginGetValue($username,$oldPassword);
        $result = $checkOldEmail->fetch_assoc();
        if($result['email'] != $email)
            if(!$this->checkExist("email",$email)) return null;

        $sql="update user set email = '$email', fullname='$fullname', password='".md5($newPassword)."', gender='$gender', favorite='$favorite' where username='$username' and password='$oldPassword';";
        $run = mysqli_query($conn,$sql);
        if($result['email'] != $email){
            $sendMail = new SendEMail();
            $sendMail->send($username,$email,"Cập nhật email thành công","Tài khoản của mày đã được cập nhật email thành công");
        }
        return $run;
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
        $sql="select * from news where status=1";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getAllNewsByPageAble($index,$offset){
        global $conn;
        $sql="select * from news where status=1 limit $index,$offset";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getNewsById($id){
        global $conn;
        $sql="select n.*,u.fullname from news n, user u where n.author=u.id and n.id='$id' and n.status=1";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getMyNewsById($id){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        $sql="select n.*,u.fullname from news n, user u where n.author=u.id and n.id='$id' and n.author=".$result['id'];
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getNewsByAuthor(){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        $sql="select n.*,u.fullname from news n, user u where n.author=u.id and n.author=".$result['id'];
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
        $sql="select * from news where status=1 order by date desc limit 0,3";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function deletePostById($id){
        global $conn;
        $sql="delete from news where id = $id";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function updatePostById($id,$title,$date,$short_content,$long_content){
        global $conn;
        $sql="update news set title='$title', date='$date', short_content='$short_content', long_content='$long_content' where id = $id";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

    public function publicPostById($id){
        global $conn;
        $sql="update news set status=1 where id = $id";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getAllPostPrivate(){
        global $conn;
        $sql="select * from news where status=0";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

    public function addPost($title,$date,$short_content,$long_content){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        if($result['role'] == 'ADMIN') $status = 1;
        else $status = 0;
        $sql= "insert into news(author,title,date,short_content,long_content,status) values(".$result['id'].",'$title','$date','$short_content','$long_content',$status)";
        $run = mysqli_query($conn,$sql);
        return $run;
    }

    /// comment
    public function addComment($news,$content){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        $sql= "insert into comment(author,news,content) values(".$result['id'].",$news,'$content')";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function getAllComment($news){
        global $conn;
        $sql= "select c.*, u.fullname from comment c, user u where c.author=u.id and c.news = $news";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function updateComment($id,$news,$content){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        $sql= "update comment set content='$content' where id=$id and news=$news and author =".$result['id'];
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function deleteComment($id,$news){
        global $conn;
        $infoAuthor = $this->loginGetValue($_COOKIE['username'],$_COOKIE['password']);
        $result = $infoAuthor->fetch_assoc();
        $sql= "delete from comment where id=$id and news=$news and author =".$result['id'];
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}
?>
