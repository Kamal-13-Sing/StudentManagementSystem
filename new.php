<!DOCTYPE html>
<html>
<head>
  <title>Add New Student</title>
  <link rel="stylesheet" href="newss.css">
  <style>
    .error{
        color:red;
    }
    .new{
        background-color:#00FF00;
    }
    .image{
        background-image: url("icon/photo.png");
        background-size: cover;
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
        <li><a href="table.php">Students</a></li>
        <li><a class="new" href="new.php">Add new student</a></li>
        <li><a href="home.php">Home</a></li>
        </ul>
    </div>
    <?php
    include("connection.php");
    error_reporting(0);

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photos/".$filename;

    move_uploaded_file($tempname,$folder);
    //echo "<img src='$folder'height='100' width='100'>";
 
        if(isset($_POST["submit"])){
//------------------------Photo Validation------------------------------
        if(empty($filename)){
            echo "<script>alert('Photo is required*');</script>";
        }else{
            $ph =1; 
        }
//------------------------student Name Validation------------------------------
        if(empty($_POST["sname"])){
            $snameEr= "Studnet name is required*";
        }else{
            $sname = $_POST["sname"];
            if(!preg_match("/^[a-z A-Z]*$/", $sname)){
                $snameEr= "please enter valid Name*";
            }else{
                $sn=1;
            }

        }
//------------------------faculty Validation------------------------------
    if(empty($_POST["faculty"])){
        $fltEr= "Faculty is required*";
    }else{
        $faculty = $_POST["faculty"];
        if($faculty =='BHM' || $faculty =='BBS' || $faculty =='BIM' || $faculty =='BBA'){
            $flt = 1;
        }else{
            $fltEr="please enter valid Faculty*";
    }
    }
//------------------------DOB Validation------------------------------
    if(empty($_POST["dob"])){
            $dbEr= "DOB is required*";
        }else{
            $dob = $_POST["dob"];
            $db=1;
        }
//------------------------Student phone Validation------------------------------
    if(empty($_POST["sphone"])){
        $spEr="Student Phone is required*";
    }else{
        $sphone = $_POST["sphone"];
        if(strlen($sphone) == 10){
            $sp=1;        
        }else{
            $spEr="Phone must be 10 digit ";
        }   
    }
//------------------------Gender Validation------------------------------
    if(empty($_POST["gender"])){
        $genEr= "Gender must is required ";
    }else{
        $gen = $_POST["gender"];
        $gn=1;
    }
//------------------------Address Validation------------------------------
    if(empty($_POST["add"])){
        $adEr= "Address is required ";
    }else{
        $add = $_POST["add"];
        $ad=1;
    } 
//------------------------Admission Data Validation------------------------------
    if(empty($_POST["admidate"])){
        $adateEr= "Admit Date is required*";
    }else{
        $admidate = $_POST["admidate"];
        $adate=1;
    }
//------------------------parents Name Validation------------------------------
    if(empty($_POST["pname"])){
        $pnEr= "Parent's name is required*";
    }else{
        $pname = $_POST["pname"];
        if(!preg_match("/^[a-z A-Z]*$/", $pname)){
            $pnEr="please enter valid Name*";
        }else{
            $pn=1;
        }
    }  
//------------------------Parent's phone Validation------------------------------
    if(empty($_POST["pphone"])){
        $ppEr="Parent's Phone is required*";
    }else{
        $pphone = $_POST["pphone"];
        if(strlen($pphone) == 10){
            $pp=1;        
        }else{
            $ppEr="Phone must be 10 digit*";
        }   
    }

//------------------------After Complete Validation------------------------------
    if($sn==1 && $flt==1 && $db==1 && $sp==1 && $gn==1 && $ad==1 && $adate==1 && $pn==1 && $pp==1 && $ph==1){
        $query="INSERT INTO std_data(photo,student_name,faculty,DOB,std_phone,gender,address,admission_date,parent_name,parent_phone )
        VALUES('$folder','$sname','$faculty','$dob','$sphone','$gen','$add','$admidate','$pname','$pphone');";

        $run = mysqli_query($conn, $query);

        if($run){
            header("Location:table.php");
        }else{
          echo "Data Insertion is failed because...".mysqli_error($conn);
        }
    }
}
    ?>
<form action="new.php" method="POST" enctype="multipart/form-data">
    <div class="box">
        <h2>Add New Student</h2><br>
        <div class="one">
            <table>
              <tr> <td>Student name:*</td> <td><input type="text" name="sname"></td> </tr>
             <tr> <td><br>Faculty:*</td> <td><span class="error"><?php echo $snameEr; ?></span><br><input type="text" name="faculty" placeholder="BHM /BIM /BBS /BBA"></td> </tr>
             <tr> <td><br>DOB:*</td> <td><span class="error"><?php echo $fltEr; ?></span><br><input type="date" name="dob"></td> </tr> 
             <tr> <td><br>Phone:* </td> <td><span class="error"><?php echo $dbEr; ?></span><br><input type="number" name="sphone"></td> </tr>
            </table>
            <span class="error"><?php echo $spEr; ?></span>
            <br>
            Select Gender*: <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female <br>
            <span class="error"><?php echo $genEr; ?></span>
        </div>
        
        <div class="two">
            <table>
                <tr> <td>Address:*</td> <td><input type="text" name="add"></td></tr>
                <tr> <td><br>Admission Date:*</td> <td><span class="error"><?php echo $adEr; ?></span><br><input type="date" name="admidate"></td></tr>
                <tr> <td><br>Parent's name:*</td> <td><span class="error"><?php echo $adateEr; ?></span><br><input type="text" name="pname"></td> </tr>
                <tr> <td><br>Parent's Phone:*</td> <td><span class="error"><?php echo $pnEr; ?></span><br><input type="number" name="pphone"></td> </tr>
            </table>
            <span class="error"><?php echo $ppEr; ?></span>
        </div>
        
        <div class="three">
            <div class="image"></div><br><br>
            <br><input type="file" name="uploadfile" value="Choose File">
        </div>
        
        <br><br>
        <div class="four">
            <input type="submit" name="submit" value="Add student" onclick="return check()">
        </div>
        </div>
</form>
</div>
<script>
    function check(){
        return confirm('Are your sure to Add new Student?');
    }
</script>

</body>
</html>