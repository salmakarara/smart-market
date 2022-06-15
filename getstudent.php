<?php

include_once "Classes/Database.php";
$db=new Database();
$rs=$db->GetData("SELECT Name FROM students WHERE StudentID =".$_GET['q']." and School ='".$_GET['s']."'");
if($row=mysqli_fetch_assoc($rs))
{
    echo "<div class='alert alert-primary'>". $row['Name']."</div>";

}
else
{
    echo "<div class='alert alert-danger'> This National no not found</div>";
}
?>