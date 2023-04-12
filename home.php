<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  <style>
    body{
        background-image: url(icon/body.jpg);
}
/*---------navigation bar------------*/
.nav{
    background-color: rgb(255, 176, 248);
    height: 40px;
    width: auto;
    margin-top:-15px;
}
ul li {
    list-style-type: none;
    text-align: center;
    display: inline;
    float: right;
  }
a{
    display: block;
    padding: 10px;
    color:black;
    text-decoration: none;
  }
.home{
  background-color:#00FF00;
}
li a:hover {
    background-color:yellow;
    
  }
/*--------- Student Table box------------*/
.container{
    border: 1px solid black;
    height: 520px;
    width: 1000px;
    margin:auto;
    text-align: center;
    background-color: rgb(169, 252, 255);
}
.box{
    border: 1px solid white;
    height: 477px;
    margin:auto;
    width: auto;
    background-image: url(icon/home.jpeg);
    background-size: cover;
}
  </style>
</head>
<body>
 <?php
 //-----------------session start and control--------------------
  session_start();
  error_reporting(0);
  include("connection.php");
    $name = $_SESSION["name"];
    if($name){

    }else{
      header("location:admin.php");
    }
    
 ?>
<!-- -----------------------navigation Bar--------------------->
<div class="container">
    <div class="nav">
        <ul>
        <li><a href="logout.php">Log-Out</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li><a href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a class="home" href="home.php">Home</a></li>
        </ul>
    </div>
        
    <div class="box">

    </div>

</body>
</html>