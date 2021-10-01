
<div class="container mt-5">
	<div class="row">
		<div class="col-md-4 mt-5">
			<h4>ممعلومات حسابي</h4>
			<hr/>
			<p>الإسم : <?php echo $uname; ?></p>
			<p>البريد الإلكتروني: <?php echo $uemail; ?></p>
			<p><a class="nav-link  active home" href="<?php echo base_url(); ?>admin"> <i class="fas fa-home" style="color: #cc0000; margin-left: 8px;"></i>الدخول إلي لوحة التحكم </a></p>
		</div>
		<div class="col-md-8 mt-5">
		<div class="card mb-4 mt-5">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">صورة لمدير الموقع</h6>
</div>
<div class="card-body">
<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>
<form action="<?= base_url(); ?>Profile/add_image" role="form" method="post" enctype="multipart/form-data">
 
<div id="divMsg" class="alert alert-success" style="display: none">
<span id="msg"></span>
</div>
 <div class="col-md-8">
<?php if(!empty($avatar)){?>
<img src="<?= base_url(); ?><?= $avatar ?>" class="img-thumbnail" alt="<?= $uname ?> profile picture"> 
		</div>
<?php }else{ ?>
<img src="<?= base_url(); ?>assets/photo.png" class="img-thumbnail" alt="<?= $uname ?> profile picture"> 
<?php } ?>

 <input type="hidden" name="user_id" id="user_id" value="<?= $id ?>"/>
 <div id="size_id"></div>
 <div id="type_id"></div>

<div class="form-group">
<div class="custom-file">
  <input type="file" name="picture" class="custom-file-input" id="picture" readonly="true" onchange="thumbnail()">
  <label class="custom-file-label" for="customFile" data-browse="إختر صور من المعرض">عرض ألبوم الصور</label>
</div>
</div>
<button type="submit" name="userSubmit" value="Add" class="btn btn-success">أرسل</button>
</form>
</div>
</div>
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

    const image = document.querySelector('#picture');
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