<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div class="single single-post postid- single-format-standard nav_fixed">
<div class="container container-page">
    <div class="pageside">
	<div class="pagemenus">
		<ul class="pagemenu">

			<?php 
			//global $side_title;
			$side_title = unserialize($side_title);
			//global $side_url;
			$side_url = unserialize($side_url);
				for($i=1;$i<=20;$i++){
					if($side_title[$i]==""){echo "</ul>";}elseif($side_title[$i]=="-"){
						echo '</ul><ul class="pagemenu">';
					}else{
						$url=$side_url[$i];
						$alinks=$side_title[$i];
						echo "<li><a href='{$url}'>{$alinks}</a></li>";

					}
				}

			?>
	</div>
</div>
<div class="content"> <div> <div> <header class="article-header"> <h1 class="article-title">微语</h1> </header> 
<div class="cleft"><ul class="twiter">
<?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?>
<li class="twiter_list"><section class="comments"><article class="comment"><a class="comment-img" href="#non"><img src="<?php echo $avatar; ?>" alt="emlog大前端" width="50" height="50"></a> <div class="comment-body"><div class="text"><p><?php echo comment2emoji($val['t']).'<br/>'.$img;?></p><p class="twiter_info"><i class="fa fa-user"></i><span class="twiter_author"><?php echo $author; ?></span><time class="twiter_time"><i class="fa fa-clock-o"></i> <?php echo sydate($val['date']);?></time></p></div></div></article></section></li>
<?php endforeach;?>
</ul>
<div class="pagination">
			<div class="pagenav">
				<?php echo $pageurl;?>
			</div>
		</div>
</div>
</div> 
   		
</div> </div></div>
<?php
 include View::getView('footer');
?>
</div>
