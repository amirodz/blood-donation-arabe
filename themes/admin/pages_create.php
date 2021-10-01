<div class="container-fluid">
  
<div class="row">
    <div class="col-md-12 well mt-5">
	  <h1 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5">أضف صفحة</h1>

       
     
     
<form action="<?php echo base_url('Pages/store') ?>" method="POST" name="edit_note" class="needs-validation donation shadow" accept-charset="utf-8" novalidate>
   <input type="hidden" name="id">
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>العنوان</label>
                <input type="text" name="title" class="form-control" placeholder="العنوان" required>
				<div class="invalid-tooltip">
                   من فضلك أكتب عنوان                       
                         </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="post_content">مقدمة</label>
                <textarea class="form-control" col="4" id="post_content" name="description"
                 placeholder="مقدمة" required></textarea>
				       <div class="invalid-tooltip">
                   من فضلك أكتب مقدمة                       
                         </div>

            </div>
        </div>
		        <div class="col-md-12">
            <div class="form-group">
                <label for="read_more"> الموضوع</label>
                <textarea class="form-control" col="4" id="read_more" name="read_more"
                 placeholder="إقرأ المزيد باقي الموضوع"></textarea>
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">أضف الصفحة</button>
        </div>
    </div>
	
	
      </div>
</div>
 
</div>





    </div><!-- content p-4 -->
    </div><!-- d-flex -->