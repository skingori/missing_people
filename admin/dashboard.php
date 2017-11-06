<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 10/10/2017
 * Time: 10:44
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
?>

<?php include 'header.php';?>

  <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Welcome <?php echo $username;?> to the administrator's board</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            Start here to exercise your privileges
            
            <ol type="1" class="">
                General
                <li><a href="unhandled.php">Un-handled Cases</a> <i class="fa fa-check-circle-o text-success"></i></li>
                <li><a href="handled.php">Handled Cases</a> <i class="fa fa-check-circle-o text-success"></i></li>
            </ol>
            <ol type="1" class="">
                Reports
                <li><a href="unhandled.php">Un-handled Cases</a></li>
                <li><a href="handled.php">Handled Cases</a></li>
                <li><a href="officers.php">All Officers</a></li>
                <li><a href="handled.php">All Users</a></li>
            </ol>
            <ol type="1">
                New entry
                <li><a href="off_new.php">New Officer</a> <i class="fa fa-plus-circle text-info"></i></li>
              
            </ol>

    <?php

    $result = mysqli_query($con,"SELECT COUNT(Missing_Persons_Id) FROM Missing_Persons_Table");
    $row1 = mysqli_fetch_array($result);

    $x = $row1[0];
    //
     $result = mysqli_query($con,"SELECT COUNT(Handling_Officer_Id) FROM Handling_Officer_Table WHERE Handling_Officer_Officer_Id='$id'");
    $row2 = mysqli_fetch_array($result);

    $xx = $row2[0];
    ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer text-info">
            We have a total of <?php echo $x; ?> case(s) & a total of <?php echo $xx; ?> un-handled case(s).
        </div>
        <!-- /.box-footer-->
      </div>
<?php include 'footer.php'; ?>

