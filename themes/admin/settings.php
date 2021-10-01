<div class="content p-4">

<div class="container mt-5">
  <div class="row justify-content-center">
 <div class="col-md-8">

 <div class="card">
 <div class="card-header">
  <h2 class="card-title">إعدادات الموقع </h2>

</div>
<div class="card-body">
			  
<?php echo $this->session->flashdata('msg'); ?>


    <form action="<?=site_url('settings/add')?>" method="post">

      <div class="form-group">
        <label for="site_title">عنوان المو قع:</label>
        <input type="text" class="form-control" name="site_title" required value="<?= set_value('site_title',$setting['site_title']) ?>">

        <!-- Error -->
		<?php echo form_error('site_title', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>

      </div>
	        <div class="form-group">
        <label for="site_address">عنوان مقر الجمعية:</label>
        <input type="text" class="form-control" name="site_address" required value="<?= set_value('site_address',$setting['site_address']) ?>">

        <!-- Error -->
		<?php echo form_error('site_address', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>

      </div>
	        <div class="form-group">
        <label for="site_phone">هاتف الجمعية:</label>
        <input type="text" class="form-control" name="site_phone" required value="<?= set_value('site_phone',$setting['site_phone']) ?>">

        <!-- Error -->
		<?php echo form_error('site_phone', '<div class="alert alert-danger" role="alert">
', '</div>'); ?>

      </div>
	  <div class="form-group">
         <label for="pwd">بريد الموقع:</label>
         <input class="form-control" name="emailadmin" required value="<?= set_value('emailadmin',$setting['email_admin']) ?>">

         <!-- Error -->
         

      </div>

	
      <div class="form-group">
         <label for="pwd">وصف الموقع:</label>
         <textarea id="site_description" name="site_description" cols="40" rows="5" class="form-control"required><?= set_value('site_description',$setting['site_description']) ?></textarea>

         <!-- Error -->
     

      </div>
    <div class="form-group">
         <label for="pwd">كلمات دليلية	:</label>
         <textarea id="site_keywords" name="site_keywords" cols="40" rows="5" class="form-control"required><?= set_value('site_keywords',$setting['site_keywords']) ?></textarea>

         <!-- Error -->
       

      </div><div class="form-group">
         <label for="pwd">تفعيل الكاش:</label>
						<select name="active_cache" id="active_cache" class ="form-control" required="required">
<option value="1" <?php if($setting['active_cache']== "1") echo"SELECTED";?>>نعم</option>
<option value="0" <?php if($setting['active_cache']== "0") echo"SELECTED";?>>لا</option>
						</select>

         <!-- Error -->
         

      </div>
	  
	  <div class="form-group">
		 
      
        
<div class="clearfix"></div>
			<div class="form-group">
						<label>القالب</label>
						<select name="theme" id="theme" class ="form-control" required="required">
                <?php
			//	echo VIEWPATH.'';
			//	echo FCPATH.'';

     // if ($handle = opendir(''.FCPATH.'/themes/')) {
	  if ($handle = opendir(''.VIEWPATH.'/')) {

                  while (false !== ($file = readdir($handle))) {
      if ($file != "error404.php" && $file != "admin" && $file != "errors" && $file != "." && $file != ".." && $file!="thumbs" && $file!="Thumbs.db" && $file!="index.php" && $file != "index.html" && $file != ".svn"){

                      echo '<option value="'.$file.'"'; if($setting['theme'] == $file){ echo 'selected="selected"'; } echo '>'.$file.'</option>';
                    }
				  }
                  closedir($handle);
                }
                    ?>
						</select>
						
					

      </div>
					</div>

	  
	 
      <button type="submit" class="btn btn-success" name="submit">حفظ البيانات</button>
    </form>
  </div>
              </div>
              </div>

</div>
</div>


    </div><!-- content p-4 -->
    </div><!-- d-flex -->