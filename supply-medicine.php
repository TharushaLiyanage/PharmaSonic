<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])){
	
$msno       =$_POST['msno'];
$suppid     =$_POST['suppid'];
$quantity   =$_POST['quantity'];
$mdate      =$_POST['mdate'];



$query=mysqli_query($con,"insert into tbl_medi_supply(msno,suppid,quantity,mdate)values('$msno','$suppid','$quantity','$mdate')");

$queryStock=mysqli_query($con,"update tbl_medicine set stock=stock+'$quantity' where mno='$msno'");


if($queryStock)
{
    echo '<script>alert("Stock is updated successfully")</script>';
    
} 

if($query){
echo '<script>alert("Medicine is Added successfully")</script>';
echo "<script>window.location.href='manage-medicine.php'</script>";
} else{
echo '<script>alert("Something went wrong. Please try again")</script>';
echo '<script>window.location.href=add-course.php</script>';
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Supply Medicine</title>
<!-- Bootstrap Core CSS -->
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;

<!--nav-->
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Supply Medicine
						 </div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>Medicine SNO<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="msno" id="cshort" required="required"  onblur="courseAvailability()">       
							<span id="course-availability-status" style="font-size:12px;"></span>				</div>
											
										</div>	
										
								<br><br>
















        <!-- mno,suppid,quantity,mdate -->


								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Spplier ID<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="suppid" id="cfull" required="required"  onblur="coursefullAvail()">         
		<span id="course-status" style="font-size:12px;"></span>				</div>
	 	</div>	
										
	 <br><br>				
	 
	 






	 

								
	 	<div class="form-group">
		<div class="col-lg-4">
		<label>Quantity<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="quantity" id="cfull" required="required"  onblur="coursefullAvail()">         
		<span id="course-status" style="font-size:12px;"></span>				</div>
	 	</div>	
										
	 <br><br>				
	 


	 
								
	 	<div class="form-group">
		<div class="col-lg-4">
		<label>Date<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" type = "date" name="mdate" id="cfull" required="required"  onblur="coursefullAvail()">         
		<span id="course-status" style="font-size:12px;"></span>				</div>
	 	</div>	
										
	 	<br><br>				
	 








		













		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
												<input type="submit" class="btn btn-primary" name="submit" value="Create Medicine"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	
	<script src="bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function courseAvailability() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "course_availability.php",
data:'cshort='+$("#cshort").val(),
type: "POST",
success:function(data){
$("#course-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function coursefullAvail() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "course_availability.php",
data:'cfull='+$("#cfull").val(),
type: "POST",
success:function(data){
$("#course-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</form>
</body>
</html>
<?php } ?>
