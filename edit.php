<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  <link rel="stylesheet" href="edits.css">
  <style> 
   li a:hover {
    background-color:yellow;
    }
    .edit{
        background-color:#00FF00;
    }
  </style>
</head>
<body>
<?php
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
        <li><a class="edit"href="table.php">Students</a></li>
        <li><a href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
<!-- ------------------------------connection with database--------------------------->
    <?php

        include("connection.php");
        $id = $_GET['id'];
        $query = "SELECT * FROM std_data where id = $id;";
        $run = mysqli_query($conn,  $query);
        //$data = mysqli_fetch_assoc($run);
        $data = mysqli_fetch_assoc($run);
        ?>

<!-- --------------------------Form For Update data------------------------------------>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="box">
        <h2>Edit Student Details</h2><br>
        
        <div class="one">
            <table>
              <tr> <td>Student name:*</td> <td><input type="text" name="sname" value="<?php echo $data["student_name"];?>"></td> </tr>
             <tr> <td><br>Faculty:*</td> <td><br><input type="text" name="faculty" value="<?php echo $data["faculty"];?>"></td> </tr>
             <tr> <td><br>DOB:*</td> <td><br><input type="date" name="dob" value="<?php echo $data["DOB"];?>"></td> </tr> 
             <tr> <td><br>Phone:* </td> <td><br><input type="text" name="sphone" value="<?php echo $data["std_phone"]; ?>"></td> </tr>
            </table>
            <br>
            Select Gender*: <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
        </div>
        
        <div class="two">
            <table>
                <tr> <td>Address:*</td> <td><input type="text" name="add" value="<?php echo $data["address"];?>"></td></tr>
                <tr> <td><br>Admission Date:*</td> <td><br><input type="date" name="admidate" value="<?php echo $data["admission_date"];?>"></td></tr>
                <tr> <td><br>Parent's name:*</td> <td><br><input type="text" name="pname" value="<?php echo $data["parent_name"];?>"></td> </tr>
                <tr> <td><br>Parent's Phone:*</td> <td><br><input type="text" name="pphone" value="<?php echo $data["parent_phone"];?>"></td> </tr>
            </table>
        </div>
        
        <div class="three">
            <div class="image">
                <img src="<?php echo $data["photo"];?>" height='95' width= '95'>
            </div><br><br>
            <br><input type="file" name="uploadfile" value="<?php echo $data["photo"];?>">
        </div>
        
        <br><br>
        <div class="four">
            <input type="submit" name="submit" value="Update" onclick="return check()">
        </div>
        
        </div>
        
</form>

</div>

<script>
    function check(){
        return confirm('Are your sure to Updte Student?');
    }
</script>
<!-- -------------------------Validation and Updation data--------------------------->
<?php
include("connection.php");
error_reporting(0);
$id = $_GET["id"];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photos/".$filename;

    move_uploaded_file($tempname,$folder);

if(isset($_POST["submit"])){
//----------------------------------student Name Validation------------------------------
if(empty($_POST["sname"])){
    echo "<script>alert('Studnet name is required ');</script>";
}else{
    $sname = $_POST["sname"];
    if(!preg_match("/^[a-z A-Z]*$/", $sname)){
        echo "<script>alert('please enter valid student Name');</script>";
    }else{
        $sn=1;
    }

}
//-------------------------------faculty Validation--------------------------------------
    if(empty($_POST["faculty"])){
        echo "<script>alert('Faculty is required ');</script>";
    }else{
        $faculty = $_POST["faculty"];
        if($faculty =='BHM' || $faculty =='BBS' || $faculty =='BIM' || $faculty =='BBA'){
            $flt = 1;
        }else{
            echo "<script>alert('please enter valid Faculty');</script>";
        }
    }
//---------------------------------------DOB Validation------------------------------------
    if(empty($_POST["dob"])){
        echo "<script>alert('Date Of Birth is required');</script> ";
    }else{
        $dob = $_POST["dob"];
        $db=1;
    }
//-------------------------------Student phone Validation------------------------------
    if(empty($_POST["sphone"])){
        echo "<script>alert('Student Phone is required ');</script>";
    }else{
        $sphone = $_POST["sphone"];
        if(strlen($sphone) == 10){
            $sp=1;        
    }else{
        echo "<script>alert('student Phone must be 10 digit');</script> ";
        }   
    }
//-----------------------------------Gender Validation---------------------------------
    if(empty($_POST["gender"])){
        echo "<script>alert('Gender must is required');</script>";
    }else{
        $gen = $_POST["gender"];
            $gn=1;
    }
//---------------------------------Address Validation-----------------------------------
    if(empty($_POST["add"])){
        echo "<script>alert('Address is required');</script> ";
    }else{
        $add = $_POST["add"];
        $ad=1;
    } 
//-------------------------------------Admission Data Validation--------------------------
    if(empty($_POST["admidate"])){
        echo "<script>alert('Admission Date is required');</script> ";
    }else{
        $admidate = $_POST["admidate"];
        $adate=1;
    }
//-----------------------------------parents Name Validation------------------------------
    if(empty($_POST["pname"])){
        echo "<script>alert('Parent's name is required');</script> ";
    }else{
        $pname = $_POST["pname"];
        if(!preg_match("/^[a-z A-Z]*$/", $pname)){
            echo "<script>alert('please enter valid valid parents Name ');</script>";
        }else{
            $pn=1;
        }
    }  
//--------------------------------------Parent's phone Validation--------------------------
    if(empty($_POST["pphone"])){
        echo "<script>alert('parent's Phone is required');</script> ";
    }else{
        $pphone = $_POST["pphone"];
        if(strlen($pphone) == 10){
            $pp=1;        
        }else{
            echo "<script>alert('parents Phone must be 10 digit ');</script>";
        }
    }  
//------------------------After Complete Validation------------------------------

    if($sn==1 && $flt==1 && $db==1 && $sp==1 && $gn==1 && $ad==1 && $adate==1 && $pn==1 && $pp==1){
        $query = "UPDATE std_data 
            set  student_name='$sname', faculty='$faculty',DOB='$dob',gender='$gen',
            address='$add',admission_date='$admidate',parent_name='$pname', parent_phone='$pphone',
             std_phone='$sphone' WHERE id=$id;";
    
        $run = mysqli_query($conn, $query);

        if($run){
            header("location:table.php");
        }else{
             echo "data not update because..".mysqli_error($conn);
        }
        }
    }
?>

</body>
</html>