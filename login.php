<?php
    
    require 'functions.php';
    
    
    session_start();
    $error='';
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username ou Password vazio(s)";
        echo "$error";
    }
    else{
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $connection = dbconnect();
        $username = stripslashes($username);
        $password = stripslashes($password);
       
        $username = mysqli_real_escape_string($connection, $username);
      
        $password = mysqli_real_escape_string($connection, $password);
        
        //$db = mysqli_select_db($connection, "webitclo_G212");
        
        $password = sha1($password);
        
        $query_sql = "SELECT * FROM users WHERE user_pw='$password' AND user_name='$username'";
        
        
        $query = mysqli_query($connection, $query_sql);
        $row = mysqli_fetch_assoc($query);
        $user_rank = $row['user_rank'];
        $user_id = $row['id_user'];
        $rows =  mysqli_num_rows($query);
        
        
        if ($rows == 1) {
            $_SESSION['login_user']=$username;
            $_SESSION['user_rank']=$user_rank;
            $_SESSION['user_id']=$user_id;
            header("location: menu.php");
        } 
        else {
            $error = "Username or Password is invalid";
            echo "$error";
        }
            mysqli_close($connection);
        
    }
    }
?>