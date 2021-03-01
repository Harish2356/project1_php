<html>
    <head><title>Mobile Store</title></head>
    <body>
        <h1 id="heading">MOBILE STUDIO</h1>
    <span><a href="home.html">HOME &nbsp</a> <a href="index.php">INVENTORY</a></span>
        
    </body>
</html>
<?php

    require("mysqli_connect.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $query = "SELECT * FROM MOBILES";
        $result = mysqli_query($dbc,$query);
        while($row = mysqli_fetch_array($result)){
            
            echo "<div>" .$row['mobile_name'] . $row['price'] . $row['brand']. "</div>";
            echo "<br>";
        }
    }

?>
