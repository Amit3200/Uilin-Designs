<?php 
  ob_start();
  session_start();

  if(isset($_SESSION['user_id']))
  header("refresh:0;url=../gallery/index1.php");

  include('conn.php');

  if(isset($_POST["login"])){   // Login data
    
    $email = mysqli_real_escape_string($con, isset($_POST['email']) ? $_POST['email'] : '');
    $password = mysqli_real_escape_string($con, isset($_POST['password']) ? $_POST['password'] : '');

    $query = "SELECT user_id,user_email,user_password from user_data where user_email = '$email' and user_password = '$password' ";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    
    if($data['user_email'] == $email && $data['user_password'] == $password){
      $_SESSION['valid'] = true;
      $_SESSION['time'] = time();
      $_SESSION['user_id'] = $data['user_id'];
      header("refresh:0;url = ../gallery/index1.php");
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
        <!-- Favicon -->
        <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="assets/css/argon.css?v=1.0.1" rel="stylesheet">
        <!-- Docs CSS -->
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
<main>
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
                <form role="form" action="login.php" method="post" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password" name="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="sumbit" class="btn btn-primary my-4" name="login">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light">
                  <small>Forgot password?</small>
                </a>
              </div>
              <div class="col-6 text-right">
                <a href="register.php" class="text-light">
                  <small>Create new account</small>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  </body>
  </html>