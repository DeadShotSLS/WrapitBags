<?php
include("db.php");
error_reporting(0);
session_start();


// header('location:profile.php');
        // $price=$_SESSION["price"];
        $uid=$_SESSION["uid"];

        

        $sql = "SELECT p_id,qty,t_price FROM cart WHERE user_id =$uid";
		$query = mysqli_query($db,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
            $product_id[] = $row["p_id"];
            $qty[] = $row["qty"];
            $price[]=$row["t_price"];

            }
            

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status,price) VALUES ('$uid','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st','$price[$i]')";
				mysqli_query($db,$sql);

				$query=mysqli_query($db,"SELECT p_qty FROM products WHERE product_id='".$product_id[$i]."'");
				$rows=mysqli_fetch_array($query);
				$n_qty=$rows['p_qty'];

				$f_qty=$n_qty - $qty[$i];

				
       			mysqli_query($db,"update products set p_qty='$f_qty' where product_id='".$product_id[$i]."'");


			}

			$sql = "DELETE FROM cart WHERE user_id =$uid";
			if (mysqli_query($db,$sql)) {
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Wrapit Bags</title>
							<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
							<!-- jQuery library -->
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
							<!-- Latest compiled JavaScript -->
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="#" class="navbar-brand">Wrapit Bags</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed<br/>
											you can continue your Shopping <br/></p>
											<a href="profile.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:profile.php");
}
    



