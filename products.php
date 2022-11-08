<?php
include "DB.php";
include "session.php";
$sql = "SELECT * FROM products" ;
$result = mysqli_query($connection, $sql) ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">
    <title>View All</title>


    <!-- custom css file link  -->
    <link rel="stylesheet" href="products.css">

</head>
<body>

<!-- header section starts  -->

<header>
   
    <img src="img/logo.png" class="logo" width="170" height="170">

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="#" onclick="filter('all products');return false;">All</a>
        <?php if(!isset($_SESSION['admin'])) 
        echo "<a href='#' onclick=\"filter('bouquet');return false;\">Bouquets</a>
              <a href='#' onclick=\"filter('vase');return false;\">Vases</a>";
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

 <!-- prodcuts section starts  -->

<section class="products" id="products">

    <h1 class="heading" id='heading'> All Products  </h1>
      <div class="box-container" id='all-products'> 

        <?php 
        while($rows = mysqli_fetch_assoc($result))
        {   
            $id = $rows['id'];
            $name = $rows['name'] ;
            $price = $rows['price'] ;
            $description = $rows['description'] ;
            $type = $rows['type'] ;
            $img1 = 'img/'.$rows['img1']  ;
        ?>
            <div class="box" id=<?php echo "$id-$type"?>>
                <div class="image">
                    <a href="<?php echo"info.php?id=$id"?>" class="btn"><img src="<?php echo $img1; ?>" alt=""></a>
                </div>
                <div class="content">
                    <h3> <?php echo $name; ?> </h3>
                    <div class="price"> <?php echo $price."SAR"; ?>  </div>
                </div>
            </div>
        
        <?php } ?>
        </div>

</section>

<!-- prodcuts section ends -->

<script>
    function filter(str){
        console.log(str);
        element = document.getElementById('all-products')
        pro = element.children;

        for(var i=0; i<pro.length; i++){
            if(pro[i].id.split('-')[1]!=str && str!='all products')
                pro[i].style.display = 'none';
            else
                pro[i].style.display = 'revert';
        }
        document.getElementById('heading').innerHTML = str
    }
    <?php
        if(isset($_GET['req'])){
            echo"filter('{$_GET['req']}')";
        }
    ?>
</script>


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