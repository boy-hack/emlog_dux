<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

</section>



<footer class="footer">
<div class="container">
	<!--
		希望各位站长保留版权 您的支持就是我们最大的动力
		小草窝 Blog:http://blog.yesfree.pw/
		请不要更改底部任何数据，否则造成后果自负
	-->
	<p>Powered by <a href="http://www.emlog.net" title="骄傲的采用emlog系统">emlog</a> 
	©  Emlog大前端 theme By <span id="copyright"><a href="http://blog.yesfree.pw/" title="草窝Blog">草窝</a></span>
	</p>
	<p><a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a><?php echo $footer_info; ?></p>
	<?php doAction('index_footer'); ?>
</div>
</footer>
</body>
<script>
window.jsui={
    www: '<?php echo BLOG_URL; ?>',
    uri: '<?php echo TEMPLATE_URL; ?>',
    ver: '4.0.0',
	logocode: '<?php echo Option::get('login_code');?>',
	is_fix:'<?php echo $navhide;?>'
};
</script>

<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/loader.js?ver=4.0.0'></script>
</html>