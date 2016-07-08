<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div class="single single-post postid- single-format-standard nav_fixed">
<section class="container"><div class="content-wrap"> <div class="content"> <header class="article-header"> <h1 class="article-title"><?php echo $log_title; ?></h1> </header> <article class="article-content">
<?php echo $log_content; ?>
 </article> 

	<div class="article_related"><?php doAction('log_related', $logData); ?></div>
			<div class="article_post_comment" id="comment-place">
				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
			<a name="comments"></a>
			<?php 
			if(isShowComment($comnum)) {
				echo '<h3 class="comment-header">网友评论<b>（'.$comnum.'）</b></h3>';
				echo '<div class="article_comment_list">';}
			?>
			<?php blog_comments($comments,$comnum); ?>
			<?php
			if(isShowComment($comnum)) {
				echo '</div>';}
			?>



</div> </div>
<?php
 include View::getView('side');
 include View::getView('footer');
?></section>
</div>