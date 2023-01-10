<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-position" onsubmit="return sendMessage();">
				<div class="card">
					<div class="card-header">
						  Machine Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Machine</label>
								<textarea name="machine" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Category</label>
								<select class="custom-select browser-default select2" name="category_id">
									<option value=""></option>
								<?php
								$dept = $conn->query("SELECT * from category");
								while($row=$dept->fetch_assoc()):
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Option</label>
								<textarea name="options" id="" cols="30" rows="2" class="form-control"></textarea>
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
									<th class="text-center">Machine</th>
									<th class="text-center">Category</th>
									<th class="text-center">Option</th>
									<th class="text-center">Action</th>
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
									<td class="text-center">
										<button class="btn btn-sm btn-outline-secondary edit_position" type="button" data-id="<?php echo $row['id'] ?>" data-machine="<?php echo $row['machine'] ?>" data-category_id="<?php echo $row['category_id'] ?>" data-options="<?php echo $row['options'] ?>"  >Edit</button>
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
			url:'ajax.php?action=save_machine',
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
		cat.find("[name='machine']").val($(this).attr('data-machine'))
	    cat.find("[name='category_id']").val($(this).attr('data-category_id'))
		cat.find("[name='options']").val($(this).attr('data-options'))
		end_load()
	})
	$('.delete_position').click(function(){
		_conf("Are you sure to delete this machine?","delete_position",[$(this).attr('data-id')])
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
			url:'ajax.php?action=delete_machine',
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
 
  
	fetch("MachineSMS.php", { method: "POST", body: data })
	.then(res => res.text())
	.then(txt => console.log(txt))
	.catch(err => console.error(err));
	return false;
	}
</script>