<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 

?>

<div class="sidebar">
<div class="widget widget_ui_textads widget_twitter"><a class="style0<?php echo rand(1,5);?>"><strong>温馨提示</strong>
	<?php //foreach($newtws_cache as $value): ?>
	<br><br><font size="2" color="#999">	
	<script language="JavaScript">
day = new Date( )
nge_Hour = day.getHours( )
var nge_warmprompt = "";
if (nge_Hour == 0)
nge_warmprompt = "现在已经过凌晨了，身体是无价的资本喔，早点休息吧！"
if (nge_Hour == 1)
nge_warmprompt = "凌晨1点多了，工作是永远都做不完的，别熬坏身子！"
if (nge_Hour == 2)
nge_warmprompt = "该休息了，身体可是革命的本钱啊！"
if (nge_Hour == 3)
nge_warmprompt = "夜深了，熬夜很容易导致身体内分泌失调，长痘痘的！"
if (nge_Hour == 4)
nge_warmprompt = "四点过了，你明天不上班？？？"
if (nge_Hour == 5)
nge_warmprompt = "你知道吗，此时是国内网络速度最快的时候！"
if (nge_Hour == 6)
nge_warmprompt = "清晨好，这麽早就上论坛啦，昨晚做的梦好吗？ "
if (nge_Hour == 7)
nge_warmprompt = "新的一天又开始了，祝你过得快乐!"
if (nge_Hour == 8)
nge_warmprompt = "早上好，一天之际在于晨，又是美好的一天！"
if ((nge_Hour == 9) || (nge_Hour ==10))
nge_warmprompt = "上午好！今天你看上去好精神哦！"
if (( nge_Hour == 11) || (nge_Hour == 12))
nge_warmprompt = "该吃午饭啦！有什么好吃的？您有中午休息的好习惯吗？"
if (( nge_Hour >= 13) && (nge_Hour <= 17))
nge_warmprompt = "下午好！外面的天气好吗？记得朵朵白云曾捎来朋友殷殷的祝福。"
if (( nge_Hour >= 17) && (nge_Hour <= 18))
nge_warmprompt = "太阳落山了！快看看夕阳吧！如果外面下雨，就不必了 ^_^"
if (( nge_Hour >= 18) && (nge_Hour <= 19))
nge_warmprompt = "晚上好，今天的心情怎么样，去吐槽版块诉说一下吧！"
if (( nge_Hour >= 19) && (nge_Hour <= 21))
nge_warmprompt = "忙碌了一天，累了吧？发篇文章醒醒脑吧！"
if (( nge_Hour >= 22) && (nge_Hour <= 23))
nge_warmprompt = "这么晚了，还在上网？早点洗洗睡吧，睡前记得洗洗脸喔！"
document.write("<div><i class='fa fa-beer'></i> ")
document.write(nge_warmprompt)
document.write("</div>")
</script>
	</font><br>
	</a>
</div>
<?php 
$widgets = !empty($options_cache['widgets2']) ? unserialize($options_cache['widgets2']) : array();//文章页调用代码


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
</div><!--end #siderbar-->
