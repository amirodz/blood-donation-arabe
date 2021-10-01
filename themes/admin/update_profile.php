
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 mt-5 well">
		  <h1 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-3"> تعديل بيانات المدير </h1>

		
			<?php $attributes = array("name" => "signupform");
			echo form_open("update_profile", $attributes);?>

			<div class="form-group">
				<label for="name">الإسم الأول</label>
				<input class="form-control" name="fname" placeholder="الإسم الأول" type="text" value="<?php echo $uname; ?>" />
				<?php echo form_error('fname', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>

			<div class="form-group">
				<label for="name">اللقب</label>
				<input class="form-control" name="lname" placeholder="اللقب" type="text" value="<?php echo $lname; ?>" />
				<?php echo form_error('lname', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>

			<div class="form-group">
				<label for="email">البريد الإلكتروني</label>
				<input class="form-control" name="email" placeholder="البريد الإلكتروني" type="text" value="<?php echo $uemail; ?>" />
				<?php echo form_error('email', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>

			<div class="form-group">
				<label for="subject">كلمة السر </label>
				<input class="form-control" name="password" placeholder="كلمة السر " type="password" />
				<?php echo form_error('password', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>

			<div class="form-group">
				<label for="subject">تأكيد كلمة السر </label>
				<input class="form-control" name="cpassword" placeholder="تأكيد كلمة السر" type="password" />
				<?php echo form_error('cpassword', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">تسجيل حساب</button>
			</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>
	
</div>
