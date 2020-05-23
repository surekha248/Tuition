<? ob_start(); ?>
<?php
include('connectdb.php');

$instname=$_POST['instname'];
$contactperson=$_POST['contactperson'];
$contactnumber=$_POST['contactnumber'];
$emailid=$_POST['emailid'];
$instcategory=$_POST['instcategory'];
$classname=$_POST['classname'];
$subjectlist=$_POST['subjectlist'];
$address=mysql_real_escape_string($_POST['address']);
$cityname=$_POST['cityname'];

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string

}
$instpass=randomPassword();

echo $sql=mysql_query("INSERT INTO InstituteMaster (InstName,ContactPerson,ContactNumber,EmailId,InstCategory,ClassName,SubjectList,Address, CityName,InstPassword,ActiveStatus,AddedDate)
VALUES ('$instname','$contactperson','$contactnumber','$emailid','$instcategory','$classname','$subjectlist', '$address', '$cityname','$instpass','Y',CURDATE())");



	$subject="The Tuitions Registration Confirmation";
	$msg ="<p><strong>Hello $contactperson,</strong>,</p><br>";
	$msg .= "You are registered with The Tuitions and below are your login details.<br><br>";
	$msg .= "<table cellpadding='0' class='responsive-table' border='1' cellspacing='0' style='border: solid 1px #e6e6e6; width: 50%;'>";
	$msg .= "<tr><td style='padding:6px; background: #F5F5F5; width:40%;'><strong>&nbsp; Userid </strong></td><td>".$contactnumber."</td></tr>";
	$msg .= "<tr><td style='padding:6px; background: #F5F5F5; width:40%;'><strong>&nbsp; Password </strong></td><td>&nbsp;".$instpass."</td></tr>";
	$msg .= "</table>";

	

	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: admin@bookthetuition.com \n";
	$headers .= "Bcc: The Tuitions <admin@bookthetuition.com>" . "\r\n";

	

	if(@mail($emailid,$subject,$msg,$headers)){

		header("location: thankyou.html?save=Y");

}


?>
