<?php
		require_once '../../../../init.php';
		$action=$_POST["action"];
		$msg=array();
		
		if($action=="signup"){
		$nickname = isset($_POST['name']) ? addslashes(trim($_POST['name'])) : '';
		$username = $nickname;
		$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
		$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
		$userM = new User_Model();
		
		if($userM->isUserExist($username)){$u = '<span style="color:red">用户名已经存在</span>';$msg["error"]=$u;}
		if($u==''){
			$PHPASS = new PasswordHash(8, true);
			$password = $PHPASS->HashPassword($password);
			$DB = MySql::getInstance();
			$sql="insert into ".DB_PREFIX."user (username,password,role,ischeck,nickname,email) values('$username','$password','writer','y','$nickname','$email')";
			if($DB->query($sql)){
				global $CACHE;
				$CACHE->updateCache(array('sta','user'));
				$msg["msg"]="注册成功，请登录";
				//$msg["goto"]=BLOG_URL;
				
				
				//emMsg('添加成功!现在跳转至登录页面...',BLOG_URL.'',true);
			}else{
				$msg["error"]="注册失败。";
				//$msg["goto"]=BLOG_URL;
			}
			
		}
		
		}elseif($action=="signin"){
		$username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
		$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
		$code = isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : "";

		
		if (LoginAuth::checkUser($username, $password,$code)===true) {
			LoginAuth::setAuthCookie($username);
			//emDirect("./");
			//emMsg('登录成功!',BLOG_URL.'',true);
				$msg["msg"]="登录成功";
				$msg["goto"]=BLOG_URL;
		}else{
			$msg["error"]="登录失败，请检查用户名密码是否正确";
		}
		//echo json_decode($msg);
		}elseif($action=="post.new"){
		$blogcontent = isset($_POST['post_content']) ? addslashes(trim($_POST['post_content'])) : '';
		$resoure = isset($_POST['post_url']) ? addslashes(trim($_POST['post_url'])) : '';
		$blogtitle = isset($_POST['post_title']) ? addslashes(trim($_POST['post_title'])) : '';
		$blogsort = isset($_POST['blogsort']) ? addslashes(trim($_POST['blogsort'])) : '';
		$blogcontent.="</br> 来源链接:".$resoure;
		
		$bc = strip_tags($blogcontent);
		$t = empty($blogtitle)?'<span style="color:red">标题不能为空</span>':'';
		$c = empty($bc)?'<span style="color:red;margin-left:10px;">内容不能为空</span><br/>':'';
		if($t=='' AND $c==''){
			global $userData;
			$DB = MySql::getInstance();
			$time = time();
			$uid = $userData['uid'];
			$sql = "insert into ".DB_PREFIX."blog (title,date,content,author,sortid,hide) values('$blogtitle','$time','$blogcontent','$uid','$blogsort','y')";
			if($DB->query($sql)){
				global $CACHE;
				$CACHE->updateCache(array('sta'));
				$msg["msg"]="投稿成功，请等待管理员审核";
				$msg["goto"]=BLOG_URL."?user&posts";
				//emMsg('提交成功,请等待管理员审核!',BLOG_URL.'?user#posts',true);
			}else{
				$msg["error"]="投稿失败，请检查相关设置";
			}
			
		}
		//echo json_decode($msg);
	}elseif($action=="info.edit"){
		$nickname = isset($_POST['nickname']) ? addslashes(trim($_POST['nickname'])) : '';
		$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
		$description = isset($_POST['description']) ? addslashes(trim($_POST['description'])) : '';
		$n = empty($nickname)?'<span style="color:red">昵称不能为空</span>':'';
		$y = empty($email)?'<span style="color:red">邮箱不能为空</span>':'';
		if(!empty($email)){$y = !checkMail($email)?'<span style="color:red"> 邮箱格式不正确</span>':'';}

		if($n=='' AND $y==''){
			$DB = MySql::getInstance();
			$uid = $userData['uid'];
			
				$sql = "update ".DB_PREFIX."user set nickname='$nickname',email='$email',description='$description' where uid=$uid";
				if($DB->query($sql)){
					global $CACHE;
					$CACHE->updateCache(array('sta','user'));
					$msg["msg"]="信息修改成功";
					$msg["goto"]=BLOG_URL."?user&info";
					//emMsg('修改成功!',BLOG_URL.'?plugin=user&action=index',true);
				}else{
					$msg["msg"]="信息修改失败";
				}
				//echo json_decode($msg);
			
		}
	}elseif($action=="password.edit"){
		$password0 = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
		$password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';

		if(!empty($password0)){$p6 = strlen($password0) < 6?'<span style="color:red"> 密码不能小于6个字符</span>':'';}
		if(!empty($password2)){$p2 = $password0!=$password2?'<span style="color:red"> 两次密码输入不一样</span>':'';}

		if( $p2=='' AND $p6==''){
			$DB = MySql::getInstance();
			$uid = $userData['uid'];
				$PHPASS = new PasswordHash(8, true);
				$pw = $PHPASS->HashPassword($password0);
				$sql = "update ".DB_PREFIX."user set password='$pw' where uid=$uid";
				if($DB->query($sql)){
					global $CACHE;
					$CACHE->updateCache(array('sta','user'));
					setcookie(AUTH_COOKIE_NAME, ' ', time() - 31536000, '/');
					//emMsg('修改成功!现在跳转至登录页面重新登录...',BLOG_URL.'?plugin=user&action=login',true);
					$msg["msg"]="密码修改成功";
					$msg["goto"]=BLOG_URL."?user&password";
				}else{
					$msg["error"]="密码修改失败";
				}
				//echo json_decode($msg);
			
		}
	}
	
	
	
	
	
	echo json_encode($msg);

	
