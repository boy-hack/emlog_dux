<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<section class="focusbox-wrapper container"><div class="focusbox"><div class="focusmo"><ul><?php
$index_newlognum = 5;
$db = MySql::getInstance();
if($m_cms_pci=="1"){
	//自定义
	$sql = $db->query ("select * from ".DB_PREFIX."blog where gid in ({$m_cms_page}) order by find_in_set(gid, '{$m_cms_page}')");
	
}else{
	//随机文章
	$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by RAND() limit 0,$index_newlognum"); 
}

$i=0;
while($row = $db->fetch_array($sql)){$i++; ?>
	<li <?php if($i==1){echo 'class="large"';}?>><span><a href="<?php echo Url::log($row['gid']);?>"> <img data-original="<?php get_thum($row['gid']);?>" src="<?php get_thum($row['gid']);?>" alt="" class="thumb" style="opacity: 1;"><span><h4><?php echo $row['title'];?></h4></span></a></span></li> 
	<?php }?></ul></div> <div class="most-comment-posts"><h3 class="widget_titx"><strong>大家推荐</strong></h3><ul><?php
	$db = MySql::getInstance();
	$hot_num = 9;
	$sql = "SELECT gid,title,date,views,content FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND date > $time - 30*24*60*60 AND top='n' AND sortid=sid order by `views` DESC limit $hot_num";
	$list = $db->query($sql);
	$i=0;
	while($row = $db->fetch_array($list)){
		$i++;
	?> 	
	<li class="item-<?php echo $i;?>"><span class="label label-<?php echo $i;?>"><?php echo $i;?></span><span id="date">[<?php echo gmdate('m-d', $row['date']);?>]</span><a href="<?php echo Url::log($row['gid']);?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></li>
	<?php }?></ul></div></div></section>



<section class="container">
	<div class="content-wrap">
	<div class="content">
<?php doAction('index_loglist_top'); ?>

<?php 
$logs=array_slice($logs,0,2);
foreach($logs as $key=>$value): 
?>

			<?php
				/*图片和摘要*/
		    	preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['log_description'], $img);
				if($imgsrc = !empty($img[1])){ $imgsrc = $img[1][0];?>
				<?php }else{ 
					preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);
					if($imgsrc = !empty($img[1])){ $imgsrc = $img[1][0]; ?>
					<?php }else{
						$imgsrc =TEMPLATE_URL."images/random/".rand(1,20).".jpg";
						?>
					<?php }?>
			<?php }?>
	
	
	<article class="excerpt excerpt-<?php echo $key+1;?>"><a class="focus" href="<?php echo $value['log_url']; ?>"><img class="thumb" src="<?php echo $imgsrc;?>" style="display: inline;"></a><header><?php blog_sort($value['logid']); ?> <h2><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></h2></header><p class="meta"><time><i class="fa fa-clock-o"></i><?php echo gmdate('Y-n-j', $value['date']); ?></time><span class="pv"><i class="fa fa-eye"></i>阅读(<?php echo $value['views']; ?>)</span><span class="pc"><i class="fa fa-comments-o"></i>评论(<span id="sourceId::6312" class="cy_cmt_count"><?php echo $value['comnum']; ?></span>)</span></p><p class="note"><?php echo $logdes = tool_purecontent($value['content'], 180); ?></p></article>
<?php 
endforeach;
?>
<div class="cmsbox">
<?php echo sort_name(0);?>
</div>


</div></div>

<?php
 include View::getView('side');
 include View::getView('footer');
?>
</section><!-- end #contentleft-->
