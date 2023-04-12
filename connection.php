<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projectstudent";

    $conn = mysqli_connect($servername, $username, $password,$database);
    /* 
    if($conn){
        echo "Connection sucessFull";
    }else{
        echo "Connection failed because...".mysqli_error($conn);
    }
*/
//-----------create database--------------------
/*
    $query = "CREATE DATABASE projectstudent;";
    mysqli_query($conn, $query);
*/
//---------------create student table------------------
/*
    $query = "CREATE TABLE std_data(
        id int not null auto_increment primary key,
        photo varchar(400)not null,
        student_name varchar(50)not null,
        faculty varchar(50)not null,
        DOB date not null,
        std_phone varchar(10)not null unique,
        gender varchar(10)not null,
        address varchar(100)not null,
        admission_date date not null,
        parent_name varchar(50)not null,
        parent_phone varchar(10)not null unique
    );";
    $run = mysqli_query($conn, $query);
    if($run){
        echo "Create sucessFull";
    }else{
        echo "Coreation failed because...".mysqli_error($conn);
    }
   */

//---------------create Admin table------------------
/*
    $query = "CREATE TABLE admin(
        username varchar(50)not null,
        password varchar(50)not null
    );";
    $run = mysqli_query($conn, $query);
    if($run){
        echo "Create sucessFull";
    }else{
        echo "Coreation failed because...".mysqli_error($conn);
    }
*/
/*
    $query= "INSERT INTO admin(username, password)
            VALUES('admin','admin');";
            $run = mysqli_query($conn, $query);
*/
?>
