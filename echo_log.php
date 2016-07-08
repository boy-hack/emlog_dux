<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div class="single single-post postid- single-format-standard nav_fixed">

<section class="container"><div class="content-wrap"> <div class="content">
<?php mianbao_sort($logid,$log_title);?>
 <header class="article-header"> <?php if(!empty($ad_page)):echo $ad_page;endif;?><h1 class="article-title"><?php topflg($top); ?><?php echo $log_title; ?></h1> <div class="article-meta"> 

		<span><i class="fa fa-calendar fa-fw"></i> 日期：<?php echo gmdate('Y-n-j', $date); ?> </span>
		<span><i class="fa fa-user"></i> <?php echo blog_author($author); ?></span>
		<span><i class="fa fa-book fa-fw"></i> <?php blog_sort($logid); ?></span>
		<span><i class="fa fa-fire fa-fw"></i> 浏览：<?php echo $views; ?>次 </span>
		<span><i class="fa fa-comments fa-fw"></i> 评论：<?php echo $comnum; ?>条</span> <?php editflg($logid,$author); ?>
</div> </header> <article class="article-content">

<?php echo  reply_view($log_content,$logid);?>

<span style="display:block;padding-top:40px;"></span>
<div class="iblue">
		本博客所有文章<a>如无特别注明</a>均为原创。<span>作者：<?php blog_author($author); ?> ，</span>复制或转载请<a>以超链接形式</a>注明转自 <a href="/"><?php echo $blogname; ?></a> 。<br/>原文地址《<a href="<?php echo $log_url; ?>"><?php echo $log_title; ?></a>》
</div>


<div class="article-tags"><?php blog_tag($logid); ?></div></article> 
<?php pages_getrandom();?>

<nav class="article-nav"><?php neighbor_log($neighborLog); ?></nav>
<?php if(!empty($ad_page_down)):echo $ad_page_down;endif;?>
	<div class="article_related"><?php doAction('log_related', $logData); ?></div>
	
			<div class="article_post_comment" id="comment-place">
				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
			<a name="comments"></a>
			<?php 
				echo '<h3 class="comment-header">网友评论<b>（'.$comnum.'）</b></h3>';
				echo '<div class="article_comment_list">';
			?>
			<?php blog_comments($comments,$comnum); ?>
			<?php
				echo '</div>';
			?>
			


</div> </div>
<?php
 include View::getView('side_page');
 include View::getView('footer');
?></section>
</div>

