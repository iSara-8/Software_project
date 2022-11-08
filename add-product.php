<?php
include('session.php');
include('DB.php');

$admin = isset($_SESSION['admin']);
if (!$admin) {
  header("location:index.php");
}
$update = isset($_GET['id']);
if ($update) {
  $query = mysqli_query($con, "select * from products where id= {$_GET['id']}");
  $data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel=" icon " href="img/logo.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  
  <title><?php
    if ($update) echo "Update";
    else echo "Add New"
    ?> Product
  </title>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="product-information.css" />
</head>

<body>
  <!-- header section starts  -->
  <header>
    <img src="img/logo.png" class="logo" width="170" height="170" />

    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="products.php ">All</a>
    </nav>

    <div class="icons">
      <a href="login.php" target="_blank"><img src="img/log-icon.png" class="logo" width="20" height="25" id="icon3" /></a>
      <a href="index.php" target="_blank"><img src="img/logout.png" class="logo" width="25" height="25" id="icon3" /></a>
    </div>
  </header>
  <section class="products" id="products">
    <div class="container">
      <form  method="POST" enctype="multipart/form-data">
      <div class="box">
        <div class="images">
          <div class="img-holder active">
            <div class="form">
              <h2 class="h2">Upload 4 picture</h2>
              <div class="grid">
                <div class="form-element" id="pic1">
                  <input type="file" name='img-1' id="file-1" accept="image/*" />
                  <label for="file-1" id="file-1-preview">
                    <img src="<?php if($update)echo "img/{$data['img1']}"; else echo"https://bit.ly/3ubuq5o"?>" alt="" />
                    <div>
                      <span>+</span>
                    </div>
                  </label>
                </div>
                <div class="form-element" id="pic2">
                  <input type="file" name='img-2' id="file-2" accept="image/*" />
                  <label for="file-2" id="file-2-preview">
                    <img src="<?php if($update)echo "img/{$data['img2']}"; else echo"https://bit.ly/3ubuq5o"?>" alt="" />
                    <div>
                      <span>+</span>
                    </div>
                  </label>
                </div>
                <div class="form-element">
                  <input type="file" name='img-3' id="file-3" accept="image/*" />
                  <label for="file-3" id="file-3-preview">
                    <img src="<?php if($update)echo "img/{$data['img3']}"; else echo"https://bit.ly/3ubuq5o"?>" alt="" />
                    <div>
                      <span>+</span>
                    </div>
                  </label>
                </div>

                <div class="form-element">
                  <input type="file" name='img-4' id="file-4" accept="image/*" />
                  <label for="file-4" id="file-4-preview">
                    <img src="<?php if($update)echo "img/{$data['img4']}"; else echo"https://bit.ly/3ubuq5o"?>" alt="" />
                    <div>
                      <span>+</span>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="basic-info">
          <h1>Product Name:</h1>
          <input  required type="text" class="info" name='name' <?php if($update) echo "value='{$data['name']}'";?>>
          <h1>Product Price:</h1>
          <input required  type="number" class="info" name='price' <?php if($update)echo "value='{$data['price']}'";?>>
        </div>
        <div class="description">
          <h1>Description:</h1>
          <textarea name='description' ><?php if($update)echo $data['description'];?></textarea>
          <h1>Product Type:</h1>
          <div class="product-type">
            <input required  type="radio" value='bouquet' name="type" id="dot-1" <?php if($update && $data['type']=='bouquet')echo "checked"?>>
            <input required  type="radio" value='vase'    name="type" id="dot-2" <?php if($update && $data['type']!='bouquet')echo "checked"?>>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="type">Bouquet</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="type">Vase</span>
              </label>
            </div>
            <br />
            <br />
            <br />
            <div class="options" style="display: flex;height: 40px;width: 100%;justify-content: center;justify-content: center;">
              <input required  type='submit' name='sub' value="<?php if(!$update) echo"Add New Product"; else echo"Update Product"?>"
              style='height: auto;width: 100%;background: #D590C4;color: white;font-size: 18px;cursor:pointer;'>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php
      if(isset($_POST['sub'])){
        if($update){
          $arr= array(); 
          for($i=1; $i<=4; $i++){
            if($_FILES['img-'.$i]['name']!=""){
              $file= time().$_FILES['img-'.$i]['name'];
              $folder = "img/$file";
              move_uploaded_file($_FILES["img-".$i]["tmp_name"], $folder);
            }
            else{
              $file = $data['img'.$i];
            }
            $arr['img'.$i] = $file;
          }
          
          mysqli_query($con, "
            UPDATE `products` SET 
            `name` = \"{$_POST['name']}\",
            `price` = {$_POST['price']}, 
            `description` = \"{$_POST['description']}\", 
            `type` = \"{$_POST['type']}\", 
            `img1` = '{$arr['img1']}', 
            `img2` = '{$arr['img2']}', 
            `img3` = '{$arr['img3']}', 
            `img4` = '{$arr['img4']}'
            WHERE id = {$data['id']}
            ");
          echo "<script>alert('Updated Successfully');window.location.href='add-product.php?id={$data['id']}';</script>";
        }
        else{
          $arr= array(); 
          for($i=1; $i<=4; $i++){
            $file= time().$_FILES['img-'.$i]['name'];
            $folder = "img/$file";
            if($_FILES['img-'.$i]['name']=="") $file="";
            $arr['img'.$i] = $file;
            move_uploaded_file($_FILES["img-".$i]["tmp_name"], $folder);
          }
          mysqli_query($con, "
          INSERT INTO `products` (`name`, `price`, `description`, `type`, `img1`, `img2`, `img3`, `img4`)
          VALUES (\"{$_POST['name']}\", {$_POST['price']}, \"{$_POST['description']}\", '{$_POST['type']}', '{$arr['img1']}', '{$arr['img2']}', '{$arr['img3']}', '{$arr['img4']}')
          ");
          echo "<script>alert('Added Successfully');window.location.href='add-product.php';</script>";
        }
      }
    ?>
    </div>

    <script>
      function added(ff){
        $.ajax({
          url:'api.php',
          method: 'POST',
          data : ff,
          success : (res) => console.log(res)
        })
      }
    </script>
  </section>
  
    <!-- footer section starts  -->

    <!--FOOTER START------------------------------------------------------------------------->
    <footer>
      <hr class="h" />
      <ul class="social_icon">
        <li>
          <a href="https://www.instagram.com/" target="_blank"><img src="img/instgram.jpg" alt="instagram" /></a>
        </li>
        <li>
          <a href="https://www.whatsapp.com/" target="_blank"><img src="img/whats.jpg" alt="whatsapp" /></a>
        </li>
        <li>
          <a href="https://twitter.com/home" target="_blank"><img class="twitt" src="img/twitter.png"
              alt="twitter" /></a>
        </li>
      </ul>
      <ul class="menu">
        <li><a href="index.php">home</a></li>
        <li><a href="bouquets.php">Bouquets</a></li>
        <li><a href="vases.php">Vases</a></li>
      </ul>

      <p>©2022 Bella Rosa | Some Rights Reserved</p>
    </footer>

    <!-- footer section ends -->
    <script src="add-product.js"></script>
</body>

</html>