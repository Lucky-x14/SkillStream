<?php

    require_once('connect.php');

    $firstDayOfMonth = date("1-m-Y"); //will display current month and year  1-09-2024
    // $totalDaysInMonth = date("t"); //wi;; display days in current month
    $totalDaysInMonth = date("t",strtotime($firstDayOfMonth)); //wi;; display days in current month

    // fetching students
    $fetchingStudents = mysqli_query($conn,"SELECT * FROM users")or die(mysqli_error($conn));
    $totalNumberOfStudents = mysqli_num_rows($fetchingStudents);

    $studentsNameArray = array();
    $studentsIDsArray = array();

    $counter = 0;
    while($students = mysqli_fetch_assoc($fetchingStudents)){
        $studentsNameArray[] = $students["fname"];
        $studentsIDsArray[] = $students["id"];
    }

    // print_r($studentsNameArray);
    //  print_r($studentsIDsArray);


?>


<div class="table">
<h1>SMART ATTENDANCE SYSTEM</h1>
<h3>STUDENTS ATTENDANCE OF MONTH : <u><font color="red"> <?php echo strtoupper(date("F",strtotime($firstDayOfMonth))); ?> </u></h3>

<table border="1" cellspacing="0">
    <?php
        for($i=1; $i <= $totalNumberOfStudents +2; $i++){
      
            if($i == 1){
                
                echo"<tr>";
                echo "<td rowspan='3'>Names</td>";

                for($j=1; $j<=$totalDaysInMonth; $j++){
                    echo "<td> $j </td>";
                }

                echo"<tr>";
            }

            else if($i == 2){

                echo"<tr>";
                for($j=0; $j < $totalDaysInMonth; $j++){
                    echo "<td>". date("D",strtotime("+$j days" , strtotime($firstDayOfMonth))) ."</td>"; //d-m-Y ke jagah D days ke liye
                }
                echo"<tr>";
            }

            else{

                echo"<tr>";
                echo "<td>".$studentsNameArray[$counter]."</td>";
                for($j=1; $j <= $totalDaysInMonth; $j++){
                    
                    $dateOfAttendance = date("Y-m-$j");
                    $fetchingStudentsAttendance = mysqli_query($conn,"SELECT attendance FROM attendance WHERE student_id='". $studentsIDsArray[$counter] ."' AND curr_date='". $dateOfAttendance ."'") or die(mysqli_error($conn));

                    $isAttendanceAdded = mysqli_num_rows($fetchingStudentsAttendance);
                    if($isAttendanceAdded > 0){

                        $studentsAttendance = mysqli_fetch_assoc($fetchingStudentsAttendance);
                        if($studentsAttendance['attendance'] == "P"){
                            $color = "green";
                        }
                        else if($studentsAttendance['attendance'] == "A"){
                            $color = "red";
                        }
                        else if($studentsAttendance['attendance'] == "L"){
                            $color = "orange";
                        }
                        else if($studentsAttendance['attendance'] == "H"){
                            $color = "blue";
                        }
                        

                        echo "<td style='background-color: $color; color:white'>". $studentsAttendance['attendance'] ."</td>"; 

                    }
                    else{
                        
                        echo "<td></td>"; 
                    }
                }
                echo"<tr>";
                $counter++;
            }
        }
    ?>
</table>
</div>
