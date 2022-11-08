<?php
    include "DB.php";
    include "session.php";

    if(!isset($_GET['id'])){
        header('location:products.php');
    }

    $query = mysqli_query($con, "select * from products where id={$_GET['id']}");
    $data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">
    <title><?php echo $data['name']?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  
  

    <!-- custom css file link  -->
    <link rel="stylesheet" href="product-information.css">

</head>
<body>

<!-- header section starts  -->
<header>
    
    <img src="img/logo.png" class="logo" width="170" height="170">

    <nav class="navbar">
        <a href="index.php">home</a>
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

<div class="container">
    <div class="box">
        <div class="images">
            <div class="img-holder active">
                <img src="<?php if($data['img1']=="")echo"https://bit.ly/3ubuq5o"; else echo "img/".$data['img1']?>">
            </div>
            <div class="img-holder">
                <img src="<?php if($data['img2']=="")echo"https://bit.ly/3ubuq5o"; else echo "img/".$data['img2']?>">
            </div>
            <div class="img-holder">
                <img src="<?php if($data['img3']=="")echo"https://bit.ly/3ubuq5o"; else echo "img/".$data['img3']?>">
            </div>
            <div class="img-holder">
                <img src="<?php if($data['img4']=="")echo"https://bit.ly/3ubuq5o"; else echo "img/".$data['img4']?>">
            </div>
        </div>
        <div class="basic-info">
            <h1><?php echo $data['name']?></h1>
            <span><?php echo $data['price']?> SAR</span>
            <div class="options">
                <?php 
                if($admin) echo"
                    <a href='add-product.php?id={$data['id']}'>Update Product Information</a> <br> <br> 
                    <a href='api.php?delete={$data['id']}'>Delete Product </a>";
                else echo"
                    <a href='#' onclick='addit(`cart`, {$data['id']});return false;'>Add to Cart</a> <br> <br> 
                    <a href='#' onclick='addit(`wish`, {$data['id']});return false;'><img src='img/white-heart.png' alt='' height='10px' width='10px'></a>";
                ?>
            </div>
        </div>
        <div class="description">
            <h1>Description:</h1>
            <p><?php echo $data['description']?></p>
        </div>
    </div>
</div>



<script>
    function addit(type, id){
        console.log('fsfsf')
        $.ajax({
            url:'api.php',
            method: 'POST',
            data :{
                id:id,
                type:type,
                add:true
            },
            success : (res) => console.log(res)
        })
        alert(`Added to ${type} successfully`)
    }
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