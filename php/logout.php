<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline Now";
            // once user is logged out then we'll update this status to offline and in the login form 
            // we'll again update the status to active now if user logged in  successfully
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: usings.php");
        }
    }else{
        header("location: ../login.php");
    }
?>