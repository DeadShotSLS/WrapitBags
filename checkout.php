<!DOCTYPE html>
<html lang="en">
<?php
include("db.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

    
    
    
    if($_POST['submit'])
    {
        $item="SELECT p_id,qty FROM cart WHERE user_id='".$_SESSION["user_id"]."'";
        

    $SQL="insert into orders(user_id,product_id,qty,p_status,price) values('".$_SESSION["user_id"]."','".$_SESSION["product_id"]."','".$_SESSION["qty"]."','".$_SESSION["p_status"]."','".$_SESSION["price"]."')";

        mysqli_query($db,$SQL);
        
        $success = "Thankyou! Your Order Placed successfully!";

        
        
    }
    
    

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Wrapit Bags checkout</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="site-wrapper">
        <!--header starts-->
        <div class="page-wrapper">
            <div class="container">
                <span style="color:green;">
                    <?php echo $success; ?>
                </span>
            </div>
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    <div class="widget-body" style="color: red;background-color:palewihte;">
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title" style="color: darkmagenta;text-align:center;">
                                            <h1><b>Cart Summary</b></h1> </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
											<tbody>
                                                <tr>
                                                    <td>Cart Subtotal</td>
                                                    <td> <?php echo "Rs.".$item_total; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping &amp; Handling</td>
                                                    <td>free shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-color"><strong>Total</strong></td>
                                                    <td class="text-color"><strong> <?php echo "Rs.".$item_total; ?></strong></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input">  <span class="custom-control-description">Payment on delivery</span>
                                                    <br> 
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input">  <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now" style="background-color: lightgreen"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                    </div>
                </div>
				 </form>
            </div>
          
            <!-- start: FOOTER -->
            
            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
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