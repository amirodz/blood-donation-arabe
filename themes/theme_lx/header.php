<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo strip_tags($page_title);?></title>
<meta name="description" content="<?php echo character_limiter(strip_tags($description),150);?>">
<meta name="keywords" content="<?php echo character_limiter(strip_tags(str_replace(' ',',',trim($keywords,','))),150);?>"> 

<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-rtl.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/all.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/v4-shims.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("themes/".$template."/light.css"); ?>">
<!-- Import Leaflet CSS Style Sheet -->
<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.css" />

<!-- Import Leaflet JS Library -->
<script src="https://npmcdn.com/leaflet@1.0.0-rc.2/dist/leaflet.js"></script>

<style>	
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
#scroll {
	position: fixed;
	right: 10px;
	bottom: 45px;
	cursor: pointer;
	width: 40px;
	height: 40px;
	background-color: #dc143c;
	text-indent: -9999px;
	display: none;
	-webkit-border-radius: 60px;
	-moz-border-radius: 60px;
	border-radius: 60px;
}
#scroll span {position:absolute;top:50%;left:50%;margin-left:-8px;margin-top:-12px;height:0;width:0;border:8px solid transparent;border-bottom-color:#ffffff}
#scroll:hover {background-color:#1CA86F;opacity:1;filter:"alpha(opacity=100)";-ms-filter:"alpha(opacity=100)";}

</style>	
</head>
<body>
 <header>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand text-info" href="<?php echo base_url(); ?>">الرئيسية</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
			   <?php if($notes): ?>
          <?php foreach($notes as $note): ?>
 <li class="nav-item text-info pr-2"><a href="<?php echo base_url('page/'.$note->id) ?>"><?php echo $note->title; ?></a></li>
<?php endforeach; ?>
         <?php endif; ?>
	 <li class="nav-item text-info pr-2"><a href="<?php echo base_url('gallery') ?>">معرض الصور</a></li>	
	 <li class="nav-item text-info pr-2"><a href="<?php echo base_url('news') ?>">الأخبار</a></li> 
   <li class="nav-item text-info pr-2"><a href="<?php echo base_url('donate') ?>">تبرع الأن</a></li> 

</ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>




