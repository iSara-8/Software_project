<?php
	include('DB.php');
	include('session.php');
	include('api.php');
	if(isset($_SESSION['admin'])) header('location:homePage.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=" icon " href="img/logo.png">
    <title>Cart</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  
  
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cart.css">

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
        <a href="wishlist.php" target="_blank"><img src="img/heart-icon.png"  class="logo" width="27" height="25" id="icon1"></a>                                        
    </div>

</header>

<!-- header section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> Shopping </span> cart </h1>
    <div class="row"> </div>

</section>
<!-- about section ends -->


<!-- Start Cart -->
<div class="container">

    
	
	<div class="cart">

		<div class="products" id='allll'>
        <!-- Product one ---------------------------------------------------------------------------------->
		<?php
			
			$arr = getCart($_SESSION['cart']);
			if(count($arr) == 0) echo"<h2>No items added to cart yet!</h2>";
			$sum = 0;
			foreach($arr as $it){
				$sum += $it['price'];
				echo"
				<div class='product'>
					<img src='img/{$it['img1']}'>
					<div class='product-info'>
						<h3 class='product-name'>{$it['name']}</h3>
						<h4 class='product-price' id='{$it['id']}-price'>{$it['price']} SR</h4>
						<h5 class='product-quantity'>Quantity: 1</h5>
						<p class='product-remove' onclick='removeit(this, {$it['id']})'>Remove</p>
					</div>
				</div>
				";
			}
		?>
       <!-- Product one ---------------------------------------------------------------------------------->
		</div>

		<script>
			function removeit(element, id){
				$.ajax({
					url:'api.php',
					method: 'POST',
					data :{
						id:id,
						type:'cart',
						remove:true
					},
					success : (res) => console.log(res)
				})
				setcount(-1);
				console.log(id+'-price');
				let price = document.getElementById(id+'-price').innerHTML.split(' ')[0];
				console.log(document.getElementById(id+'-price'))
				setprice(-parseInt(price));
				element.parentElement.parentElement.remove();
				alert('Remove successfully');
			}

			function setprice(val){
				elem = document.getElementById('total-price')
				let num = 0
				num = parseInt(elem.innerHTML.split(' ')[0])
				num = num + parseInt(val)
				elem.innerHTML = `${num} SR`
			}
			function setcount(val){
				elem = document.getElementById('number-of-products')
				let num = 0
				num = parseInt(elem.innerHTML)
				num = num + parseInt(val)
				elem.innerHTML = `${num}`
			}
			function removeall(){
				document.getElementById('total-price').innerHTML = "0 SR"
				document.getElementById('number-of-products').innerHTML = 0
				$.ajax({
					url:'api.php',
					method: 'POST',
					data :{
						kill:true,
					},
					success : (res) => console.log(res)
				})
				document.getElementById('allll').innerHTML = "<h2>No items added to cart yet!</h2>";
			}
		</script>
		<div class="cart-total">
			<p>
				<span >Total Price</span>
				<span id='total-price'><?php echo $sum?> SR</span>
			</p>
			<p>
				<span>Number of Items</span>
				<span id='number-of-products'><?php echo count($arr)?></span>
			</p>
			
			<a class="CC" onclick="removeall()">Proceed to Checkout</a>
		</div>

	</div>


</div>

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