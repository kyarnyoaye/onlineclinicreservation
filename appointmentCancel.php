<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';

$query="select * from appointment where appointmentId='".$_GET['appointmentId']."'"; 
$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$appointmentDate=$row['appointmentDate'];
$doctorId=$row['doctorId'];

$query1="delete from appointment where appointmentId='".$_GET['appointmentId']."'"; 
$result1=mysql_query($query1) or die(mysql_error());

$query2="select * from appointmentstatus where appointmentDate='" . $appointmentDate . "' and doctorId='" . $doctorId . "'"; 
$result2=mysql_query($query2) or die(mysql_error());
$row2 = mysql_fetch_array($result2);

if($row2['lastToken']='1'){
	$query3="delete from appointmentstatus where appointmentDate='" . $appointmentDate . "' and doctorId='" . $doctorId . "'"; 
	$result3=mysql_query($query3) or die(mysql_error());
}
else if($row2['status']='Unavailable'){
	$status='Available';
	$sql_update=mysql_query("update appointmentstatus set status='$status' where appointmentDate='" . $appointmentDate . "' and doctorId='" . $doctorId . "'"); 
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/clinic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script type="text/javascript" src="js/slideshow.js"></script>

</head>
<body id="bb" background="images/background/leafCircle.jpg">
  <table width="100%">
  	<tr>
  		<td width="8%"></td>
  		<td width="84%">
  <!-- main frame -->
  			<table border="0" width="100%" style="background: #F5FFFA;">
  				<!--<tr>
  					<td colspan="5" align="center" class="borderStyle">
  						<img src="images/headImg6.jpg" alt="Heading Image" width="100%" />	
  					</td>
  				</tr>-->
 				<tr>
                  	<td colspan="5" class="borderStyle">
                  		<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/header.php';?>
                  	</td>
              	</tr>
  				<tr>	
             			<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/menu.php';?>                      
              	</tr>
             	<tr>
                  <td valign="top" colspan="1" class="borderStyle" width="20%">
                  	<!-- Member Functions -->
                  	<table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/memberFunctions.php';?></td>
						</tr>
					</table>
                     <!-- left frame --> <!-- search table -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/search.php';?></td>
                          </tr>
                      </table>
                      <!-- left frame --> <!-- service list -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/services.php';?></td>
                          </tr>
                      </table>    				      				  
				</td>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
		<br>
			<img src="images/home.jpg" />
		<br>
		<h4 id="title" align="center">
			<font color="blue">Our System Mission</font>
		</h4>
		<p align="justify" style="margin-left:10px;margin-right:10px;">
			<font color="blue"> Our Mission </font>: Our Online Clinic Reservation
			System is an electronic paperless application designed with high
			flexibility and ease of usage, implemented in Clinics and Medical
			Centers. The Aim of developing this system is to minimize
			physician's idle time overlooking patient's waiting time. Our System
			can provide doctor's information and doctor's schedule for patient's to make appointment.
            Users can search and view doctor's information with various criteria such as 
            doctor's name, gender, speciality and day. A patient can login, only when he/she enters 
            a correct username and password.
		</p>
		</div>
				</td>
               </tr>
			   <tr>
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>