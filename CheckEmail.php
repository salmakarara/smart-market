<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Able bootstrap admin template by Codedthemes</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Codedthemes" />
      <!-- Favicon icon -->

      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script>
    function checktype(v)
    {
     
      if(v=="choose")
      document.getElementById("txtHint").innerHTML = "<br/><div class='alert alert-danger'>Please Choose Type</div>";
        else
        document.getElementById("txtHint").innerHTML = "";
    }
    </script>

    </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                        <form class="md-float-material form-material" method="POST">
                            <div class="text-center">
                                <img src="assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Forget Password</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" id="user" name="email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your Email </label>
                                    </div>
                                     
                                    
                                     
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <input type="submit" name="btnsubmit" value="Check Email" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20"/>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <?php
                                               if(isset($_POST["btnsubmit"]))
                                               {
                                               include_once "Classes/Database.php";
                                               $db=new Database();
                                               $rs=$db->GetData("select * from employee where email='".$_POST["email"]."'");
                                               if($row=mysqli_fetch_assoc($rs))
                                               {    
                                                require_once "src/PHPMailer.php";
                                                require_once "src/Exception.php";
                                                require_once "src/SMTP.php";
                                                require_once "vendor/autoload.php";
                                                    
                                                    $mail = new  PHPMailer\PHPMailer\PHPMailer();
                                                    $email=$_POST["email"];
                                                    $mail->IsSMTP();
                                                    //$mail->SMTPDebug = 1;
                                                    $mail->SMTPAuth = true;
                                                    $mail->SMTPSecure = 'ssl';
                                                    $mail->Host = "smtp.gmail.com";
                                                    $mail->Port = 465; // or 587
                                                    $mail->IsHTML(true);
                        
                                                    $mail->Username = "yourmobileapp2017@gmail.com";
                                                    $mail->Password = "ABC@a123456";
                        
                                                    $mail->setFrom('yourmobileapp2017@gmail.com', 'Smart Canteen');
                                    
                                                    $mail->addAddress($email, "Smart Canteen");
                                                    $mail->Subject = 'Forget Password';
                                                    $id=$row["empno"];
                                                    $mail->Body = "Dear Mr/Mrs ".$row['Name']."<br/>http://localhost:8080/SkillsCanteen/UpdatePW.php?uid=$id";
                                                    
                                                    if(!$mail->send()) {
                                                      //  echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                                    }
                                               }
                                               else{
                                                   echo "<div class='alert alert-danger'> This email not exist</div>";
                                               }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                        <div id="txtHint"> </div>
                                        </div>
                                    </div>
                                     
           
                                    <hr/>
                                     
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
     
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/common-pages.js"></script>




</body>
</html>