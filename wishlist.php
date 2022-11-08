<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">
    <title>wishlist</title>


    <!-- custom css file link  -->
    <link rel="stylesheet" href="products.css">

</head>
<body>

<!-- header section starts  -->

<header>

    
   
    <img src="img/logo.png" class="logo" width="170" height="170">



    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="products.php ">All</a>
        <a href="products.php?req=bouquet">Bouquets</a>
        <a href="products.php?req=vase">Vases</a>
        <?php if(isset($_SESSION['admin'])) echo "<a href='add-product.php' >Add New Product</a>"?>
    </nav>

    <div class="icons">
        <a href="cart.php" target="_blank"> <img src="img/cart-icon.png"  class="logo" width="27" height="27" id="icon2" > </a>                      
    </div>

</header>

<!-- header section ends -->

 <!-- prodcuts section starts  -->

<section class="products" id="products">

    <h1 class="heading">  Wishlist </h1>

    <div class="box-container">

    <?php
        include('api.php');
        include('session.php');
        $arr = getCart($_SESSION['wish']);
        if(count($arr) == 0) echo "<h2>No items were added to wish list yet</h2>";
        foreach($arr as $i){
            echo"
            <div class='box'>
                <div class='image'>
                    <img src='img/{$i['img1']}' alt=''>
                </div>
                <div class='content'>
                    <h3>{$i['name']}</h3>
                    <div class='price'>{$i['price']} SAR</div>
                </div>
            </div>
            ";
        }
    ?>
    
    </div>

</section>

<!-- prodcuts section ends -->


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