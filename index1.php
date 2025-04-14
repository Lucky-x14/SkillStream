<?php

$host="localhost";
$user="root";
$pass="";
$db="skillstream";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}

session_start();
$userprofile = $_SESSION['username'];
if($userprofile == true){

}
else{
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>SkillStream - Transforming Online Education</title>
</head>
<body>
    <nav class="navbar background">
        <ul class="nav-list">
            <div class="logo"><img src="img/img.jpg" alt="Logo"></div>
            <li><a href="#home">Home</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="rightNav">
            <!-- <input class="search" type="text" name="search" id="search"> -->
            <a href="logout.php"><input type="submit" value="Log Out" class="btn btn-sm"></a>
        </div>
    </nav>
<!-- ****************************************************************** -->
    <section class="background firstSection" id="home">
        <div class="box-main">

            <div class="firstHalf">
                <p class="text-big">SkillStream - Elevate Your Skills and Ignite Your Future.</p>
                <p class="text-small">SkillStream offers interactive e-learning to help you acquire new skills and advance your career with flexible, expert-led content.</p>

                <div class="buttons">
                    <button class="btn">Subscribe</button>
                    <button class="btn">Watch Video</button>
                </div>
            </div>

            <div class="secondHalf">
                <img src="img/img.jpg" alt="Logo">
            </div>
        </div>
    </section>

<!-- ***************************************************************** -->
<h1 id="courses" class="heading-course" style="text-align: center;">Notes Nexus</h1>
<div class="main-course">
    <div class="sub-course">
        <img src="img/web.png" alt="" class="img-course">
        <a href="pdf/web_website.pdf" target="_nandani"><h3 class="h3-course">Web Development</h3></a>
    </div>
    <div class="sub-course">            
        <img src="img/java1.png" alt="" class="img-course">
        <a href="pdf/java_website.pdf" target="_lokesh"><h3 class="h3-course">Java</h3></a>
    </div>
    <div class="sub-course">          
        <img src="img/cgt1.png" alt="" class="img-course">
        <a href="pdf/cgt_website.pdf" target="_pooja"><h3 class="h3-course">Combinatorics and Graph Theory</h3></a>
    </div>
</div> 
<!-- ***************************************************************** -->

    <section class="section" id="services">
        <div class="paras">
        <p class="sectionTag text-big">
            <a href="video.php" target="_blank">Virtual Summit</a>
        </p>
        <p class="sectionSubTag text-small">
        A Virtual Summit on an e-learning website is an online event that brings together experts, educators, and learners to explore and discuss key topics in education and technology. Through live video sessions, interactive workshops, and networking opportunities, participants can engage in insightful discussions, gain valuable knowledge, and collaborate from anywhere in the world. This format provides an accessible and dynamic way to advance learning and professional development in the digital age.
        </p>
    </div>
        
        <div class="thumbnail">
            <img src="img/meeting.png" alt="Logo" class="imgFluid">
        </div>
    </section>

    <section class="section section-Left">
        <div class="paras">
        <p class="sectionTag text-big">
            <a href="display.php" target="_blank">Course Data Panorama</a>
        </p>
        <p class="sectionSubTag text-small">
        Course Data Panorama provides an expansive and detailed view of all course-related information in a well-organized table format. This feature allows users to easily access, compare, and analyze data from various courses, offering a comprehensive overview that simplifies course management and enhances the learning experience on the e-learning platform. It transforms complex data into clear, actionable insights, making it easier to track progress, evaluate performance, and make informed decisions.
        </p>
    </div>
        
        <div class="thumbnail">
            <img src="img/data1.png" alt="Logo" class="imgFluid">
        </div>
    </section>

    <section class="section">
        <div class="paras">
        <p class="sectionTag text-big">
            <a href="attendanceMain.php" target="_blank">Smart Attendance System</a>
        </p>
        <p class="sectionSubTag text-small">
        Smart Attendance Management System is a cutting-edge tool designed to streamline attendance tracking. It offers a user-friendly interface where all attendance data is neatly organized in a table format. This system automates the recording process, updating attendance records in real time to minimize manual input and errors. It provides easy access to detailed reports and analytics, allowing you to quickly identify trends and patterns, it enhances accuracy and efficiency in managing attendance, making it simpler to keep track of who is present,absent,late or holiday. 
        </p>
    </div>
        
        <div class="thumbnail">
            <img src="img/attendance.png" alt="Logo" class="imgFluid">
        </div>
    </section>

    <!-- ************************************************************** -->
    <section class="contact">
        <form action="#" method="POST">
            <h2 class="text-center">Contact Us</h2>
            <div class="form">
                
                <input class="form-input"  type="text" name="name" id="name" placeholder="Enter Your Name" required>
                <input class="form-input" type="text" name="phone" id="phone" placeholder="Enter Your Enter Your Phone" required>
                <input class="form-input" type="text" name="email" id="email" placeholder="Enter Your Email" required>
                
                <textarea class="form-input" name="text" id="text" placeholder="Ellaborate Your Concern" cols="30" rows="6"></textarea>
                
                <input type="submit" value="Submit" class="btn btn-dark" name="submit">
            </div>
        </form>
    </section> 
<!-- ****************************************************************  -->

    <footer class="background" id="contact">
        <p class="text-footer">
            Copyright &copy; 2027 www.'iEducate.com - All rights reserved
        </p>
    </footer>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $concern=$_POST['text'];

    // if($firstName != "" && $lastName != "" && $email != "" && $password != ""){

      
      $insertQuery="INSERT INTO contact(name,phone,email,concern) VALUES ('$name','$phone','$email','$concern')";
      $data = mysqli_query($conn,$insertQuery);
      
      if($data){
        echo "DATA inserted";
      }
      else{
        echo "Failed";
      }
    }
    // else{
    //   echo "<script>alert('Please Enter the Data First')</script>";
    // }   
?>