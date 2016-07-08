<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if(!isLogin()){
		emMsg('请先登录！',BLOG_URL,true);
	}
?>
<?php 
//获取用户发表文章
function myblog(){
		$DB = MySql::getInstance();
		global $userData;
		$userid = $userData['uid'];
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$numsql = "select gid,title,hide,author,date from ".DB_PREFIX."blog where author=$userid ";
		$res = $DB->query($numsql);
		$myblognum = $DB->num_rows($res); 
		$f.='<div class="table-responsive">
   <table class="table">
      <thead>
         <tr>
            <th>审核状态</th>
            <th>标题</th>
            <th>日期</th>
         </tr>
      </thead>
      <tbody>';
		while ($myblog = $DB->fetch_array($res)) {
			$hide = $myblog['hide']=='y'?'(<span style="color:red;">待审核</span>)':'(已审核)';
			$hidetitle = $myblog['hide']=='y'?' '.$myblog['title']:' <a href="'.Url::log($myblog['gid']).'" target="_blank">'.$myblog['title'].'</a>';
			$date=date("Y-m-d H:i:s",$myblog["date"]); 
			$f.="<tr>
            <td>$hide</td>
            <td>$hidetitle</td>
            <td>$date</td>
         </tr>";
		}
		$f.='</tbody>
   </table>
</div>  ';
		if($myblognum==0){
			return '您还没有发表过文章哦!';
		}else{
			return $f;
		}
	}

//获取用户发表评论
function mycomment(){
		$DB = MySql::getInstance();
		global $userData;
		$userEmail = $userData['email'];
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$numsql = "select * from ".DB_PREFIX."comment where mail='$userEmail' ";
		$res = $DB->query($numsql);
		$myblognum = $DB->num_rows($res); 

		
		$f.='<div class="table-responsive">
   <table class="table">
      <thead>
         <tr>
            <th>帖子标题</th>
            <th>回复内容</th>
            <th>回复日期</th>
         </tr>
      </thead>
      <tbody>';
		while ($myblog = $DB->fetch_array($res)) {
			//$hide = $myblog['hide']=='y'?'(<span style="color:red;">待审核</span>)':'(已审核)';
			//根据ID获取标题
				$sql = "select gid,title from ".DB_PREFIX."blog where gid={$myblog['gid']} ";
				$re = $DB->query($sql);
				$title = $DB->fetch_array($re);
			$hidetitle = '<a href="'.Url::log($myblog['gid']).'" target="_blank">'.$title["title"].'</a>';
			
			$content=$myblog["comment"];
			$date=date("Y-m-d H:i:s",$myblog["date"]); 
			$f.="<tr>
            <td>$hidetitle</td>
            <td>$content</td>
            <td>$date</td>
         </tr>";
		}
		$f.='</tbody>
   </table>
</div>  ';
		if($myblognum==0){
			return '您还没有发表过文章哦!';
		}else{
			return $f;
		}
	}


	?>
<?php global $userData;
?>
<script charset="utf-8" src="<?php echo BLOG_URL; ?>/admin/editor/kindeditor.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script charset="utf-8" src="<?php echo BLOG_URL; ?>/admin/editor/lang/zh_CN.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script>
function includeLinkStyle(url) {
 var link = document.createElement("link");
 link.rel = "stylesheet";
 link.type = "text/css";
 link.href = url;
 document.getElementsByTagName("head")[0].appendChild(link);
}
includeLinkStyle("./content/templates/emlog_dux/style/user.css");
</script>
<div class="single single-post postid- single-format-standard nav_fixed">
<section class="container"><div class="content-wrap">
<div class="container-user">
		<div class="userside">
			<div class="usertitle"><a href="#user-avatar">
			<?php
			$imgavatar = empty($userData['photo']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . substr($userData['photo'],3);?>
			<img alt="" height="50" width="50" src="<?php echo myGravatar($userData["email"],$imgavatar);?>" style="display: inline;"></a>
				<h2><?php if(empty($userData["nickname"])){echo $userData["username"];}else{echo $userData["nickname"];}?>  </h2>
			</div>
			<div class="usermenus">	
				<ul class="usermenu">
					<li class="usermenu-post-new"><a href="?user&post-new"><i class="fa fa-plus-circle"></i> 发布文章</a></li>
					<li class="usermenu-posts "><a href="?user&posts"><i class="fa fa-file-o"></i> 我的文章</a></li>
					<li class="usermenu-comments"><a href="?user&comments"><i class="fa fa-comment-o"></i> 我的评论</a></li>
					<li class="usermenu-info"><a href="?user&info"><i class="fa fa-cog"></i> 修改资料</a></li>
					<li class="usermenu-password"><a href="?user&password"><i class="fa fa-unlock"></i> 修改密码</a></li>
					<li class="usermenu-signout"><a href="admin/?action=logout" onclick=""><i class="fa fa-sign-out"></i> 退出</a></li>
				</ul>
			</div>
		</div>
		<?php 
		if(isset($_GET['posts'])):
		?>
		<div class="content posts" id="contentframe">
		<div class="hide useridx">posts</div>
			<div class="user-main"><ul class="list">
			<?php echo myblog();?>
		</ul></div>
			<div class="user-tips"></div>
		</div>
		<?php 
		endif;
		if(isset($_GET['post-new'])):
		?>
		<div class="content post-new" id="contentframe">
		<div class="hide useridx">post-new</div>
			<div class="user-main">
	<form class="postform">
	  	<ul class="user-meta user-postnew">
			
	  		<li><label>标题</label>
				<input type="text" class="form-control" name="post_title" placeholder="文章标题">
	  		</li>
	  		<li><label>内容</label>
				<textarea name="post_content" id="post_content" class="form-control" rows="12" placeholder="文章内容"></textarea>
	  		</li>
	  		<li><label>来源链接</label>
				<input type="text" class="form-control" name="post_url" placeholder="文章来源链接">
	  		</li>
	  		<li><label>分类</label>
			<?php
				global $CACHE;
				$sort = $CACHE->readCache('sort');
				$blogsort = '<select id="sort" name="blogsort">';
				$blogsort .= '<option value="-1">选择分类...</option>';
				foreach ($sort as $value) {
					$blogsort .= '<option value="'.$value['sid'].'">'.$value['sortname'].'</option>';
				}
				$blogsort .= '</select>';
				echo $blogsort;
			?>
				
	  		</li>
	  		<li>
	  			<br>
				<input type="button" class="btn btn-primary user_post" name="submit" value="投稿">
				<input type="hidden" name="action" value="post.new">
	  		</li>
	  	</ul>
	<script>
	KindEditor.ready(function(K) {
    var options = {
        resizeMode:1,
		allowUpload:false,
		allowImageUpload:false,
		allowFlashUpload:false,
		allowPreviewEmoticons:false,
		filterMode:false,
		urlType:'domain',
		items:['bold','italic','underline','strikethrough','forecolor','hilitecolor','fontname','fontsize','lineheight','|','removeformat','plainpaste','quickformat','clearhtml','selectall','|','insertorderedlist','insertunorderedlist','indent','outdent','subscript',
        'superscript','justifyleft','justifycenter','justifyright','|','link','unlink','image','flash','table','emoticons','code','fullscreen','source','|','about'],
		afterBlur: function(){this.sync();}
};
var editor = K.create('#post_content', options);
	})
</script>
	</form>
</div>
			<div class="user-tips"></div>
		</div>
			<?php 
		endif;
		if(isset($_GET['comments'])):
		?>
		<div class="content comments" id="contentframe">
			<div class="user-main">
			<div class="hide useridx">comments</div>
			<label style="width:100%;"><?php echo mycomment();?></label>
</div>
			<div class="user-tips"></div>
		</div>
		<?php 
		endif;
		if(isset($_GET['info'])):
		?>
		<div class="content info" id="contentframe">
			<div class="hide useridx">info</div>
			<div class="user-main">
	<form>
	  	<ul class="user-meta">
	  		<li><label>用户名</label>
				<input type="input" class="form-control" disabled="" value="<?php echo $userData["username"];?>">
	  		</li>
	  		<li><label>邮箱</label>
				<input type="email" class="form-control" name="email" value="<?php echo $userData["email"];?>">
	  		</li>
	  		<li><label>昵称</label>
				<input type="input" class="form-control" name="nickname" value="<?php echo $userData["nickname"];?>">
	  		</li>
	  		<li>
				<input type="button" evt="info.submit" class="btn btn-primary user_post" name="submit" value="确认修改资料">
				<input type="hidden" name="action" value="info.edit">
	  		</li>
	  	</ul>
	</form>
</div>
			<div class="user-tips"></div>
		</div>	
		<?php 
		endif;
		if(isset($_GET['password'])):
		?>	
			
		<div class="content password" id="contentframe">
			<div class="user-main"><div class="useridx hide">password</div>
	<form>
	  	<ul class="user-meta">
	  		<li><label>新密码</label>
				<input type="password" class="form-control" name="password">
	  		</li>
	  		<li><label>重复新密码</label>
				<input type="password" class="form-control" name="password2">
	  		</li>
	  		<li>
				<input type="button" evt="password.submit" class="btn btn-primary user_post" name="submit" value="确认修改密码">
				<input type="hidden" name="action" value="password.edit">
	  		</li>
	  	</ul>
	</form>
</div>
			<div class="user-tips"></div>
		</div>
			<?php 
		endif;
		?>
			</div>

</div>
<?php
 include View::getView('footer');
?>

<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/user.js'></script>
</section>
</div>