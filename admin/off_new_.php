<?php

/**
 * Created by PhpStorm.
 * User: king
 * Date: 10/10/2017
 * Time: 10:44
 */

session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && ($_SESSION['rank'])) {
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

}//Editing

$off=$_GET['off'];

$result1 = mysqli_query($con, "SELECT * FROM Officer_Table WHERE Officer_Id='$off'");

while($res = mysqli_fetch_array($result1))
{
    $Officer_Name =$res['Officer_Name'];
    $Officer_Number =$res['Officer_Number'];
    $Officer_Work =$res['Officer_Work'];
}

if(isset($_POST['edit'])) {

    $Officer_Name_ =$_POST['Officer_Name'];
    $Officer_Number_ =$_POST['Officer_Number'];
    $Officer_Work_ =$_POST['Officer_Work'];

    
    $result = mysqli_query($con, "UPDATE Officer_Table SET Officer_Id='$off', Officer_Name='$Officer_Name_'
 ,Officer_Number='$Officer_Number_',Officer_Work='$Officer_Work_' WHERE Officer_Id=$off");

    //redirectig to the display page. In our case, it is index.php
    $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully Updated !
        </div>";

    header('refresh: 2; url=officers.php');
}

include "header.php";?>
<div class="register-box-body">
    <!-- Messages for the registration -->
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
    <!-- End of message -->
    <p class="login-box-msg">Edit Officer</p>

    <form class="" method="post" id="myForm">
        <div class="form-group has-feedback">
            <label>Officer identity:</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $off; ?>" required name="Officer_Id" title="Must contain only numbers 0-9" minlength="4" maxlength="15" pattern="\d*" placeholder="Officer ID">
            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label>Officer Name:</label>
            <input type="text" class="form-control" value="<?php echo $Officer_Name; ?>" required id="" name="Officer_Name" placeholder="Full Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label>Officer Number:</label>
            <input type="text" class="form-control" value="<?php echo $Officer_Number; ?>" placeholder="Officer Number" required name="Officer_Number" id=Officer_Number"" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label>Officer Work:</label>
            <input type="text" required class="form-control" value="<?php echo $Officer_Work; ?>" id="Officer_Work" name="Officer_Work" placeholder="Officer Work">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" name='edit' class="btn btn-primary">Finish</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
<?php include "footer.php";?>
