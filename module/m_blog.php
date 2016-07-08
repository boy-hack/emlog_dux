<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<section class="container">
	<div class="content-wrap">
	<div class="content">
	<?php if(blog_tool_ishome()&& $ppt_zhiding==2){?>
<div id="homeslider" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#homeslider" data-slide-to="0" class="active"></li><li data-target="#homeslider" data-slide-to="1" class=""></li><li data-target="#homeslider" data-slide-to="2" class=""></li></ol><div class="carousel-inner" role="listbox"><div class="item active"><a target="_blank" href="<?php echo $ppt_titleurl;?>"><img src="<?php echo $ppt_picurl;?>" alt="blog.yesfree.pw"></a></div><div class="item"><a target="_blank" href="<?php echo $ppt_titleur2;?>"><img src="<?php echo $ppt_picur2;?>" alt="blog.yesfree.pw"></a></div><div class="item"><a target="_blank" href="<?php echo $ppt_titleur3;?>"><img src="<?php echo $ppt_picur3;?>" alt="blog.yesfree.pw"></a></div></div><a class="left carousel-control" href="#homeslider" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a><a class="right carousel-control" href="#homeslider" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a></div>		
			
	<?php }
	if(blog_tool_ishome()&&$radio_zhiding=='2'):
	?>

<article class="excerpt-see excerpt-see-index"><h2><a class="red" href="#"><?php echo $heightkey;?></a> <a href="<?php echo $top_titleurl;?>" title="<?php echo $top_title;?>"><?php echo $top_title;?></a></h2><p class="note"><?php echo $top_content;?></p></article><?php endif;?>

	
		
<?php doAction('index_loglist_top'); ?>

<?php 
		if (!empty($logs)):
		if(blog_tool_ishome() && empty($keyword)) {
			//首页显示
			//echo topLog($Log_Model);//J2首页逻辑下的置顶 最多4条数据
			echo '<div class="title"><h3>最新更新</h3></div>';
		}
		if(!empty($sort)) {
			//栏目页显示
			$des = $sort['description']?$sort['description']:'这家伙很懒，还没填写该栏目的介绍呢~';
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">'.$sortName.'</h2><p>'.$des.'</p></div>';
		}
		if(!empty($record)) {
			//日期记录
			$year    = substr($record,0,4);
			$month   = ltrim(substr($record,4,2),'0');
			$day     = substr($record,6,2);
			$archive = $day?$year.'年'.$month.'月'.ltrim($day,'0').'日':$year.'年'.$month.'月';
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">日志归档</h2><p>'.$archive.'发布的文章</p></div>';
		}
		if(!empty($author_name)) {
			//作者日志显示
			
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">作者</h2><p>本站作者<strong>'.$author_name.'</strong> 共计发布文章'.$lognum.'篇</p></div>';
		}
		if(!empty($keyword)) {
			//搜索
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">站内搜索</h2><p>本次搜索帮您找到有关 <strong>'.$keyword.'</strong> 的结果'.$lognum.'条</p></div>';
		}
		if(!empty($tag)) {
			//关键词
			echo '<div class="content_catag_container"><h2 class="content_catag_title isKeywords font_title">标签关键词</h2><p>关于 <strong>'.$tag.'</strong> 的文章共有'.$lognum.'条</p></div>';
		}
foreach($logs as $value): 
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
			<article class="excerpt excerpt-1"><a class="focus" href="<?php echo $value['log_url']; ?>"><img class="thumb" src="<?php echo $imgsrc;?>" style="display: inline;"></a><header><?php blog_sort($value['logid']); ?> <h2><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></h2></header><p class="meta"><time><i class="fa fa-clock-o"></i><?php echo gmdate('Y-n-j', $value['date']); ?></time><span class="pv"><i class="fa fa-eye"></i>阅读(<?php echo $value['views']; ?>)</span><span class="pc"><i class="fa fa-comments-o"></i>评论(<span id="sourceId::6312" class="cy_cmt_count"><?php echo $value['comnum']; ?></span>)</span></p><p class="note"><?php echo $logdes = tool_purecontent($value['content'], 180); ?></p></article>
<?php 
endforeach;
else:
?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>

<div class="pagenavi"><ul>
<?php echo sheli_fy($lognum,$index_lognum,$page,$pageurl);?></ul>
</div>
</div></div>

<?php
 include View::getView('side');
 include View::getView('footer');
?>
</section><!-- end #contentleft-->
