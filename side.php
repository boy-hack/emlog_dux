<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 

?>
<div class="sidebar">


<div class="widget widget-tops">
		<ul class="widget-nav">
		
			<li class="active">网站公告</li>			<li>会员中心</li>		</ul>
		<ul class="widget-navcontent">
							<li class="item item-01 active">
				<?php echo $home_text;?>
				</li>
										<li class="item item-02">
										<?php if(!islogin()){ ?>
											<h4>需要登录才能进入会员中心</h4>
						<p>
							<a href="javascript:;" class="btn btn-primary signin-loader">立即登录</a>
							<a href="javascript:;" class="btn btn-default signup-loader">现在注册</a>
						</p></li>
										<?php }else{ ?>
						<?php 
				global $userData;
			?>
						
                <dl>
            <dt><img alt="" class="avatar avatar-50 photo" height="50" width="50" src="<?php $imgavatar = empty($userData['photo']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . substr($userData['photo'],3);echo myGravatar($userData["email"],$imgavatar);?>" style="display: inline;"></dt>
            <dd><?php if(empty($userData["nickname"])){echo $userData["username"];}else{echo $userData["nickname"];}?>            <span class="text-muted"></span></dd><dd><?php echo $userData["email"];?>            <span class="text-muted"></span></dd>
        </dl>
        <ul>
            <li><a href="?user&posts">我的文章</a></li>
            <li><a href="?user&comments">我的评论</a></li>
            <li><a href="?user&info">修改资料</a></li>
            <li><a href="?user&password">修改密码</a></li>
        </ul>
										<?php }?>
						
									
					</ul>
	</div>



	
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array(); //网站原内容
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>

<?php if(!empty($ad_side)):?>
<div class="widget widget_ui_adsf widget_fix"></span><h3> AD</h3>	
<?php echo $ad_side;?>
</div>
<?php endif;?>

<?php if (blog_tool_ishome()):?>
<div class="widget widget_tit">
<span class="icon"><i class="fa fa-bar-chart"></i></span>
	<h3>站点统计</h3>
    <ul>
    <?php $sta_cache = Cache::getInstance()->readCache('sta');?>
    <li><a>文章总数：<?php echo $sta_cache['lognum']; ?>篇</a></li>
    <li><a>微语总数：<?php echo $sta_cache['twnum']; ?>条</a></li>
    <li><a>评论总数：<?php echo $sta_cache['comnum']; ?>条</a></li>
	<?php if($timehide==1):?>
	<li><a>运行天数:<?php echo floor((time()-strtotime($timedate))/86400); ?>天</a></li>
	<?php endif;
	  $sta_cache['linknum'] = count($CACHE->readCache('link'));
	  $sta_cache['sortnum'] = count($CACHE->readCache('sort'));
	  $sta_cache['tagsnum'] = count($CACHE->readCache('tags'));
	  $sta_cache['usernum'] = count($CACHE->readCache('user'));
	?>
	<li><a>友链个数：<?php echo $sta_cache['linknum']; ?> 个</a></li>
	<li><a>分类数目：<?php echo $sta_cache['sortnum']; ?> 个</a></li>
	<li><a>标签个数：<?php echo $sta_cache['tagsnum']; ?> 个</a></li>
	<li><a>已有用户：<?php echo $sta_cache['usernum']; ?> 位</a></li>
    </ul>
</div>
<?php endif; ?>

</div><!--end #siderbar-->
