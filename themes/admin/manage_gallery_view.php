<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5><?php echo !empty($image['title'])?$image['title']:''; ?></h5>
            <?php if(!empty($image['file_name'])){ ?>
                <div class="img-box">
                    <img src="<?php echo base_url('uploads/images/'.$image['file_name']); ?>">
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo base_url('manage_gallery'); ?>" class="btn btn-primary">عودة للألبوم</a>
    </div>
</div>
