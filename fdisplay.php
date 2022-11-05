<?php
session_start();
if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel_file']['name']);           
    
    $foo = $excel->parser->getField(); 

    $count = 1;
    $db = mysqli_connect('localhost','root','','mydb');

    while(count($foo)>$count){
        $roll = $foo[$count][0];
        $name=$foo[$count][1];
        $addr = $foo[$count][2];
        $pphone = $foo[$count][3];
        $bod=$foo[$count][4];
        $pem = $foo[$count][5];
        $sem = $foo[$count][6];
        $bran = $foo[$count][7];
        $mentor = $foo[$count][8];
        $sec=$foo[$count][9];
        $batch=$foo[$count][10];
        $query = "INSERT INTO student_personal(student_id,student_name,year,Branch,phone,address,parent_email,mentor,dob,section,batch) ";
        $query.="VALUES ('$roll','$name','$sem','$bran','$pphone','$addr','$pem','$mentor','$bod','$sec','$batch')";
       mysqli_query($db,$query);
        $count++;
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
        echo "Students add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    
    
               
    
    
}
   
    
    
}
?>