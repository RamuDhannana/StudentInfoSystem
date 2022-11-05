<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
else
{
  $bran = array("cse"=>"05", "mech"=>"03", "civil"=>"06","ece"=>"04","eee"=>"02","it"=>"01","nt"=>"00");
      $userid= $_GET['Uname'];
      $passwrd=$_GET['Pass'];
      $sql="select * from user where username= '$userid'";
      $result=$conn->query($sql);
      if ($result->num_rows > 0) 
      {

         $row = $result->fetch_assoc();
          	if( $row['password']==$passwrd)
          	{
              $_SESSION["branch"]=$bran[$row['branch']];
              $_SESSION["branchname"]=$row['branch'];
                if((strtolower($row['role'])=="hod") && $row['status']==1)
                {
                  $_SESSION["user"]="hod";
                  $_SESSION["id"]=$row['id'];
                	header("location:teacher.php");
                }
                elseif((strtolower($row['role'])=="teacher"  ||  strtolower($row['role'])=="faculty") && $row['status']==1)
                {
                  $_SESSION["branchname"]=$row['branch'];
                  $_SESSION["user"]="teacher";
                  $_SESSION["id"]=$row['id'];
                  header("location:faculty.php");

                }
                elseif((strtolower($row['role'])=="admin" ) && $row['status']==1)
                {
                  $_SESSION["user"]="admin";
                  $_SESSION["id"]=$row['id'];
                  header("location:admin.php");

                }
                elseif((strtolower($row['role'])=="director" ) && $row['status']==1)
                {
                  $_SESSION["user"]="director";
                  $_SESSION["id"]=$row['id'];
                  header("location:director.php");

                }
                elseif((strtolower($row['role'])=="student"  ) && $row['status']==1)
                {
                  $_SESSION["user"]="student";
                  $_SESSION["stu_id"]=$row['id'];
                  $_SESSION["id"]=$row['id'];
                  header("location:student.php");

                }
                
          	}
            else
                {
                  header("location:login.html");
                }
        }    
      else
      {
        header("location:login.html");
      }
}


$conn->close();
?>