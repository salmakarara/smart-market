<?php
     include_once "Classes/Credit.php";
     $st=new Credit();
    echo $st->Delete();

     header("Location:crediatcard.php");
?>