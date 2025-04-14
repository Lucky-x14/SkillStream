<?php

    session_start();
    $userprofile = $_SESSION['username'];
    if($userprofile == true){

    }
    else{
        header('location:index.php');
    }

    require_once("attendance.php");
    // echo "<br><br><hr><br><br>";
    // require_once("addingStudents.php");
    require_once("addAttendance.php");

?>