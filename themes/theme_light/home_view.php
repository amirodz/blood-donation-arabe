<div class="container">
    <div class="row">
<div class="col-12 col-lg-8 mt-3">
    <div class="card mb-5">
        <div class="card-body shadow">
            <h1 class="text-uppercase">كن متبرعا</h1>
              
<div class="text-danger h4">
             كن متبرعا
أدخل معلوماتك للتسجيل في الموقع كمتبرع, وسنقوم بمراسلتك في الحالة التي توافق معلوماتك.
            </div>

            <hr>

    <form class="needs-validation donation" id="donationForm" method="post" action="<?php echo base_url(); ?>Donate/add" accept-charset="utf-8" novalidate>
          
            <div class="form-group">
               <div class="row">
                 <div class="col-lg-4">
                  <input type="text" class="form-control" id="fullname" name="fullname"   placeholder="الاسم الكامل" autocomplete="off" required>
                 </div>
                 <div class="col-lg-4">
                  <input type="text" class="form-control" id="adress" name="adress" placeholder="العنوان" autocomplete="off">
                 </div> 
                 <div class="col-lg-4">
                   <input type="text" class="form-control" id="city" name="city"   placeholder="الولاية" required>
                 </div>
               </div>
            </div>  
			 <div class="form-group mb-3 pr-3">
			 
			     <label class="rightlabels ml-5"> الجنس </label>

			  <div class="row">
                <div class="col-lg-4 custom-control custom-switch">
                   <input class="custom-control-input" type="radio" value="male" id="male" name="sex" required>
				   <label class="custom-control-label" for="male"> ذكر </label>
				<div class="invalid-feedback">
                      من فضلك جنسك 
					  </div>

                 </div>
			
			<div class="col-lg-4 custom-control custom-switch">

             <input class="custom-control-input" type="radio" value="female" id="female" name="sex" required>
			 <label class="custom-control-label" for="female"> أنثي </label>                         
                    </div>
                        </div>
						 </div>

            <div class="form-group mb-3 pr-3">
              <label class="rightlabels ml-5" for="exampleInputgroup">فصيلة الدم</label>
              <div class="row">
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood1" class="custom-control-input" name="group1" value="A+" type="radio" required>
                  <label class="custom-control-label" for="groupblood1">A+</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood2" class="custom-control-input" name="group1" value="A-" type="radio" required>
                  <label class="custom-control-label" for="groupblood2">A-</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood3" class="custom-control-input" name="group1" value="B+" type="radio" required>
                  <label class="custom-control-label" for="groupblood3">B+</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood4" class="custom-control-input" name="group1" value="B-" type="radio" required>
                  <label class="custom-control-label" for="groupblood4">B-</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood5" class="custom-control-input" name="group1" value="O+" type="radio" required>
                  <label class="custom-control-label" for="groupblood5">O+</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupbloud6" class="custom-control-input" name="group1" value="O-" type="radio" required>
                  <label class="custom-control-label" for="groupbloud6">O-</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood7" class="custom-control-input" name="group1" value="AB+" type="radio" required>
                  <label class="custom-control-label" for="groupblood7">AB+</label>
                 </div>
                 <div class="col-3 custom-control custom-switch">
                  <input id="groupblood8" class="custom-control-input" name="group1" value="AB-" type="radio" required>
                  <label class="custom-control-label" for="groupblood8">AB-</label>
                 </div>
                </div> 
            </div>

            <div class="form-group">
              <label class="rightlabels" for="exampleInputDate1">تاريخ آخر تبرع</label>
              <div class="input-group mb-2">
                <input type="text" class="form-control" id="inlineFormInputGroup" name="lastDonationDate" placeholder=" مثال : منذ شهر " lang="ar" required>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                </div>
              </div>
            </div>

            <div class="form-group">
             <div class="row">
               <div class="col-lg-4">
			     <label for="firstNbr"></label>
                <input type="tel" class="form-control" id="firstNbr" name="firstNbr" placeholder="رقم الهاتف" autocomplete="off"  required>
               </div>
               <div class="col-lg-4">
                <label for="secondNbr"></label>
                <input type="tel" class="form-control" id="secondNbr" name="secondNbr" placeholder=" رقم هاتف ثاني ان وجد" autocomplete="off">
               </div>
               <div class="col-lg-4">
			      <label for="thirdNbr"></label>
                <input type="tel" class="form-control" id="thirdNbr" name="thirdNbr" placeholder=" رقم هاتف آخر" autocomplete="off">
               </div>
             </div>
            </div>

            <div class="form-group">
              <label class="rightlabels" for="contactMethod"> طريقة التواصل</label>
              <select class="form-control" id="contactMethod" name="contactMethod">
                <option>مكالمات</option>
                <option>رسائل نصية</option>
                <option> مكالمات + رسائل نصية</option>
              </select>
            </div>

            <div class="form-group">
              <label class="rightlabels" for="contactTime"> وقت الاتصال</label>
              <select class="form-control" id="contactTime" name="contactTime">
                <option> 24 ساعة </option>
                <option>من 8 الى 3 عصرا </option>
                <option> من 3 الى 11 مساءا</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="donnationform"> <i class="fas fa-plus"> </i> أضف بياناتك</button>
          </form>
		  
            </div>
        </div>
		
	<?php if($last10_news): ?>
	
 <div class="card">
  <div class="card-body">
  <div class="card-header">
    أخبار الجمعية 
  </div>
  <ul class="list-group list-group-flush">
  	    <?php foreach($last10_news as $news): ?>

    <li class="list-group-item">	<a href="<?php echo base_url('news/single/'.$news->id) ?>">
    <i class="icon fa fa-newspaper ml-2"></i><?php echo $news->post_title; ?></a></li>
<?php endforeach; ?>
  </ul>

  </div>
</div><?php endif; ?>
 <div class="card mt-5 mb-5">
  <div class="card-body">
   <div id="my_osm_widget_map" style="width:100%;height:500px;"></div>
</div></div>
</div>


<div class="col-12 col-lg-4">
    <div class="card mt-3">
    <div class="card-body text-center">
                <img src="<?php echo base_url(); ?>assets/img/logo1.jpg" class="img-fluid logo2">
        <h4 class="card-title">تبرع <span> بدمك </span>..</h4>
        <p class="card-text text-danger mb-2">فقطرة منك تنقذ غيرك</p>
        <p class="card-text text-success h5">قال الله تعالى : " ومن أحياها فكأنما أحيا الناس جميعا "
                  <small  class="form-text text-muted">صدق الله العظيم</small></p>
        <a class="btn btn-sm btn-primary pl-3 pt-2 pb-2" href="<?php echo base_url('donate') ?>">
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
