<div class="container">
    <div class="row">
<div class="col-12 col-lg-8 mt-3">

   <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
	          <?php if(!empty($gallery)){ ?> 
                <?php 
            foreach($gallery as $row){ 
                $uploadDir = base_url().'uploads/images/'; 
                $imageURL = $uploadDir.$row["file_name"];
                $thumbnail = $row["thumbnail"]; 
				
             ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
		  
            <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
                <img class="bd-placeholder-img card-img-top" src="<?php echo $thumbnail; ?>" alt="" width="100%" height="225" role="img"/>
            </a>

            <div class="card-body">
              <p class="card-text text-wrap"><?php echo character_limiter($row["title"],10); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
 <a href="<?php echo base_url('image/'.$row["id"]) ?>"><button type="button" class="btn btn-sm btn-outline-secondary">شاهد</button></a>
                </div>
                <small class="text-muted">
				<?php   $created = strtotime($row["created"]);
				        $post_date = $created;
                        $now = time();
                        $units = 2;
                     echo timespan($post_date, $now, $units);?>
                      </small>
              </div>
            </div>
          </div>
        </div>
		        <?php } ?>

    
        <?php }else{ ?>
            <div class="col-xs-12">
                <div class="alert alert-danger">No image(s) found...</div>
            </div>
        <?php } ?>
	
        </div>

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
