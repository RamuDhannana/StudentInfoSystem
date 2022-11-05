<?php
echo "<!DOCTYPE html>";
      session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
                  echo "<html lang='en' dir='ltr'>";
                  echo "<head>";
                  echo "<meta charset='UTF-8'>";
                  echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                  echo "<link rel='stylesheet' href='style3.css'>";
                  echo "</head>";
                  echo "<body background='images/alietbg.jpg' style='
                   width: 100%;
                   height: 50vh;
                   background-size: cover;
                   background-position: center;
                  '>";
                  echo "<nav>";
                  echo "<div class='menu'>";
                  echo "<div >";
                  echo "<img src='images/aliet.jfif' style='width:70px;height: 70px; border-radius: 70% 70% 70% 70%;margin-left: -50px'>";
                  echo "</div>";
                  echo "<div class='logo' style='margin-left:-190px '>";
                  echo "<a href='#'>Student Info System</a>";
                  echo "</div>";
                  echo "<ul>";
                  echo "<li><a href='teachersearch.php'>Search Student</a></li>";
                  echo "<li><a href='aboutus.html'>About</a></li>";
                  echo "<li><a href='dailyattendance.php'>Take Today Attendance</a></li>";
                  echo "<li><a href='logout.php'>Logout</a></li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "</nav>";
                  echo "<div class='col-md-4'>";
                
                  echo "</div>";
                  echo "<div class='center'>";
                  echo "<div class='title'>ANDHRA LOYOLA INSTITUTE OF ENGINEERING AND TECHNOLOGY</div>";
                  echo "<div class='btns'>";
                  echo "<button><a href='aboutus.html' style='text-decoration:none'>Learn More</a></button>";
                  echo "</div>";
                  echo "</div>";
                  echo "</body>";
                  echo "</html>";
?>