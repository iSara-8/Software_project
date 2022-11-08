<?php
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



</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="ihome" id="ihome">

    <div class="content">
        <h3>Bella Rosa </h3> <br> <br> <br> 
        <?php
            if(isset($_SESSION['admin'])){
                echo"<a href='homePage.php' class='ibtn'>Home</a>";
                echo"<a href='api.php?logout=1' class='ibtn'>Logout</a>";
            } 
            else{
                echo"
                <a href='homePage.php' class='ibtn'> Guest</a>
                <a href='login.php' class='ibtn'>Log in as admin</a>
                ";      
            }
        ?>
    </div>
    
</section>

<!-- home section ends -->



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
        <a href="products.php ">All</a>
        <a href="products.php?req=bouquet">Bouquets</a>
        <a href="products.php?req=vase">Vases</a>
        <?php if(isset($_SESSION['admin'])) echo "<a href='add-product.php' >Add New Product</a>"?>
      </ul>

    <p>©2022 Bella Rosa | Some Rights Reserved</p>
</footer>

<!-- footer section ends -->
    
</body>
</html>