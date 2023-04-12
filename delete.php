
<?php
    include("connection.php");

    $id = $_GET["id"];

    $query = "DELETE FROM std_data where id = $id;";

    $run = mysqli_query($conn, $query);
    if($run){

        header("location:table.php");
    }else{

        echo "deletion failed";
    }
?>
    