<?php

//BEGIN SESSION
session_start();
//...END
//DATABASE Connection!!!!!!.....

	define("Dbhost", "localhost");
	define("Dbuser", "root");
	define("Dbpass", "");
	define("Dbname", "darajanPub");

	$con = new mysqli(Dbhost,Dbuser,Dbpass,Dbname);
	if ($con->connect_error) {
		die("Could not Connect to Database");
	}


//BEGIN OF Registering USER

if(isset($_POST['registerUser'])){

	require_once "../App/Secure.php";
	$name = secureinput($_POST['name']);
	$username = secureinput($_POST['uname']);
	$email = secureinput($_POST['email']);
	$DOB = secureinput($_POST['DOB']);
	$gender = secureinput($_POST['sex']);
	$contact = secureinput($_POST['contact']);
	$address = secureinput($_POST['city']).",".secureinput($_POST['district']).",".secureinput($_POST['street']);
	// $district = secureinput($_POST['district']);
	// $street = secureinput($_POST['street']);
	$role = secureinput($_POST['role']);
	$pass = secureinput(md5(sha1(strtoupper($username))));


	//Checking if there existing same email
	$sql = "SELECT `email` FROM `users` WHERE `email` = '$email';";
	$query = mysqli_query($con, $sql);
	if (mysqli_num_rows($query) > 0 ) {
		# code...
		// die(mysqli_error($con));
	  	$error = "Email Alreadly exist.....!!!";
	    $_SESSION["error-warning"]= $error;
	    header("location: ../pages/admin/users.php");
	    //echo $;
	}
	else{

	//query variable the detail to the database from php variable
	$sql = "INSERT INTO `users`(`id`, `name`, `username`, `email`, `DOB`, `gender`, `number`, `address`, `role`, `password`) VALUES (NULL, '$name', '$username', '$email', '$DOB', '$gender', '$contact', '$address', '$role','$pass');";

	//queringy the detail to the database from php variable
	 if (mysqli_query($con, $sql)) {

	 	$error = "User successfully registered...........";
	    $_SESSION["error-sucess"]= $error;
	    header("location: ../pages/admin/users.php");
	  	# code...
	  	//echo "successfully";
	  }else{
	  	// die(mysqli_error($con));
	  	$error = "failed to register user !!!!!!!!!!!!!..... Error..!!";
	    $_SESSION["error-danger"]= $error;
	    header("location: ../pages/admin/users.php");
	    //echo mysqli_error($con);
	}
}

mysqli_close($con);

}


//BEGIN login function

if(isset($_POST['login-btn'])){

	require_once "../App/Secure.php";

    $useremail = secureinput($_POST['email']);
    $password = secureinput($_POST['password']);
	$pass = secureinput(md5(sha1($_POST['password'])));
	$get = mysqli_query($con,"SELECT * FROM `users` WHERE `email` ='$useremail' AND `password` = '$pass'");
	
    $num = mysqli_num_rows($get);	   
	if($num==1){
		while ($get2 = mysqli_fetch_assoc($get)) {
			$role = secureinput($get2['role']);
			$useremail = secureinput($get2['email']);
			if ($role == "admin") {
				//creating session.
			    $_SESSION['email']= secureinput($get2['email']);
			    $_SESSION['DOB']= secureinput($get2['DOB']);
			    header ("location: ../pages/admin/index.php?email=$useremail");	
			}
			else if($role == "manager" ){
				//creating session.
			    $_SESSION['email']= secureinput($get2['email']);
			    $_SESSION['DOB']= secureinput($get2['DOB']);
			    header ("location: ../pages/manager/index.php?email=$useremail");	
			}
			else {
				//creating session.
			    $_SESSION['email']= secureinput($get2['email']);
			    $_SESSION['DOB']= secureinput($get2['DOB']);
			    header ("location: ../pages/saler/index.php?email=$useremail");	
			}
		}
			  
	}
	else{
	 	$error = "user id or password is incorrect......";
	  	$_SESSION["error-danger"]= $error;
	  	header("location:../index.php");
	  //	echo mysqli_error($con);
	  	
	}
	  
}


//Deleting User from the list 
if (isset($_GET['id_del_user'])){

	$sql = "DELETE FROM `users` WHERE `id` = '" . $_GET["id_del_user"] . "'";

	if (mysqli_query($con, $sql)) {

		$error = "User deleted successfull....";
	  	$_SESSION["error-sucess"]= $error;
	  	header("location: ../pages/admin/users.php");

	} else {
		//echo mysqli_error($con);
		$error = "Error!!... Failed to delete user!!!!!!!!!!!....";
	  	$_SESSION["error-danger"]= $error;
	  	header("location: ../pages/admin/users.php");
	}
	mysqli_close($con);

//end of function delete police officer
}



//BEGIN OF Registering PRODUCT

if(isset($_POST['registerProduct'])){

	require_once "../App/Secure.php";
	$product_name = secureinput($_POST['pname']);
	$product_price = secureinput($_POST['pprice']);
	$product_category = secureinput($_POST['pcategory']);
	$date_added = date("Y-m-d H:i:s");

	//query inserting into database
	$sql = "INSERT INTO `products`(`product_id`, `product_name`, `product_price`, `product_category`, `date_added`) VALUES (NULL, '$product_name', '$product_price', '$product_category', '$date_added');";

	//queringy the detail to the database from php variable
	if (mysqli_query($con, $sql)) {

	 	$error = "Big up!!!... Product is successfully added....";
	    $_SESSION["error-sucess"]= $error;
	    header("location: ../pages/admin/products.php");
	  	//echo "successfully";
	}else{
	  	//die(mysqli_error($con));
	  	$error = "Error adding new Product !!!!!!!!!!!!!..... Error..!!";
	    $_SESSION["error-danger"]= $error;
	    header("location: ../pages/admin/products.php");
    }

mysqli_close($con);

}

//BEGIN OF UPDATING PRODUCT

if(isset($_POST['product_id'])){

	die("reached");
	require_once "../App/Secure.php";

	$sql = " SELECT * FROM `products` WHERE `product_id` = '".$_POST["product_id"]."'; ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);



mysqli_close($con);

}


//Deleting Products from the list 
if (isset($_GET['id_del_product'])){

	$sql = "DELETE FROM `products`  WHERE `product_id` = '" . $_GET["id_del_product"] . "'";

	if (mysqli_query($con, $sql)) {

		$error = "Product removed successfully";
	  	$_SESSION["error-warning"]= $error;
	  	header("location: ../pages/admin/products.php");

	} else {
		//echo mysqli_error($con);
		$error = "Error!!... Failed to remove a product!!!!!!!!!!!....";
	  	$_SESSION["error-danger"]= $error;
	  	header("location: ../pages/admin/products.php");
	}
	mysqli_close($con);

//end of function delete police officer
}

















?>