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
<div class ="inco">
<form method="post" class="incomerepo">
       <h3>Monthly Income Report</h3>
      <div class="mb-3">
    <label class="form-label">start date</label>
    <input type="date" class="form-control" name="fdate" >
  </div>


      <div class="mb-3">
      <label class="form-label">last date</label>
     <input type="date" class="form-control" name="curtdate">
      </div>

      <input class="btn btn-warning" type="submit" name="incomereport" value="Income report">

  
      



      </form>
  
</div>

</body>
<?php

if($con->connect_error){
  die("connection error: " . $con->connect_error);
}
if(isset($_POST['incomereport'])){
  $fdate = $_POST['fdate'];
  $ldate = $_POST['curtdate'];

  $query = "select price from orders where currentdate between '$fdate' and '$ldate' order by orderid asc";
  $resulttr = $con->query($query);

    $toincome = 0;

    while ($row = mysqli_fetch_assoc($resulttr)) {
    
      
      $toincome += $row['price'];
      
     
    
    }
    
  
  }
  
?>
  <div class="incomemon">
  <label class="form-label">Monthly income</label>
 <input type="text" class="form-control" name="incometo" value="<?php echo $toincome; ?>" placeholder="<?php echo $toincome; ?>"readonly>
  </div>

<style>
  body{
    background:aquamarine;
  }
    .inco{
        box-sizing: border-box;
        border:10px solid red;
        width:20%;
        height:46%;
        margin-top:6%;
        margin-left:20%;
        padding:10px;
    }
      .incomemon{
      position:absolute;
      width:15%;
      margin-top:-5%;
      margin-left:23%;


    }
    h3{
      color:white;
    }
  
</style>
</html>