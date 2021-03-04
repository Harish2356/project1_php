<?php
 
session_start();
require_once("mysqli_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(empty($_POST['firstname'])){
    echo "<script type='text/javascript'> alert('Please Enter First name');  </script>";
  }elseif(empty($_POST['email'])){
    echo "<script type='text/javascript'> alert('Please Enter email');  </script>";
  }elseif(empty($_POST['address'])){
    echo "<script type='text/javascript'> alert('Please Enter address');  </script>";
  }elseif(empty($_POST['city'])){
    echo "<script type='text/javascript'> alert('Please Enter city');  </script>";
  }elseif(empty($_POST['state'])){
    echo "<script type='text/javascript'> alert('Please Enter state');  </script>";
  }elseif(empty($_POST['zip'])){
    echo "<script type='text/javascript'> alert('Please Enter ZIP');  </script>";
  }elseif(empty($_POST['city'])){
    echo "<script type='text/javascript'> alert('Please Enter City');  </script>";
  }elseif(empty($_POST['cardname'])){
    echo "<script type='text/javascript'> alert('Please Enter the name on the card');  </script>";
  }elseif(empty($_POST['cardnumber'])){
    echo "<script type='text/javascript'> alert('Please Enter the Card Number');  </script>";
  }elseif(empty($_POST['expmonth'])){
    echo "<script type='text/javascript'> alert('Please Enter the expiry Month');  </script>";
  }elseif(empty($_POST['expyear'])){
    echo "<script type='text/javascript'> alert('Please Enter the Expiry year');  </script>";
  }elseif(empty($_POST['cvv'])){
    echo "<script type='text/javascript'> alert('Please Enter CVV');  </script>";
  }else {
    $firstname= $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $query1 = "INSERT INTO orders VALUES(null, '$firstname', '$email', '$address')";
    $result1 = mysqli_query($dbc, $query1) or die (mysqli_error($dbc));

    $id1=$_SESSION["mob_id"];
    $query2 = "Update MOBILES SET quantity=quantity-1 WHERE mob_id = '$id1'";
    $result2 = mysqli_query($dbc, $query2) or die (mysqli_error($dbc));
    echo "<script type='text/javascript'> alert('Thank You For your order');  </script>";
  }
  }
?>






<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mob.css">
    <link rel="stylesheet" href="checkout.css">
    <title>MOBILE STORE</title>
</head>
<body>
    <header>
        
    <nav id="page-nav">
        <label for="hamburger">&#9776;</label>
      <input type="checkbox" id="hamburger"/>
        <div class="logo"><h4>MOBILE STORE</h4></div>
        <ul class="nav-links">
            <li class="nav-bar1"><a href="Contact.html">Contact</a></li>
            <li class="nav-bar1"><a href="checkoutform.php">CHECKOUT</a></li>
            <li class="nav-bar1"><a href="index.php">INVENTORY</a></li>
            <li class="nav-bar"><a href="home.html">Home</a></li>
        </ul>
    </nav>
        <img src="images/checkout.jpg" style="width: 100%; height: 438px; background-size: 100% 100%;">
</header>
<?php
  

    $id = $_SESSION["mob_id"];
        $query = "SELECT mobile_name FROM MOBILES where mob_id= '$id'";
        $result = mysqli_query($dbc,$query);
    $num = mysqli_num_rows($result);
        
        if ($num > 0) {
            while($row = $result->fetch_assoc()) {
           
            $mobilename = $row["mobile_name"];
            }
        }

?>  
    
    
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkoutform.php" method="post">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
             <label for="Product"><i class=""></i>Product Name</label>
            <input type="text" id="product" name="productname" value="<?php echo $mobilename?>">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Full Name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" >
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" >

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" >
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards :</label>
              <br>
                <p><strong>1. Debit</strong></p>
                <p><strong>2. Credit</strong></p>
                <p><strong>3. MasterCard</strong></p>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Full Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
          
         
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

<!--
  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>4</b>
        </span>
      </h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
-->
</div>
    </body>
    <footer class="foot">
    <div>
    <i><a href="mailto:mobilestore@gmail.com">Email us</a></i><br>
    <i><a href="tel:548-883-3344">Contact us</a></i>
</div>
    <p>Copyright &copy; MobileStore | All rights reserved</p>
</footer>
</html>
