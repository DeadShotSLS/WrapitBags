<!DOCTYPE html>
<html lang="en">
<?php
include("./db.php");
error_reporting(0);
session_start();


    


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wrapit Bags</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="main.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Wrapit bags</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in Rs.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<!-- <div class="panel-footer"></div> -->
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid" id="container_view" style="padding-left:40%">
        <div class="card-body">
            <div class="form-body">
                <?php $qml ="SELECT * FROM products WHERE product_id='".$_GET['pid']."'";
                    $rest=mysqli_query($db, $qml); 
                    $roww=mysqli_fetch_array($rest);

                    $pro_id    = $roww['product_id'];
                    $pro_title = $roww['product_title'];
                    $pro_price = $roww['product_price'];
					$pro_image = $roww['product_image'];
					$pro_desc  = $roww['product_desc'];
					$pro_qty  = $roww['p_qty'];
                ?>
            
				<div class="title">
                    <?php 
                        echo "
							<h2><b>
								$pro_title
							</b></h2>
                        ";
                    ?>
                </div>
                <div class="image">
                    <?php 
                        echo "
                            <div>
                            <img src='product_images/$pro_image' style='width:260px; height:350px;'/>
                            </div>
                        ";
                    ?>
				</div>
				<div class="price">
                    <?php 
                        echo "
							<h3>
								Price: Rs.$pro_price
							</h3>
                        ";
                    ?>
				</div>
				<div class="description">
                    <?php 
                        echo "
							<p>
								Descriptiopn: $pro_desc
							</p>
                        ";
                    ?>
				</div>
				<div class="a_qty">
                    <?php 
                        echo "
							<p><b>
								Available Quantity: $pro_qty
							</b></p>
                        ";
                    ?>
				</div>
				<div class="add_cart">
					<button pid='$pro_id' id='product' class='btn btn-danger btn-md'>AddToCart</button>
				</div>
            </div>
        </div>
    </div>
</body>
</html>