
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 well shadow">
		
		<?php $attributes = array("name" => "loginform");
			echo form_open("login/index", $attributes);?>
			<div class="card">

			  <div class="card-header">تسجيل الدخول</div>
			    <div class="card-body">

			<div class="form-group">
				<label for="name">البريد الإلكتروني</label>
				<input class="form-control" name="email" placeholder="البريد الإلكتروني" type="text" value="<?php echo set_value('email'); ?>" />
				<?php echo form_error('email', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>
			<div class="form-group">
				<label for="name">كلمة السر</label>
				<input class="form-control" name="password" placeholder="كلمة السر" type="password" value="<?php echo set_value('password'); ?>" />
				<?php echo form_error('password', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">تسجيل دخول</button>
				<button name="cancel" type="reset" class="btn btn-info">تراجع</button>
			</div>
		<?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
				</div>



		</div>

		
		</div>
	</div>
	
</div>
