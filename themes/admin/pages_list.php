
<div class="container">
    <div class="row mt40">
   <div class="col-md-10 mt-5 well">
   
    <h2>إدارة الصفحات</h2>
    <a href="<?php echo base_url('Pages/create/') ?>" class="btn btn-danger mt-5 mb-5">أضف صفحة</a>


    <div class="table-responsive">

    <table class="table table-bordered">
       <thead>
          <tr>
             <th>Id</th>
             <th>العنوان</th>
             <th>تعديل</th>
           <th>حذف</th>

          </tr>
       </thead>
       <tbody>
          <?php if($notes): ?>
          <?php foreach($notes as $note): ?>
          <tr>
             <td><?php echo $note->id; ?></td>
             <td><?php echo $note->title; ?></td>

             <td><a href="<?php echo base_url('Pages/edit/'.$note->id) ?>" class="btn btn-primary">تعديل</a></td>
                 <td>
                <form action="<?php echo base_url('Pages/delete/'.$note->id) ?>" method="post">
                  <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
	       </div>

       </div>
</div>
 
</div>





    </div><!-- content p-4 -->
    </div><!-- d-flex -->