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


if (isset($_POST['add'])) {

    $User_Name_=$_POST['User_Name'];
    $User_Contact_=$_POST['User_Contact'];
    $User_Email_=$_POST['User_Email'];

    mysqli_query($con,"INSERT INTO User_Table(User_Id,User_Name,User_Email,User_Number)
      values ('$id','$User_Name_','$User_Email_','$User_Contact_')
      ") or die(mysqli_error($con));

    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Success!
					</div>";
    echo '<meta content="4;index.php" http-equiv="refresh" >';

}

include "header.php"; ?>

<div class="callout callout-danger">

    <?php

    $result = mysqli_query($con,"SELECT COUNT(Missing_Persons_Id) FROM Missing_Persons_Table");
    $row1 = mysqli_fetch_array($result);

    $x = $row1[0];
    ?>
    <p>
        <b>STEP 1:</b> You have <?php echo $x ;?> reported cases
    </p>
</div>
<div class="callout callout-success">

    <?php

    $result = mysqli_query($con,"SELECT COUNT(Handling_Officer_Id) FROM Handling_Officer_Table WHERE Handling_Officer_Officer_Id='$id'");
    $row1 = mysqli_fetch_array($result);

    $x = $row1[0];
    ?>

    <p>
    <b>STEP 2:</b> You have <?php echo $x ;?> handled cases
    </p>
</div>


<?php include "footer.php";