<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-position" onsubmit="return sendMessage();">
				<div class="card">
					<div class="card-header">
						 Variant Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Variant</label>
								<textarea name="variant" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Product</label>
								<select class="custom-select browser-default select2" name="product_id">
									<option value=""></option>
								<?php
								$dept = $conn->query("SELECT * from product");
								while($row=$dept->fetch_assoc()):
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['product'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
				
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-outline-secondary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-outline-danger col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Variant</th>
									<th class="text-center">Product</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$variant = $conn->query("SELECT v.*,p.product as name FROM variant v inner join product p on p.id = v.product_id");
								while($row=$variant->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['variant'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['name'] ?></b></p>
									</td>
								
									<td class="text-center">
										<button class="btn btn-sm btn-outline-secondary edit_position" type="button" data-id="<?php echo $row['id'] ?>" data-variant="<?php echo $row['variant'] ?>" data-product_id="<?php echo $row['product_id'] ?>"  >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_position" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	function _reset(){
		$('[name="id"]').val('');
		$('#manage-position').get(0).reset();
		$('.select2').val('').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
	}
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:"100%"
	})
	$('#manage-position').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_variant',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_position').click(function(){
		start_load()
		var cat = $('#manage-position')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='variant']").val($(this).attr('data-variant'))

		cat.find("[name='product_id']").val($(this).attr('data-product_id'))
		end_load()
	})
	$('.delete_position').click(function(){
		_conf("Are you sure to delete this variant?","delete_position",[$(this).attr('data-id')])
	})
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	function delete_position($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_variant',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	function sendMessage() {
 
	var data = new FormData(document.getElementById("manage-position"));
 
  
	fetch("VariantSMS.php", { method: "POST", body: data })
	.then(res => res.text())
	.then(txt => console.log(txt))
	.catch(err => console.error(err));
	return false;
	}
</script>