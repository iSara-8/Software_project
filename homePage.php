<?php
    include('DB.php');
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">
    <title>Bella Rosa</title>


    <!-- custom css file link  -->
    <link rel="stylesheet" href="home.css">

</head>
<body>

<!-- header section starts  -->

<header>

    
   
    <img src="img/logo.png" class="logo" width="170" height="170">



    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="products.php ">All</a>
        <?php if(!isset($_SESSION['admin']))
            echo"<a href='products.php?req=bouquet'>Bouquets</a>
            <a href='products.php?req=vase'>Vases</a>";
        else echo "<a href='add-product.php' >Add New Product</a>"?>
    </nav>

    <div class="icons">
        <?php 
            if(isset($_SESSION['admin']))
            echo"<a href='api.php?logout=1' target='_blank'><img src='img/logout.png'  class='logo' width='25' height='25' id='icon3'></a>";
            else echo"                  
            <a href='wishlist.php' target='_blank'><img src='img/heart-icon.png'  class='logo' width='27' height='25' id='icon1'></a>
            <a href='cart.php' target='_blank'> <img src='img/cart-icon.png'  class='logo' width='27' height='27' id='icon2' > </a>  
         ";?>                   
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Be creative</h3>
        <span>Our ambition is sky high</span>
        <p>Create your own flowerbouquet now with your favorite type and colors!!</p>
        <?php if(!$admin) echo"<a href='upload.php' class='btn'>Upload design</a>";?>
        <a href="products.php" class="btn">View Our products</a>
    </div>
    
</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="about-img">
    <img src="img/aboutus.jpg" class="logo" >
           
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Bella Rosa has been around in the flower shop industry since year 2000. Bella Rosa being one of the top and leading florist in the Saudi  market, we still strive to expand our business through establishing more branches in different cities nationwide for faster and more efficient service. </p>
            <p>As one of the pioneer in the flower shop industry, we ensure that we only serve our best flowers along with the best service to satisfy the needs of our customers. Since the beginning our goal is to be the most trusted florist to cater the Saudi market that is why we established an online presence to widen the reach of potential customers and to accommodate people from all over the world who wants to send flowers here.</p>
            
        </div>

    </div>

</section>

<!-- about section ends -->


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
    
</body>
</html>