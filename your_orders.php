<!DOCTYPE html>
<html lang="en">
<?php
include("db.php");
error_reporting(0);
session_start();

if(empty($_SESSION['uid']))  //if usser is not login redirected baack to login page
{
	header('location:login.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Wrapit Bags</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  /* IE6-9 fallback on horizontal gradient */
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}


table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}

	</style>

	</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <div class="page-wrapper" style="padding: 0">
            <div style="text-align: center">
                <H1><b>My Orders</b></H1>
            </div>
            <!-- //results show -->
            <section class="restaurants-page" style="padding-left:22%">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                            <div class="row">
								
						<table >
						  <thead>
							<tr>
							<th>Item Id</th>
							<th>Quantity</th>
							<th>price</th>
                            <th>status</th>						
                            </tr>
						  </thead>
						  <tbody>
						  
						  
						<?php 
						// displaying current session user login orders 
						$query_res= mysqli_query($db,"select * FROM orders where user_id='".$_SESSION['uid']."'");
                        if(!mysqli_num_rows($query_res) > 0 )
                                {
                                    echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                }
                            else
                                {			      
                                while($row=mysqli_fetch_array($query_res))
                                {
                        ?>
                                <tr>	
                                <td data-column="Item"> <?php echo $row['product_id']; ?></td>
                                <td data-column="Quantity"> <?php echo $row['qty']; ?></td>
                                <td data-column="price">Rs<?php echo $row['price']; ?></td>
                                <td data-column="status"> 
                            <?php 
                                $status=$row['p_status'];
                                if($status=="" or $status=="NULL")
                                {
                                ?>
                                <button type="button" class="btn btn-info" style="font-weight:bold;">Dispatch</button>
                                <?php 
                                    }
                                    if($status=="in process")
                                    { ?>
                                    <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On a Way!</button>
                                <?php
                                    }
                                if($status=="closed")
                                    {
                                ?>
                                    <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button> 
                                <?php 
                                } 
                                ?>
                                <?php
                                if($status=="rejected")
                                    {
                                ?>
                                    <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button>
                                <?php 
                                } 
                                ?>
                                </td>
								</tr>
							<?php }} ?>					
						  </tbody>
					</table>
                        </div>
                    <!--end:row -->
                    </div>
                    </div>
                 </div>
                </div>
                </div>
            </section>
           
            <!-- start: FOOTER -->
           
            <!-- end:Footer -->
        </div>
    </div>
    <!--/end:Site wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
<?php
}
?>