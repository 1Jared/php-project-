<?php

session_start();
if(!(isset($_COOKIE["login"]))){
    echo "Please login first!";
}
else{
    
    $description=$_POST["description"];
    $product_name=$_POST['product_name'];
  
    $type=$_POST["products"];
    $cost=$_POST["cost"];
    $sellprice=$_POST["sell_price"];
    $quantity=$_POST["quantity"];
    $vendor=$_POST["vendor_names"];
    $employee_name= $_COOKIE['employee_name'];

   
    include("dbconfig.php");


   
    
       
         if($quantity <= 0 && $sellprice <= 0 && $cost <= 0 ){
            echo "quantity, sell price or cost must be greater than 0";
          }   
         elseif($sellprice< $cost){
          echo "Sell price must be greater than cost";
         }
         elseif(empty($product_name) || empty($description) ||empty($type) || empty($cost)|| empty($sellprice)||empty($quantity)  ) {
         echo "Please fill in all the fields";
         }
         else{
                 // Create connection
                
                $mysqli = new mysqli($hostname, $username, $password, $dbname);
               // $result = $mysqli->query("SELECT name FROM Products_patdharn WHERE name = $name") or die( mysqli_error($conn));
              // $result = $mysqli->query("SELECT name FROM Products_patdharn WHERE name = $product_name");
               
               
               $query=("SELECT name FROM Products_patdharn WHERE name = $product_name")or die( mysqli_error($mysqli));

$results = mysqli_query($mysqli, $query);
                 
                   if($results){ 

                    echo "Cannot have the same product name";
   
                }
                else{
                    

                  
                  // Check connection
                if ($mysqli->connect_error) {
                  die("Connection failed: " . $mysqli->connect_error);
                  }
                  $sql = "INSERT INTO TECH3740_2021S1.Products_patdharn(name, description,type,sell_price,cost,quantity,e_id,v_id)
                  VALUES ('$product_name','$description','$type',$sellprice,$cost,$quantity,(SELECT employee_id from TECH3740.EMPLOYEE WHERE EMPLOYEE.name = '$employee_name'),(SELECT vendor_id from TECH3740.VENDOR WHERE VENDOR.name = '$vendor'))";
  
                  if ($mysqli->query($sql) === TRUE) {
                  echo "$product_name product has been added successfully";
                   } else {
                   echo "Error: " . $sql . "<br>" . $mysqli->error;
                     }
                }
            
                $mysqli->close();
            }
            
       





}

?>