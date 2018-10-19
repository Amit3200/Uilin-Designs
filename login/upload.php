
<?php
include("conn.php");
ob_start();
session_start();
if(!isset($_SESSION['user_id']))
	header("refresh:0;url=login/login.php");


if(isset($_FILES['image']['name'])){

	if(isset($_FILES['image']['name'])){
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$user_id = $_SESSION['user_id'];
		
		$ext = array("jpeg", "jpg", "png");

		if(in_array($file_ext, $ext) === false)
			echo "File extension not supported";
		elseif($file_size > 5000071)
			echo "Size limit exceed";
		else{
			if (move_uploaded_file($file_tmp, "../user_data/uploads/".$file_name)) {
				$image_dir = "user_data/uploads/".$file_name;
				$sql = "INSERT into uploads(user_id,image) values($user_id, '$image_dir')";
				if(!mysqli_query($con,$sql))
				echo "Not Uploaded...";
				else
					echo "Uploaded"; 
			}
			else echo "Not Uploaded...";
			
		}
	}

	else{
		echo("Some problem occured");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
  	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
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

	<style type="text/css">
	body{
		font-family:"Quicksand"!important;
	}
	.footer.has-cards {
  padding-top:660px;
}
		.file-upload {
		  width: 80%;
		  margin: 0 auto;
		  padding: 40px;
		}

		.file-upload-btn {
		  width: 100%;
		  margin: 0;
		  color: #fff;
		  background: #ffc601;
		  border: none;
		  padding: 10px;
		  border-radius: 4px;
		  border-bottom: 1px dashed #ffc601;
		  transition: all .2s ease;
		  outline: none;
		  text-transform: uppercase;
		  font-weight: 700;
		}

.file-upload-btn:hover {
    background: #ffc601;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
}

		.file-upload-btn:active {
		  border: 0;
		  transition: all .2s ease;
		}

		.file-upload-content {
		  display: none;
		  text-align: center;
		}

		.file-upload-input {
		  position: absolute;
		  margin: 0;
		  padding: 0;
		  width: 100%;
		  height: 100%;
		  outline: none;
		  opacity: 0;
		  cursor: pointer;
		}

		.image-upload-wrap {
		  margin-top: 20px;
		  border: 1px dashed #ffc601;
		  position: relative;
		}

		.image-dropping,
		.image-upload-wrap:hover {
		  background-color: #ffc601;
		  border: 1px dashed #ffffff;
		}

		.image-title-wrap {
		  padding: 0 15px 15px 15px;
		  color: #222;
		}

		.drag-text {
		  text-align: center;
		}

		.drag-text h3 {
		  font-weight: 100;
		  text-transform: uppercase;
		  color: #ffc601;
		  padding: 60px 0;
		}

		.file-upload-image {
		  max-height: 200px;
		  max-width: 200px;
		  margin: auto;
		  padding: 20px;
		}

		.remove-image {
		  width: 200px;
		  margin: 0;
		  color: #fff;
		  background: #cd4535;
		  border: none;
		  padding: 10px;
		  border-radius: 4px;
		  border-bottom: 4px solid #b02818;
		  transition: all .2s ease;
		  outline: none;
		  text-transform: uppercase;
		  font-weight: 700;
		}

		.remove-image:hover {
		  background: #c13b2a;
		  color: #ffffff;
		  transition: all .2s ease;
		  cursor: pointer;
		}

		.remove-image:active {
		  border: 0;
		  transition: all .2s ease;
		}
				body{
			font-family: QuickSand;
			color:black!important;
			background: url("assets/img/back.jpg");
		}
		 .logohere{
                font-family: "Poppins","QuickSand";
                font-weight: bolder;
                color:black;
            }
	</style>

</head>
<body>
  <header class="navbar navbar-expand navbar-dark flex-row align-items-md-center ct-navbar" style="background: white;border-radius: 0px;">
    <a class="navbar-brand mr-0 mr-md-2" href="../gallery/index.php" aria-label="Bootstrap">
     <h3 class="logohere">Uilin</h3>
     <span style="color:black;">Powered by ToughX</span>
    </a>
  </header>
  <div class="container-fluid">
<div class="file-upload row">
	<div class="col-sm-12 col-lg-12">
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <button class="file-upload-btn" type="sumbit"><strong>Upload Image</strong></button>
  <div class="image-upload-wrap">
    <input class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" />
    <div class="drag-text">
      <h3 style="font-size: 2.4rem;font-weight: bolder;color:white;">Upload here!!</strong></h3>
      <span style="font-family: 0.7rem;position: absolute;top:110%;left: 0;right: 0;color:white;">Drag and Drop your Design to upload we recommend 800x600 resolution for the best experience</span>
    </div>
  </div>
</form>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove </button>
    </div>
  </div>
</div>
</div>
</div>
<footer class="footer has-cards">
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">Support Uilin</h3>
          <h4 class="mb-0 font-weight-light">We hope you all would like it.</h4>
        </div>
      </div>
      <small> We are updating it. Currently it is beta version.</small>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            © 2018
            <a href="https://www.creative-tim.com" target="_blank">ToughX<a>.
          </div>
        </div>
      </div>
    </div>
  </footer>
<script type="text/javascript">
	function readURL(input) {
	  if (input.files && input.files[0]) {

	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('.image-upload-wrap').hide();

	      $('.file-upload-image').attr('src', e.target.result);
	      $('.file-upload-content').show();

	      $('.image-title').html(input.files[0].name);
	    };

	    reader.readAsDataURL(input.files[0]);

	  } else {
	    removeUpload();
	  }
	}

	function removeUpload() {
	  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
	  $('.file-upload-content').hide();
	  $('.image-upload-wrap').show();
	}
	$('.image-upload-wrap').bind('dragover', function () {
	        $('.image-upload-wrap').addClass('image-dropping');
	    });
	    $('.image-upload-wrap').bind('dragleave', function () {
	        $('.image-upload-wrap').removeClass('image-dropping');
	});
</script>

</body>
</html>