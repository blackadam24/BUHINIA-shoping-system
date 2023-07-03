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


<div class ="form1">
 <form method="post">
  <h1 id="hedlog">User Login</h1>
  
  <div class="mb-3">
    
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Email">
    
  </div>
  <div class="mb-3">
   
    <input type="password" class="form-control" name="passw" id="exampleInputPassword1" placeholder="Enter your password">
  </div>

   
	<select name="utypes">
		<option value="">staff type</option>
		<option value="chief accountant">chief accountant</option>
		<option value="production manager">production manager</option>
        <option value="handling clerk">handling clerk</option>

	<select>

  <!------------submit button------------>
  <div class="btns2">
 <button type="submit" class="btn btn-warning" name="users" id="users">User</button>
 <button type="submit" class="btn btn-primary"  name="adminbtn" id="adminbtn">Staff</a></button>



  </div>
 
</form>

</div>



<?php
include 'header.php';
include 'connection.php';

/*----------- user login php--------------*/

$con = mysqli_connect('localhost','root','','buh');


if(isset($_POST['users'])){
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $query = "select * from user where email='".$email."' and passw='".$passw."'";
    $result = mysqli_query($con, $query);
    if ($result){
        while ($row = mysqli_fetch_array($result)){

        }
        if (mysqli_num_rows($result)>0){
            ?>
            <script>window.location.href="home.php"</script>
        <?php
        }
        else{
           ?>
           <script>alert("Login unsuccessfull!!")</script>
           <?php
        }
    }
    $con->close();
      

}

/**************admin login php*************/


if(isset($_POST['adminbtn'])){
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $utype = $_POST['utypes'];
    $query1 = "select * from admin where email='".$email."' and passwrd='".$passw."' and utype='".$utype."'";
    $result = mysqli_query($con, $query1);
    if ($result){
        while ($row = mysqli_fetch_array($result)){
            $dbrole = $row['utype'];

        }
        if (mysqli_num_rows($result)>0){
            switch($dbrole){
                case "production manager":
                    echo'<script>alert(" Production Manager Login success !");</script>';
                    header("location:admin.php");
                    break;
                case"chief accountant":
                    echo"<script>alert(' Chief Accountant Login success !');</script>";
                    header("location:accountant.php");
                    break;
                case"handling clerk":
                    echo"<script>alert(' Chief Accountant Login success !');</script>";
                    header("location:clerk.php");
                    break;
                default:
                    echo"<script>alert('  Login unsuccess !')</script>";
        }
    }
        else{
           ?>
           <script>alert("Login unsuccessfull!!")</script>
           <?php
        }
    }
    $con->close();
      

}



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
.form1 {
    margin-top: 12%;
    margin-left: 40%;
    height: 40%;
    width: 25%;
   border:8px solid red;
    padding:15px;
    position: absolute;
  
    
}
.form-control{
   
    margin-top:10px;
    
}
.form-label{
    color:white;
    font-weight: 200px;
  
}
#users{
    font-weight: bold;
    margin-left:100px;
    margin-top:25px;
    display:flex;
    flex-direction:column;
    width:90px;
    border:1px yellow solid;
    align-items: center;
}
#adminbtn{
    margin-top:-8.5%;
    margin-left:230px;
    width:90px;

}
#fogpass{
    position: absolute;
    margin-left:-160px;
    margin-top:40px;
    color:black;
}
#hedimg{
    position:absolute;
    margin-top:100px;
    margin-left:1100px;
    height:600px;
    width:600px;
    border:10px solid #a600bf;
    border-radius: 10px;
}
#hedlog{
    position:relative;
    margin-left:38%;
    color:black;
    font-weight:bold;
}



.form-control:hover{
    
    box-shadow: 2px  3px 5px black;
}


</style>

</body>
</html>








