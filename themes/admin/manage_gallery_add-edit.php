<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">  

		<h1 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-5"><?php echo $title; ?></h1>
    <hr>
    
    <!-- Display status message -->
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    

            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>العنوان:</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان مناسب" value="<?php echo !empty($image['title'])?$image['title']:''; ?>" >
                    <?php echo form_error('title','<p class="help-block text-danger">','</p>'); ?>
                </div>
				 <div class="col-md-8">

				<img src="<?= base_url(); ?>assets/photo.png" class="img-thumbnail" alt=" profile picture"> </div>
 <div id="size_id"></div>
 <div id="type_id"></div>
                <div class="form-group">
                    <label>الصورة:</label>
					<div class="custom-file">

                    <input type="file" name="image" class="custom-file-input" id="customFile" onchange="thumbnail()">
					  <label class="custom-file-label" for="customFile" data-browse="عرض الصور">إختر صورة</label>

                    <?php echo form_error('image','<p class="help-block text-danger">','</p>'); ?>
                
					</div>

                </div>
                    <?php if(!empty($image['file_name'])){ ?>
                        <div class="col-md-6 img-thumbnail">
                            <img class="img-fluid" src="<?php echo base_url('uploads/images/'.$image['file_name']); ?>">
                        </div>
                    <?php } ?>
                <a href="<?php echo base_url('manage_gallery'); ?>" class="btn btn-secondary">عودة للألبوم</a>
                <input type="hidden" name="id" value="<?php echo !empty($image['id'])?$image['id']:''; ?>">
                <input type="submit" name="imgSubmit" class="btn btn-success" value="تحميل">
            </form>
        </div>
    </div>
</div>
<script>
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};
  function thumbnail() {

    const image = document.querySelector('#customFile');
    const imageLabel = document.querySelector('.custom-file-label');
    const imageThumbnail = document.querySelector('.img-thumbnail');
    const size_id = document.querySelector('#size_id');
    const type_id = document.querySelector('#type_id');

    imageLabel.textContent = image.files[0].name;
    size_id.textContent = bytesToSize(image.files[0].size);
    type_id.textContent = image.files[0].type;

    const imageFile = new FileReader();
    imageFile.readAsDataURL(image.files[0]);

    imageFile.onload = function(e) {
      imageThumbnail.src = e.target.result;
    }
  }
</script>