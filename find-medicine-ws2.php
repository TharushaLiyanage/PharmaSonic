<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

    
if(isset($_GET['del'])){  
$courseid=$_GET['del'];
$query=mysqli_query($con,"delete from tbl_course where cid='$courseid'");
echo '<script>alert("Course deleted")</script>';
echo '<script>window.location.href=manage-courses.php</script>';

}

if(isset($_POST['submit'])){
	
    //$msno=$_POST['msno'];
    $mname=$_POST['mname'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Courses</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;
           
         <nav>
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
                        <div class="panel-heading">
                            Manage Courses
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pharmacy</th>
                                            <th>Serial No</th>
                                            <th>Medicine Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php       
                                    
                                    
                                    function showData($url)
                                    {
                                        global $seri_no;
                                        $myarray=[];
                                                            
                                    
                                    //$url = "http://localhost/mongo/readMondbWS.php";                                   

                                    //$url = "http://localhost/pharmacyrecordms/medi-ws.php?mname=$mname";

                                    //$url = "http://localhost/pharmacyrecordms/medi-ws2.php";

                                    $response = file_get_contents($url);

                                    $arraymed = json_decode($response, true);

                                    $myarray = print_r($response);

                                    echo "<br>";
                                    echo "<br>";

                                    echo "kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk";
                                    echo "<br>";

                                    //echo $myarray['mno'];

                                    echo $arraymed['data'][0]['mname'];

                                    $length = count($arraymed['data']);

                                    echo "<br>";

                                    echo $length;  



                                    echo "<br>";
                                    echo $arraymed['status'];





                                    $sn=0;
                                     while($sn < $length){?>	
                                        <tr class="odd gradeX">

                                            <td><?php echo $seri_no?></td>

                                            <td><?php echo htmlentities($arraymed['status']);?></td>

                                            <td><?php echo htmlentities($arraymed['data'][$sn]['mno']);?></td>

                                            <td><?php echo htmlentities(strtoupper($arraymed['data'][$sn]['mname']));?></td>

                                            <td><?php echo htmlentities(strtoupper($arraymed['data'][$sn]['mcategory']));?></td>

                                            <td><?php echo htmlentities(strtoupper($arraymed['data'][$sn]['description']));?></td>

                                            <td><?php echo htmlentities(($arraymed['data'][$sn]['price']));?></td>

                                            <td><?php echo htmlentities(($arraymed['data'][$sn]['stock']));?></td>


                                            <!--
                                            
                                             <td>&nbsp;&nbsp;<a href="edit-medicine.php?cid=<?php echo htmlentities($res['mno']);?>" class="btn btn-primary">Edit</a> &nbsp;
                                             <a href="manage-courses.php?del=<?php echo htmlentities($res['mno']); ?>" class="btn btn-danger" onclick="return confirm('Do you really wan to delete?');">Delete</a></td>
                                           
                                            -->

                                        </tr>
                                        
                                    <?php 

                                        $sn++;
                                        $seri_no++;

                                    }
                                    
                                    







                                     }// end of showdata function


                                    $url1 = "http://localhost/mongo/readMondbWS.php";                                   

                                    //$url = "http://localhost/pharmacyrecordms/medi-ws.php?mname=$mname";

                                    $url2 = "http://localhost/pharmacyrecordms/medi-ws2.php";

                                    $seri_no = 1;

                                     showData($url1);
                                     showData($url2);

                                    
                                    
                                    ?>   	  
                                    
                                    











                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
<?php } ?>
