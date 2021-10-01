
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5 well">
						  			

	<?php echo $this->session->flashdata('msg'); ?>
<div class="card">
  <div class="card-body mt-5 mb-5">
     <h2 class="card-title text-danger shadow pb-3 mb-5">تبرع بدمك و أنقد حياة </h2>


	 <form class="needs-validation donation shadow" id="donationForm" method="post" action="<?php echo base_url(); ?>Donate/add" accept-charset="utf-8" novalidate>
          
            <div class="form-group">
               <div class="row">
                 <div class="col-lg-4">
                  <input type="text" class="form-control" id="fullname" name="fullname"   placeholder="الاسم الكامل" autocomplete="off" required>
				  	<span class="text-danger"><?php echo form_error('fullname'); ?></span>
                 </div>
                 <div class="col-lg-4">
                  <input type="text" class="form-control" id="adress" name="adress" placeholder="العنوان" autocomplete="off">
                 </div> 
                 <div class="col-lg-4">
                   <input type="text" class="form-control" id="city" name="city"   placeholder="الولاية" required>
				   	<span class="text-danger"><?php echo form_error('city'); ?></span>
                 </div>
               </div>
            </div>  
			 <div class="form-group">
			 
			     <label class="rightlabels ml-5"> الجنس </label>

			  <div class="row">
                <div class="col-lg-4 custom-control custom-switch">
                   <input class="custom-control-input" type="radio" value="ذكر" id="male" name="sex" required>
				   <label class="custom-control-label" for="male"> ذكر </label>
				<div class="invalid-feedback">
                      من فضلك جنسك 
					  </div>

                 </div>
			
			<div class="col-lg-4 custom-control custom-switch">

             <input class="custom-control-input" type="radio" value="أنثي" id="female" name="sex" required>
			 <label class="custom-control-label" for="female"> أنثي </label>                         
                    </div>
                        </div>
						 </div>

            <div class="form-group">
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
            <button type="submit" class="btn btn-primary mb-5" name="donnationform"> <i class="fas fa-plus"> </i> أضف بياناتك</button>
          </form>
	 </div>
</div>




 </div>
            
          </div>
        </div>  
