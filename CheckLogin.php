<?php
session_start();
include_once "Classes/Database.php";
$db=new Database();
if($_GET["type"]=="parent")
$rs=$db->GetData("SELECT * FROM  parent WHERE id ='".$_GET['user']."' and password ='".$_GET['pass']."'");

else if($_GET["type"]=="emp")
  $rs=$db->GetData("SELECT * FROM employee WHERE phone ='".$_GET['user']."' and password ='".$_GET['pass']."'");

else if($_GET["type"]=="merchant")
   $rs=$db->GetData("SELECT * FROM merchant WHERE phone ='".$_GET['user']."' and password ='".$_GET['pass']."'");

if($row=mysqli_fetch_assoc($rs))
{
    $_SESSION["user"]=$row["Name"];
    $_SESSION["id"]=$row["id"];
    if($_GET["type"]=="parent")
       echo "parent";
    else if($_GET["type"]=="emp")
        echo "emp";
    else if($_GET["type"]=="merchant")
        echo "merchant";

}
else
{
    echo "<div class='alert alert-danger'> Invaild Login Data </div>";
}
?>