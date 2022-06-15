<?php
  
    include_once "Header.php";
/*
    if(isset($_SESSION["user"]))
        ;
    else
        echo("<script> window.open('login.php','_self') </script>");
     */   
?>
<script>



let data = sessionStorage.getItem('user');
 if(data!="")
    ;
    else
    window.open('login.php','_self') ;
</script>

<div class="container m-5">
 <center>

    <img src="assets/images/logo1.png"

 </center>


</div>


<?php
        include_once "Footer.php";
?>