<div class="well1 white content_bottom">
	<div class="col-md-8">
		<h2 class="page-header" style="margin-top: 0">Manage Category</h2>
		<div id="notif-container-table"></div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Sub Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="refreshTarget">
				<?php $i=1; foreach ($category as $cat):?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $cat['name'];?></td>
					<td>
						<ol>
							<?php foreach ($cat['parent'] as $child):?>
								<li><?php echo $child['name'];?></li>
							<?php endforeach;?>
						</ol>
					</td>
					<td class="text-right">
						<a href="#" onclick="deleteData('<?php echo $cat['ID'];?>', '<?php echo $cat['name'];?>');" class="btn btn-danger"><i class="fa fa-times"></i></a>
						<a href="#" onclick="editData('<?php echo $cat['ID'];?>')" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				<?php $i++; endforeach;?>
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<h2 class="page-header" style="margin-top: 0">Add Category</h2>
		<form action=""	 method="post">
			<div id="notif-container"></div>
			<div class="form-group">
				<label class="control-label">Category Name</label>
				<input type="text" class="form-control1" required="" id="name_cat" placeholder="Category Name ..." />
			</div>
			<div class="form-group">
				<label class="control-label">Parent</label>
				<select class="form-control1" id="id_cat">
					<option value="">-- Select Parent --</option>
					<?php foreach ($category as $cat):?>
						<option value="<?php echo $cat['ID']?>"><?php echo $cat['name'];?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-warning" id="save">Add Category</button>
			</div>
		</form>
	</div>
	<div class="clearfix"></div>
</div>
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Category</h4>
			</div>
			<div class="modal-body">
				<p>Are your sure to delete category <kbd id="categoryDataDel">Category</kbd> ?</p>
				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-warning pull-right" id="categoryDeleteBtnYes" onclick="deleteDataYes($('#deleteModal #categoryDeleteBtnYes').attr('data-target-id'));">Yes</button>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Category</h4>
			</div>
			<div class="modal-body">
				<p>Pilih kategori yang akan disunting</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	function deleteData(ID, name) {
		$('#deleteModal').modal('show');
		$('#deleteModal #categoryDataDel').html(name);
		$('#deleteModal #categoryDeleteBtnYes').attr('data-target-id', ID);
	}
	
	function editData(ID) {
		$.ajax({
			url: '<?php echo base_url('category/get/');?>' + ID,
			dataType: 'JSON',
			success: function (res) {
				$('#editModal').modal('show');
			}
		});
		
	}
	
	function deleteDataYes(ID) {
		$.ajax({
			url: '<?php echo base_url('category/delete/');?>' + ID,
			dataType: 'JSON',
			success: function(res) {
				reloadData();
				if (res.status) {
					$('#notif-container-table').html('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Category Telah Dihapus</div>');
				} else {
					$('#notif-container-table').html('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Category Tidak dapat dihapus</div>');
				}
			}
		});
		
		$('#deleteModal').modal('hide');
		
	}
	
	function reloadData() {
		$('#refreshTarget').html('');
		$('#id_cat').html('<option value="">-- Select Parent --</option>');
		$.ajax({
			url: '<?php echo base_url('category/refresh_data');?>',
			dataType: 'JSON',
			success: function(res) {
				for (var i = 0; i < res.length; i++) {
					var parent = '';
					for (var j = 0; j < res[i]['parent'].length; j++) {
						parent += '<li>'+res[i]['parent'][j]['name']+'</li>';
					}
					
					$('#id_cat').append('<option value="'+res[i]['ID']+'">'+res[i]['name']+'</option>');
					
					$('#refreshTarget').append('<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+res[i]['name']+'</td>'+
						'<td>'+
							'<ol>'+
							parent +
							'</ol>'+
						'</td>'+
						'<td class="text-right">'+
							' <a onclick="deleteData(\''+res[i]['ID']+'\', \''+res[i]['name']+'\');" class="btn btn-danger"><i class="fa fa-times"></i></a>'+
							' <a onclick="editData(\''+res[i]['ID']+'\');" class="btn btn-warning"><i class="fa fa-edit"></i></a>'+
						'</td>'+
					'</tr>');
				}
			}
		});
	}
	$('#save').click(function(event) {
		$.ajax({
			url: '<?php echo base_url('category/add');?>',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name: $('#name_cat').val(),
				parent: $('#id_cat').val(),
				submit: 'submit'
			},
			success: function(res) {
				if (res.message.length == 0) {
					$('#notif-container').html('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Category Telah Ditambahkan</div>');
					reloadData();
				} else {
					for (i in res.message) {
						$('#notif-container').html('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+res.message[i]+'</div>');
					}
				}
				
				$('#name_cat').val('');
			}
		})
	});
</script>
