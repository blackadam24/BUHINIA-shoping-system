<?php
include 'header2.php';
include 'connection.php';
?>


<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</head>
<body>
    


<div class="reportbtn">
  <!---product report-->
        <form method="post" class="prd">
       <h3>Products</h3><br>
      <input class="btn btn-warning" type="submit" name="prodrepo" value="Product report"><br><br>
        </form>
        <hr>
        <!----order report----->
      <form class="orderrepo" method="post">
      <h3>Daily Orders</h3>

      <div class="mb-3">
      <label class="form-label">Date</label>
     <input type="date" class="form-control" name="curdate"  >
      </div>

      <input class="btn btn-danger" type="submit" name="oderrepo" value="Order report"><br><br>
      </form>

    
     
</div>






<?php



/**********************************************************load order data *****************************/





if($con->connect_error){
  die("connection error: " . $con->connect_error);
}

if(isset($_POST['oderrepo'])){
        
  $curdate = $_POST['curdate'];
  
  $mysqt = "select * from orders where currentdate like '{$curdate}%'";
  $resultq = $con->query($mysqt);
  if($resultq->num_rows>0){
      
     echo "<table class='tbl1' border='5'><tr><th colspan='10'><h2>Orders<h2></th></h1></tr><tr><th>Oreder ID</th><th>User Name</th><th>Email</th><th>Address</th><th>Mobile1</th><th>Mobile2</th><th>Price</th><th>Date</th><th>Order Request</th></tr>";

  while($rows = $resultq->fetch_assoc()){
  echo "<tr><td>".$rows['orderid']."</td><td>".$rows['usrname']."</td><td>".$rows['email']."</td><td>".$rows['delivaddress']."</td><td>".$rows['mobile1']."</td><td>".$rows['mobile2']."</td><td>".$rows['price']."</td><td>".$rows['currentdate']."</td><td>".$rows['placedorder']."</td><tr>";
  }
  echo"<style>
  .tbl1{
      margin-top:16%;
      margin-left:40%;
      width:50%;
      border:6px solid red;
      padding:10px;
  }
  </style>";
  echo"</table><br>";
}
else{
  echo "0 results";
} 

  
}
/***************************************Monthly price calculation**************** */



?>





 














<?php


/***************************************product report**********************************************/
if($con->connect_error){
  die("connection error: " . $con->connect_error);
}

if(isset($_POST['prodrepo'])){
        

  
  $mysqt = "select * from tbl_product ";
  $wrt = $con->query($mysqt);
  if($wrt->num_rows>0){
      
     echo "<table class='tbl2' border='1'><tr><th colspan='10'><h2>Product report<h2></th></h1></tr><tr><th>Product ID</th><th>Product Name</th><th>Image</th><th>Price</th><th>Category</th><th>Quantity</th></tr>";

  while($rows = $wrt->fetch_assoc()){
  echo "<tr><td>".$rows['id']."</td><td>".$rows['name']."</td><td>".$rows['image']."</td><td>".$rows['price']."</td><td>".$rows['category']."</td><td>".$rows['quantity']."</td><tr>";
  }
  echo"<style>
  .tbl2{
      margin-top:16%;
      margin-left:40%;
      width:50%;
      border:6px solid yellow;
      padding:10px;
  }
  </style>";
  echo"</table><br>";
}
else{
  echo "0 results";
} 
$con->close();
  
}






?>




</body>
<style>
  body{
    background: aquamarine;
  }
    .insertdet{
        margin-top:5%;
        margin-left:5%;
        width:28%;
        box-sizing: border-box;
        border:2px solid black;
        padding:10px;
       

    }
    #adpnl{
        margin-top:3%;
    }
    .reportbtn{
      position:absolute;
      box-sizing: border-box;
      border:10px solid red;
      height: 44%;
      width:20%;
      margin-left:10%;
      padding:15px;
      margin-top:10%;
     

    }
    hr{
      border:2px solid red;
    }
    .incomemon{
      position:absolute;
      width:15%;
      margin-top:2%;
      margin-left:62%;


    }
  
</style>


</html>