<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="#" />
  <meta name="keywords" content="#" />
  <meta name="author" content="#" />
  <meta name="robots" content="index, follow" />
  <link rel="icon" href="#" type="image/*" />
  <link rel="canonical" href="#" />

  <!-- social media metatags -->
  <meta property="og:title" content="#" />
  <meta property="og:description" content="#" />
  <meta property="og:locale" content="#" />
  <meta property="og:url" content="#" />
  <meta property="og:site_name" content="#" />
  <meta property="og:type" content="#" />
  <meta property="og:image" content="#" />
  <meta property="og:image:type" content="image/*" />
  <meta property="og:image:width" content="#" />
  <meta property="og:image:height" content="#" />

  <!-- metatags for twitter -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="#" />
  <meta name="twitter:site" content="@niagsouza" />
  <meta name="twitter:title" content="#" />
  <meta name="twitter:description" content="#" />

  <!-- CSS imports -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-rtl.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/all.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/v4-shims.min.css"); ?>">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/navbar.css" />
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/summernote/summernote-bs4.min.css"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.css"/>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/jquery-ui/jquery-ui.min.css">


<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/elfinder/css/elfinder.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/elfinder/css/theme.css">
		

  <title>Admin</title>
  
</head>
<style>
@import url('<?php echo base_url(); ?>assets/cairo.css');
body{
    font-family: 'Cairo', serif;
}
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>
<body>

<nav class="navbar navbar-expand navbar-dark bg-info border-bottom border-secondary">

    <a class="navbar-brand" href="#"><i class="fas fa-hand-holding-heart"></i> أنقد حياة </a>
    <a class="sidebar-toggle text-light ml-3" style="cursor: pointer;"><i class="fa fa-bars"></i></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <i class="fa fa-user"></i> الإدارة
                </a>
				 <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>settings"><i class="fa fa-cog" aria-hidden="true"></i> إعدادات </a>
			    <a class="dropdown-item" href="<?php echo base_url(); ?>admin_profile"><i class="fa fa-user fa-lg"></i> المدير </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> خروج </a>
              </div>
               
            </li>
        </ul>
    </div>
</nav>


 <!-- d-flex --> <div class="d-flex">
 
  <nav class="sidebar bg-info border-left border-secondary">
        <ul class="list-unstyled">
        
         
       <li> <a href="<?php echo base_url(); ?>admin"><i class="fa fa-home pl-2"></i>الرئيسية</a></li>
		
       <li> <a href="<?php echo base_url(); ?>donor"><i class="fa fa-table pl-2"></i>المتبرعون</a></li>
		
	<li><a href="<?php echo base_url(); ?>admin_profile"><i class="icon fa fa-edit"></i> تعديل المدير </a></li>
	<li><a href="<?php echo base_url(); ?>profile"><i class="icon fa fa-edit"></i> بروفايل  </a></li>	 
 <li><a href="<?php echo base_url(); ?>Pages"><i class="icon fa fa-edit"></i> التحكم بالصفحات </a></li>
			 
  
	
	 <li><a href="<?php echo base_url(); ?>News"><i class="icon fa fa-newspaper
"></i> التحكم بالأخبار </a></li>
	
	 <li><a href="<?php echo base_url(); ?>Manage_gallery"><i class="icon far fa-image"></i> ألبوم الصور </a></li>
				 
   	 <li><a href="<?php echo base_url(); ?>"><i class="pr-2 pb-2 fa fa-globe fa-lg"></i> واجهة الموقع   </a></li>
        </ul>
    </nav>


  <!-- page-content-wrapper -->  
  <div class="content p-4">
	

