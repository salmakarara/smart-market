<?php
    include_once "Header.php";
?>
<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getparent.php?q="+str, true);
  xhttp.send();
}
</script>

<div class="container m-3">
<form method="POST">
 <table class="table table-border">
    <caption>  </caption>
    <td colspan="2" style="text-align: center;">
     <h3>
    Student Data Control Page
    </h3>     
      </td>
  </tr>
  <tr>
    <td colspan=2>
        <?php
        if(isset($_POST["btnsubmit"]))
        {
            include_once "Classes/Student.php";
            $st=new Student();
            $st->setid($_POST["txtsid"]);
            $st->setname($_POST["txtsname"]);
            $st->setschool($_POST["sschool"]);
            $st->setclass($_POST["txtclass"]);
            $st->setparentid($_POST["txtnational"]);
           if(isset($_GET["sid"]))
              $msg=$st->Update();
           else 
            $msg=$st->Add();
            if($msg=="ok")
            {
                if(isset($_GET["sid"]))
                    echo "<div class='alert alert-success'>  Student has been updated </div>";
                else
                     echo "<div class='alert alert-success'>  Student has been added </div>";
            }
            else if(strpos($msg,"parent"))
            {
                echo "<div class='alert alert-danger'>  This national no. not exist , please check </div>";
            }
            else if(strpos($msg,"PRIMARY"))
            {
                echo "<div class='alert alert-danger'>  This Student Id already exist </div>";
            }
            
            else
            {
                echo "<div class='alert alert-danger'>  $msg </div>";
            }
        }
        ?>
    </td>
  </tr>

<?php
    if(isset($_GET["sid"]))
    {
        include_once "Classes/Student.php";
        $db=new  Student();
        $rs=$db->GetStudent();
        if($row=mysqli_fetch_assoc($rs))
        {
    
?>

    <tr>
        <td>
            School
        </td>
        <td>
            <select name="sschool" class="form-control">
                <option value="Choose School">  Choose School </option>
                <option value="National" <?php if($row["School"]=="National") echo "Selected" ?> >  National </option>
                <option value="American" <?php if($row["School"]=="American") echo "Selected" ?> >  American </option>
                <option value="German"  <?php if($row["School"]=="German") echo "Selected" ?> >  German </option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            Student ID
        </td>
        <td>
            <input type="text" value="<?php echo $row["StudentID"] ?>" required name="txtsid" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
            Student Name
        </td>
        <td>
            <input type="text" value="<?php echo $row["Name"] ?>" required name="txtsname" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Class
        </td>
        <td>
            <input type="text" required value="<?php echo $row["Class"] ?>" name="txtclass" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Parent National No.
        </td>
        <td>
            <input type="text" value="<?php echo $row["ParentID"] ?>" required name="txtnational" class="form-control" />
        </td>
    </tr>
    <tr>
    <td colspan="2" style="text-align: center;">
          
            <input type="submit" name="btnsubmit" value="Update Student" style="width: 35%;" class="btn btn-dark"/>
        </td>
    </tr>
    <tr>
    </tr>
    <?php

        }
    }
    else
    {
    ?>
 <tr>
        <td>
            School
        </td>
        <td>
            <select name="sschool" class="form-control">
                <option value="Choose School">  Choose School </option>
                <option value="National">  National </option>
                <option value="American">  American </option>
                <option value="German">  German </option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            Student ID
        </td>
        <td>
            <input type="text" required name="txtsid" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
            Student Name
        </td>
        <td>
            <input type="text" required name="txtsname" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Class
        </td>
        <td>
            <input type="text" required name="txtclass" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Parent National No.
        </td>
        <td>
            <input type="text" onchange="showCustomer(this.value)" required name="txtnational" class="form-control" />
            <br/>
            <div id="txtHint"> </div>
        
        </td>
    </tr>
    <tr>
    <td colspan="2" style="text-align: center;">
          
            <input type="submit" name="btnsubmit" value="Save Student" style="width: 35%;" class="btn btn-primary"/>
        </td>
    </tr>
    <tr>
    </tr>
    <?php } ?>

 </table>

 <table class="table table-border table-striped">
 <tr>
<td>
Student ID
</td>
<td>
 School 
</td>

<td>
 Name 
</td>
<td>
 Class 
</td>
 
<td>
 Parent National No.
</td>
<td>
Delete
</td>
<td>
 Edit
</td>
</tr>
 <?php
 include_once "Classes/Student.php";
 $st=new Student();
 $rs=$st->GetAll();
 while($row=mysqli_fetch_assoc($rs))    
 {
?>
<tr>
<td>
<?php echo $row["StudentID"]; ?>
</td>
<td>
<?php echo $row["School"]; ?>
</td>

<td>
<?php  echo $row["Name"]; ?>
</td>
<td>
<?php echo $row["Class"]; ?>
</td>
<td>
<?php echo $row["ParentID"]; ?>
</td>
<td>
<?php
   $id=$row["StudentID"];
   $ss=$row["School"];
   echo '<a href="DeleteStudent.php?sid='.$id.'&school='.$ss.'" class="btn btn-danger"> Delete</a>';
?>

</td>
<td>
<?php
   $id=$row["StudentID"];
   $ss=$row["School"];
   echo '<a href="Student.php?sid='.$id.'&school='.$ss.'" class="btn btn-warning" style="color:black"> Update</a>';
?>
</td>
</tr>

<?php
 }
?>
</table>


 </form>

</div>



<?php
        include_once "Footer.php";
?>