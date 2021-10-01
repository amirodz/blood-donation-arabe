<div class="container">
    <h2><?php echo $page_title; ?></h2>
    <div class="col-md-6">
        <div class="card" style="width:400px">
            <div class="card-body">
                <h4 class="card-title"><?php echo $News['post_title'];?></h4>
           
                <p class="card-text"><b>Country:</b> <?php echo $News['post_content']; ?></p>
                <p class="card-text"><b>Created:</b> <?php echo $News['created']; ?></p>
                <a href="<?php echo site_url('News'); ?>" class="btn btn-primary">Back To List</a>
            </div>
        </div>
    </div>
</div>
