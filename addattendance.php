<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;
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
  $sem=$_SESSION["sem"];
  $section=$_SESSION["section"];
  $branch=$_SESSION["techbranch"];
  $sub=$_SESSION["subject"];
  $period=$_SESSION['period'];
  $batch=$_SESSION["batch"];
  $dat=date('y-m-d');
  $day=date('d',strtotime($dat));
    $month=date('m',strtotime($dat));
    $year=date('y',strtotime($dat));
    $month_list=[31,28,31,30,31,30,31,31,30,31,30,31];
    $month_name=["january","february","march","april","may","june","july","august","september","october","november","december"];
    $mn=$month_name[$month-1];
   $sql="select student_id from student_personal where batch='$batch' and section='$section' and branch='$branch'";
    $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
        { 
          $id=$row["student_id"];
          $isTouch = isset($_GET[$id]);
          if($isTouch == false)
          {
               $att=1;
          }
          else
          {
          $att=$_GET[$row["student_id"]];
            }
            $sql="INSERT INTO daily_attendance(student_id,dates,sem,subject,attend,period,branch,section,batch) 
          VALUES ('$id','$dat','$sem','$sub','$att','$period','$branch','$section','$batch')";
          $conn->query($sql);
          
       }
           if($day==$month_list[$month-1])
          {
          $sql="select student_id from student_personal where year='$sem' and section='$section' and branch='$branch'";
            $result=$conn->query($sql);
              if ($result->num_rows > 0)
            {
            while($row = $result->fetch_assoc()) 
               { 
                 $id1=$row["student_id"];
                 $s="select count(attend) as tot_count from daily_attendance where student_id='$id1' and dates like '%-$month-$year'";
                 $res=$conn->query($s);
                 $row = $res->fetch_assoc();
                 $tot=$row['tot_count'];
                 
                 $s="select count(attend) as att_count from daily_attendance where student_id='$id1' and dates like '%-$month-$year' and attend=1";
                 $r=$conn->query($s);
                 $row = $r->fetch_assoc();
                 $att=$row['att_count'];
                 $per=($att*100)/$tot;
                 $sq="INSERT INTO attedance(student_id,month,sem,totcls,attcls,percentage) 
               VALUES ('$id1','$mn','$sem','$tot','$att','$per') ";
               $conn->query($sq);
               }
            }
     } 
      if($period==7)
      {
       $sql="select student_id,phone,student_name from student_personal where year='$sem' and section='$section' and branch='$branch'";
            $result=$conn->query($sql);
              if ($result->num_rows > 0)
            {
            while($row = $result->fetch_assoc()) 
               {
                $arr="";
               $sid=$row["student_id"];
               $ph=$row["phone"];
               $name=$row["student_name"];
               $s="select period from daily_attendance where student_id='$sid' and dates='$dat' and  attend=0";
               $res=$conn->query($s);
               if ($res->num_rows > 0)
                {
                 while($r= $res->fetch_assoc())
                 {
                   $arr=$arr.strval($r['period']).",";
                 }
                 $sid = 'AC200179a4a36135509ebc7d914dd5507c';
                 $token = '8cfc72b98760e3ce67e9bf3d88f0d1ab';
                 $client = new Client($sid, $token);
                 $client->messages->create(
                  '+919618174291',
                 [
                  'from' => '+18587035859',
                  'body' => "This is message From Andhra Loyola institute of Engineering and Technology,vijayawad.".$name." Absent for today class period are : ".$arr." try come regularly!!!
                  Thank u"
                 ]
                 );

                 echo "message Sented Successfully!";

               }
               unset($arr);
              }
            }

      }
        echo "<!DOCTYPE html>";
        echo" <html>";
        echo "<body>";
        echo "<style>
        a{
          text-decaration:None;
          color:red;

        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
    echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "Today Attendance updated successfully ";
        echo "<input type='button' value='GO BACK!' onclick='history.go(-3)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
      }


}
?>