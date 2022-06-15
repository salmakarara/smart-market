<?php
    include_once "Header.php";
?>

<script>
function showstudent(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  var school=document.getElementById("sschool").value;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getstudent.php?q="+str+"&s="+school, true);
  xhttp.send();
}
</script>

<div class="container m-3">
<form method="POST">
 <table class="table table-border">
    <caption>  </caption>
    <td colspan="2" style="text-align: center;">
     <h3>
    Credit Data Control Page
    </h3>     
      </td>
  </tr>
  <tr>
    <td colspan=2>
        <?php
        if(isset($_POST["btnsubmit"]))
        {
            include_once "Classes/Credit.php";
            $st=new Credit();
            $st->setcardno($_POST["txtcardno"]);
            $st->setExpireDate($_POST["txtexpire"]);
            $st->setPassword($_POST["txtpassword"]);
            $st->setwithdrawvalue($_POST["txtlimit"]);
            $st->setstudentid($_POST["txtsid"]);
            $st->setschool($_POST["sschool"]);
            
            $msg=$st->Add();
            if($msg=="ok")
            {
                
                    echo "<div class='alert alert-success'>  Credit has been generated </div>";
               
            }
            else if(strpos($msg,"schoolfk"))
            {
                echo "<div class='alert alert-danger'>  This Student not exist , please check </div>";
            }
            else if(strpos($msg,"PRIMARY"))
            {
                echo "<div class='alert alert-danger'>  This Card no already exist </div>";
            }
            
            else
            {
                echo "<div class='alert alert-danger'>  $msg </div>";
            }
        }
        ?>
    </td>
  </tr>
 

    <tr>
        <td>
            School
        </td>
        <td>
            <select name="sschool" id="sschool" class="form-control">
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
            <input type="text" onchange="showstudent(this.value)"  required name="txtsid" class="form-control" />
            <br/>
            <div id="txtHint"> </div>
        </td>
    </tr>
    <tr>
        <td>
           Card Number
        </td>
        <td>
            <input type="text"   required name="txtcardno" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Expire
        </td>
        <td>
            <input type="date"   name="txtexpire" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
           Password
        </td>
        <td>
            <input type="password"   required name="txtpassword" class="form-control" />
        </td>
    </tr>
    <tr>
        <td>
        Withdrawal limit
        </td>
        <td>
            <input type="number"   required name="txtlimit" class="form-control" />
        </td>
    </tr>
    <tr>
    <td colspan="2" style="text-align: center;">
          
            <input type="submit" name="btnsubmit" value="Generate Credit Card" style="width: 35%;" class="btn btn-dark"/>
        </td>
    </tr>
    <tr>
    </tr>
    
  
 
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
Status
</td>
<td>
 Delete
</td>
</tr>
 <?php
 include_once "Classes/Credit.php";
 $st=new Credit();
 $rs=$st->GetAll();
 while($row=mysqli_fetch_assoc($rs))    
 {
?>
<tr>
<td>
<?php echo $row["studentid"]; ?>
</td>
<td>
<?php echo $row["school"]; ?>
</td>

<td>
<?php  echo $row["cardno"]; ?>
</td>
<td>
<?php echo $row["ExpireDate"]; ?>
</td>
<td>
<?php echo $row["withdrawvalue"]; ?>
</td>
<td>
<?php echo $row["status"]; ?>
</td>
<td>
<?php
   $id=$row["cardno"];
    
   echo '<a href="Deletecredit.php?cardno='.$id.'" class="btn btn-danger"> Delete</a>';
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