<?php
include('connectdb.php');
session_start();

if(isset($_POST['Login'])){
$emailid= $_POST['regemailid'];


$select = "Select * from InstituteMaster where EmailId='$emailid' ";
$result =mysql_query($select);
while($row = mysql_fetch_array($result)){
$userid=	$row['SrNo'];
$username = $row['ContactNumber'];
$Password = $row['InstPassword'];
$getemailid = $row['EmailId'];

if ($username)
{
$subject="Your Username and Password";
$msg ="<p><strong>Hi</strong>,</p><br>";
$msg .= "Please find the below login details.<br><br>";
$msg .= "<table cellpadding='1' cellspacing='1' border='1' style='border: solid 2px #e6e6e6; width: 100%;'>";
$msg .= "<tr><td><strong>Username</strong></td><td>" .$username."</td></tr>";
$msg .= "<tr><td><strong>Password</strong></td><td>" .$Password."</td></tr>";
$msg .= "</table>";

$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: admin@bookthetuition.com \n";
$headers .= "Bcc: TonsPage <admin@bookthetuition.com>" . "\r\n";
	
if(@mail($getemailid,$subject,$msg,$headers)){
header("location: forgot-password.php?f=y");
exit();
}	
}
}



$select = "Select * from StudentMaster where ParentContact='$uname' and StdPassword='$pwd'";
$result = mysql_query($select);
while($row = mysql_fetch_array($result)){
$userid=	$row['SrNo'];
$username = $row['ParentContact'];
$Password = $row['StdPassword'];
$getemailid = $row['Emailid'];


{
$subject="Your Username and Password";
$msg ="<p><strong>Hi</strong>,</p><br>";
$msg .= "Please find the below login details.<br><br>";
$msg .= "<table cellpadding='1' cellspacing='1' border='1' style='border: solid 2px #e6e6e6; width: 100%;'>";
$msg .= "<tr><td><strong>Username</strong></td><td>" .$username."</td></tr>";
$msg .= "<tr><td><strong>Password</strong></td><td>" .$Password."</td></tr>";
$msg .= "</table>";

$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: admin@bookthetuition.com \n";
$headers .= "Bcc: TonsPage <admin@bookthetuition.com>" . "\r\n";
	
if(@mail($getemailid,$subject,$msg,$headers)){
header("location: forgot-password.php?f=y");
exit();
}	
}

}	

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>The Tuitions</title>
<!-- Bootstrap stylesheet -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
<!-- icofont -->
<link href="icofont/css/icofont.css" rel="stylesheet" type="text/css" />
<!-- font-awesome -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- crousel css -->
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
<!--bootstrap select-->
<link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<!-- stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!--top start here -->

<?php
include('topheader.php');
?>

<div class="bread-crumb">
	<img src="images/banner-top.jpg" class="img-responsive" alt="banner-top" title="banner-top">
	<div class="container">
		<div class="matter">
			<h2>FORGOT PASSWORD</h2>
			
		</div>
	</div>
</div>
<!-- bread-crumb end here -->

<!-- login start here -->
<div class="login">
	<div class="container"> 
		<div class="col-md-12 col-sm-12 col-xs-12 box padd0">
			<div class="col-md-3">
			</div>
		
			
			<div class="col-md-6 col-sm-6 col-xs-12 bor">
			
			<?
			$err= $_GET['f'];
			if ($err=='y'){
			?>
			<p style="color:red;">
			Username and password has been sent to your registerd email id.
			</p>
			
			<?}?>
				<h5>Forgot Password</h5>
				<hr>
				<form method="post">
				
					<div class="form-group">	
						<label>Enter Your registered Email ID *</label>
						<input type="text" name="regemailid" value="" id="input-email" class="form-control" required />
					</div>
					
					<button type="submit" name="Login" class="btn btn-primary btn-block" >Submit</button>
				</form>
			</div>
			<div class="col-md-3">
			</div>
		</div>
</div>
</div>
<!-- login end here -->

<!-- newsletter start here -->


<?php
include('footer.php');
?>
<!-- footer end here -->

<!-- jquery -->
<script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--bootstrap select-->
<script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>
<!-- owlcarousel js -->
<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<!--internal js-->
<script src="js/internal.js" type="text/javascript"></script>
</body>
</html>
