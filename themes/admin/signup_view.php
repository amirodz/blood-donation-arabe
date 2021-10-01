
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5 well">
<div class="card text-right">

<form action="http://9atrathayat.me/signup/index" name="signupform" class="needs-validation" method="post" accept-charset="utf-8" novalidate>
			
			  <div class="card-header">
 فتح حساب </div>
  <div class="card-body">

			<div class="form-group">
				<label for="name">الإسم الأول</label>
				<input class="form-control" name="fname" placeholder="الإسم الأول" type="text" value="<?php echo set_value('fname'); ?>" required>
				<span class="text-danger"><?php echo form_error('fname'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">اللقب</label>
				<input class="form-control" name="lname" placeholder="اللقب" type="text" value="<?php echo set_value('lname'); ?>" required>
				<span class="text-danger"><?php echo form_error('lname'); ?></span>
			</div>

			<div class="form-group">
				<label for="email">البريد الإلكتروني</label>
				<input class="form-control" name="email" placeholder="البريد الإلكتروني" type="text" value="<?php echo set_value('email'); ?>" required>
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">كلمة السر </label>
				<input class="form-control" name="password" placeholder="كلمة السر " type="password" required>
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">تأكيد كلمة السر </label>
				<input class="form-control" name="cpassword" placeholder="تأكيد كلمة السر" type="password" required>
				<span class="text-danger"><?php echo form_error('cpassword'); ?></span>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">تسجيل حساب</button>
			</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
			
	  <div class="card-footer">
    <div class="row">
		<div class="col-md-12 text-center">
		أنت تملك حساب ؟ <a href="<?php echo base_url(); ?>index.php/login">سجل دخولك من هنا</a>
		</div>
	</div>
  </div>
		
</div>
</div>
</div>
	</div>
	
</div>
