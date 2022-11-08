<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" icon " href="img/logo.png">
    <title>Log-in</title>


    <!-- custom css file link  -->
    <link rel="stylesheet" href="login.css">

</head>
<body>

<!-- header section starts  -->

<header>
   
    <img src="img/logo.png" class="logo" width="170" height="170">
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="products.php ">All</a>
        <a href="products.php?req=bouquet">Bouquets</a>
        <a href="products.php?req=vase">Vases</a>
        <?php if(isset($_SESSION['admin'])) echo "<a href='add-product.php' >Add New Product</a>"?>
    </nav>

    <div class="icons">
        <a href="wishlist.php" target="_blank"><img src="img/heart-icon.png"  class="logo" width="27" height="25" id="icon1"></a>
        <a href="cart.php" target="_blank"> <img src="img/cart-icon.png"  class="logo" width="27" height="27" id="icon2" > </a>                                          
    </div>

</header>

<!-- header section ends -->
<!-- about section starts  -->
<div class="color">
<div class="container">
    <form action="" method='POST'>
      <div class="title">Log-in</div>
      <div class="input-box underline">
        <input name='email' type="text" placeholder="Enter Your Email" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input name='password' type="password" placeholder="Enter Your Password" required>
        <div class="underline"></div>
      </div>
      <!--<div class="input-box button"> 
        <input type="submit" name="" value="Continue">
      </div> -->
      <div class="input-box button">
        <input name='login' type="submit" value="Log-in">
      </div>
    <?php
      include('DB.php');
      if(isset($_POST['login'])){
        $query = mysqli_query($con, "SELECT * from admin where Email='{$_POST['email']}'");
        if(trim($_POST['email'])=='' || trim($_POST['password'])==''){
          echo "<h2 style='color:red;'>Inputs can not be empty</h2>";
        }
        else if(!strpos($_POST['email'], '@')){
          echo " <h2 style='color:red;'> Not a valid email </h2>";
        }
        else if(mysqli_num_rows($query) == 0){
          echo "<h2 style='color:red;'> No such email exists! </h2>";
        }
        else if(mysqli_fetch_assoc($query)['Password'] != $_POST['password']){
          echo "<h2 style='color:red;'> Incorrect password </h2>";
        }
        else{
          session_start();
          $_SESSION['admin'] = true;
          header("location:homePage.php");
        }
      }
      ?>
    </form>
  </div>
</div>
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