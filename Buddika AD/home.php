<?php 
include 'header2.php';
include 'connection.php';

?>

<html>
<head>



		<title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</head>
<body>

<form id="dropdown"  method="post">
	<select id="slct" name="category">
		<option value="">Product Categories</option>
		<option value="frock">Frocks</option>
		<option value="tshirt">Tshirts</option>

	<select>
	<button class="btn btn-warning"  name="search" type="submit">Search</button>	

</form>







<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '', 'buh');

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="home.php"</script>';
			}
		}
	}
}


?>



		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center">Products</h3><br />
			<br /><br />
			<?php
			    
					$query = "select * from tbl_product order by id asc";
					$results = mysqli_query($con, $query);
					if(mysqli_num_rows($results) > 0)
					{
						while($row = mysqli_fetch_array($results))
						{
							
							

					
				?>




 <?php
   if(isset($_POST['search'])){
		$category = $_POST['category'];
		$query = "select * from tbl_product where  category='".$category."'";
		$results = mysqli_query($con, $query);
		if(mysqli_num_rows($results) > 0)
		{
			while($row = mysqli_fetch_array($results))
			{




 ?>
<?php








?>



				
			<div class="col-md-4">
				<form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:10px solid red; background-color:yellow; border-radius:23px; padding:16px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-warning" value="Add to Cart" />

					</div>
				</form>
			</div>





<?php
	

		}
	}
}
}
					}

?>




			

	

<!-------------------------------search item-------------------------------->

<style>
#dropdown{
	position:absolute;
	padding:10px;
	margin-left:80%;

}
#dropdown option{
	padding:10px;
}
#slct{
	width:70%;
	height:10%;
}

</style>









		   













			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th  width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><button  class="btn btn-primary" method="post" name="deletebtn"><a  href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></button></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
if(isset($_POST['add_to_cart'])){



	$lan = mysqli_query($con,"select  quantity from tbl_product where name='".$values["item_name"]."'");
	while($row = mysqli_fetch_array($lan)){
	$lot = $row['quantity'];
	$rug = $lot - $values["item_quantity"];
	$toss = "update tbl_product set quantity='".$rug."' where name='".$values["item_name"]."'";
	$pab  = $con->query($toss);
	}

	


}


if(isset($_POST['deletebtn'])){


	$tap = mysqli_query($con,"select quantity from tbl_product where name='".$values["item_name"]."'");
	while($row = mysqli_fetch_array($tap)){

		$wat = $row['quantity'];
		$mug = $wat + $values["item_quantity"];
		$tls = "update tbl_product set quantity='".$mug."' where name='".$values["item_name"]."'";
		$pas  = $con->query($tls);
	}


}



?>


<div class ="form2">
 <form method="post">
  <h1 id="hedsign">Billing details</h1>
  
  <div class="mb-3">
   
    <input type="text" name="username" class="form-control" placeholder="Username">
    
  </div>
  <div class="mb-3">
    
    <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email Address">
  </div>

  
  <div class="mb-3">
   
    <input type="text" class="form-control" name="devaddress" placeholder="Address" >

  </div>

  <div class="mb-3">
    
    <input type="text" class="form-control" name="mobile1" placeholder="Mobile No.1" >
  </div>

  <div class="mb-3">
    
    <input type="text" class="form-control" name="mobile2" placeholder="Mobile No.2" >
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="text" class="form-control" name="price" value="<?php echo $total; ?>" placeholder="<?php echo $total?>" readonly >
  </div>
  
  <div class="mb-3">
    <label class="form-label">Date</label>
    <input type="text" class="form-control" name="curdate" value="<?php echo date("Y/m/d"); ?>" placeholder="<?php echo date("Y/m/d");?>" readonly >
  </div>
   
  <div class="form-check">
  <input class="form-check-input" name="chkbox" type="checkbox" value="orderplaced" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Cash on delivery
  </label>

  
 </div>


  <!------------submit button------------>
  
 <button type="submit" class="btn btn-danger" name="orderconfirm" id="signup">Confirm order</button>

 
</form>



<!------------------------ product buy php-------------------->

<?php



if(isset($_POST['orderconfirm'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['devaddress'];
	$mobile1 = $_POST['mobile1'];
	$mobile2 = $_POST['mobile2'];
	$price = $_POST['price'];
	$currnetdate = $_POST['curdate'];
	$chkbox = $_POST['chkbox'];
	$sqlt = "insert into orders(usrname,email,delivaddress,mobile1,mobile2,price,currentdate,placedorder) values ('$username','$email','$address','$mobile1','$mobile2','$price','$currnetdate','$chkbox')";
  
	if ($con->query($sqlt)===TRUE){
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





<!------------------------search bar---------------------------------->





<style>
	.d-flex{
		width:30%;
		margin-left:20px;
	}
	.form2 {
    position:absolute;
    margin-top: 2%;
    margin-left: 35%;
    height: 66%;
    width: 25%;
    border:10px solid red;
    padding:15px;

    position: absolute;

    z-index:1;
    
    
}
.table table-bordered{
	border:10px solid red;
}
.form-control{
 
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
    color:black;
}
</style>

</body>

</html>