<?php

include_once "Classes/Database.php";
$db=new Database();
$rs=$db->GetData("SELECT ParentID,Name,Phone,Email,Password FROM parent WHERE ID =".$_GET['q']."");
if($row=mysqli_fetch_assoc($rs))
{
    echo $row['Name'];
/* 
echo "<table>";
echo "<tr>";
echo "<td>" . $row["Name"] . "</td>";
echo "<th>Parent ID</th>";
echo "<td>" . $row["ParentID"] . "</td>";
echo "<th>Name</th>";
echo "<td>" . $row["Name"] . "</td>";
echo "<th>Phone</th>";
echo "<td>" . $row["Phone"] . "</td>";
echo "<th>Email</th>";
echo "<td>" . $row["Email"] . "</td>";
echo "<th>Password</th>";
echo "<td>" . $row["Password"] . "</td>"; 
echo "</tr>";
echo "</table>";*/
}
else
{
    echo "<div class='alert alert-danger'> This National no not found</div>";
}
?>