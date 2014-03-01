<?php
	require_once("get_news.php");
	session_start();
	$get_news = new get_news();
	$result = $get_news->retrieve_news();
	if(isset($_SESSION['LOGIN'])){
		$sign_in=TRUE;
	}
	else{
		$sign_in=FALSE;
	}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>新鲜事-i宠</title>
		<meta name="description" content="" />
		<meta name="author" content="Shi" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

   	    <link rel="stylesheet" type="text/css" href="css/style-news.css">
   	    <script type="text/javascript" src="js/jquery-2.0.3.1.min.js"></script>
		<script type="text/javascript" src="js/news.js"></script>
		<script type="text/javascript" src="js/ffinner.js"></script>
	</head>

	<body>
		<div id="container">
			<!-- 标题图 -->
			<div id="titleboard">
				<img src="images/TitleBoard9.png" id="board_inner">

				</img>
				<img src="images/TitleBoard8.png" id="board_outer">

				</img>
			</div>

			<!-- header块是顶部条块，放置登陆按钮等-->
			<div id="header">
				<div id="t_blank">

				</div>
				<!-- 修改内容：这里添加了登陆按钮的预置位-->
				<div id="logo1" class="leaderelements">
					<!-- img src="images/BlackStar.png"></img -->
				</div>
				<!-- div id="logo2" class="leaderelements">Tencent</div -->
				<div id="logo3" class="leaderelements">
				<?php
					if($sign_in)
						echo "<a href='logout.php'>退出</a>";
					else
						echo "<a href='login.php'>登录</a> | <a href='Register.php'>注册</a>";
				?>
				</div>
			</div>

			<!-- ads块是放置动态广告宣传图，推广内容等的区域-->
			<!--
			<div id="ads">
			This is ads div. ads块是放置动态广告宣传图，推广内容等的区域
			</div>
			-->

			<!-- menu块是放置选项标签的-->
			<div id="menu">
				<!-- 修改：这里放置选项按钮及搜索栏 -->
				<div id="menulogo">
					<img id="menulogoimg" src="images/iPet.png"></img>
				</div>
				<div id="menuinterface">
					<div id="divoption0" class="divoptions">
						<a href="news.php">
							<img id="divoption0img" class="divoptionsimg" src="images/TLogo1A.png"></img>
							<div class="divoptions-text" id="divoptions-text1">主页</div>
						</a>
					</div>
					<div id="divoption1" class="divoptions">
						<a href="news.php">
							<img id="divoption1img" class="divoptionsimg" src="images/TLogo2A.png"></img>
							<div class="divoptions-text" id="divoptions-text2">领养</div>
						</a>
					</div>
					<div id="divoption2" class="divoptions">
						<a href="news.php">
							<img id="divoption2img" class="divoptionsimg" src="images/TLogo3B.png"></img>
							<div class="divoptions-text" id="divoptions-text3">图片</div>
						</a>
					</div>
					<div id="divoption3" class="divoptions">
						<a href="news.php">
							<img id="divoption3img" class="divoptionsimg" src="images/TLogo4A.png"></img>
							<div class="divoptions-text" id="divoptions-text4">文章</div>
						</a>
					</div>
					<div id="divoption4" class="divoptions">
						<a href="news.php">
							<img id="divoption4img" class="divoptionsimg" src="images/TLogo5A.png"></img>
							<div class="divoptions-text" id="divoptions-text5">应用</div>
						</a>
					</div>
					<div id="divoption5" class="divoptions">
						<a href="myspace.php">
							<img id="divoption5img" class="divoptionsimg" src="images/TLogo6A.png"></img>
							<div class="divoptions-text" id="divoptions-text6">个人主页</div>
						</a>
					</div>
					<input class="search-input2" placeholder="Search...">
					<img src="images/paw.png" id="searchpaw">

					</img>
				</div>

			</div>

			<!-- content块分contentLeft和contentRight,放置主要内容-->
			<div id="content">
				
				<!-- contentRight块现在放一些图片-->
				<div id="contentRight">
					<?php
						$c = 0;
						$seqindex = 0;
						$d = count($result);
						$e = 0;
						echo "<script type='text/javascript'>init_picloadcomplete($d);</script>";
						echo "<script type='text/javascript'>reset_all_pics();</script>";
						echo "<script type='text/javascript'>reset_loaded_pics();</script>";
						echo "<script type='text/javascript'>reset_everyphotoarray();</script>";
						foreach($result as &$topic){
							$content = $topic[0];
							$username = $topic[1];
							$user_photo = $topic[2];
							echo "<div class='picsitem' id='picsitemnb$c' style='display:none'>";
								echo "<div id='picsitemmiddle$c' class='picsitemmiddle'>";
									$photo_ratio_array = $topic[3];
									$photo_array = $topic[4];
									$photo_counter = 0;
									$f = 0;
									echo "<script type='text/javascript'>init_photoratios($seqindex);</script>";
									foreach($photo_array as &$photo){
										$ratio = -1;
										if($photo_ratio_array[$photo_counter][0]!=0){
											$ratio = $photo_ratio_array[$photo_counter][0]/$photo_ratio_array[$photo_counter][1];
										}
										//echo "<script>alert('Got the ratio$ratio');</script>";
										echo "<div class='photoratiofrm'>";
											echo "<input type='text' class='photoratios' id='photoratio$c-$f' style='display:none'></input>";
											echo "<script>document.getElementById('photoratio$c-$f').value='$ratio';</script>";
										echo "</div>";
										//设定该张图片的归属
										echo "<div id='upicsframe$c-$f' class='upicsframes'>";
											echo "<img src=$photo class='upicsinner' id='picsnb$c-$f' onload='onloadtest(this, $seqindex, $f);' onerror='picloaderror(this, $seqindex, $f);' style='display:none'>";
											echo "</img>";
											echo "<img src='images/pref.png' id='picsnb$c-$f-bk' class='upicsinner_bk' style='display:none'>";
											echo "</img>";
										echo "</div>";
										echo "<script type='text/javascript'>set_photoratios($seqindex, $f, $ratio);</script>";
										$f++;
										$photo_counter++;
										echo "<script type='text/javascript'>add_all_pics();</script>";
										//break;
									}
									echo "<div id='upicsmask$c' class='upicsmasks'>";
										echo "<img src='images/topcircle.png'></img>";
									echo "</div>";
									echo "<script type='text/javascript'>expanded[$c] = false;</script>";
									//扩展按钮
									//echo "<div id='expandbtn$c' class='expandbtn' onmouseover='expand_mousein(this);' onmouseout='expand_mouseout(this);'>";
									echo "<div id='expandbtn$c' class='expandbtn' onclick='expand_click($c);'>";
									echo "展开";
									echo "</div>";
									//echo "<script type='text/javascript'>alert($c);</script>";
									$e = count($photo_array);
									echo "<script type='text/javascript'>init_everyphotoarray($seqindex);</script>";
									$seqindex++;
								echo "</div>";
								echo "<div id='picsitemlower$c' class='picsitemlower'>";
									//分割线
									echo "<div id='breakline$c' class='breakline'></div>";
									//图片文字
									echo "<div class='usersname'>$username";
									echo "：</div>";
									echo "<div class='commentcontainer' id='commentcontainer$c'>";
										echo "<div class='commenttopic' id='commenttopic$c'>".$content."</div>";
									echo "</div>";
									//分割线2
									echo "<div id='breaklinelower$c' class='breaklinelower'></div>";
									//用户资料
									echo "<div id='usersprofile$c' class='usersprofiles'>";
										echo "<div id='usershead$c' class='usershead'>";
											echo "<image src=".$user_photo." class='usershead'></image>";
										echo "</div>";
									echo "</div>";
									echo "<div class='usersprofilesupper'>";
										echo "<div class='usershead'>";
											echo "<image src=".$user_photo." class='usersheadring'></image>";
										echo "</div>";
										echo "<div id='usersnamelower$c' class='usersnamelower'>";
											echo "$username";
										echo "</div>";
									echo "</div>";
									//更多，回复，转发，赞
									echo "<div id='bottomfunc$c' class='bottomfunc'>";
										//echo "<div class='readmore'>READ MORE</div>";
										//echo "<img src='images/ReadmoreArrow.png' class='readmorearrow'></img>";
										//回复
										echo "<img src='images/CommentRTPic1.png' class='feedbackpic'></img>";
										echo "<div class='feedback'>99</div>";
										//转发
										echo "<img src='images/CommentRTPic2.png' class='forwardpic'></img>";
										echo "<div class='forwardnum'>99</div>";
										//赞
										echo "<img src='images/CommentRTPic3.png' class='praisepic'></img>";
										echo "<div class='praise'>99</div>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
							//开始排版
							echo "<script type='text/javascript'>columnindex();</script>";
							$c++;
						}
						echo "<script type='text/javascript'>pictloadend();</script>";
						//echo "<script type='text/javascript'>alert('应该读取 ' + String(overallpics) + ' 张图片');</script>";
					?>
				</div>
				<!-- 读取完毕开始整理 -->
				<script type='text/javascript'>arrangeStyle_again(5, 176, 18, "news");</script>
			</div>

			<!--footer块是放置页脚信息的-->
			<div id="footer">
				<img src="images/aboutus.png" id="footerimage"></img>
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
