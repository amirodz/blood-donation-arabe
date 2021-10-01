<div class="container">
<div class="row">

<div class="col-12 col-lg-8 mt-3">
 <h2><?php echo $page_title; ?></h2>
    
  
 <div class="card mt-5 mb-5">
     <!-- Search form -->
            <form method="post" class="pr-5 pl-5 pt-5">
                <div class="input-group mb-3">
                    <input type="text" name="searchKeyword" class="form-control border border-primary" placeholder=" كلمة بحث ..." value="<?php echo $searchKeyword; ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-outline-primary border border-primary" value="بحث">
                        <input type="submit" name="submitSearchReset" class="btn btn-outline-primary border border-primary" value="عرض الكل">
                    </div>
                </div>
            </form>
   </div> 
   
<?php if(!empty($News)){ foreach($News as $row){ ?>

   <div class="card mt-5 mb-5">
  <div class="card-body">
    <h5 class="card-title"> <a href="<?php echo site_url('news/single/'.$row['id']); ?>" class="table-link text-danger"><?php echo $row['post_title']; ?></a></h5>
    <p class="card-text">
<?php echo word_limiter(strip_tags($row['post_content']),50); ?>
	</p>
  </div>
</div>        
 
<?php 
} 
}else{ 
?>
    لم تقم بإضافة أي خبر
	
<?php } ?>
          

    
        <!-- Display pagination links -->
        <div class="pagination pull-right mt-5 mb-5">
            <?php echo $this->pagination->create_links(); ?>
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
