<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="display.css">
    <title>Course Data Panorama</title>

</head>
<body>
    


<?php
    include("connect.php");
    
    // error_reporting(0); to not get errors
    session_start();
    $userprofile = $_SESSION['username'];
    if($userprofile == true){
        
    }
    else{
        header('location:index.php');
    }

    
    $query = "select * from users where course='Java'";
    // php mai querry directly execute nhi hota isliye 
    $data = mysqli_query($conn,$query);
    
    $total = mysqli_num_rows($data); //to check data hai ya nhi
    // echo $total;
    
    // $result = mysqli_fetch_assoc($data); //fetch data in form of array
    // echo $result;
    //yaha par table ke column ka naame thik se likhna hai
    // echo $result['fname'].' '.$result['lname'].' '.$result['email'].' '.$result['pass'];
    
    if($total > 0){
        ?>

<h1 align="center"><mark>Displaying all Records</mark></h1>
<div class="table">
<h2 align="center">Displaying all Records for Students enrolled in Course(Java)</h2>
<h2 align="center">Tutor-Miss Shivani Deopa</h2>
    

<table border='1' cellspacing="7" align="center">
    <tr>
        <th width="20%">First Name</th>
        <th width="20%">Last Name</th>
        <th width="20%">E Mail</th>
        <th width="20%">Course</th>
        
    </tr>
    
    <?php
        // echo "Table has Records";
        // $a = 1;
        while($result = mysqli_fetch_assoc($data)){
            // echo "Hello Cyber Warriors<br>";
            // $a++;
            echo "<tr>
            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['email']."</td>
            <td>".$result['course']."</td>
            </tr>";
        }
    }
    else{
        echo "No records Found";
    }
    ?>
</table>
</div>

<?php
$query = "select * from users where course='Cgt'";

    $data = mysqli_query($conn,$query);
    
    $total = mysqli_num_rows($data); 
  
    if($total > 0){

?>
<div class="table">
    <h2 align="center">Displaying all Records for Students enrolled in Course(Cgt)</h2>
    <h2 align="center">Tutor-Miss Pooja Khushwaha</h2>
    
    
    <table border='1' cellspacing="7" align="center">
        <tr>
            <th width="20%">First Name</th>
            <th width="20%">Last Name</th>
            <th width="20%">E Mail</th>
            <th width="20%">Course</th>
            
        </tr>
        
        <?php
        
        while($result = mysqli_fetch_assoc($data)){
           
            echo "<tr>
            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['email']."</td>
            <td>".$result['course']."</td>
            </tr>";
        }
    }
    else{
        echo "No records Found";
    }
    ?>
</table>
</div>

<?php
$query = "select * from users where course='Web-Programming'";
 
    $data = mysqli_query($conn,$query);
    
    $total = mysqli_num_rows($data); 

    
    if($total > 0){

?>
<div class="table">
    <h2 align="center">Displaying all Records for Students enrolled in Course(Web-Programming)</h2>
    <h2 align="center">Tutor-Miss Neelam Shelar</h2>
    
    
    <table border='1' cellspacing="7" align="center">
        <tr>
            <th width="20%">First Name</th>
            <th width="20%">Last Name</th>
            <th width="20%">E Mail</th>
            <th width="20%">Course</th>
            
        </tr>
        
        <?php
      
        while($result = mysqli_fetch_assoc($data)){
           
            echo "<tr>
            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['email']."</td>
            <td>".$result['course']."</td>
            </tr>";
        }
    }
    else{
        echo "No records Found";
    }
    ?>
</table>
</div>

</body>
</html>