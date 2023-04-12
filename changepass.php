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
  .pass{
  background-color:#00FF00;
}
li a:hover {
  background-color:yellow;
    
  }
/*--------- Student Table box------------*/
.container{
    border: 1px solid black;
    height: 550px;
    width: 1000px;
    margin:auto;
    text-align: center;
    background-color: rgb(169, 252, 255);
}
.box{
    border: 1px solid white;
    height: 507px;
    margin:auto;
    width: auto;
    background-image: url(icon/pass.jpg);
    background-size: cover;
}
.heading{
    color:black;
    font-size:40px;
    margin:60px 0 0 -480px;
}
/*----------------------admin pannel-----------------*/
form {
        margin-left: 120px;
        width: 250px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-image: url(icon/login.jpg);
        background-size: cover;
      }

input[type="text"], input[type="password"] {
        width: 100%;
        padding: 5px 10px;
        margin: 5px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

input[type="submit"] {
        width: 100%;
        background-color: #00FF00;
        color: black;
        padding: 10px 10px;
        margin: 5px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      /* Add hover effect for buttons */
      input[type="submit"]:hover {
        background-color: #45a049;
      }

  </style>
</head>
<body>
<?php
//---------------------session check---------------------------------
  session_start();
  error_reporting(0);
  include("connection.php");
    $name = $_SESSION["name"];
    if($name){

    }else{
      header("location:admin.php");
    }
    
 

  //------------------store input data into variable------------------------
  $pname = $_POST["pname"];
  $nname = $_POST["nname"];
  $ppas = $_POST["ppass"];
  $npas = $_POST["npass"];

//--------------------------------validation------------------------- 
  if(isset($_POST["submit"])){

    if(empty($pname) || empty($nname) || empty($ppas) || empty($npas)){
      echo "<script>alert('All fields are required*');</script>";

    }else{
//-----------------------read data from database--------------------------
        $query = "SELECT * FROM admin;";
        $run = mysqli_query($conn, $query);
        while($data=mysqli_fetch_assoc($run)){
          if($data['username'] == $pname && $data['password']==$ppas){
            $valid = 1;
            $oldname = $data['username'];
            break;
          }
        }
        if($valid == 1){
          $query1 = "UPDATE admin SET username='$nname', password='$npas'
                  WHERE username='$oldname';";
            mysqli_query($conn, $query1);
            //echo "<script>alert('Your Username & Passwword Updated SucessFully')</script>";
            header("location:logout.php");
        }else{
          echo "<script>alert('Please enter your Old username & password correctly*')</script>";
        }
        
      }
    }    
  
  ?>
<!-- -----------------------navigation Bar--------------------->
<div class="container">
    <div class="nav">
        <ul>
        <li><a href="logout.php">Log-Out</a></li>
        <li><a class="pass" href="changepass.php">Change Password</a></li>
        <li><a href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
        
    <div class="box">
    <h2 class="heading">*Change Password*</h2><br>
<!-- ----------------------Form for User Inputs--------------------->
    <form action="" method="POST">

    Old Username:<input type="text" name="pname"><br>
    New Username:<input type="text" name="nname"><br>
    Old Password:<input type="text" name="ppass"><br>
    New Password:<input type="text" name="npass"><br><br>

    <input type="submit" name="submit" value="Change">
  
  </form> 
   
    </div>

</body>
</html>