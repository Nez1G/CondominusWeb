<?php

    require 'functions.php';

    $connection = dbconnect();

    @session_start();

    $user_check=$_SESSION['login_user'];

    $query_sql = "SELECT * FROM users WHERE user_name='$user_check'";


    $ses_sql=mysqli_query( $connection, $query_sql);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['user_nicename'];
    $user_rank = $row['user_rank'];
    //$user_id=$row['user_id'];
    $user_id=$_SESSION['user_id'];

    if(!isset($login_session)){
        mysqli_close($connection);
        //header('Location: index.php');
    }
