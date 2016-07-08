<?php
/*
Template Name:Emlog大前端
Description:简洁优雅<br><span style="color:red">有空多到我的博客做客哈~</span>>><a href="http://blog.yesfree.pw">草窝</a>
Version:4.2
Author:小草
Author Url:http://blog.yesfree.pw/
Sidebar Amount:2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-title" content="emlog大前端">
<meta http-equiv="Cache-Control" content="no-siteapp">
<title><?php echo $site_title; ?></title>
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" id="da-main-css" href="<?php echo TEMPLATE_URL; ?>style/main.css" type="text/css" media="all">

<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog大前端" />
<link rel="shortcut icon" href="<?php echo TEMPLATE_URL; ?>favicon.ico">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!--[if lt IE 9]><script src="http://apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script><![endif]-->
<!-- <script language="javascript">if(top !== self){location.href = "about:blank";}</script> -->
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<style type="text/css">
.logo a{
	background-image:url("<?php echo $logo_url; ?>");
}
<?php echo $css;
$isshow = true;
$ncolor = '';
if($webcolor == "blue"){
	$isshow = false;
}else if($webcolor == "red"){
	$ncolor = '#FF5E52';
}else if($webcolor == "yellow"){
	$ncolor = '#FFE600';
}else if($webcolor == "green"){
	$ncolor = '#5CB85C';
}
if($isshow){
echo ".widget_links li a:hover {color: $ncolor;}
.plinks ul li a:hover{border-color: $ncolor;}
.m-nav-show .m-icon-nav{color:$ncolor}
.page_tags a:nth-child(9n):hover{background-color: $ncolor;}
a:hover{color: $ncolor;}
.btn-primary{background-color: $ncolor}
.label-primary{background-color: $ncolor;}
.site-navbar a:hover{color: $ncolor;}
.site-navbar li.active > a{color: $ncolor;}
.topbar a:hover{color: $ncolor;}
.topmenu a:hover{color: $ncolor;}
.topmenu li.active > a{color: $ncolor;}
.search-input:focus{border-color: $ncolor;}
.search-btn{background: $ncolor;}
.site-search-form a:hover{color: $ncolor;}
.title .more li a:hover{color: $ncolor;}
submit{background: $ncolor;}
.excerpt .cat{background-color: $ncolor;}
.widget_ui_comments strong{color:$ncolor;}
.widget_ui_textads a.style01 strong{background-color:$ncolor;}
.widget_ui_textads a.style01{color:$ncolor;}
.widget_ui_textads a.style01:hover{border-color:$ncolor;}
.widget_ui_posts li a:hover .text {color: $ncolor;}
.widget_ui_tags .items a:hover {background-color: $ncolor;}
.widget_links li a .fa{color:$ncolor;}
.pagenavi a:hover, .pagenavi .now-page{background:$ncolor;}
.widget_ui_sort .items a:hover{background-color:$ncolor}
.excerpt h2 a:hover{color: $ncolor;}
.sub_btn{background-color: $ncolor;border: 1px solid $ncolor;}
";
}?>
</style>
<?php doAction('index_head'); ?></head>
<body class="home blog">
<header class="header">
<div class="container">
	<h1 class="logo"><a href="<?php echo BLOG_URL; ?>" title=""><?php echo $blogname; ?></a></h1>	<div class="brand"><?php echo $new_log_num; ?></div>
	<ul class="site-nav site-navbar">
		<?php blog_navi();?>
		
		<li class="navto-search"><a href="javascript:;" class="search-show active"><i class="fa fa-search"></i></a></li>
	</ul>
	<div class="topbar">
		<ul class="site-nav topmenu">
				<?php echo $home_toptext;?>
		</ul>
		
	</div>
	<i class="fa fa-bars m-icon-nav"></i>
</div>
</header>
<div class="site-search">
<div class="container">
	<form method="get" class="site-search-form" action="<?php echo BLOG_URL; ?>index.php">
		<input class="search-input" name="keyword" type="text" placeholder="输入关键字搜索"><button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
	</form>
</div>
</div>
