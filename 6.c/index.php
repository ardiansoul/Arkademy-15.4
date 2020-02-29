<?php
include_once 'config/database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>
<div class="container">
		<div class="header page-header col-md-12">
			<img class=" img img-responsive col-md-1" src="images/logo.jpg">
			<div class="navbar-form">
				<form class="form-group col-md-9">
					<input type="text" name="search" class="search-input form-control col-md-8" placeholder="Search ...">
					<button type="submit" class="form-control col-md-2" name="search_btn"><i class="glyphicon glyphicon-search"></i></button>
				</form>
			</div>
			<button class="btn btn-warning col-md-1" data-toggle="modal" data-target="#add-modal">Add</button>
		</div>
			<table class="table table-collapse">
				<tr>
					<th class="text-center warning col-lg-1">No</th>
					<th class="text-center warning col-lg-2">Cashier</th>
					<th class="text-center warning col-lg-2">Product</th>
					<th class="text-center warning col-lg-2">Category</th>
					<th class="text-center warning col-lg-2">Price</th>
					<th class="text-center warning col-lg-1">Action</th>
				</tr>
				<tr>
	<?php 
	$sql = "SELECT cashier.cashier_id, cashier.cashier_name,product.product_id,product.product_name,product.price,category.category_id, category.category_name FROM Product INNER JOIN Category ON Product.id_category = Category.category_id INNER JOIN Cashier ON Product.id_Cashier = Cashier.cashier_id";
	$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query)>0){
	$no = 0;
	while ($row = mysqli_fetch_assoc($query)){
		$no++;?>
				<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $row['cashier_name'] ?></td>
				<td><?php echo $row['product_name'] ?></td>
				<td><?php echo $row['category_name'] ?> </td>
				<td><?php $cost = $row['price'];
				$cost = "Rp.".number_format($cost);
				echo $cost;?><td>
				<td><button type="button" class="btn btn-info"data-toggle="modal" data-target="#edit-modal<?php echo $row['product_id'];?>"><i class="glyphicon glyphicon-edit"></i></button> || <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal <?php echo $row['product_id']; ?>"><i class="glyphicon glyphicon-trash"></i></button></td>
<?php } ?>
<?php } ?>

		<div class="modal fade" id="edit-modal<?php echo $row['product_id'];?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only"></span>
							</button>
							<h4 class="modal-title">Edit</h4>
						</div>
						<div class="modal-body">
							<form action="edit.php" method="POST">
								<input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
								<select name="Cashier_id" class="form-control">
								<?php while ($row = mysqli_fetch_assoc($query)):?>
								<option value = "<?php echo $row['cashier_id'] ?>"><?php  echo $row['cashier_name']?></option>
								<?php endwhile ?>
								</select>
								<br>
								<select name="category_id" class="form-control">
								<?php while ($row = mysqli_fetch_assoc($query)):?>
								<option value = "<?php echo $row['category_id'] ?>"><?php  echo $row['category_name'] ?></option>
								<?php endwhile ?>
								</select>
								<br>
								<input type="text" name="name" class="form-control" placeholder="Product">
								<br>
								<input type="number" name="price" class="form-control" placeholder="Price">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button></form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="add-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="botton" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only"></span>
					</button>
					<h4 class="modal-title">Add</h4>
				</div>
				<div class="modal-body">
					<form action="add.php" method="POST">
						<select name="Cashier_id" class="form-control">
						<?php while ($row = mysqli_fetch_assoc($query)):?>
						<option value = "<?php echo $row['cashier.cashier_id'] ?>"><?php  echo $row['cashier.cashier_name']?></option>
						<?php endwhile ?>
						</select>
						<br>
						<select name="category_id" class="form-control">
						<?php while ($row = mysqli_fetch_assoc($query)):?>
						<option value = "<?php echo $row['category.category_id'] ?>"><?php  echo $row['category.category_name'] ?></option>
						<?php endwhile ?>
						</select>
						<br>
						<input type="text" name="name" class="form-control">
						<br>
						<input type="number" name="price" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" name="save_add" class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>		
	<div class="modal fade" id="delete-modal<?php echo $row['product_id']; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="botton" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only"></span>
					</button>
					<h4 class="modal-title">modal title</h4>
				</div>
				<div class="modal-body">
					<p>Apakah anda serius ingin menghapusnya</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="location.href='delete.php?id=<?php echo $row['id'] ?>'">Save changes</button>
				</div>
			</div>
		</div>
	</div>		
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>


















