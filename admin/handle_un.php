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

$un=$_GET['un'];

$result1 = mysqli_query($con, "SELECT * FROM Missing_Persons_Table WHERE Missing_Persons_Id='$un'");

while($res = mysqli_fetch_array($result1))
{
    $Missing_Persons_Name =$res['Missing_Persons_Name'];
    $Missing_Persons_Age =$res['Missing_Persons_Age'];
    $Missing_Persons_Gender =$res['Missing_Persons_Gender'];
    $Missing_Persons_Identity =$res['Missing_Persons_Identity'];
    $Missing_Persons_Description =$res['Missing_Persons_Description'];
}

if(isset($_POST['edit'])) {

    $Missing_Persons_Name_ =$_POST['Missing_Persons_Name'];
    $Missing_Persons_Age_ =$$_POST['Missing_Persons_Age'];
    $Missing_Persons_Gender_ =$_POST['Missing_Persons_Gender'];
    $Missing_Persons_Identity_ =$_POST['Missing_Persons_Identity'];
    $Missing_Persons_Description_ =$_POST['Missing_Persons_Description'];
    
    $result = mysqli_query($con, "UPDATE Missing_Persons_Table SET Missing_Persons_Id='$un', Missing_Persons_Name='$Missing_Persons_Name_'
 ,Missing_Persons_Age='$Missing_Persons_Age_',Missing_Persons_Gender='$Missing_Persons_Gender_',Missing_Persons_Identity='$Missing_Persons_Identity_',Missing_Persons_Description='$Missing_Persons_Description_' WHERE Missing_Persons_Id=$un");

    //redirectig to the display page. In our case, it is index.php
    $msg = "<div class='alert alert-success'>
    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully Updated !
        </div>";

    header('refresh: 2; url=dashboard.php');
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
            <label>Full Name:</label>
            <input type="text" class="form-control" value="<?php echo $Missing_Persons_Name; ?>" required id="" name="Officer_Name" placeholder="Full Name">
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
