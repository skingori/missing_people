<?php
include_once ("../connection/db.php");

session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 1:
            header('location:../admin/index.php');//redirect to  page
            break;
        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}

include '../connection/db.php';
$username=$_SESSION['logname'];

$result1 = mysqli_query($con, "SELECT * FROM Login_Table WHERE Login_Username='$username'");

while($res = mysqli_fetch_array($result1))
{
    $username= $res['Login_Username'];
    $id= $res['Login_Id'];

}


//ADD DATA

if(isset($_GET['xid'])) {

    $test=$_GET['xid'];

    $result = mysqli_query($con, "SELECT * FROM Missing_Persons_Table WHERE Missing_Persons_Id='$test'");

    while($result = mysqli_fetch_array($result))
    {
        $Missing_Persons_Identity_= $result['Missing_Persons_Identity'];

    }


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO Handling_Officer_Table(Handling_Officer_Mp_Id,Handling_Officer_Officer_Id ,Handling_Officer_User_Id)
VALUES ('$test', '$id' ,'$Missing_Persons_Identity_')";

    if ($con->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";

        header('location: handle.php');

    } else {

        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>" . $sql . "<br>" . $con->error;
    }

    $con->close();
}

?>

<?php include "header.php";

$result = mysqli_query($con, "SELECT * FROM Missing_Persons_Table WHERE Missing_Persons_Id NOT IN(SELECT Handling_Officer_Mp_Id FROM Handling_Officer_Table)");
?>
<div class="box">

    <div class="box-header">
       <h3 class="box-title" style="font-family:Consolas; font-size: small">All unhandled cases</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-hover table-bordered table-condensed" id="table1">
            <thead class="bg-primary">
            <th>Image</th>
            <th width="15%">Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Report by</th>
            <th>Description</th>
            <th></th>

            </thead>
            <tbody>

            <?php
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
            while($res = mysqli_fetch_array($result)) {
                echo "<tr class=''>";
                echo "<td><img class='img-circle' style='width: 40px;' src=" . $res['Missing_Persons_Image'] . "></td>";

                echo "<td class=''>" . $res['Missing_Persons_Name'] . "</td>";
                echo "<td>" . $res['Missing_Persons_Age'] . "</td>";
                echo "<td>" . $res['Missing_Persons_Gender'] . "</td>";
                echo "<td>" . $res['Missing_Persons_Identity'] . "</td>";
                echo "<td>" . $res['Missing_Persons_Description'] . "</td>";
                echo "<td><a href='handle.php?xid=$res[Missing_Persons_Id]' onClick=\"return confirm('Are you sure you want to handle?')\" class='btn btn-flat btn-primary fa fa-pencil'> Handle</a></td>";

            }
            ?>
            </tbody>
            <tfoot class="bg-info">
            <th>Image</th>
            <th width="15%">Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Report by</th>
            <th>Description</th>
            <th></th>


            </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php include "footer.php";?>
