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
					<img src="images/iPet.png"></img>
				</div>
				<div id="menuinterface">
					<div id="divoption0" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo1A.png"></img>
							<div class="divoptions-text" id="divoptions-text1">主页</div>
						</a>
					</div>
					<div id="divoption1" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo2A.png"></img>
							<div class="divoptions-text" id="divoptions-text2">领养</div>
						</a>
					</div>
					<div id="divoption2" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo3B.png"></img>
							<div class="divoptions-text" id="divoptions-text3">图片</div>
						</a>
					</div>
					<div id="divoption3" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo4A.png"></img>
							<div class="divoptions-text" id="divoptions-text4">文章</div>
						</a>
					</div>
					<div id="divoption4" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo5A.png"></img>
							<div class="divoptions-text" id="divoptions-text5">应用</div>
						</a>
					</div>
					<div id="divoption5" class="divoptions">
						<a href="myspace.php">
							<img src="images/TLogo6A.png"></img>
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
				<!--
				<div id="contentLeft">
					<div id="cat" class="browserlv1">
						<div id="cats" class="browsertop">
							Cats
							<hr/>
						</div>
						<div id="cat1" class="browserlv2">
							Cat1
							<hr/>
						</div>
						<div id="cat2" class="browserlv2">
							Cat2
							<hr/>
						</div>
						<div id="cat3" class="browserlv2">
							Cat3
							<hr/>
						</div>
					</div>
					<div id="dog" class="browserlv1">
						<div id="dogs" class="browsertop">
							Dogs
							<hr/>
						</div>
						<div id="dog1" class="browserlv2">
							Dog1
							<hr/>
						</div>
						<div id="dog2" class="browserlv2">
							Dog2
							<hr/>
						</div>
						<div id="dog3" class="browserlv2">
							Dog3
							<hr/>
						</div>
					</div>
					<div id="fish" class="browserlv1">
						<div id="fishes" class="browsertop">
							Fishes
							<hr/>
						</div>
						<div id="fish1" class="browserlv2">
							Fish1
							<hr/>
						</div>
						<div id="fish2" class="browserlv2">
							Fish2
							<hr/>
						</div>
						<div id="fish3" class="browserlv2">
							Fish3
							<hr/>
						</div>
					</div>
					<br/>
					<hr/>
					<br/>
					<div id="custom" class="browserlv1">
						<div id="customs" class="browsertop">
							Custom
							<hr/>
						</div>
						<div id="custom1" class="browserlv2">
							Custom1
							<hr/>
						</div>
						<div id="custom2" class="browserlv2">
							Custom2
							<hr/>
						</div>
						<div id="custom3" class="browserlv2">
							Custom3
							<hr/>
						</div>
					</div>
				</div>
				-->
				
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
								echo "<div class='picsitemmiddle'>";
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
										echo "<div class='photoratiofrm'>";
											echo "<input type='text' class='photoratios' id='photoratio$c-$f' style='display:none'></input>";
											echo "<script>document.getElementById('photoratio$c-$f').value='$ratio';</script>";
										echo "</div>";
										//设定该张图片的归属
										echo "<div id='upicsframe$c-$f' class='upicsframes'>";
											echo "<img src=$photo class='upicsinner' id='picsnb$c-$f' onload='onloadtest(this, $seqindex, $f);' onerror='picloaderror(this, $seqindex, $f);' style='display:none'>";
												//echo "<script type='text/javascript'>";
													//echo "alert(typeof(this) + ' $seqindex ' + ' detected');";
													//echo "var neoImg;";
													//echo "neoImg = document.getElementById('picsnb$c-$f');";
													//echo "neoImg = this;";
													//echo "alert(document.getElementById('picsnb$c-$f').src);";
													//echo "setpiconload(this);";
												//echo "</script>";
											echo "</img>";
											echo "<img src='images/pref.png' id='picsnb$c-$f-bk' class='upicsinner_bk' style='display:none'>";
											echo "</img>";
										echo "</div>";
										echo "<script type='text/javascript'>set_photoratios($seqindex, $f, $ratio);</script>";
										$f++;
										echo "<script type='text/javascript'>add_all_pics();</script>";
										break;
									}
									$e = count($photo_array);
									echo "<script type='text/javascript'>init_everyphotoarray($seqindex);</script>";
									$seqindex++;
								echo "</div>";
								echo "<div class='picsitemlower'>";
									//分割线
									echo "<div class='breakline'></div>";
									//图片文字
									echo "<div class='usersname'>$username";
									echo "：</div>";
									echo "<div class='commentcontainer' id='commentcontainer$c'>";
										echo "<div class='commenttopic' id='commenttopic$c'>".$content."</div>";
									echo "</div>";
									//用户资料
									echo "<div class='usersprofiles'>";
										echo "<div class='usershead'>";
											echo "<image src=".$user_photo." class='usershead'></image>";
										echo "</div>";
									echo "</div>";
									echo "<div class='usersprofilesupper'>";
										echo "<div class='usershead'>";
											echo "<image src=".$user_photo." class='usersheadring'></image>";
										echo "</div>";
									echo "</div>";
									//更多，回复，转发，赞
									echo "<div class='bottomfunc'>";
										echo "<div class='readmore'>READ MORE</div>";
										echo "<img src='images/ReadmoreArrow.png' class='readmorearrow'></img>";
										//回复
										echo "<img src='images/CommentRTPic1.png' class='feedbackpic'></img>";
										echo "<div class='feedback'>256</div>";
										//转发
										echo "<img src='images/CommentRTPic2.png' class='forwardpic'></img>";
										echo "<div class='forwardnum'>128</div>";
										//赞
										echo "<img src='images/CommentRTPic3.png' class='praisepic'></img>";
										echo "<div class='praise'>128</div>";
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
				<script type='text/javascript'>arrangeStyle_again(4, 224, 16, "news");</script>
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
