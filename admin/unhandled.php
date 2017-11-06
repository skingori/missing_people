<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 04/11/2017
 * Time: 15:21
 */

session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;
        case 3:
            header('location:../officer/index.php');//redirect to  page
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

include "header.php";

$result = mysqli_query($con, "SELECT * FROM Missing_Persons_Table WHERE Missing_Persons_Id NOT IN(SELECT Handling_Officer_Mp_Id FROM Handling_Officer_Table)");
?>
<div class="box">

    <div class="box-header">
        <h3 class="box-title" style="font-family:Consolas; font-size: small">All un-handled cases</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-hover table-bordered table-condensed" id="table1" style="font-family: consolas; font-size: small">
            <thead class="bg-primary">
            <th>Profile photo</th>
            <th width="15%">Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Report by</th>
            <th>Description</th>
            <th></th>
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
                echo "<td><a href=\"handle_un.php?un=$res[Missing_Persons_Id]\" onClick=\"return confirm('Are you sure you want to edit?')\" class='btn btn-primary fa fa-pencil'> </a></td>";
                echo "<td><a href=\"delete.php?un=$res[Missing_Persons_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-google fa fa-trash'></a></td>";
            }

            ?>
            </tbody>
            <tfoot class="bg-info">
            <th>Profile photo</th>
            <th width="15%">Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Report by</th>
            <th>Description</th>
            <th></th>
            <th></th>



            </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php include "footer.php";


