<div class="container">
    <h2 class="display-4 border-bottom border-secondary mt-5 mb-5 pr-5 pb-3">إدارة الصور</h2>
	
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="col-md-12 head">
            <!-- Add link -->
            <div class="float-right mb-5">
                <a href="<?php echo base_url('manage_gallery/add'); ?>" class="btn btn-success"><i class="plus"></i> تحميل صورة </a>
            </div>
        </div>
        
        <!-- Data list table --> 
       <div class="table-responsive"> <table class="table table-striped table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th width="5%">#</th>
                    <th width="10%"></th>
                    <th width="40%">العنوان</th>
                    <th width="19%">التاريخ</th>
                    <th width="8%">الحالة</th>
                    <th width="18%">خيارات</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($gallery)){ $i=0;  
                    foreach($gallery as $row){ $i++; 
					
                      //  $image = !empty($row['file_name'])?'<img src="'.base_url().'uploads/images/'.$row['file_name'].'" alt="" />':''; 
						
						 $image = !empty($row['thumbnail'])?'<img src="'.base_url().''.$row['thumbnail'].'" alt="" />':'';
						 
                        $statusLink = ($row['status'] == 1)?site_url('manage_gallery/block/'.$row['id']):site_url('manage_gallery/unblock/'.$row['id']);  
                        $statusTooltip = ($row['status'] == 1)?'تعطيل':'تفعيل';  
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $image; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'مفعل':'معطل'; ?></span></a></td>
                    <td>
                        <a href="<?php echo base_url('manage_gallery/view/'.$row['id']); ?>" class="btn btn-primary">معاينة</a>
                        <a href="<?php echo base_url('manage_gallery/edit/'.$row['id']); ?>" class="btn btn-warning">تعديل</a>
                        <a href="<?php echo base_url('manage_gallery/delete/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">حذف</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="6">لا توجد صور بعد</td></tr>
                <?php } ?>
            </tbody>
        </table>
       </div>
 </div>
</div>
