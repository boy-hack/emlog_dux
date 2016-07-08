<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
if(isset($_GET["setting"])){
	include View::getView('setting');
	exit;
}
if(isset($_GET["user"])){
	include View::getView('user');
	exit;
}
$view='';
if($web_method==2){
	$view='module/m_blog';
}elseif($web_method==3){
	$view='module/m_gfs';
}else{
	$view='module/m_cms';
}
if(!blog_tool_ishome()){
		$view='module/m_blog';
}
include View::getView($view);
?>
