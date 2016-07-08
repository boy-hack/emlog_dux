<?php 
/*
 * @Emlog大前端4.0
 * @authors 小草 (blog.yesfree.pw)
 * @date    2016-4-10
 * @version 4.0
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
require_once(EMLOG_ROOT.'/content/templates/emlog_dux/config.php');
//echo TEMPLATE_URL.'config.php';
require_once('setting_fun.php');
plugin_setting();
?>

<div class="single single-post postid- single-format-standard nav_fixed">
<link rel='stylesheet' id='set-css'  href='<?php echo TEMPLATE_URL; ?>option/set.css' type='text/css' media='all' />
<?php if (ROLE == ROLE_ADMIN):?>
<section class="container"><div class="content-wrap">
<div id="content" class="site-content group">	
<div id="primary" class="left-column">
<div id="setting" >
<main id="main" class="site-main" role="main">
 <form action="?setting&do=save" method="post" id="input" class="da-form">
  <div class="set_nav">
	<ul>
		<li class="active"><a href="#sethome">基本配置</a></li>
		<li><a href="#m_blog">blog模式 </a></li>
		<li><a href="#m_cms">cms模式 </a></li>
		<li><a href="#setaside">广告设置</a></li>
		<li><a href="#addiy">单页设置</a></li>
        <li><a href="#plus">附加设置</a></li>
		<li><a href="#cssdiy">自定义CSS</a></li>
        <li><a href="#read">关于模板</a></li>
		<li class="last"><input type="submit" value="保 存" class="svae" /></li>
	</ul>
</div>
<div class="set_cnt">
<div class="set_box" id="sethome" style="display:block">
<div class="da-form-row">
<td class="right_td">建站时间:</td>
<td class="left_td"><input size="10" name="timedate" type="text" value="<?php echo $timedate; ?>" id="datepicker" style="width: 250px;"/></td>
<span class="right_td"><input type="checkbox" value="1" name="timehide" <?php if($timehide == 1):?> checked<?php endif;?> /> 显示</span>
</div> 
<div class="da-form-row">
<td class="right_td">博客LOGO地址</td>
<td class="left_td"><input size="10" name="logo_url" type="text" value="<?php echo $logo_url; ?>" id="" style="width: 250px;"/></td>

</div>
<div class="da-form-row">
<td class="right_td">首页副标题：</td>
<td class="left_td"><input size="20" name="new_log_num" type="text" value="<?php echo $new_log_num; ?>" style="width: 250px;"/></td>
<td class="right_td">首页的副标题，支持<span style="font-size:10px; color:red">HTML</span>代码的</td>
</div>
<div class="da-form-row">
           <td class="right_td">网站模式：<span style="font-size:10px; color:red">两种模式选择适合你的</span></td>
           <span class="left_td">
<td class="left_td"><input name="web_method" type="radio" value="1" <?php if ($web_method == "1") echo 'checked'?> ></input></td>
<td class="right_td">CMS列表</td>
<td class="right_td"><input name="web_method" type="radio"  value="2" <?php if ($web_method == "2") echo 'checked'?>></input></td>
<td class="right_td">博客列表</td>
<td class="right_td"><input name="web_method" type="radio"  value="3" <?php if ($web_method == "3") echo 'checked'?>></input></td>
<td class="right_td">高富帅模式</td>
</span>
</div>
<div class="da-form-row">
<td class="right_td">导航栏浮动效果</td>
<span class="right_td">
<td class="left_td"><input name="navhide" type="radio" value="1" <?php if ($navhide == "1") echo 'checked'?> ></input></td>
<td class="right_td">禁用</td>
<td class="right_td"><input name="navhide" type="radio"  value="2" <?php if ($navhide == "2") echo 'checked'?>></input></td>
<td class="right_td">启用</td>
</span>
</div>
<div class="da-form-row">
<td class="right_td">网站配色</td>
<span class="left_td">
<td class="left_td"><input name="webcolor" type="radio" value="bule" <?php if ($webcolor == "blue") echo 'checked'?> ></input></td>
<td class="right_td">默认</td>
<td class="right_td"><input name="webcolor" type="radio"  value="red" <?php if ($webcolor == "red") echo 'checked'?>></input></td>
<td class="right_td">红</td>
<td class="right_td"><input name="webcolor" type="radio"  value="yellow" <?php if ($webcolor == "yellow") echo 'checked'?>></input></td>
<td class="right_td">黄</td>
<td class="right_td"><input name="webcolor" type="radio"  value="green" <?php if ($webcolor == "green") echo 'checked'?>></input></td>
<td class="right_td">绿</td>
</span>
</div>
<div class="da-form-row">
<td class="right_td">网站首页公告 (<span style="color:red; font-weight:bold">支持html代码</span>)</td><br/>
<p><textarea name="home_text" cols="125" rows="8" id="home_text" ><?php echo $home_text; ?></textarea></p>
</div>
<div class="da-form-row">
<td class="right_td">网站首页顶部代码 (<span style="color:red; font-weight:bold">支持html代码</span>)</td><br/>
<p><textarea name="home_toptext" cols="125" rows="8" id="home_toptext" ><?php echo $home_toptext; ?></textarea></p>
</div>
</div>
<div class="set_box" id="m_blog">
 </br>
<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         置顶设置
      </h3>
   </div>
   <div class="panel-body">
   
<div class="da-form-row">
<td class="right_td">置顶栏目：</td>
<span class="left_td">
<td class="left_td"><input name="radio_zhiding" type="radio" value="1" <?php if ($radio_zhiding == "1") echo 'checked'?> ></input></td>
<td class="right_td">禁用</td>
<td class="right_td"><input name="radio_zhiding" type="radio"  value="2" <?php if ($radio_zhiding == "2") echo 'checked'?>></input></td>
<td class="right_td">启用</td>
</span>
</div>
<div class="da-form-row">
<td class="right_td">高亮关键字</td>
<span style="padding-left:43px;"><input type="text" name="heightkey" size="10" value="<?php echo $heightkey; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">置顶标题</td>
<span style="padding-left:43px;"><input type="text" name="top_title" size="10" value="<?php echo $top_title; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">置顶标题地址</td>
<span style="padding-left:43px;"><input type="text" name="top_titleurl" size="10" value="<?php echo $top_titleurl; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">置顶内容(<span style="color:red; font-weight:bold">支持html代码</span>)</td></br>
<textarea name="top_content" cols="125" rows="8"><?php echo $top_content;?></textarea></span>
</div>
   </div>
</div>
</br>
<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         幻灯片设置
      </h3>
   </div>
   <div class="panel-body">
   
<div class="da-form-row">
<td class="right_td">是否开启：</td>
<span class="left_td">
<td class="left_td"><input name="ppt_zhiding" type="radio" value="1" <?php if ($ppt_zhiding == "1") echo 'checked'?> ></input></td>
<td class="right_td">禁用</td>
<td class="right_td"><input name="ppt_zhiding" type="radio"  value="2" <?php if ($ppt_zhiding == "2") echo 'checked'?>></input></td>
<td class="right_td">启用</td>
</span>
</div>
<div class="da-form-row">
<td class="right_td">图片地址1</td>
<span style="padding-left:43px;"><input type="text" name="ppt_picurl" size="10" value="<?php echo $ppt_picurl; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">url地址1</td>
<span style="padding-left:43px;"><input type="text" name="ppt_titleurl" size="10" value="<?php echo $ppt_titleurl; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">图片地址2</td>
<span style="padding-left:43px;"><input type="text" name="ppt_picur2" size="10" value="<?php echo $ppt_picur2; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">url地址2</td>
<span style="padding-left:43px;"><input type="text" name="ppt_titleur2" size="10" value="<?php echo $ppt_titleur2; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">图片地址2</td>
<span style="padding-left:43px;"><input type="text" name="ppt_picur3" size="10" value="<?php echo $ppt_picur3; ?>" style="width: 250px;"/></span>
</div>
<div class="da-form-row">
<td class="right_td">url地址2</td>
<span style="padding-left:43px;"><input type="text" name="ppt_titleur3" size="10" value="<?php echo $ppt_titleur3; ?>" style="width: 250px;"/></span>
</div>
   </div>
</div>

</div>
<div class="set_box" id="m_cms">
<div class="da-form-row">
<td class="right_td">首页展示图</td>
<td class="left_td"><input name="m_cms_pci" type="radio" value="1" <?php if ($m_cms_pci == "1") echo 'checked'?> ></input></td>
<td class="right_td">自定义</td>
<td class="left_td"><input name="m_cms_pci" type="radio"  value="2" <?php if ($m_cms_pci == "2") echo 'checked'?>></input></td>
<td class="right_td">默认（随机文章）</td>
</div>
<div class="da-form-row">
<td class="right_td">文章ID（英文逗号隔开 5个）</td>
<span style="padding-left:43px;"><input type="text" name="m_cms_page" size="10" value="<?php echo $m_cms_page; ?>" style="width: 250px;"/></span>
</div>
</div>
<div class="set_box" id="setaside">
<div class="da-form-row">
<td class="right_td">广告代码（侧边栏）</td>
<p><textarea name="ad_side" cols="125" rows="8" id="home_text" ><?php echo $ad_side; ?></textarea></p>
</div>
<div class="da-form-row">
<td class="right_td">广告代码（文章页上方）</td>
<p><textarea name="ad_page" cols="125" rows="8" id="home_text" ><?php echo $ad_page; ?></textarea></p>
</div>
<div class="da-form-row">
<td class="right_td">广告代码（文章页下方）</td>
<p><textarea name="ad_page_down" cols="125" rows="8" id="home_text" ><?php echo $ad_page_down; ?></textarea></p>
</div>
</div>
   
<div class="set_box" id="addiy">
</br>
<div class="panel panel-default">
   <div class="panel-heading">
      单页链接设置
   </div>
   <div class="panel-body">
<?php
//global $side_title;
$side_title = unserialize($side_title);
//global $side_url;
$side_url = unserialize($side_url);
for($i=1;$i<=20;$i++){
?>
<div class="da-form-row">
<td class="right_td">单页标题<?php echo $i;?>: &nbsp;</td>
<td class="left_td"><input  style="width:550px;" class="input"  value="<?php echo $side_title[$i]; ?>" name="side_title[<?php echo $i;?>]" style="width: 250px;"></td><br />
<td class="right_td">标题<?php echo $i;?>地址: &nbsp;</td>
<td class="left_td"><input  style="width:550px;" class="input"  value="<?php echo $side_url[$i]; ?>" name="side_url[<?php echo $i;?>]" style="width: 250px;"></td><br />
</div>

<?php }?>
  </div>
</div>

<div class="panel panel-default">
   <div class="panel-heading">
      读者墙设置
   </div>
   <div class="panel-body">
   <div class="da-form-row">
<td class="right_td">显示头像数:</td>
<td class="left_td"><input class="input"  value="<?php echo $imgnum_all; ?>" name="imgnum_all"></td><br />
<td class="right_td">如果统计区间内数据为空，则显示如下： &nbsp;</td>
<td class="left_td"><input class="input"  value="<?php echo $tip; ?>" name="tip" style="width: 250px;"></td><br />
<td class="right_td">统计区间： &nbsp;</td>
<td class="left_td"><input name="type_wall" type="radio" value="week" <?php if ($type_wall == "week") echo 'checked'?> ></input></td>
<td class="right_td">一周</td>
<td class="left_td"><input name="type_wall" type="radio" value="month" <?php if ($type_wall == "month") echo 'checked'?> ></input></td>
<td class="right_td">一月</td>
<td class="left_td"><input name="type_wall" type="radio" value="all" <?php if ($type_wall == "all") echo 'checked'?> ></input></td>
<td class="right_td">全部</td>
</div>
   </div>
</div>
</div>
<div class="set_box" id="plus">
<div class="da-form-row">
<td class="right_td">导航图标设置(<span style="color:red; font-weight:bold">注意更改导航后需重新设置</span>)</td></br>
<td class="right_td">设置教程(<span style="color:red; font-weight:bold"><a href="http://blog.yesfree.pw/emlog/19.html" target="_black" title="Emlog大前端图标设置教程">设置教程</a></span>)</td></br>
<?php
global $CACHE; 
global $arr_navico1; 
$navi_cache = $CACHE->readCache('navi');
foreach($navi_cache as $num=>$value):

        if ($value['pid'] != 0) {
            continue;
        }
		$id=$value["id"];
		
		echo '<td class="right_td">'.$value['naviname'].' &nbsp; =></td>
<td class="left_td"><input class="input"  value="'.$arr_navico1[$id].'" name="arr_navico['.$id.']"></td></br>';
endforeach;
?>
</div>
<div class="da-form-row">
<td class="right_td">分类图标设置(<span style="color:red; font-weight:bold">注意更改分类后需重新设置</span>)</td></br>
<td class="right_td">设置教程(<span style="color:red; font-weight:bold">与导航图标一样</span>)</td></br>
<?php
global $CACHE;
$sort_cache = $CACHE->readCache('sort'); 
global $arr_navico1; 
foreach($sort_cache as $num=>$value):
		$sid=$value["sid"];
		
		echo '<td class="right_td">'.$value['sortname'].' &nbsp; =></td>
<td class="left_td"><input class="input"  value="'.$arr_sortico1[$sid].'" name="arr_sortico['.$sid.']"></td></br>';
endforeach;
?>
</div>
</div>
<div class="set_box" id="cssdiy">
<div class="da-form-row">
<td class="right_td"><small>请输入形如<code>#nav ul.nav-pills{width: 150px;}</code>的自定义css样式</small></td>
<textarea name="css" rows="5" ><?php echo $css; ?></textarea>
</div>
</div>
<div class="set_box" id="read">

<div class="da-form-row">
<p>本主题请在<a href="http://www.emlog.net/templates">Emlog官网</a>或博客<a href="http://blog.yesfree.pw/">我的博客</a>上下载，请不要在以外的网站下载。</p>
<p>本主题完全免费开源，不过请各位博主保留版权，支持一下~</p>
<p>对本主题有任何意见或建议，请到 <a href="http://blog.yesfree.pw/">我的博客</a> 留言，或者直接 QQ 联系开发者。</p>
<p>开发者承诺本主题不含任何挂马、广告等恶意代码，使用本主题所造成的任何问题，请及时与开发者联系。</p>
<p>如果您心情好，可以捐赠一下支持我们做出更好的主题 ，支付宝：34109680@qq.com</p>
<p>
开发者：小草</p>
<p>email：34109680@qq.com</p>
<p>博客：http://blog.yesfree.pw/</p>
</div>
</div>  
</div>
</form>
</main>
</div>
</div>
<script>
$(function(){
	$(".set_nav li").not(".set_nav .last").click(function(e) {
		e.preventDefault();
		$(this).addClass("active").siblings().removeClass("active");
		$($(this).children("a").attr("href")).show().siblings().hide();
	});
	
  })
</script>	
<div id="secondary" class="right-column">
	<div class="secondary-toggle"><i class="icon-angle-left"></i></div>
	<div class="sidebar1" role="complementary">
		<aside id="everbox_popular-2" class="widget widget_stream-list">	
        	<div class="widget-content">
			<div class="note" style="z-index: 1000;">
					<div class="note-container">
						
					<p>Emlog大前端当前版本<a>4.2</a></p>
					<div id="emlog_update"><script src="http://blog.yesfree.pw/em_up/update.js"></script></div>
					
			</div>
					<div class="note-bottom"></div>
				</div>
</div>
		</div>
	<div class="sidebar0" role="complementary">
		<aside id="everbox_popular-2" class="widget widget_stream-list">	
        	<div class="widget-content">
			<div class="note" style="z-index: 1000;">
					<div class="note-container">
						人生如同一面镜子，假如你对它微笑，它也回报你微笑，我的人生信条还是不断的改变现状，求真务实，明天更美好，人生重要的问题，不在于人拥有什么，而在于怎样使用它，人与人关系上最宝贵的是真诚，善于理解便是快乐人生。					</div>
					<div class="note-bottom"></div>
				</div>
</div>
		</div>
		
		
</aside>

<?php else:?>
<?php 
header("Location:".BLOG_URL.""); 
exit;
?> 
<?php endif; ?>

</div>
</div>

</div>
<?php
 include View::getView('footer');
?>
</div>
</section>