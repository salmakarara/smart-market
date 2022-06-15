<?php
     include_once "Classes/Student.php";
     $st=new Student();
    echo $st->RunDML("delete from students where StudentID =".$_GET['sid']." and school='".$_GET['school']."'");

     header("Location:student.php");
?>