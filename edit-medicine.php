<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])){


//$msno=$_POST['msno'];

$mname=$_POST['mname'];
$category=$_POST['category'];
$mdesc=$_POST['mdesc'];
$price = $_POST['price'];
$stock=$_POST['stock'];


$cid=intval($_GET['cid']);


echo $cid;

//mno,mname,mcategory,description,price

$query=mysqli_query($con,"update tbl_medicine set mname='$mname',mcategory='$category',description='$mdesc',price='$price',stock='$stock' where mno='$cid'");
if($query){
echo '<script>alert("Medicine updated successfully")</script>';
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
<title>Edit Medicine</title>
<!-- Bootstrap Core CSS -->
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- MetisMenuCSS -->
<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;


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
						<div class="panel-heading">Edit Course</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									

<?php $cid=intval($_GET['cid']);

$query=mysqli_query($con,"select * from tbl_medicine where mno='$cid'");

$sn=1;

$count=mysqli_num_rows($query);





if($count>0)
{
while($res=mysqli_fetch_array($query)){?>	





<div class="form-group">
<div class="col-lg-4">
<label>Name of the Medicine<span id="mname" style="font-size:11px;color:red">*</span>	</label>
</div>
<div class="col-lg-6">
  <input class="form-control" name="mname" id="mname"  value="<?php echo $res['mname'];?>" required="required"  ">       
<span id="course-availability-status" style="font-size:12px;"></span>				</div></div>		
<br><br>
								
<div class="form-group">
	<div class="col-lg-4">
		<label>Category<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="category" id="category" value="<?php echo $res['mcategory'];?>" required="required" ">         
		<!-- <span id="course-status" style="font-size:12px;"></span>	-->			
	
	</div>
	</div>	
										
	 <br><br>								
										
	


	 <div class="form-group">
		<div class="col-lg-4">
		<label>Description<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="mdesc" id="cfull" value="<?php echo $res['description'];?>" required="required"  ">         
	<span id="course-status" style="font-size:12px;"></span>				</div>
	 </div>	
										
	 <br><br>		




	 
	<div class="form-group">
		<div class="col-lg-4">
		<label>Price<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="price" id="cfull" value="<?php echo $res['price'];?>" required="required"  )">         
	<span id="course-status" style="font-size:12px;"></span>			
	</div>
	</div>	
										
	<br><br>	
	
	

	
	 
	<div class="form-group">
		<div class="col-lg-4">
		<label>Stock<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="stock" id="cfull" value="<?php echo $res['stock'];?>" required="required"  )">         
	<span id="course-status" style="font-size:12px;"></span>			
	</div>
	</div>	
										
	<br><br>	








<?php }} else { ?>

<h5 style="color:red;" align="center">No record found</h5>
<?php } ?>	
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
												<input type="submit" class="btn btn-primary" name="submit" value="Update Medicine"></button>
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
function mednameAvailability() {
	
jQuery.ajax({
url: "medicine_availability.php",
data:'mname='+$("#mname").val(),
type: "POST",
success:function(data){
$("#course-availability-status").html(data);


},
error:function (){}
});
}

function coursefullAvail() {
	
jQuery.ajax({
url: "course_availability.php",
data:'cfull='+$("#cfull").val(),
type: "POST",
success:function(data){
$("#course-status").html(data);


},
error:function (){}
});
}



</script>
</form>
</body>

</html>
<?php } ?>