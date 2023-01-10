<?php include 'db_connect.php' ?>

<!-- <link rel="stylesheet" href="style.css"> -->

<style>
   
</style>

<h1>
	<div class="card" class="fixed-top" style="max-width: 3000px">
		
			<!-- <div class="col-sm-3"> -->
			<b class="card-header" style="text-align:center;">DASHBOARD</b>
				<h5 class="card-header" style="text-align:center;">SPI Machine Monitoring System</h5>
			<!-- </div> -->
		
	</div>
</h1>
<div>
	<br>
</div>
<div class="container-fluid">
<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="card text-black	mb-3" style="max-width: auto;">
			<b class="card-header" style="text-align:center; font-size: 1.5rem">MACHINE</b>
			<div class="card-body">
			<!-- Table Panel -->			
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Machine</th>
									<th class="text-center">Category</th>
									<th class="text-center">Option</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$machine = $conn->query("SELECT m.*,c.name as cname FROM machine m inner join category c on c.id = m.category_id");
								while($row=$machine->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['machine'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['cname'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['options'] ?></b></p>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
			<!-- Table Panel -->
				<a href="index.php?page=machine" class="btn btn-outline-secondary">
				Learn more
				<i class="uil uil-arrow-right"></i>
				</a>
			</div>
		</div>
	</div>
	</div>
	<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="card text-black mb-3" style="max-width: auto;">
			<b class="card-header" style="text-align:center; font-size: 1.5rem">CATEGORY</b>
			<div class="card-body">
				<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Category</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$category = $conn->query("SELECT * FROM category order by id asc");
								while($row=$category->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['name'] ?></b></p>
									</td>
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
				<a href="index.php?page=category" class="btn btn-outline-secondary">Learn more<i class="uil uil-arrow-right"></i></a>
			</div>
		</div>
	</div>
	</div>
	<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="card text-black mb-3" style="max-width: auto;">
			<b class="card-header" style="text-align:center; font-size: 1.5rem">OPERATOR</b>
			<div class="card-body">
				<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
		
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$operator = $conn->query("SELECT * FROM operator order by id asc");
								while($row=$operator->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['name'] ?></b></p>
									</td>
						
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
				<a href="index.php?page=operator" class="btn btn-outline-secondary">Learn more<i class="uil uil-arrow-right"></i></a>
			</div>
		</div>
	</div>
	</div>
	<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="card text-black mb-3" style="max-width: auto;">
			<b class="card-header" style="text-align:center; font-size: 1.5rem">PRODUCT</b>
			<div class="card-body">
				<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Product</th>
								
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$product = $conn->query("SELECT * FROM product order by id asc");
								while($row=$product->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['product'] ?></b></p>
									</td>
							
								
									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
				<a href="index.php?page=product" class="btn btn-outline-secondary">Learn more<i class="uil uil-arrow-right"></i></a>
			</div>
		</div>
	</div>
	</div>
</div>

<script>
	
</script>