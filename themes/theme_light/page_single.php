<div class="container">
    <div class="row">
<div class="col-12 col-lg-8 mt-3">
    <div class="card mb-3">
        <div class="card-body">
            <h1 class="display-2 h2 text-right"><?php echo $note->title; ?></h1>
           
	         <?php if($note->description): ?>

            <div class="post-article">
			
                <p><?php echo $note->description; ?></p>


            </div>
			         <?php endif; ?>

			 <?php if($note->read_more): ?>

            <div class="post-article">
			
                <p><?php echo $note->read_more; ?></p>


            </div>
			         <?php endif; ?>

			
            <hr>

          
            </div>
        </div>
    </div>



<div class="col-12 col-lg-4">
    <div class="card mt-3">
    <div class="card-body text-center">
                <img src="<?php echo base_url(); ?>assets/img/logo1.jpg" class="img-fluid logo2">
        <h4 class="card-title">تبرع <span> بدمك </span>..</h4>
        <p class="card-text text-danger mb-2">فقطرة منك تنقذ غيرك</p>
        <p class="card-text text-success h5">قال الله تعالى : " ومن أحياها فكأنما أحيا الناس جميعا "
                  <small  class="form-text text-muted">صدق الله العظيم</small></p>
        <a class="btn btn-sm btn-primary" href="#donationForm">
       <i class="fas fa-hand-holding-heart fa-2x pl-3"></i>تبرع الآن
        </a>
    </div>
</div>

<?php if($notes): ?>
 
<div class="card mt-3">
    <div class="card-header">
        <i class="fa fa-page"></i> الصفحات 
    </div>
    <ul class="list-group list-group-flush">
	    <?php foreach($notes as $note): ?>
     
		<li class="list-group-item">
		<a href="<?php echo base_url('page/'.$note->id) ?>">
    <i class="icon fa fa-newspaper ml-2"></i><?php echo $note->title; ?></a>
    
        </li>
<?php endforeach; ?>

    </ul>
</div>
<?php endif; ?>

</div>
</div>
</div>
