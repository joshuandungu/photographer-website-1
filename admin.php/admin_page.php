<?php
$conn = mysqli_connect("localhost","root","","cart_db");
 if(isset($_POST['add_product'])){
	$product_name =$_POST['product_name'];
	$product_price =$_POST['product_price'];
	$product_image = $_FILES['product_image']['name']; 
	$product_image_tmp_name =$_FILES['product_image']['tmp_name'];
	$product_image_folder = 'upload_img/'.$product_image;
	if(empty($product_name) || empty($product_price) || empty($product_image)){
		$meassge[] = 'please fill all fields';}
	else{
		$insert = "INSERT INTO products(name,price,image)VALUES('$product_name','$product_price','$product_image')";
		$upload = mysqli_query($conn,$insert);
		if($upload){
			move_uploaded_file($product_image_tmp_name, $product_image_folder);
			$message[] = 'new product added successfully';
		} else{
			$message[] = 'could not add the product';
		}

	}

};
if(isset($GET['delete'])){
	$id = ($_GET['delete']);
	mysqli_query($conn, "DELETE FROM products where id = '$id'");
	header('location:admin_page.php');
} 

?>




<!DOCTYPE html>
<html  lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA=Compatible" content="IE=EDGE">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>

<!-- font awesome cdn link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link-->
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php

	if(isset($message)){
		foreach($meassge as $message){
			echo '/<span class="message">' .$message. '</span>';
		}
	}
	?>

	<div class="container">
		<div class="admin-product-form-container">
			<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
				<h3> add new product</h3>
				<input type="text" placeholder="enter product name" name="product_name" class="box">
				<input type="number" placeholder="enter product price" name="product_price" class="box">
				<input type="file" accept="image/png, image/jpeg, image/jpg" name=product_image class="box">
				<input type="submit" clas="btn" name="add_product" value="add.product">
				<a href="admin_page.php" class="btn"> Go back</a>
			</form>
		</div>
		
		<div class="product-display">
			<table class="product-display-table">
				<thead>
				<tr>
					<td>Product image</td>
					<td> product name</td>
					<td> product price</td>
					<td  colspan="2">action</td>
				</tr>	


				</thead>
				<?php
				$conn = mysqli_connect("localhost","root","","cart_db");
				$query="SELECT * FROM `products`";
                 $result=mysqli_query($conn , $query);
				while($row = mysqli_fetch_assoc($result)){
				}?>

				
				<tr> 
					<td><img src="uploaded_img/<?php $row['image']; ?>" height="100" alt=""></td>
					<td><?php $row['name']; ?></td>
					<td> <?php $row['price']; ?></td>
					<td  colspan="2">action</td>
					<td><a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i>edit</a>
					</td>
					<td><a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i>Delete</a>
					</td>  
				</tr>


			</table>
		</div>
	</div>
				
	</div>
	</div>

	</body>
</html>
