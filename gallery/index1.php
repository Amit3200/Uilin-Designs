<?php

ob_start();
session_start();

if(!isset($_SESSION['user_id']))
header("refresh:0;url=../login/login.php");

include("conn.php");
$sql1 = "SELECT image, user_name FROM uploads u JOIN user_data ud where u.user_id = ud.user_id order by upload_date";
$val1 = mysqli_query($con, $sql1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Uilin Designs</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!-- Favicon -->
        <link href="../login/assets/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="../login/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="../login/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="../login/assets/css/argon.css?v=1.0.1" rel="stylesheet">
        <!-- Docs CSS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link type="text/css" href="../login/assets/css/docs.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/home.css">
  <style>
    .footer.has-cards {
  padding-top:660px;
  color:black;
}
  .nav-link{
display: flex;

justify-content: center;

align-items: center;

flex: 1;

text-decoration: none;

font-size: 1.4rem;

font-weight: bold;

letter-spacing: 0.1rem;

color: #111;

transition: all 0.25s ease-in-out;
  }
    .nav-link:hover{
      color:white;
  }
  body{
    background: url("../login/assets/img/back.jpg");
    background-attachment: fixed;
    color:white;
  }
   #columns {
  column-width: 320px;
  column-gap: 15px;
  width: 90%;
  max-width: 1100px;
  margin: 50px auto;
}

div#columns figure {
  background: #fefefe;
  border: 2px solid #fcfcfc;
  box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
  margin: 0 2px 15px;
  padding: 15px;
  padding-bottom: 10px;
  transition: opacity .4s ease-in-out;
  display: inline-block;
  column-break-inside: avoid;
}

div#columns figure img {
  width: 100%; height: auto;
  border-bottom: 1px solid #ccc;
  padding-bottom: 15px;
  margin-bottom: 5px;
}

div#columns figure figcaption {
  font-size: 1.3rem;
  color: #444;
  line-height: 1.5;
  font-family: "Quicksand";
  font-weight: bolder;
}

div#columns small { 
  font-size: 1rem;
  float: right; 
  text-transform: uppercase;
  color: #aaa;
} 

div#columns small a { 
  color: #666; 
  text-decoration: none; 
  transition: .4s color;
}

div#columns:hover figure:not(:hover) {
  opacity: 0.4;
}

@media screen and (max-width: 750px) { 
  #columns { column-gap: 0px; }
  #columns figure { width: 100%; }
}
#top12er{
  color:white;
  margin-top: 35px;
}
  </style>
</head>

<body>
  <nav class="nav" style="font-family: 'QuickSand',sans-serif;font-weight: 100;">
    <div class="nav-bar">
      <a class="nav-link" href="">Home</a>
      <a class="nav-link" href="../profile.php">Profile</a>
      <a class="nav-link" href="../login/about.php">About</a>
      <a class="nav-link" href="../login/logout.php">Logout</a>
      <span class="nav-slider"></span>
    </div>
  </nav>
  <section id="top12er">
    <h1 style="font-size: 3.2rem;color:white;">Today's Design</h1>
    <span class="iop" style="font-family: 0.2rem;">
      <p>Powered by ToughX</p>
    </span>
  </section>
  <div id="columns">
     <?php while($row = mysqli_fetch_array($val1)) :?>
        <figure>
        <img src=<?php echo "../".$row['image']; ?>>
        <figcaption>Design by : <?php echo $row['user_name']; ?></figcaption>
        </figure>
      <?php endwhile; ?>
  </div>
   <footer class="footer has-cards">
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2" style="font-size:3.8rem;">Support Uilin</h3>
          <h4 class="mb-0 font-weight-light" style="font-size:1.9em;">We hope you all would like it.</h4>
        </div>
      </div>
      <small style="font-size: 1.4rem;"> We are updating it. Currently it is beta version.</small>
      <hr style="color:black;height: 3px;">
      <div class="row align-items-left">
        <div class="col-md-6">
          <div class="copyright" style="font-size: 1.3rem;">
            © 2018
            <span style="font-size: 1.3rem;">ToughX<span>.
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src="js/home.js"></script>

</body>

</html>