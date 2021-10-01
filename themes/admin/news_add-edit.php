   <!-- container-fluid --> 
   <div class="container-fluid"> 
   <div class="row">
        <div class="col-md-12">
   <h2 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-5"><?php echo $page_title; ?></h2>

    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-md-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-md-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    
  
            <form method="post" class="needs-validation donation shadow" novalidate>
              
                <div class="form-group">
                    <label>مقدمة </label>
                    <input type="text" class="form-control" name="post_title" placeholder="" value="<?php echo !empty($News['post_title'])?$News['post_title']:''; ?>" required>
                    <?php echo form_error('post_title','<div class="alert alert-danger" role="alert">','</div>'); ?>
                </div>
             
                <div class="form-group">
                    <label>الموضوع</label>
                    <textarea class="form-control" id="post_content" name="post_content" placeholder=""><?php echo !empty($News['post_content'])?$News['post_content']:''; ?></textarea><?php echo form_error('post_content','<div class="alert alert-danger" role="alert">','</div>'); ?></div>
					
                 <div class="form-group">
                    <label> المزيد عن الموضوع</label>
                    <textarea class="form-control" id="read_more" name="read_more" placeholder=""><?php echo !empty($News['read_more'])?$News['read_more']:''; ?></textarea><?php echo form_error('read_more','<div class="alert alert-danger" role="alert">','</div>'); ?></div>
					
                <a href="<?php echo site_url('News'); ?>" class="btn btn-secondary">عودة لقائمة الأخبار</a>
                <input type="submit" name="memSubmit" class="btn btn-success" value="أضف">
            </form>
			
        </div>
    </div>
</div>

