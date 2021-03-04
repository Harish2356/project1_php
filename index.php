<?php
		session_start();
		if(isset($_POST["add_to_cart"]))
		{
				$_SESSION["mob_id"] = $_GET["mob_id"];
                $_SESSION["mobile_name"] = $_POST["hidden_name"];
                $_SESSION["price"] = $_POST["hidden_price"];
                echo '<script>window.location="checkoutform.php"</script>';
			//}
		}
?>
<html>
    <head><title>Mobile Store</title>
            <link rel="stylesheet" href="mob.css">
<!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
-->
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
        <img src="images/mobilestore.jpg" style="width: 100%; height: 438px; background-size: 100% 100%;">
</header>

        <h1 id="heading">INVENTORY</h1>
<!--    <span><a href="home.html">HOME &nbsp</a> <a href="index.php">INVENTORY</a></span>-->
<!--        <div class="container" style="width:700px;">-->
        <?php

    require("mysqli_connect.php");
        $query = "SELECT * FROM MOBILES";
        $result = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_array($result))
        {

?>
        <div>
            <form method="POST" action="index.php?action=add&mob_id=<?php echo $row["mob_id"];?>">
                <div style="border:1px solid black; background-color:#f1f1f1; width:30%; margin-left :10%; float: left;" align="center">
                    <img style="width: 280px;height: 400px;" src="images/<?php echo $row["image"]; ?>" class="img-responsive"/><br />
                    <h4 class="show_list"><?php echo $row["mobile_name"];?> (<?php echo $row["brand"];?>)</h4>
                    <h4 class="text-danger">PRICE : <?php echo $row["price"];?></h4>
                    <h4 class="show_list">VERSION : <?php echo $row["version"];?></h4>
					<h4>InStock<?php echo $row["quantity"];?></h4>
                    <input type="hidden" name="quantity" value="1" class="form-control" />
                    <input type="hidden" name="hidden_name" value="<?php echo $row["mobile_name"];?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>" />
                    <input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"];?>" />
                    <input type="submit" name="add_to_cart" style="margin-top:7px;" class="btn btn-success" value="Checkout" />
                </div>
            </form>
        </div>
        <?php
			
			}

		?>
        <br />
        <div>
            <table>

                <?php
				if(!empty($_SESSION["shopping_cart"]))
				{
				
				?>
                <tr>
                    <td> <input type="submit" name="checkout" value="Checkout" style="margin-top:5px;" class="btn btn-success" onclick="window.open('checkoutform.php', '_self');" /></td>
                </tr>
                <?php
					
				}
				
				?>
            </table>
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
