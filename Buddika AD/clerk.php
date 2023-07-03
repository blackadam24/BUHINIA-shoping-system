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

<div class="insertdet">  
    <h1>Edit Products details</h1>
<form class="form12" action="admin.php" method="post" enctype="multipart/form-data">
    


    select image file to upload:
    <br><br>
    <input type="file" name="fileupload">

    <div class="mb-3">
 
    <input type="text" class="form-control" name="name" placeholder="Product Name">
  </div>

  <div class="mb-3">
 
    <input type="text" class="form-control" name="price" placeholder="Price">
  </div>

  <div class="mb-3">

    <input type="text" class="form-control" name="category" placeholder="Category" >
  </div>

  <div class="mb-3">
    
    <input type="text" class="form-control" name="quantity" placeholder="Quantity" >
  </div>

  

    <input class="btn btn-success" type="submit" name="insrt" value="Insert data">
    <input class="btn btn-warning" type="submit" name="updt" id="udat" value="Update data">
</form>
</div>

<?php
/***********************************indert product data****************************** */
if($con->connect_error){
  die("connection error: " . $con->connect_error);
}
if(isset($_POST['insrt'])){
   
  $filename =$_FILES['fileupload']['name'];
  $tmpname = $_FILES['fileupload']['tmp_name'];
  $folder ='images/';

  move_uploaded_file($tmpname,$folder.$filename);


  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $quantity = $_POST['quantity'];
 
  $sqlp = "insert into tbl_product(name,image,price,category,quantity) values ('$name','$filename','$price','$category','$quantity')";
  
  if ($con->query($sqlp)===TRUE){
    {
      ?>
    <script>alert("Product added successfully!!");</script>
    <?php
    }
    
  }
  else{
    ?>
    <script>alert("connection error !");</script>
    <?php
  }
  $con->close();
}



/***********************************************update product data***************************** */

if($con->connect_error){
  die("connection error: " . $con->connect_error);
}
if(isset($_POST['updt'])){
   
  $filename =$_FILES['fileupload']['name'];
  $tmpname = $_FILES['fileupload']['tmp_name'];
  $folder ='images/';

  move_uploaded_file($tmpname,$folder.$filename);

  
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $quantity = $_POST['quantity'];
 

  $tom = "update tbl_product set image='".$filename."',price='".$price."',category='".$category."',quantity='".$quantity."'  where name='".$name."'";
  if ($con->query($tom)===TRUE){
    {
      ?>
    <script>alert("Product updated successfully!!");</script>
    <?php
    }
    
  }
  else{
    ?>
    <script>alert("connection error !");</script>
    <?php
  }

  
}
?>

</body>
<style>
  body{
    background:aquamarine;
  }
    .insertdet{
        margin-top:5%;
        margin-left:40%;
        width:28%;
        box-sizing: border-box;
        border:10px solid red;
        padding:10px;
      

    }
    .form-control{
      margin-top:10px;
    }
    #udat{
      margin-left:50%;
    }
</style>
</html>