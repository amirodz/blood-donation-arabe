<div class="container">
  
<div class="row">
    <div class="col-lg-12 mt40">
<h2 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-3"> تعديل صفحة</h2>
   
     
     
<form action="<?php echo base_url('Pages/store') ?>" method="POST" name="edit_note">
   <input type="hidden" name="id" value="<?php echo $note->id ?>">
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>العنوان</label>
                <input type="text" name="title" class="form-control" value="<?php echo $note->title ?>" placeholder="العنوان">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>مقدمة</label>
                <textarea class="form-control" col="4" id="post_content" name="description"
                 placeholder="مقدمة"><?php echo $note->description ?></textarea>
            </div>
        </div>
		  <div class="col-md-12">
            <div class="form-group">
                <label>إقرا المزيد باقي الموضوع</label>
                <textarea class="form-control" col="4" id="read_more" name="read_more"
                 placeholder="إقرأ المزيد باقي الموضوع"><?php echo $note->read_more ?></textarea>
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">تعديل صفحة</button>
        </div>
    </div>
     
  </div>
</div>
</div>




    </div><!-- content p-4 -->
    </div><!-- d-flex -->