
<?php
 
if(!(isset($_COOKIE['login']))){
    echo "Please login first!";
    exit;
}
else{

echo '<a href="logout.php">logout</a>
<br>
<h2>Add Products</h2>
<form action="insert_product.php" method="post">
<br> Product Name: <input type="text" name="product_name">
<br>description: <input type="text" name="description">
<br> <input type="radio"  name="products" value="electronics">
<label for="choice1">electronics</label>
<input type="radio"  name="products" value="furniture">
<label for="choice2">furniture</label>
<input type="radio"  name="products" value="kitchen">
<label for="choice3">kitchen</label>
<br>Cost: <input type="number" name="cost">
<br>Sell Price: <input type="number" name="sell_price">
<br>Quantity: <input type="number" name="quantity">
<br>Select a Vendor:';

include "dbconfig.php";

//create connection 
$con=mysqli_connect($hostname,$username, $password,$dbname1) 
or die ('Cannot connect to db');;

$query = "SELECT vendor_id,name from TECH3740.VENDOR" ;




    $result = $con->query($query);

    echo "<select name='vendor_names'>";

    while ($row =mysqli_fetch_array($result)) {
       

                  unset($id, $name);
                  $id = $row['vendor_id'];
                  $name = $row['name']; 
                  echo '<option value="'.$name.'">'.$name.'</option>';

}

    echo "</select>";
   
echo '

<input type="submit" name="submit">
</form>';

       mysqli_close($con);

    
}
?>

