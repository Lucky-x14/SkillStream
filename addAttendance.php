<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addAttendance.css">
    <title>Smart Attendance System</title>
</head>

<body>


<div class="table1">
<table border="1" cellspacing="0">
    <form action="#" method="POST"> 
        <tr>
            <th>Student Name</th>
            <th>P</th>
            <th>A</th>
            <th>L</th>
            <th>H</th>
        </tr>

        <?php
            require_once("connect.php");
            $fetchingStudents = mysqli_query($conn,"SELECT * FROM users")or die(mysqli_error($conn));
            while($data =mysqli_fetch_assoc($fetchingStudents)){
                $student_name = $data["fname"];
                $student_id = $data["id"];

        ?>
                <tr>
                    <td> <?php  echo $student_name ?> </td>
                    <td> <input type="checkbox" name="studentPresent[]" value="<?php  echo $student_id ?>"></td>
                    <td> <input type="checkbox" name="studentAbsent[]" value="<?php  echo $student_id ?>"></td>
                    <td> <input type="checkbox" name="studentLeave[]" value="<?php  echo $student_id ?>"></td>
                    <td> <input type="checkbox" name="studentHoliday[]" value="<?php  echo $student_id ?>"></td>
                </tr>
        <?php
            }
        ?>

        <tr>
            <td>Select Date (Optional)</td>
            <td colspan="4"><input type="date" name="selected_date" ></td>
        </tr>
        <tr>
            <th colspan="5"><input type="submit" name="addAttendanceBTN"></th>
        </tr>
    </form>
</table>
</div>


</body>
</html>

<?php
    if(isset($_POST['addAttendanceBTN'])){
        
        date_default_timezone_set("Asia/Calcutta");
        //Date Logic Start
        if($_POST['selected_date'] == NULL){
            $selected_date = date("Y-m-d");
        }
        else{
            $selected_date = $_POST["selected_date"];
        }
        //Date Logic End
        
        $attendance_month = date("M",strtotime($selected_date));
        $attendance_year = date("Y",strtotime($selected_date)); 

        if(isset($_POST['studentPresent'])){
            $studentPresent = $_POST['studentPresent'];
            $attendance = "P";

            foreach($studentPresent as $atd){
                
                mysqli_query($conn,"INSERT INTO attendance(student_id,curr_date,attendance_month,attendance_year,attendance) VALUES ('". $atd ."','". $selected_date ."','". $attendance_month ."','". $attendance_year ."','". $attendance ."')") or die(mysqli_error($conn));
            }
        }

        if(isset($_POST['studentAbsent'])){
            $studentAbsent = $_POST['studentAbsent'];
            $attendance = "A";

            foreach($studentAbsent as $atd){
                
                mysqli_query($conn,"INSERT INTO attendance(student_id,curr_date,attendance_month,attendance_year,attendance) VALUES ('". $atd ."','". $selected_date ."','". $attendance_month ."','". $attendance_year ."','". $attendance ."')") or die(mysqli_error($conn));
            }
        }   

        if(isset($_POST['studentLeave'])){
            $studentLeave = $_POST['studentLeave'];
            $attendance = "L";

            foreach($studentLeave as $atd){
                
                mysqli_query($conn,"INSERT INTO attendance(student_id,curr_date,attendance_month,attendance_year,attendance) VALUES ('". $atd ."','". $selected_date ."','". $attendance_month ."','". $attendance_year ."','". $attendance ."')") or die(mysqli_error($conn));
            }
        }
             
        if(isset($_POST['studentHoliday'])){
            $studentHoliday = $_POST['studentHoliday'];
            $attendance = "H";

            foreach($studentHoliday as $atd){
                
                mysqli_query($conn,"INSERT INTO attendance(student_id,curr_date,attendance_month,attendance_year,attendance) VALUES ('". $atd ."','". $selected_date ."','". $attendance_month ."','". $attendance_year ."','". $attendance ."')") or die(mysqli_error($conn));
            }
        } 
        echo "Attendance Added SuccessFully !!!!";
    }
?>