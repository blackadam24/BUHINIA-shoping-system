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

<?php
include 'header.php';
include 'connection.php';
?>


<div class ="form2">
 <form method="post">
  <h1 id="hedsign">User Signup</h1>
  
  <div class="mb-3">
    
    <input type="text" name="username" class="form-control" placeholder="Username" >
    
  </div>
  <div class="mb-3">

    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email">
  </div>

  
  <div class="mb-3">
   
    <input type="text" class="form-control" name="devaddress" placeholder="Address">

  </div>

  <div class="mb-3">
   
    <input type="password" class="form-control" name="passw" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="mb-3">
  
    <input type="text" class="form-control" name="mobile1" placeholder="Mobile No.1">
  </div>

  <div class="mb-3">
   
    <input type="text" class="form-control" name="mobile2"  placeholder="Mobile No.2">
  </div>


  <!------------submit button------------>
  
 <button type="submit" class="btn btn-danger" name="signup" id="signup">Signup</button>

 
</form>


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
  $mobile2 = $_POST['mobile2'];
  $sql = "INSERT INTO user(uname,email,addres,passw,mobile1,mobile2) values ('$username','$email','$address','$passw','$mobile1','$mobile2')";

  if ($con->query($sql)===TRUE){
    {
      ?>
    <script>alert("User added successfully!!");</script>
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
    background:aquamarine;
}
.form2 {
    position:absolute;
    margin-top: 6%;
    margin-left: 40%;
    height: 60%;
    width: 25%;
    padding:15px;
    border:10px solid red;
 
    position: absolute;
    
    z-index:1;
    
    
}
h1{
  color:black;
}
.form-control{
 
    margin-top:10px;
    
}
.form-label{
    color:white;
    font-weight: 200px;
  
}
#hedimg{
    position:absolute;
    margin-top:-700px;
    margin-left:700px;
    height:600px;
    width:600px;
    border:10px solid #a600bf;
    border-radius: 10px;
}

</style>

</body>
</html>