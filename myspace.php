<?php  
	session_start();
	if(isset($_SESSION['LOGIN'])){
		$sign_in=TRUE;	
	}
	else{
		$sign_in=FALSE;
		header("Location: login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>个人主页-i宠</title>
		<meta name="description" content="" />
		<meta name="author" content="Shi" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

   	    <link rel="stylesheet" type="text/css" href="css/style-myspace.css"/>
	</head>

	<body>
		<div id="container">
			<!-- header块是顶部条块，放置登陆按钮等-->
			<div id="header">
				<!-- 修改内容：这里添加了登陆按钮的预置位-->
				<div id="logo1" class="leaderelements">OurSite</div>
				<div id="logo2" class="leaderelements">Tencent</div>
				<div id="logo3" class="leaderelements">
				<?php
					if($sign_in)
						echo "<a href='logout.php'>Sign Out</a>";
					else 
						echo "<a href='login.php'>Sign In</a>";
				?>					
				</div>
				<?php
					if(!$sign_in){
					echo "<div id='logo4' class='leaderelements'>";
					echo "<a href='Register.php'>Register</a>";
					echo "</div>";
					}
				?>
				<br/>
				<hr/>
				<br/>
			</div>

			<!-- ads块是放置动态广告宣传图，推广内容等的区域-->
			<div id="ads">
			This is ads div. ads块是放置动态广告宣传图，推广内容等的区域
			</div>

			<!-- menu块是放置选项标签的-->
			<div id="menu">
				<!-- 修改：这里放置选项按钮及搜索栏 -->
				<div id="menulogo">
					Logo here
				</div>
				<div id="menuinterface">
					<div id="divoption0" class="divoptions">
						<a href="index.php">首页</a>
					</div>
					<div id="divoption1" class="divoptions">
						<a href="adoption.php">宝贝领养</a>
					</div>
					<div id="divoption2" class="divoptions">
						<a href="news.php">新鲜事</a>
					</div>
					<div id="divoption3" class="divoptions">
						<a href="article.php">长文干货</a>
					</div>
					<div id="divoption4" class="divoptions">
						<a href="apps.php">站内应用</a>
					</div>
					<div id="divoption5" class="divoptions">
						<a href="myspace.php">个人主页</a>
					</div>
					<input class="search-input2" placeholder="Search">
				</div>

			</div>

			<!-- content块分contentLeft和contentRight,放置主要内容-->
			<div id="content">
				<!-- 这里填写新内容-->
				<div id="contentLeft">
				<!--这里放置设计图左侧个人资料，以及过滤按钮-->
					<!-- 个人资料 -->
					<div id="myInfo">
						<!-- 主人头像及姓名 -->
						<div id="ownerhead">
							主人头像
						</div>
						<div id="ownername">
							主人姓名
						</div>
					</div>
					
					<!-- 新鲜事 -->
					<div id="filter">
						<div id="newsbtn1" class="newsbtns">
							我关注的
						</div>
						<div id="newsbtn2" class="newsbtns">
							我发布的
						</div>
						<div id="newsbtn3" class="newsbtns">
							提到我的
						</div>
						<div id="newsbtn4" class="newsbtns">
							我的收藏
						</div>
						<div id="newsbtn5" class="newsbtns">
							我的私信
						</div>
					</div>
					
				</div>

				<div id="contentCenter">
				<!--这里放置设计图中间发布按钮，内容过滤标签以及内容-->
					<div id="poster">
						<!-- 发布新鲜事 -->
						
						<br/>
						<div id="newsaction1" class="newsactions">
							文字
						</div>
						<div id="newsaction2" class="newsactions">
							图片
						</div>
						<div id="newsaction3" class="newsactions">
							声音
						</div>
						<div id="newsaction4" class="newsactions">
							影像
						</div>
						<div id="newsaction5" class="newsactions">
							链接
						</div>
					</div>

					<div id="posts">
						<!-- 帖子内容及过滤按钮 -->
						
						<br/>
						<div id="postsfilter1" class="postsfilters">
							文字
						</div>
						<div id="postsfilter2" class="postsfilters">
							图片
						</div>
						<div id="postsfilter3" class="postsfilters">
							评论
						</div>
						<div id="postsfilter4" class="postsfilters">
							领养信息
						</div>
						
						<br/>
						<!-- 以下是帖子主要内容 -->
						<div id="postscontent">
							<!-- 帖子1 -->
							<div id="postscont1" class="postsconts">
								<div id="postdate1" class="postdates">
									发表于 2013.9.26 22:50PM
								</div>
								<div id="postpic1" class="postpics">
									这里放置图片1
								</div>
								<div id="postpic2" class="postpics">
									这里放置图片2
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont2" class="postsconts">
								<div id="postdate2" class="postdates">
									发表于 2013.9.20 18:23PM
								</div>
								<div id="postpic3" class="postpics">
									这里放置图片3
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="contentRight">
					<!--这里放置设计图右侧，主人绑定的宠物信息-->
					<!-- 宠物1 -->
					<div id="pethead1" class="petheads">
						宠物头像1
					</div>
					<div id="petname1" class="petnames">
						宠物名称1
					</div>
					<!-- 宠物2 -->
					<div id="pethead2" class="petheads">
						宠物头像2
					</div>
					<div id="petname2" class="petnames">
						宠物名称2
					</div>
				</div>

			</div>

			<!--footer块是放置页脚信息的-->
			<div id="footer">
				<!-- 修改内容：这里改变了页脚 -->
				<br/>
				<hr/>
				<br/>
				Copyright 2013-2014 SFYC Studio
				<br/>
				<br/>
			</div>
		</div>
	</body>
</html>
