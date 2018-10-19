<?php 
ob_start();
session_start();

if(isset($_SESSION['user_id']))
header("refresh:0;url=gallery/index1.php");

include('conn.php');

if(isset($_POST['signup'])){    // Image Debasish...

  $name = mysqli_real_escape_string($con, isset($_POST['name']) ? $_POST['name'] : '');
  // $username = mysqli_real_escape_string($con, isset($_POST['username']) ? $_POST['username'] : '');
  $email = mysqli_real_escape_string($con, isset($_POST['email']) ? $_POST['email'] : '');
  // $mobile = mysqli_real_escape_string($con, isset($_POST['mobile']) ? $_POST['mobile'] : '');
  $password = mysqli_real_escape_string($con, isset($_POST['password']) ? $_POST['password'] : '');

  // if(isset($_FILES['image']['name'])){

  //   $file_name = $_FILES['image']['name'];
  //   $file_size = $_FILES['image']['size'];
  //   $file_tmp = $_FILES['image']['tmp_name'];
  //   $fiel_type = $_FILES['image']['type'];
  //   $file_ext = explode('.', $file_name);
  //   $file_ext = strtolower(end($file_ext));
  //   $image_dir = '';

  //   $ext = array("jpeg", "jpg", "png");

  //   if(in_array($file_ext, $ext) === false){
  //     echo "File extension not supported";
  //   }

  //   elseif($file_size > 5000071){
  //     echo "Size limit exceed";
  //   }

  //   else{
  //     if (move_uploaded_file($file_tmp, "user_data/user_image/".$file_name)) {
  //       $image_dir = "user_data/user_image/".$file_name;
  //       // echo "Uploaded...".$image_dir;
  //     }
  //     else echo "Not Uploaded...";
      
  //   }
  // }


  if($name == '' or $email == '' or $password == '') echo "Please fill all required details...";
    else{

      $query1 = "INSERT into user_data(user_name, user_email, user_password) VALUES('$name', '$email', '$password')";
      if(!mysqli_query($con, $query1)) echo "<script> alert(\"Some error occured... Please contact database administrator... \"); </script>";
      else{
        echo  "<script> alert(\"Account created succesfully... Please login\"); </script>";
        header("refresh:0;url=login.php");
      }
    }
}

?>


<html>
    <title>Uilin Designs</title>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link type="text/css" href="assets/css/argon.css?v=1.0.1" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link type="text/css" href="assets/css/docs.min.css" rel="stylesheet">
        <style>
            .logohere{
                font-family: "Poppins","QuickSand";
                font-weight: bolder;
            }
        body{
            overflow: hidden;
            background: url("assets/img/back.jpg");
        }
        .btn{
            background: #ffc601;
            border: 1px solid #ffc601;
            color:black;
        }
        .btn:hover{
            background: #ffc601;
            border: 1px solid #ffc601;
            color:black;
        }
        .btn:focus{
            background: #ffc601;
            border: 1px solid #ffc601;
            color:black;
        }
        </style>
      </head>
<body>
<section class="section section-shaped section-lg">
      <div class="container pt-lg-md">
        <div class="row justify-content-center" style="margin-top:-5.5%;">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                            <h2 class="logohere">Uilin</h2>
                            <span><small>Powered by ToughX</small></span>
                    </div>
                <form role="form" action="register.php" method="post" enctype="multipart/form-part">
                  <div class="form-group focused">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" placeholder="Name" type="text" name="name">
                    </div>
                  </div>
                  <div class="form-group focused">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                  </div>
                  <div class="form-group focused">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password" name="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="sumbit" class="btn btn-primary mt-4" name="signup">Create account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>