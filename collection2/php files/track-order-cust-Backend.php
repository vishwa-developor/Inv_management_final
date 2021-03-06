<?php
include('connection.php');
if(isset($_POST['track-by-order-id']))
{
    $orderId=$_POST['orderId'];
    $pending_sql="select order_id,prdt_id,prdt_name,prdt_price,prdt_quantity,
    cust_mail,del_agent_number,order_destination,ordered_date,expected_delivery,expiry_date from orders_db where order_id='$orderId'";
    $result=mysqli_query($con,$pending_sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Track Order</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Track Orders</h4><br>
		
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Order Id</th>
                  <th scope="col">Product Id</th>
			      <th scope="col">Product Name</th>
			      <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Customer Mail</th>
                  <th scope="col">Del Agent Number</th>
                  <th scope="col">Destination</th>
			      <th scope="col">Ordered Date</th>
			      <th scope="col">Expected Delivery</th>
			      <th scope="col">Expiry date</th>
                  
			      
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			        <th scope="row"><?=$i?></th>
                    <td><?=$rows['order_id']?></td>
			        <td><?=$rows['prdt_id']?></td>
			        <td><?=$rows['prdt_name'] ?></td>
                    <td><?=$rows['prdt_price']?></td>
			        <td><?=$rows['prdt_quantity']?></td>
                    <td><?=$rows['cust_mail']?></td>
                    <td><?=$rows['del_agent_number']?></td>
                    <td><?=$rows['order_destination']?></td>
                    <td><?=$rows['ordered_date']?></td>
			        <td><?=$rows['expected_delivery']?></td>
                    <td><?=$rows['expiry_date']?></td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			
		</div>
	</div>
</body>
</html>