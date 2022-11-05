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
        $subname=$foo[$count][1];
        $sem = $foo[$count][2];
        $sub_id=$foo[$count][3];
        $mid1 = $foo[$count][4];
        $onmid = $foo[$count][5];
        $mid2 = $foo[$count][6];
        $onmid2 = $foo[$count][7];
        $exter = $foo[$count][8];
        $inter = $foo[$count][9];
        $credit=$foo[$count][10];
        $query = "INSERT INTO student_marks(student_id,subname,year,sub_id,mid1,onlinemid1,mid2,onlinemid2,external,internal,credit) ";
        $query.="VALUES ('$roll','$subname','$sem','$sub_id','$mid1','$onmid','$mid2','$onmid2','$exter','$inter','$credit')";
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
        echo "subject add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    
    
               
    
    
}
   
    
    
}
?>