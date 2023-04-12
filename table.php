<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  <link rel="stylesheet" href="table.css">
  <style>
    .table{
    background-color:#00FF00;
  }
  .heading{
    margin: 8px 0 0 0;
    }
/*---------search button on table-------------------*/
  .search{

    height:30px;
    width:460px;
    float:left;
    margin-top:13px;
  }
  input[type="text"]{
    padding: 2px 0;
    margin:0 5px 0 5px;
  }
  input[type="submit"]{
    padding: 3px 2px;
    background-color:orange;
    border:1px solid white;
    border-radius:5px;
    margin:0 0 0 5px;
  }
  input[type="submit"]:hover{
    background-color:#00FF00;
  }
  .footer{
    border:1px solid black;
    height:50px;
    width:300px;
  }
  li a:hover {
    background-color:yellow;
    
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

    <div class="nav">
        <ul>
        <li><a href="logout.php">Log-Out</a></li>
        <li><a href="changepass.php">Change Password</a></li>
        <li><a class="table" href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
<!-- -----------------------search Students Data------------------------>
    <div class="search">
        <form action="" method="POST">
            Search By:
            <select name="data">
                <option value="student_name">Name</option>
                <option value="faculty">Faculty</option>
            </select>

            <input type="text" name="name">
            <input type="submit" name="search" value="Search">
            <input type="submit" name="viewall" value="View All">
        </form>

    </div>
        <h2 class="heading">Students Details</h2><br>
<!-- --------------------------Students Data Table Box---------------->     
    <div class="box">
            <table border=1; style="border-collapse:collapse; ">
                <tr>
                    <th>Profile</th>
                    <th>Student Name</th>
                    <th>Faculty</th>
                    <th>Date of Birth</th>
                    <th>Std_Phone</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Admission Date</th>
                    <th>Parent's Name</th>
                    <th>Phone</th>
                    <th colspan=3>Operation</th>
                </tr>
            
            <?php
            include("connection.php");
            error_reporting(0);
//-----------------------------------if search button clicked--------------------------
$searched =0;
            if(isset($_POST["search"])){
                
                $select = $_POST["data"];
                $name = $_POST["name"];

                $query = "SELECT * FROM std_data;";
                $run = mysqli_query($conn, $query);
                $total = mysqli_num_rows($run);
                    while($data=mysqli_fetch_assoc($run)){
                        if($data["$select"] == $name){
                            $searched++;
                            ?>
                        <tr>
                            <td><?php echo "<img src='$data[photo]'height='50' width='45'>"; ?></td>
                            <td><?php echo $data['student_name']; ?></td>
                            <td><?php echo $data['faculty']; ?></td>
                            <td><?php echo $data['DOB']; ?></td>
                            <td><?php echo $data['std_phone']; ?></td>
                            <td><?php echo $data['gender']; ?></td>
                            <td><?php echo $data['address']; ?></td>
                            <td><?php echo $data['admission_date']; ?></td>
                            <td><?php echo $data['parent_name']; ?></td>
                            <td><?php echo $data['parent_phone']; ?></td>
                            <td><a href="view.php ? id= <?php echo $data['id']; ?>"><img src='icon/view.png' height='23' width='27' ></a></td>
                            <td><a href="edit.php ? id= <?php echo $data['id']; ?>" ><img src='icon/edit.png' height='19' width='24' ></a></td>
                            <td><a href=' delete.php ? id=<?php echo $data['id']; ?>'><img src='icon/delete.png' height='20' width='25' ></a></td>
                        </tr>
                    <?php
            }
        }
//-----------------------------------if viewAll or none of button clicked--------------------------
            }else if(isset($_POST["viewall"])){
                header("location:table.php");

            }else{

            $query2 = "SELECT * FROM std_data ORDER BY student_name;";
            $run2 = mysqli_query($conn, $query2);
            $total = mysqli_num_rows($run2);

            if($total > 0){
            
                while($data = mysqli_fetch_assoc($run2)){
                    
                    ?>
                        <tr>
                            <td><?php echo "<img src='$data[photo]'height='50' width='45'>"; ?></td>
                            <td><?php echo $data['student_name']; ?></td>
                            <td><?php echo $data['faculty']; ?></td>
                            <td><?php echo $data['DOB']; ?></td>
                            <td><?php echo $data['std_phone']; ?></td>
                            <td><?php echo $data['gender']; ?></td>
                            <td><?php echo $data['address']; ?></td>
                            <td><?php echo $data['admission_date']; ?></td>
                            <td><?php echo $data['parent_name']; ?></td>
                            <td><?php echo $data['parent_phone']; ?></td>
                            <td><a href="view.php ? id= <?php echo $data['id']; ?>"><img src='icon/view.png' height='23' width='27' ></a></td>
                            <td><a href="edit.php ? id= <?php echo $data['id']; ?>" ><img src='icon/edit.png' height='19' width='24' ></a></td>
                            <td><a href=' delete.php ? id=<?php echo $data['id']; ?>'><img src='icon/delete.png' height='20' width='25' ></a></td>
                        </tr>
                    <?php
                }
            }
        }
        ?>
        </table>
    </div>
        <div class="total">
               Total Students: <?php echo $total; ?>
        </div>
        <div class="searched"> 
                Searched Students: <?php echo $searched; ?>
        </div>

</body>
</html>