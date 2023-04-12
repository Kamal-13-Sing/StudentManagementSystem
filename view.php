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
li a:hover {
    background-color: rgb(87, 255, 110);
    
  }
/*--------- Student Table box------------*/

.table{
    background-color:#00FF00;
  }

.container{
    border: 1px solid black;
    height: 550px;
    width: 1000px;
    margin:auto;
    text-align: center;
    background-color: rgb(169, 252, 255);
}
.box{
    border: 1px solid black;
    height: 360px;
    margin: auto;
    border-radius:20px;
    width: 880px;
    background-color: rgb(252, 252, 252);
}
.one{
    height: 120px;
    width: 190px;
    display: inline-block;
    margin: 90px 35px 0 0;
}
.two{

    height: 120px;
    width: 260px;
    display: inline-block;
}
.image{

    height: 120px;
    width: 120px;
    display: inline-block;
}
.tr,td{
    padding-top:18px;
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
    
 ?>
<div class="container">
<!-- -----------------------navigation Bar--------------------->
    <div class="nav">
        <ul>
        <li><a href="logout.php">Log-Out</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li><a class="table" href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
        <h2 class="heading">Student Detail</h2><br>
    <div class="box">

    <?php
        include("connection.php");

        $id = $_GET["id"];
        
        $query = "SELECT * FROM std_data where id=$id;";
        $run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run);

    ?>
    <div class="one">
    <table>
        <tr>
            <td>Name:</td>
            <td><?php echo $data["student_name"]; ?></td>
        </tr>
        <tr>
            <td>Faculty:</td>
            <td><?php echo $data["faculty"]; ?></td>
        </tr>
        <tr>
            <td>DOB:</td>
            <td><?php echo $data["DOB"]; ?></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><?php echo $data["std_phone"]; ?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?php echo $data["gender"]; ?></td>
        </tr>
    </table>
    </div>
    <div class="two">
    <table>
        <tr>
            <td>Address:</td>
            <td><?php echo $data["address"]; ?></td>
        </tr>
        <tr>
            <td>Admission Date:</td>
            <td><?php echo $data["admission_date"]; ?></td>
        </tr>
        <tr>
            <td>Parent's Name:</td>
            <td><?php echo $data["parent_name"]; ?></td>
        </tr>
        <tr>
            <td>parent's Phone:</td>
            <td><?php echo $data["parent_phone"]; ?></td>
        </tr>
    </table>
    </div>
    
    <div class="image">
            <img src="<?php echo $data["photo"];?>" height='130' width= '120'>
    </div>


    </div>

</body>
</html>