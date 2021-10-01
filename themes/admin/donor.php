<div class="container-fluid">

  <h1 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-3"> المتبرعون </h1>

		
  <div class="row">
 <div class="col">

   <!-- Modal -->
            <div id="updateModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">تعديل </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
						  <div class="form-row">

						   <div class="form-group col-md-6">
                                <label for="id" >الرقم</label>
                                <input type="id" class="form-control" id="id" required disabled>            
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fullname" >الإسم</label>
                                <input type="text" class="form-control" id="fullname" required>            
                            </div>
							  </div>	

                            <div class="form-group">
                                <label for="sex" >الجنس</label>    
                                <input type="text" class="form-control" id="sex"  >                          
                            </div> 
							
                         <div class="form-group">
                                <label for="adress" > العنوان </label>    
                                <input type="text" class="form-control" id="adress">                          
                            </div> 
							
						  <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="city" > المدينة </label>    
                                <input type="text" class="form-control" id="city">                          
                            </div>  
							
                             <div class="form-group col-md-6">
                                <label for="group1" > الزمرة </label>    
                                <input type="text" class="form-control" id="group1">                          
                            </div>   
                             </div> 
						
						<div class="form-row">

                              <div class="form-group col-md-6">
                                <label for="lastDonationDate" >تاريخ أخر تبرع </label>    
                                <input type="text" class="form-control" id="lastDonationDate">                          
                            </div>  
							
							<div class="form-group col-md-6">
                                <label for="firstNbr" > رقم الهاتف الأول </label>    
                                <input type="text" class="form-control" id="firstNbr">                          
                            </div>
                             </div> 
							 
							 <div class="form-row">

                       <div class="form-group col-md-6">
                                <label for="secondNbr" > رقم الهاتف الثاني </label>    
                                <input type="text" class="form-control" id="secondNbr">                          
                            </div>  

                       <div class="form-group col-md-6">
                                <label for="thirdNbr" > رقم الهاتف الثالث</label>    
                                <input type="text" class="form-control" id="thirdNbr">                          
                            </div> 
							</div> 
						    
							<div class="form-row">

							 <div class="form-group col-md-4">
                                <label for="contactMethod" > طريقة الإتصال </label>    
                                <input type="text" class="form-control" id="contactMethod">                          
                            </div>	
							
						<div class="form-group col-md-4">
                                <label for="contactTime" > وقت الإتصال </label>    
                                <input type="text" class="form-control" id="contactTime">                          
                            </div>	

						
						<div class="form-group col-md-4">
                                <label for="created_at" > تاريخ التسجيل </label>    
                                <input type="text" class="form-control" id="created_at">                          
                            </div>
							
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="txt_userid" value="0">
                            <button type="button" class="btn btn-success btn-sm" id="btn_save">تعديل</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">غلق النافذة</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Table --><div class="table-responsive">

            <table id="userTable" class="table table-bordered table-hover">
                <thead>
                  <tr> 
				  <th>الرقم</th>
                        <th label="group1: activate to sort column ascending">الزمرة</th>
                        <th>الإسم </th>
                        <th>الجنس</th>
                         <th>المدينة</th>
                        <th>الهاتف</th>

                        <th>خيارات</th>
                    </tr>
                </thead>
                  <tbody></tbody>
				  <tfoot>
				  <tr>
				  <th></th>
                   <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>

				  </tr>
				  </tfoot>
            </table></div>




</div>

  </div>

</div>


<!-- Script -->
<script>
$(document).ready(function(){

var userDataTable =  $('#userTable').DataTable({
	     	processing: true,
            serverSide: true,
			responsive: true,
            serverMethod: 'post',
            ajax: '<?php echo base_url(); ?>Donor/getTable',
			

            columns: [{
                    "data": "id"
                },{
                    "data": "group1"
                },
                {
                    "data": "fullname"
                },
                { 
				    "data": 'sex'
				},
                { 
				    "data": 'city'
				},
                { 
				    "data": 'firstNbr'
				}

            ],
            columnDefs: [{
                    // # hide the first column
                    // https://datatables.net/examples/advanced_init/column_render.html                    
                    "targets": [0],
                    "visible": true
                },
                {
                    // # disable search for column number 2
                    // https://datatables.net/reference/option/columns.searchable                    
                    "targets": [6],
                    "searchable": false,
                    // # disable orderable column
                    // https://datatables.net/reference/option/columns.orderable
                    "orderable": false
                },
                {
                    // # action controller (edit,delete)
                    "targets": [6],
                    // # column rendering
                    // https://datatables.net/reference/option/columns.render
                    "render": function(data, type, row, meta) {
                        return '<button class="btn btn-sm btn-info updateUser" data-toggle="modal" data-target="#updateModal" data-id="' + row.id + '" data-title="' + row.fullname + '" data-slug="' + row.fullname + '">تعديل</button><button class="btn btn-sm mr-3 btn-danger deleteUser" data-id="' + row.id + '">حذف</button>';
                    }
                }
            ],
            // # set order descending and ascending
            // https://datatables.net/reference/option/order
            "order": [
                [1, 'desc'],
                [2, 'asc']
            ],
language: {
processing:     "جارٍ التحميل...",
search:         "إبحث&nbsp;زمرة أو إسم أو مدينة&nbsp;:&nbsp;",
lengthMenu:    "أظهر _MENU_ مدخلات",
info:           "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
infoEmpty:      "يعرض 0 إلى 0 من أصل 0 سجل",
infoFiltered:   "(منتقاة من مجموع _MAX_ مُدخل)",
infoPostFix:    "",
loadingRecords: "جارٍ التحميل...",
zeroRecords:    "لم يعثر على أية سجلات",
emptyTable:     "ليست هناك بيانات متاحة في الجدول",
paginate: {
first:      "الأول",
previous:   "السابق",
next:       "التالي",
last:       "الأخير"
},
aria: {
sortAscending:  ": تفعيل لترتيب العمود تصاعدياً",
sortDescending: ": تفعيل لترتيب العمود تنازلياً"
}
}		
}); 

// Update record
$('#userTable').on('click','.updateUser',function(){
var id = $(this).data('id');
$('#txt_userid').val(id);
// AJAX request
$.ajax({
url: '<?php echo base_url(); ?>Donor/Fetch',
type: 'post',
data: {id: id},
dataType: 'json',
success: function(response){
if(response.status == 1){
$('#id').val(response.data.id);
$('#fullname').val(response.data.fullname);
$('#sex').val(response.data.sex);
$('#adress').val(response.data.adress);
$('#city').val(response.data.city);
$('#group1').val(response.data.group1);
$('#lastDonationDate').val(response.data.lastDonationDate);
$('#firstNbr').val(response.data.firstNbr);
$('#secondNbr').val(response.data.secondNbr);
$('#thirdNbr').val(response.data.thirdNbr);
$('#contactMethod').val(response.data.contactMethod);
$('#contactTime').val(response.data.contactTime);
$('#created_at').val(response.data.created_at);

}else{
alert("Invalid ID.");
}
}
});
});
// Save 
$('#btn_save').click(function(){
var id = $('#id').val();
var fullname = $('#fullname').val().trim();
var sex = $('#sex').val().trim();
var adress = $('#adress').val().trim();
var city = $('#city').val().trim();
var group1 = $('#group1').val().trim();
var lastDonationDate = $('#lastDonationDate').val().trim();          
var firstNbr = $('#firstNbr').val().trim();          
var secondNbr = $('#secondNbr').val().trim();          
var thirdNbr = $('#thirdNbr').val().trim();          
var contactMethod = $('#contactMethod').val().trim();          
var contactTime = $('#contactTime').val().trim();          
var created_at = $('#created_at').val().trim();          
          
if(fullname !='' && sex != '' && city != ''){
// AJAX request
$.ajax({
url: '<?php echo base_url(); ?>Donor/Update',
type: 'post',
data: {id: id, fullname: fullname,sex: sex, adress: adress, city: city,group1: group1,lastDonationDate: lastDonationDate,firstNbr: firstNbr,secondNbr: secondNbr,secondNbr: secondNbr,thirdNbr: thirdNbr,contactMethod: contactMethod,contactTime: contactTime,created_at: created_at},
dataType: 'json',
success: function(response){
if(response.status == 1){
alert(response.message);
// Empty the fields
// $('#fullname','#sex','#adress').val('');
// Reload DataTable
userDataTable.ajax.reload();
// Close modal
$('#updateModal').modal('toggle');
}else{
alert(response.message);
}
}
});
}else{
alert('من فضلك لا تترك حقل فارغ..');
}
});
// Delete record
$('#userTable').on('click','.deleteUser',function(){
var id = $(this).data('id');
//alert(id);
var deleteConfirm = confirm("هل أنت متأكد من عمية الحذف?");
if (deleteConfirm == true) {
$.ajax({
url:'<?php echo base_url();?>Donor/deletes',
type:'post',
data:{ id : id },
dataType: 'html',
success: function(response){
console.log(response);
if(response == 1){
alert("تم الحذف بنجاح.");
// Reload DataTable
userDataTable.ajax.reload();
}else{
alert("Invalid ID.");
}
}
});
}                
});          
});
</script>
