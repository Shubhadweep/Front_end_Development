<?php
	$full_Name= $_POST['full_Name'];
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$conn = new mysqli('localhost','root','','foodsdata');
	$css=' <link href="css/style.css" rel="stylesheet">';
	echo"$css";
	$index=' <link href="index.html" rel="stylesheet">';
	echo"$index";
	$index=' <link href="index.html" rel="stylesheet">';
    




	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `food_table`(full_name,email,address,phone_number)VALUES(?, ?, ?, ?)");
		$stmt-> bind_param ("siss", $full_Name,$phone_number,$email, $address );
		$execval = $stmt->execute();
		//echo $execval;
		echo "<section class='navbar navbar3'>
	<div class='container'>
		<div class='logo'>
			<a href='#' title='Logo'>
				<img src='images/logo.png' alt='Restaurant Logo' class='img-responsive'>
			</a>
		</div>

		<div class='menu text-right'>
			<ul>
				<li>
					<a href='index.html'>Home</a>
				</li>
				
				<li>
					<a href='order.html'>Order</a>
				</li>
				<li>
					<a href='about.html'>About</a>
				</li>
				
			</ul>
		</div>

		<div class='clearfix'></div>
	</div>
</section>";
		
		echo"<h1 class='gap'>YOUR ORDER WILL BE REACH WITHIN 1 HOUR THANK YOU!!!!</h1>";
		echo"<section class='footer navbar2'>
        <div class='container text-center'>
            <p>Designed By <a href='about.html'>PERU SUBHO ABHI DEBU</a></p>
        </div>
    </section>";
		$stmt->close();
		$conn->close();
	}

	
?>