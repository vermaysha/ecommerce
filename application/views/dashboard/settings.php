<div class="well1 white content_bottom">
	<form class="form-floating" action="" method="POST" id="form_settings">
		<?php if (!empty($success)):?>
			<div class="alert alert-success"><?php echo $success;?></div>
		<?php endif;?>
		<div id="errorContainer"></div>
		<div class="form-group">
			<label class="control-label">Nama Situs</label>
			<input type="text" class="form-control1" required="" value="<?php echo $site_name ?>" name="site_name" id="site_name" />
		</div>
		<div class="form-group">
			<label class="control-label">Deskripsi Situs</label>
			<input type="text" class="form-control1" required="" value="<?php echo $site_desc ?>" name="site_desc" id="site_desc" />
		</div>
		<div class="form-group">
			<button class="btn btn-info" type="button" name="submit" value="submit" id="submit">Simpan</button>
		</div>
	</form>
</div>
<script>
	$('#submit').click(function(event) {
		$.ajax({
			url: '<?php echo base_url('settings') ?>',
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_settings').serialize(),
			success: function(res) {
				if (res.message.length > 0) {
					for (var i = 0, l = res.message.length; i < l; ++i) {
                        $('#errorContainer').html('<div class="alert alert-danger">'+res.message[i]+'</div>');
                    }
				} else {
					window.location.assign(window.location.href);
				}
			}
		})
	});
</script>
