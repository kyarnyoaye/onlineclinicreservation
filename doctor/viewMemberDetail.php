<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
$query=$query="select * from member where memberId='" . $_GET['memberId'] . "'"; 
$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result)
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/doctorStyle.css" rel="stylesheet" type="text/css" />
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
                  		<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/header.php';?>
                  	</td>
              	</tr>
  				<tr>	
             			<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/menu.php';?>                      
              	</tr>
             	<tr>
                  <td valign="top" colspan="1" class="borderStyle" width="20%">
                  	<!-- Doctor Functions -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/doctorFunctions.php';?></td>
						</tr>
					</table>
                     <!-- left frame --> <!-- search table -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/search.php';?></td>
                          </tr>
                      </table>
                      <!-- left frame --> <!-- service list -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/services.php';?></td>
                          </tr>
                      </table>    				      				  
				</td>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
	<br>
	<h4 id="title">Member Information</h4>
	<br>
	<form action="viewCorrespondingMember.php" method="post">
		<table id="membersend1" >
			<tr>
				<td align="center">Name:</td>
				<td><?php echo $row["memberName"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Father Name:</td>
                <td><?php echo $row["memberFatherName"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Age:</td>
                <td><?php echo $row["memberAge"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Gender:</td>
                <td><?php echo $row["memberGender"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Phone:</td>
                <td><?php echo $row["memberPhone"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Address:</td>
                <td><?php echo $row["memberAddress"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="back" value="Back" /></td>
			</tr>
		</table>
	</form>
</div>
				</td>
               </tr>
			   <tr>
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>