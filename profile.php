<?php
ob_start();
session_start();

if (!isset($_SESSION['user_id'])) {
	header("refresh:0;url=login.php");
} else {

	include("conn.php");

	$user_id = $_SESSION['user_id'];
	$query1 = "SELECT * from user_data where user_id = '$user_id'";
	$sql1 = mysqli_query($con, $query1);
	$data1 = mysqli_fetch_array($sql1);
	// print_r($data1);

	$query2 = "SELECT image from uploads where user_id = '$user_id'";
	$sql2 = mysqli_query($con, $query2);
	$pattern = 1;
	$count = 4;
}

?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <title>Blueprint: Multi-Level Menu</title> -->
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="css/organicfoodicons.css" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="js/modernizr-custom.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
<style>

body{
    background: url("../login/assets/img/back.jpg");
    background-attachment: fixed;
    color:white;
  }
    .menu{
        font-family: QuickSand;
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
}


















li.menu_item {
    padding: 5px 20px;
    font-size: 1.25rem;
    font-weight: 700;
    margin-top: 1%;
    text-decoration: none;
    color: white;
}
li.menu_item a{
    padding: 5px 20px;
    font-size: 1.25rem;
    font-weight: 700;
    margin-top: 1%;
    text-decoration: none;
    color: white;
}
.dot{
	display: none;
}
.prosmall{
	display: none;
}
.details{
	display: none;
}
.headingus{
	display: none;
}
@media screen and (max-width: 40em){
	.dot{
		display: block;
		height:10px;
		width: 10px;
		background:#2ecc71;
		border-radius: 50%;
		border:1px solid #ffffff;
		position: fixed;
		top:98px;
		left:45px;
		transition: ease-in .2s;
	}
	.headingus{
		display: block;
		padding-left: 10px;
		position: absolute;
		top:5px;
		left:60px;
		transition: ease-in .2s;
	}
	.prosmall1{
		display: block;
		transition: ease-in .2s;
	}
	.prosmall1:hover .prosmall{
		width: 150px;
		height: 150px;
	}
	.prosmall1:hover .headingus{
		margin-left: 120px;
	}
	.prosmall1:hover .dot{
		top: 80px;
		left: 40px;
	}
	.details{
		transition: ease-in .2s;
	}
	.details h4{
		font-size: 0.85rem;
	}
	.prosmall1:hover .details{
		display: flex;
		flex-direction: column;
		font-size:0.6rem;
		position: absolute;
		left:200px;
		top:50px;
	}
/*	.headingus:hover .prosmall{
		height: 55px;
		width: 55px;
	}*/
	.prosmall{
		display:block;
		height: 40px;
		width: 40px; 
		border-radius: 50%;
		margin-bottom: 20px;
		transition: ease-in .2s;
	}
/*	.prosmall:hover .dot{
		top:110px;
		left:60px;
	}*/
/*
	.prosmall:hover{
		height:55px;
		width:55px;
	}*/

/*	.prosmall:hover .headingus{
		margin-left:5px;
	}*/

}
#previous-button{
	outline: none;
}#next-button{
	outline: none;
}#close-button{
	outline: none;
}
</style>
</head>

<body>
	<!-- Main container1 -->
	<div class="container1">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<div> <h2 class="dummy-heading menu__breadcrumbs_my_profile" style="color: white;">My Profile</h2> </div>
				<div class="" style="margin: 0 auto;">
					<div style="border-radius: 50%; background:rgba(92,94,220,0.7); height: 72px; width: 72px; margin: 0 auto;"><img src="<?php echo $data1['user_image']; ?>" style="height: 69px; width: 69px; border-radius: 50%;margin:2px auto;"></div>
				</div>
				<div> <h2 class="dummy-heading menu__breadcrumbs_profile_name" style="color: white;"><?php echo $data1['user_name']; ?></h2></div>
				<!-- <div class="row">
					<div class="col-sm-4 col-lg-4 barhere" style="margin-left:7px auto"><?php echo $data1['user_shots']; ?><p><span class="detailhere">SHOTS</span></p></div>
					<div class="col-sm-4 col-lg-4 barhere" style="margin-left:7px auto"><?php echo $data1['user_like']; ?><p><span class="detailhere">LIKES</span></p></div>
					<div class="col-sm-4 col-lg-4 barhere" style="margin-left:7px auto"><?php echo $data1['user_comment']; ?><p><span class="detailhere">COMMENTS</span></p></div>
				</div> -->
			</div>
		</header>
		
<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap"> 
				<ul data-menu="main" class="menu__level">
					<li class="menu_item prosmall1"><img src="pp.jpeg" class='prosmall' \>

					<a href="#" class="headingus">PROFILE</a>
					<div class="details">
						<h4 style="font-size: 2.3rem;"><?php echo $data1['user_name']; ?></h4>
						<!-- <ul style="margin-left:-25px;"><li>Programmer</li><li>Developer</li><li>Frontend Designer</li><li>Backend Manager</li></ul> -->
					</div>
				</li>
					<li class="menu_item"><a class="menu_link" data-submenu="submenu-4" href="gallery/index.php" style="margin-top: 20px; font-size: 1.5rem;">Home</a></li>
					<li class="menu_item"><a class="menu_link" data-submenu="submenu-4" href="login/upload.php" style="margin-top: 10px; font-size: 1.5rem;">Upload Image</a></li>
					<li class="menu_item"><a class="menu_link" data-submenu="submenu-4" href="login/about.php" style="margin-top: 10px; font-size: 1.5rem;">About</a></li>
					<li class="menu_item"><a class="menu_link" data-submenu="submenu-4" href="login/logout.php" style="margin-top: 10px; font-size: 1.5rem;">Logout</a></li>		
				</ul>
			</div>
		</nav>
	<div class="content gallery-container">
		<ul class="products">
			<li>
			    <div id="columns">
			     <?php while ($row = mysqli_fetch_array($sql2)) : ?>
			        <figure>
			        <img src=<?php echo $row['image']; ?>>
			        <figcaption>Design by : <?php echo $data1['user_name']; ?></figcaption>
			        </figure>
			      <?php endwhile; ?>
			  </div>
			</li>
		</ul>
	</div>
</div>
	<!-- /view -->
	<script src="js/classie.js"></script>
	<script src="js/dummydata.js"></script>
	<script src="js/main.js"></script>
	<script>
		(function () {
			var menuEl = document.getElementById('ml-menu'),
				mlmenu = new MLMenu(menuEl, {
					// breadcrumbsCtrl : true, // show breadcrumbs
					// initialBreadcrumb : '', // initial breadcrumb text
					backCtrl: false, // show back button
					// itemsDelayInterval : 60, // delay between each menu item sliding animation
					onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
				});

			// mobile menu toggle
			var openMenuCtrl = document.querySelector('.action--open'),
				closeMenuCtrl = document.querySelector('.action--close');

			openMenuCtrl.addEventListener('click', openMenu);
			closeMenuCtrl.addEventListener('click', closeMenu);

			function openMenu() {
				classie.add(menuEl, 'menu--open');
				closeMenuCtrl.focus();
			}

			function closeMenu() {
				classie.remove(menuEl, 'menu--open');
				openMenuCtrl.focus();
			}

			// simulate grid content loading
			var gridWrapper = document.querySelector('.content');

			function loadDummyData(ev, itemName) {
				ev.preventDefault();

				closeMenu();
				gridWrapper.innerHTML = '';
				classie.add(gridWrapper, 'content--loading');
				setTimeout(function () {
					classie.remove(gridWrapper, 'content--loading');
					gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
				}, 700);
			}
		})();
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>

</body>

</html>