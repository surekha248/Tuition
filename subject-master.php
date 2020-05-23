<?php
include('connectdb.php');

if(isset($_POST['Save']))
{
	
	$SubjectSrNo = $_POST['EditSrNo'];	
	$subjectcat = $_POST['subjectcat'];	
	$SubjectName = $_POST['SubjectName'];	
	
if (!$SubjectSrNo)
{
$sql=("INSERT INTO SubjectMaster (SubjectCategory,SubjectName)
VALUES ('$subjectcat','$SubjectName')");
mysql_query($sql);
header("location: subject-master.php?save=Y");	
}
else
{
$sql="Update SubjectMaster set SubjectCategory='$subjectcat', SubjectName='$SubjectName' where SrNo='$SubjectSrNo'";
mysql_query($sql);	
header("location: subject-master.php?save=U");	
}
}
	
$save = $_GET['save'];

$SrNo = $_GET['SrNo'];
$flag = $_GET['flag'];
$sts = $_GET['sts'];

if ($flag=='S')
{
$sql=("Update SubjectMaster set Active='$sts' where SrNo='$SrNo'");
mysql_query($sql);
header("location: subject-master.php");
}


if ($flag=='E')
{
$select = "Select * from SubjectMaster where SrNo='$SrNo' ";
$result = mysql_query($select);
while($row = mysql_fetch_array($result)){
		$EdtSrNo=$row['SrNo'];
		$EdtSubcat=$row['SubjectCategory'];
		$EdtSubjectName=$row['SubjectName'];
		$EdtActive=$row['Active'];	
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

<!--top end here -->

<!-- header start here-->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div id="logo">
					<a href="index-2.html">
						<img class="img-responsive" src="images/logo.png" alt="logo" title="logo" />
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<!-- menu start here -->
				<div id="menu">	
					<nav class="navbar">
						<div class="navbar-header" style="background-color:#CCCCCC;">
							<span class="menutext visible-xs">Menu</span>
							<button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle" type="button">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse padd0">
							<ul class="nav navbar-nav text-right" style="padding-top:15px;">
								<li>
									<a href="admin-dashboard.html">Dashboard</a>
								</li>
								<li>
									<a href="#">Manage CMS</a>
								</li>
                                
                                	<li>
									<a href="#">Masters</a>
								</li>
                                
                                
                                	<li>
									<a href="#"> Advertisers </a>
								</li>
						 
								<li>
									<a href="#">Reports</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				<!-- menu end here -->
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<ul class="list-inline icon pull-right" style="padding-top:15px;">
					
					<li><a href="index.html">
						<button type="button" class="btn-primary fa fa-power-off"> Logout</button>
					</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
<!-- header end here -->

<!-- bread-crumb start here -->
<div class="bread-crumb">
<hr>
</div>
<!-- bread-crumb end here -->
<!-- abouts start here -->
<!-- inner start here -->
<div class="inner">
<div class="container">
<div class="row">
<div class="col-sm-4 col-xs-12 feature">
<div class="box">
<img src="images/icon01.png" class="img-responsive" alt="icon" title="icon" />
<p>Registered Institute</p>
<a href="institute-details.php">View all</a>
</div>
<div class="box">
<img src="images/icon01.png" class="img-responsive" alt="icon" title="icon" />
<p>Registered Students</p>
<a href="students-details.php">View all</a>
</div>
<div class="box">
<img src="images/icon02.png" class="img-responsive" style="padding-bottom:500px;" alt="icon" title="icon" />
<p>Masters</p>
<a href="state-master.php">State Master</a> <br>
<a href="city-master.php">City Master</a> <br>
<a href="subject-master.php">Subject Master</a> <br>
<a href="standard-master.php">Standard Master</a> <br>

</div>
</div>


<div class="col-sm-8 col-xs-12 feature">
<div class="commontop text-left">
<?
if ($save=='Y'){
?>
<h4 style="color:red;">Subject added successfully</h4><br><br>
<?
}?>

<?
if ($save=='U'){
?>
<h4 style="color:red;">Subject updated successfully</h4><br><br>
<?
}?>

<form method="post">
<input type="hidden" name="EditSrNo" value="<?=$EdtSrNo;?>">
<div class="form-group">
<label>Subject Category</label>
<select name="subjectcat" class="form-control" style="width:350px;" required >
<option value="">Subject Category</option>
<option value="1" <?if ($EdtSubcat=='1'){?>selected<?}?>>Academics</option>
<option value="2" <?if ($EdtSubcat=='2'){?>selected<?}?>>Extra Curriculum</option>
</select>
</div>
<div class="form-group">
<label>Subject Name</label>
<input type="text" name="SubjectName" placeholder="Enter Subject Name" id="input-name" class="form-control" value="<?=$EdtSubjectName;?>" style="width:350px;" />
</div>
<button type="submit" name="Save" style="width:150px;" class="btn btn-primary">
<?
if ($flag=='E')
{
?>
Update Subject
<?
}else{
?>
Add Subject
<?}?>
</button>					


</form>		
<br><br>	
				
<table width="100%" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#Cacaca" bgcolor="#CCCCCC"  >
<tr>
<td height="40" align="left" valign="middle" bgcolor="#226EBA" class="whitetext" style="font-size:17px;">Category Name</td>
<td height="40" align="left" valign="middle" bgcolor="#226EBA" class="whitetext" style="font-size:17px;">Subject Name</td>
<td height="40" align="center" valign="middle" bgcolor="#226EBA" class="whitetext" colspan="3" style="font-size:17px;">Action</td>
</tr>
				
<?
	$select = "Select * from SubjectMaster where Active<>'D' ";
	$result = mysql_query($select);
	while($row = mysql_fetch_array($result)){
		$SrNo=$row['SrNo'];
		$SubCatname=$row['SubjectCategory'];
		if ($SubCatname=='1')
		{
		$SubCatname='Academics';	
		}
		else
		{
			$SubCatname='Extra Curriculum';
		}
		$SubjectName=$row['SubjectName'];
		$Active=$row['Active'];	
	?>
<tr>
<td height="40" align="left" valign="middle" bgcolor="#F0F0F0" class="tablepadding"><?=$SubCatname;?></td>
<td height="40" align="left" valign="middle" bgcolor="#F0F0F0" class="tablepadding"><?=$row['SubjectName'];?></td>
<td height="40" align="center" valign="middle" bgcolor="#F0F0F0" class="tablepadding">
<?if ($Active=='Y'){?>
<a href="subject-master.php?flag=S&SrNo=<?=$SrNo;?>&sts=N"><i class="fa fa-check"></i></a>
	<?}
	else
	{?>
<a href="subject-master.php?flag=S&SrNo=<?=$SrNo;?>&sts=Y"><i class="fa fa-close"></i></a>
	<?}?>
</td>
<td height="40" align="center" valign="middle" bgcolor="#F0F0F0" class="tablepadding">
<a href="subject-master.php?flag=S&SrNo=<?=$SrNo;?>&sts=D" onclick="return confirm('Are you sure, you want to delete this Subject?')"><i class="fa fa-trash"></i>
</td>
<td height="40" align="center" valign="middle" bgcolor="#F0F0F0" class="tablepadding">
<a href="subject-master.php?flag=E&SrNo=<?=$SrNo;?>"><i class="fa fa-pencil"></i></a>
</td>
</tr>
<?
}
?>
</table>			
<br><br>	
				

</div>
</div>

</div>
</div>
</div>
<div style="height:25px;"></div>
<script src="js/jquery.2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/internal.js" type="text/javascript"></script>
</body>
</html>