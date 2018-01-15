<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="well1 white content_bottom">
	<h2 class="page-header" style="margin-top: 0">Manage Product</h2>
	<div id="notif-container-table"></div>
	<button type="button" class="btn btn-info" style="margin-bottom: 2em;" data-toggle="modal" data-target="#addProduct" data-backdrop="static" data-keyboard="false">Add Product</button>
	<div class="alert alert-info" hidden="" id="productEmpty">
		<p>Tidak ada produk, silahkan menambah produk</p>
	</div>
	<?php if (empty($product)):?>
	<div class="alert alert-info">
		<p>Tidak ada produk, silahkan menambah produk</p>
	</div>
	<?php else:?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Thumbnail</th>
					<th>Name</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="refreshTable">
			<?php $i=1; foreach ($product as $row):?>
				<tr>
					<th><?php echo $i;?></th>
					<th><img class="img-responsive img-thumbnail" style="width: 200px" src="<?php echo base_url($row['photo']);?>" alt="<?php echo $row['name']?>"></th>
					<th><?php echo $row['name'];?></th>
					<th><?php echo $row['category']['name'];?></th>
					<th class="form-group">
						<button class="btn btn-info" onclick="editModals('<?php echo $row['ID'];?>');"><i class="fa fa-edit"></i></button>
						<button class="btn btn-danger" onclick="deleteConfirm('<?php echo $row['ID'];?>', '<?php echo $row['name'];?>');"><i class="fa fa-times"></i></button>
					</th>
				</tr>
			<?php $i++; endforeach;?>
			</tbody>
		</table>
	</div>
	<?php endif;?>
</div>
<div id="addProduct" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Product</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="uploadForm">
					<div id="notif-modal"></div>
					<div class="form-group">
						<label class="control-label">Product Name</label>
						<input class="form-control1" type="text" name="name" placeholder="Product name ..." required="" />
					</div>
					<div class="form-group">
						<label class="control-label">Product Description</label>
						<textarea name="content" class="form-control1" style="height: 100px" required="" placeholder="Product Description"></textarea>
					</div>
					<div class="form-group">
						<label class="control-label">Product Category</label>
						<input type="text" class="form-control1" placeholder="Type your category" required="" />
						<input type="hidden" name="category_id"  value=""/>
					</div>
					<div class="form-group">
						<label class="control-label">Product Price</label>
						<input type="number" name="price" class="form-control1" placeholder="Product Price ..." required="" />
					</div>
					<div class="form-group">
						<label class="control-label">Product Photo</label>
						<input type="file" name="image" name="form-control1" placeholder="Product photo ..." required="" accept="image/*">
					</div>
					<div class="form-group">
						<button class="btn btn-info" name="submit" value="submit" type="submit" id="addProductBtn">Add Product</button>
						<span id="loadingData" style="display: none"><i class="fa fa-spinner fa-spin"></i> Mengupload Data</p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function deleteConfirm(ID, name) {
	if (confirm('Apakah kamu ingin menghapus ' + name + ' ?')) {
		$.ajax({
			url: '<?php echo base_url('product/delete/');?>' + ID,
			type: 'GET',
			dataType: 'JSON',
			success: function(res) {
				if (res.status) {
					$('#notif-container-table').html('<div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+res.message+'</div>');
					refreshTable();
				} else {
					$('#notif-container-table').html('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+res.message+'</div>');
				}
			}
		});
	}
}

function editModals(ID) {
	$.ajax({
		url: '<?php echo base_url('product/get/');?>' + ID,
		type: 'GET',
		dataType: 'JSON',
		success: function(res) {
			$('#addProduct').modal('show');
			$('.modal-title').text('Edit Product');
			// $('input[name=name]').val(res.name);;
			// $('input[name=category]').val(res.category['name']);
			// $('input[name=category_id]').val(res.category['ID']);
			// $('input[name=price]').val(res.price);
			// $('input[name=image]').append('<span class="help-block">Pilih jika ingin mengubah</span>').removeAttr('required');
			// $('#uploadForm').append('<input type="hidden" name="ID" value="'+res.ID+'">');
		}
	});
}

function refreshTable() {
	$.ajax({
		url: window.location.href,
		type: 'GET',
		dataType: 'JSON',
		success: function(res) {
			var html,canonicalUrl;
			canonicalUrl = '<?php echo base_url();?>/';
			
			if (res.length > 0) {
				$('.table').show();
				$('#productEmpty').hide();
				for(var i = 0, length1 = res.length; i < length1; i++){
					html += '<tr>\n';
					html += '<th>'+(i+1)+'</th>\n';
					html += '<th><img class="img-responsive img-thumbnail" style="width: 200px" src="'+canonicalUrl+res[i]['photo']+'"></th>\n';
					html += '<th>'+res[i]['name']+'</th>\n';
					html += '<th>'+res[i]['category']['name']+'</th>\n';
					html += '<th>\n';
					html += '<button class="btn btn-info" onclick="editModals(\''+res[i]['ID']+'\');"><i class="fa fa-edit"></i></button>\n';
					html += '<button class="btn btn-danger" onclick="deleteConfirm(\''+res[i]['ID']+'\', \''+res[i]['name']+'\');"><i class="fa fa-times"></i></button>\n';
					html += '</th>\n';
					html += '</tr>\n';
				}
				$('#refreshTable').empty().html(html);
			} else {
				$('.table').hide();
				$('#productEmpty').show();
			}
		}
	});
	
}

$(document).ready(function (e) {
	$("#addProduct").on('shown.bs.modal', function () {
		$('.autocomplete-suggestions').width($('#productCategory').innerWidth());
    });
    $('#addProduct').on('show.bs.modal', function(e) {
        $('#successModal').empty();
    	$('#errorModal').empty();
    	$('#uploadForm input').val('');
    	$('#uploadForm textarea').empty().val('');
    });
	$('#productCategory').autocomplete({
		serviceUrl: '<?php echo base_url();?>/category/search',
		onSelect: function (res) {
			$('#productCategory').val(res.name);
			$('#productCategoryID').val(res.ID);
		}
	});
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$('#loadingData').css('display', 'inline');
		$('#addProductBtn').addClass('disabled');
		$.ajax({
        	url: "<?php echo base_url('product/add');?>",
			type: "POST",
			dataType: 'JSON',
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(res)
		    {
		    	var i;
		    	if (res.status) {
	    			for (i in res.message) {
	    				$('#notif-container-table').append('<div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+res.message[i]+'</div>');
	    				$('#addProduct').modal('hide');
	    				$('#loadingData').css('display', 'none');
						$('#addProductBtn').removeClass('disabled');
	    			}
	    			refreshTable();
		    	} else {
		    		for (i in res.message) {
	    				$('#notif-modal').append('<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+res.message[i]+'</div>');
	    			}
	    			$('#loadingData').css('display', 'none');
					$('#addProductBtn').removeClass('disabled');
		    	}
		    }
	   });
	}));
});
</script>
