<?php
session_start();
if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
else
{
                   
	$stu_id=$_SESSION["stu_id"];
  $sq="select external from student_marks where student_id='$stu_id' and  external='Fail' or 'fail' or 'f' or 'F'";
  $res=$conn->query($sq);
  $n=$res->num_rows;
	$sql="select * from student_personal where student_id='$stu_id'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	 {
      while($row = $result->fetch_assoc()) 
      {
      	echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>student</title>";
        echo "</head>";
        echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>";
        echo "<link rel='stylesheet' type='text/css' href='display.css'>";
        echo "<body>";
        echo "<div class='student-profile py-4'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-4'>";
        echo "<div class='card shadow-sm'>";
        echo " <div class='card-header bg-transparent text-center'>";
         echo "<img class='profile_img' src='images/aliet.jfif' alt='student dp'>";
          echo "  <h3>".$row['student_name']."</h3>";
          echo "</div>";
          echo "<div class='card-body'>";
           echo " <p class='mb-0'><strong class='pr-1'>Student ID:</strong>".$row['student_id']."</p>";
            echo "<p class='mb-0'><strong class='pr-1'>Branch:</strong>".$row['Branch']."</p>";
            echo "<p class='mb-0'><strong class='pr-1'>Mentor Name:</strong>".$row['mentor']."</p>";
            echo "<p class='mb-0'><strong class='pr-1'>Active Backlogs:</strong>".$n."</p>";
          echo "</div>";
         echo "</div>";
       echo "</div>";
       echo "<div class='col-lg-8'>";
        echo "<div class='card shadow-sm'>";
         echo " <div class='card-header bg-transparent border-0'>";
         echo "  <h3 class='mb-0'><i class='far fa-clone pr-1'></i>General Information</h3>";
         echo " </div>";
         echo " <div class='card-body pt-0'>";
           echo " <table class='table table-bordered'>";
             echo "<tr>";
              echo "  <th width='30%''>RollNo</th>";
               echo " <td width='2%''>:</td>";
                echo "<td>".$row['student_id']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Date of Birth</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['dob']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Parent PhoneNo</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['phone']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Address</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Parent Email</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['parent_email']."</td>";
                echo "</tr>";
               echo "</table>";
              echo "</div>";
              echo "</div>";
              echo "<div style='height: 26px'></div>";
              echo "<div class='card shadow-sm'>";
              echo "</div>";
              echo " <div class='card-header bg-transparent border-0'>";
              echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Marks Information</h3>";
              echo " </div>";
              $m1=$m2=$m3=$m4=$m5=$m6=$m7=$m8=0;
              $c1=$c2=$c3=$c4=$c5=$c6=$c7=$c8=0;
              $s="select max(year) as max_year from student_marks";
              $res=$conn->query($s);
              $res1=$res->fetch_assoc();
              $sm=$res1['max_year'];
              $sql="select * from student_marks where student_id='$stu_id' and year = '$sm' ";
	            $result=$conn->query($sql);
	       	  if ($result->num_rows > 0)
	 			    {

	 			    echo "<div >";
              		echo   "<table border='2px'>";
              		echo "<tr>";
              		echo "<th width='2%'>subject</th><th width='2%'>Sem No</th><th width='2%'>subject_id</th><th width='2%'>Mid1</th><th width='2%'width='2%'>Online1</th><th width='2%'>Mid2</th> <th width='2%'>online2</th><th width='2%'>external marks</th>";
              		echo "</tr>";
                while($row = $result->fetch_assoc()) 
              {
      			  
              		echo "<tr>";
              		echo "<td>".$row['subname']."</td>"."<td>".$row['year']."</td>"."<td>".$row['sub_id']."</td>"."<td>".$row['mid1']."</td>"."<td>".$row['onlinemid1']."</td>"."<td>".$row['mid2']."</td>"."<td>".$row['onlinemid2']."</td>"."<td>".$row['external']."</td>";
              		echo "</tr>";
                }
              $sql="select * from student_marks where student_id='$stu_id'  ";
              $result=$conn->query($sql);
                  while($row = $result->fetch_assoc()) 
              {
                if($row['year']==1)
                {
                  $m1=$m1+3*$row['external'];
                  $c1++;
                }
                if($row['year']==2)
                {
                  $m2=$m2+3*$row['external'];
                  $c2++;
                }
                if($row['year']==3)
                {
                  $m3=$m3+3*$row['external'];
                  $c3++;
                }
                if($row['year']==4)
                {
                  $m4=$m4+3*$row['external'];
                  $c4++;
                }
                if($row['year']==5)
                {
                  $m5=$m5+3*$row['external'];
                  $c5++;
                }
                if($row['year']==6)
                {
                  $m6=$m6+3*$row['external'];
                  $c6++;
                }
                if($row['year']==7)
                {
                  $m7=$m7+3*$row['external'];
                  $c7++;
                }
                if($row['year']==8)
                {
                  $m1=$m1+3*$row['external'];
                  $c8++;
                }

              }
              	    echo "</table>";
                    echo "</div>";
                   echo "</div>";
                     echo " <div class='card-header bg-transparent border-0'>";
                     echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Attedance Information</h3>";
                     echo "</div><br><br><br>";
            }
                   echo "</div>";
                   $sql="select * from attedance where student_id='$stu_id' order by sem asc";
                   $result=$conn->query($sql);
                   if ($result->num_rows > 0)
	 			           {
                   	 echo "<div >";
              		echo   "<table border='2px'>";
              		echo "<tr>";
              		echo "<th width='2%'>Month</th><th width='2%'>Sem No</th><th width='2%'>Total Class Conducted</th><th width='2%'>No of class Attended</th><th width='2%'>Percentage</th>";
              		echo "</tr>";
              		 while($row = $result->fetch_assoc())
              		 {
              		 	echo "<tr>";
              		    echo "<td>".$row['month']."</td>"."<td>".$row['sem']."</td>"."<td>".$row['totcls']."</td>"."<td>".$row['attcls']."</td>"."<td>".$row['percentage']."</td>";
              		    echo "</tr>";
              		 }
              		 echo "</table>";
              		 echo "</div>";
                    }
                  echo " <div class='card-header bg-transparent border-0'>";
                  echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Grade Points:</h3>";
                  echo "</div>";
                  echo "<div >";
                  echo   "<table border='2px'>";
                  echo "<tr>";
                  echo "<th width='2%'>Sem:1</th><th width='2%'>Sem:2</th><th width='2%'>Sem:3</th><th width='2%'>Sem:4</th><th width='2%'>Sem:5</th><th width='2%'>Sem:6</th><th width='2%'>Sem:7</th><th width='2%'>Sem:8</th>";
                  echo "</tr>";
                  echo "<tr>";
                  if($c1==0)
                  {
                    $c1=1;
                  }
                  if($c2==0)
                  {
                    $c2=1;
                  }
                  if($c3==0)
                  {
                    $c3=1;
                  }
                  if($c4==0)
                  {
                    $c4=1;
                  }
                  if($c5==0)
                  {
                    $c5=1;
                  }
                  if($c6==0)
                  {
                    $c6=1;
                  }
                  if($c7==0)
                  {
                    $c7=1;
                  }
                  if($c8==0)
                  {
                    $c8=1;
                  }
                  echo "<td>".$m1/(3*$c1)."</td>"."<td>".$m2/(3*$c2)."</td>"."<td>".$m3/(3*$c3)."</td>"."<td>".$m4/(3*$c4)."</td>"."<td>".$m5/(3*$c5)."</td>"."<td>".$m6/(3*$c6)."</td>"."<td>".$m7/(3*$c7)."</td>"."<td>".$m8/(3*$c8)."</td>";
                  echo "</tr>";
                   echo "</table>";
                   echo "</div>";
                   echo "<br>";
                   echo "<input type='button' value='Go back!' onclick='history.back(2)''>";
                   echo "<input type='button' value='Print' onclick='print()' style='margin-left:50px'>";
              echo "</body>";
              echo "</html>";
          }
         
    }
    else
    {
    	echo "Student Not found";
    }
   
}
$conn->close();
?>
