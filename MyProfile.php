<?php
    include_once "Header.php";
?>


<div class="container m-3">
<form method="POST">
 <table class="table table-border">
    <caption>  </caption>
    <td colspan="2" style="text-align: center;">
     <h3>
    My Profile
    </h3>     
      </td>
  </tr>
  <?php
 include_once "Classes/Database.php";
 $db=new Database();
 $rs=$db->GetData("select * from employee where empno='".$_SESSION["id"]."'");
 if($row=mysqli_fetch_assoc($rs))
 {    
  ?>
  <tr>
       <td>Employee ID</td> 
       <td><input type="text" value="<?php echo $row["id"]; ?>" class="form-control" readonly name="txtid"/> </td>
  </tr>
  <tr>
       <td>Employee Name</td> 
       <td><input type="text" value="<?php echo $row["Name"]; ?>" class="form-control" name="txtname"/> </td>
  </tr>
  <tr>
       <td>  Phone</td> 
       <td><input type="text" value="<?php echo $row["phone"]; ?>" class="form-control" name="txtphone"/> </td>
  </tr>
  <tr>
       <td>  Email</td> 
       <td><input type="text" value="<?php echo $row["email"]; ?>" class="form-control" name="txtemail"/> </td>
  </tr>
  <tr>
       <td>  Password</td> 
       <td><input type="text" value="<?php echo $row["password"]; ?>" class="form-control" name="txtpass"/> </td>
  </tr>
  <tr>
  <td colspan="2">
  <input type="submit" value="Update Profile" class="btn btn-warning" name="btnup" />
  </td>
  <td colspan="2">
  <input type="submit" value="Delete My Account" class="btn btn-warning" name="btndel" />
  </td>
  <td colspan="2">
    <?php

if(isset($_POST["btndel"]))
{
    include_once "Classes/Database.php";
    $db=new Database();
    $rs=$db->RunDML("delete from  employee where empno='".$_POST["txtid"]."'");
    if($rs="ok")
    {
     echo "<div class='alert alert-success'> Profile has been deleted</div>";
    }
    else{
        echo "<div class='alert alert-danger'> $rst</div>";
    }

}

        if(isset($_POST["btnup"]))
        {
            include_once "Classes/Database.php";
            $db=new Database();
            $rs=$db->RunDML("update employee set name='".$_POST["txtname"]."' ,phone='".$_POST["txtphone"]."',email='".$_POST["txtemail"]."',  password='".$_POST["txtpass"]."' where empno='".$_POST["txtid"]."'");
            if($rs="ok")
            {
             echo "<div class='alert alert-success'> Profile has been updated</div>";
            }
            else{
                echo "<div class='alert alert-danger'> This email not exist</div>";
            }
        }
    ?>
  </td>
  </tr>
  <?php } ?>
 </table>


<?php
        include_once "Footer.php";
?>