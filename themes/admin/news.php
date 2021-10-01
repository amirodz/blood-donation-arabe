<div class="container">  
<div class="row">
<div class="col-md-12 search-panel">
         
    <h2 class="shadow p-3 mb-5 bg-body rounded mb-5 mt-5"><?php echo $page_title; ?></h2>
    
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-md-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-md-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
 <div class="card">
  <div class="card-header mb-5">
    البحث
  </div>   
     <!-- Search form -->
            <form method="post" class="pr-5 pl-5">
                <div class="input-group mb-3">
                    <input type="text" name="searchKeyword" class="form-control border border-primary" placeholder=" كلمة بحث ..." value="<?php echo $searchKeyword; ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-outline-primary border border-primary" value="بحث">
                        <input type="submit" name="submitSearchReset" class="btn btn-outline-primary border border-primary" value="عرض الكل">
                    </div>
                </div>
            </form>
   </div>   
           
            <!-- Add link -->
            <div class="shadow p-3 mb-5 bg-body rounded float-right mb-5 mt-5">
                <a href="<?php echo site_url('News/add/'); ?>" class="btn btn-success"><i class="plus"></i> أضف خبر </a>
            </div>
        
        <!-- Data list table --> <div class="table-responsive">

        <table class="table table-sm table-bordered border-primary">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>

                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($News)){ foreach($News as $row){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['post_title']; ?></td>
                    <td>
                        <a href="<?php echo site_url('News/view/'.$row['id']); ?>" class="table-link text-warning"><span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span></a>
                        <a href="<?php echo site_url('News/edit/'.$row['id']); ?>" class="table-link text-info"><span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil-alt fa-stack-1x fa-inverse"></i>
</span></a>
                        <a href="<?php echo site_url('News/delete/'.$row['id']); ?>" class="table-link text-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف الخبر ؟')"><span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-alt fa-stack-1x fa-inverse"></i>
</span></a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="7">لم تقم بإضافة أي خبر</td></tr>
                <?php } ?>
            </tbody>
        </table></div>

    
        <!-- Display pagination links -->
        <div class="pagination pull-right mb-5">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
        </div>
