<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 28/10/2017
 * Time: 06:53
 */


//including the database connection file
include("../connection/db.php");

if (isset($_GET['un'])){
    //getting id of the data from url
    $id = $_GET['un']; //deletin milk
    //deleting the row from table
    $result = mysqli_query($con, "DELETE FROM Missing_Persons_Table WHERE Missing_Persons_Id=$id ");
//$result = mysqli_query($con, "DELETE FROM login_table WHERE login_username=$id");

//redirecting to the display page (index.php in our case)
    header("Location:dashboard.php");
}


if (isset($_GET['us'])){
    $id =$_GET['us']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Login_Table WHERE Login_Id=$id ");
    header("Location:users.php");
}

if (isset($_GET['ap'])){
    $id =$_GET['ap']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Officer_Table WHERE Officer_Id=$id ");
    header("Location:officers.php");

}

if (isset($_GET['payi'])){
    $id =$_GET['payi']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Payment_Table WHERE Payment_code=$id ");
    header("Location:handled.php?msg");
}

if (isset($_GET['not'])){
    $id =$_GET['not']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM Notification_Table WHERE Notification_Id=$id ");
    header("Location:unhandled.php?msg");
}

?>