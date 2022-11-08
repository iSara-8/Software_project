<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">

    <title>Upload design</title>


    <!-- custom css file link  -->
    <link rel="stylesheet" href="upload.css">

</head>
<body>

<!-- header section starts  -->

<header>

    
   
    <img src="img/logo.png" class="logo" width="170" height="170">



    <nav class="navbar">
        <a href="index.php">home</a>
        <?php if(!isset($_SESSION['admin']))
            echo"<a href='products.php?req=bouquet'>Bouquets</a>
                 <a href='products.php?req=vase'>Vases</a>";
        else echo "<a href='add-product.php' >Add New Product</a>"?>
    </nav>

    <div class="icons">
        <a href="wishlist.php" target="_blank"><img src="img/heart-icon.png"  class="logo" width="27" height="25" id="icon1"></a>
        <a href="cart.php" target="_blank"> <img src="img/cart-icon.png"  class="logo" width="27" height="27" id="icon2" > </a>  
        <a href="login.php" target="_blank"><img src="img/log-icon.png"  class="logo" width="20" height="25" id="icon3"></a>  
        <a href="index.php" target="_blank"><img src="img/logout.png"  class="logo" width="25" height="25" id="icon3"></a>                     
                            
    </div>

</header>

<!-- header section ends -->

<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
<form class="form-container" enctype='multipart/form-data'>
	<div class="upload-files-container">
		<div class="drag-file-area">
			<span class="material-icons-outlined upload-icon"> file_upload </span>
			<h3 class="dynamic-message"> Drag & drop any Picture here </h3>
			<label class="label"> or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse Picture</span> <span>from device</span> </span> </label>
		</div>
		<span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please select a picture first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
        <span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please Upload a picture first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>

		<div class="file-block">
			<div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size">  </span> </div>
			<span class="material-icons remove-file-icon">delete</span>
			<div class="progress-bar"> </div>
		</div>
        <button  type="button" class="upload-button"> Upload </button>
        <a href="index.php"><button onclick="myFunction()" type="button" class="upload-button"> Send order </button></a>
	</div>
</form>

















<!-- footer section starts  -->

<!--FOOTER START------------------------------------------------------------------------->
<footer>
    <hr class="h">
    <ul class="social_icon">
      <li><a href="https://www.instagram.com/" target="_blank"><img src="img/instgram.jpg" alt="instagram"></a></li>
      <li><a href="https://www.whatsapp.com/" target="_blank"><img src="img/whats.jpg" alt="whatsapp"></a></li>
      <li><a href="https://twitter.com/home" target="_blank"><img class="twitt" src="img/twitter.png" alt="twitter"></a></li>
    </ul>
    <ul class="menu">
        <li><a href="index.php">home</a></li>
        <li><a href="bouquets.php">Bouquets</a></li>
        <li><a href="vases.php">Vases</a></li>
      </ul>

    <p>©2022 Bella Rosa | Some Rights Reserved</p>
</footer>

<!-- footer section ends -->
<script src="upload.js"></script>
    
</body>
</html>