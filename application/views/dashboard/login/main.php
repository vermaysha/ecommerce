		<h2 class="form-heading">login</h2>
		<div class="app-cam">
			<?php if (isset($error)):?>
				<?php foreach ($error as $row):?>
					<div class="alert alert-danger"><?php echo $row;?></div>
				<?php endforeach;?>
			<?php endif;?>
			<form action="" method="POST">
				<input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" name="username" />
				<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" />
				<div class="submit"><input type="submit" name="submit" value="Login"></div>
			</form>
		</div>
