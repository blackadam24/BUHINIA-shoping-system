<?php

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


<!------------------------------product buy-------------------------------->




<div class ="form2">
 <form method="post">
  <h1 id="hedsign">Billing details</h1>
  
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="username" class="form-control" >
    
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
  </div>

  
  <div class="mb-3">
    <label  class="form-label"> Address</label>
    <input type="text" class="form-control" name="devaddress" >

  </div>

  <div class="mb-3">
    <label  class="form-label">Mobile number 1</label>
    <input type="text" class="form-control" name="mobile1" >
  </div>

  <div class="mb-3">
    <label class="form-label">Mobile number 2</label>
    <input type="text" class="form-control" name="mobile2" >
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="price" readonly >
  </div>
  
   
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="orderplaced" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Cash on delivery
  </label>

  
 </div>


  <!------------submit button------------>
  
 <button type="submit" class="btn btn-warning" name="signup" id="signup">Confirm order</button>

 
</form>



<!------------------------ product buy php-------------------->

<?php

if($con->connect_error){
  die("connection error: " . $con->connect_error);
}
if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $address = $_POST['devaddress'];
  $passw = $_POST['passw'];
  $mobile1 = $_POST['mobile1'];
  $mobile2 = $_POST[''];
  $sql = "INSERT INTO user(uname,email,addres,passw,mobile1,mobile2) values ('$username','$email','$address','$passw','$mobile1','$mobile2')";

  if ($con->query($sql)===TRUE){
    {
      ?>
    <script>alert("Purchaed successfully!!");</script>
    <?php
    }
    
  }
  else{
    ?>
    <script>alert("connection error !");</script>
    <?php
  }
}

$con->close();




?>









<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background:white;
}
.form2 {
    position:absolute;
    margin-top: 2%;
    margin-left: 35%;
    height: 80%;
    width: 25%;
    background:#a600bf;
    padding:15px;
    border-radius: 10px;
    position: absolute;
    box-shadow: 6px 6px 6px 6px grey;
    z-index:1;
    
    
}
.form-control{
    border-radius: 13px;
    margin-top:10px;
    
}
.form-label{
    color:white;
    font-weight: 200px;
  
}

#signup{
    margin-top:5%;
}
.form-check{
    color:white;
}

</style>



</body>

</html>