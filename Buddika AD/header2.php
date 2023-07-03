<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a id ="logotxt" class="navbar-brand" href="#">BAUHINIA SHOPING</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        
        <li class="nav-item">
          <a class="nav-link" id="admin" href="login.php">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<style>

.container-fluid{
    position:fixed;
    background:red;
    height:80px;
    padding-top:23px;
    padding-left:30px;
    font-size: 20px;
    z-index:2;
       
}
#navbarNav{
    margin-left: 170px;
    position:absolute;
    color:white;
}
#navbarNav li{
    color:white;
}

#logotxt{
    font-size:28px;
    color:white;
    margin-left: 40%;
}
#log , #signup { 
  color:white;
}
#admin{
color:white;
margin-left:1800%;
font-weight: bold;
}

</style>
</body>
</html>