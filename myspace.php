<?php
	if (session_id() == '') { 
	session_start();
	}
	require_once('check_login.php'); 
	if(isset($_SESSION['LOGIN'])){
		$sign_in=TRUE;
		$login = new LOGIN();
		$photo_url = $login->fetch_photo($_SESSION['username']);
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

   	    <script type="text/javascript" src="js/jquery-2.0.3.1.min.js"></script>
		<script type="text/javascript" src="js/myspace.js"></script>
	</head>

	<body>
		<div id="container">
			<!-- 标题图 -->
			<div id="titleboard">
				<img src="images/TitleBoard8.png">

				</img>
			</div>

			<!-- header块是顶部条块，放置登陆按钮等-->
			<div id="header">
				<div id="t_blank">

				</div>
				<!-- 修改内容：这里添加了登陆按钮的预置位-->
				<div id="logo1" class="leaderelements">
					<img src="images/BlackStar.png"></img>
				</div>
				<!-- div id="logo2" class="leaderelements">Tencent</div -->
				<div id="logo3" class="leaderelements">
				<?php
					if($sign_in)
						echo "<a href='logout.php'>退出登录</a>";
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
						<a href="index.php">
							<img src="images/TLogo1A.png"></img>
						</a>
					</div>
					<div id="divoption1" class="divoptions">
						<a href="adoption.php">
							<img src="images/TLogo2A.png"></img>
						</a>
					</div>
					<div id="divoption2" class="divoptions">
						<a href="news.php">
							<img src="images/TLogo3A.png"></img>
						</a>
					</div>
					<div id="divoption3" class="divoptions">
						<a href="article.php">
							<img src="images/TLogo4A.png"></img>
						</a>
					</div>
					<div id="divoption4" class="divoptions">
						<a href="apps.php">
							<img src="images/TLogo5A.png"></img>
						</a>
					</div>
					<div id="divoption5" class="divoptions">
						<a href="myspace.php">
							<img src="images/TLogo6B.png"></img>
						</a>
					</div>
					<input class="search-input2" placeholder="Search...">
					<img src="images/paw.png" id="searchpaw">

					</img>
				</div>

			</div>

			<!-- content块分contentLeft和contentRight,放置主要内容-->
			<div id="content">
				<!-- 这里填写新内容-->
				<div id="contentLeft">
				<!--这里放置设计图左侧个人资料，以及过滤按钮-->
					<!-- 个人资料 -->
					<div id="myInfo">
						<!-- 用户文字资料 -->
						<form id="userdata">
							<div id="ownername">
								<div id="ownernameinside">
									蔡文静
								</div>
								<br/>
								<div id="ownerotherinside">
									粉丝&nbsp;&nbsp;<span id="ownerspan1" class="ownerspans">999</span>
									<br/>
									关注&nbsp;&nbsp;<span id="ownerspan2" class="ownerspans">249</span>
									<br/>
									爱宠&nbsp;&nbsp;<span id="ownerspan3" class="ownerspans">8 ❤</span>
								</div>
							</div>
						</form>
						<!-- 主人头像及姓名 -->
						<div id="ownerhead">
							<?php
								if($sign_in){
									//echo "<img id='userheaditem' src=$photo_url width=140 height=140>";
									echo "<img id='userheaditem' src='images/userhead.png' width=140 height=140></img>";
								}else{
									//echo "<img id='userheaditem' src=$photo_url width=140 height=140>";
									echo "<img id='userheaditem' src='images/userhead.png' width=140 height=140></img>";
								}
							?>
							<img id="userheadmerger" src="images/headmerger.png"></img>
						</div>
					</div>
					
					<!-- 这里放置宠物头像 -->
					<div id="petheadcontainer">
						<!-- 宠物1 -->
						<div id="pethead1" class="petheads">
							<form id="petheadform1" class="petheadforms">
								<img src="images/pet1.png" id="petheadpic1" class="petheadpics"></img>
								<img src="images/smallround.png" class="petheadmerger"></img>
							</form>
						</div>
						<!-- 宠物2 -->
						<div id="pethead2" class="petheads">
							<form id="petheadform1" class="petheadforms">
								<img src="images/pet2.png" id="petheadpic2" class="petheadpics"></img>
								<img src="images/smallround.png" class="petheadmerger"></img>
							</form>
						</div>
						<!-- 宠物3 -->
						<div id="pethead3" class="petheads">
							<form id="petheadform1" class="petheadforms">
								<img src="images/pet3.png" id="petheadpic3" class="petheadpics"></img>
								<img src="images/smallround.png" class="petheadmerger"></img>
							</form>
						</div>
						<!-- 宠物4 -->
						<div id="pethead4" class="petheads">
							<form id="petheadform1" class="petheadforms">
								<img src="images/pet4.png" id="petheadpic4" class="petheadpics"></img>
								<img src="images/smallround.png" class="petheadmerger"></img>
							</form>
						</div>
						<!-- 宠物5 -->
						<div id="pethead5" class="petheads">
							<form id="petheadform1" class="petheadforms">
								<img src="images/pet5.png" id="petheadpic5" class="petheadpics"></img>
								<img src="images/smallround.png" class="petheadmerger"></img>
							</form>
						</div>
						<!-- 箭头 -->
						<div id="arrowright" class="petheads">
							<img src="images/arrow.png" id="arrow_right" class="petheadpics"></img>
						</div>
					</div>

					<!-- 新鲜事 -->
					<div id="filter">
						<a class="filterbtns">
							<div id="newsbtn1" class="newsbtns">
								<img src="images/lbtn1.png" id="newsbtnpic1" class="newsbtnpics"></img>
								<div id="newstext1" class="newstexts">
									我关注的
								</div>
							</div>
						</a>
						<a class="filterbtns">
							<div id="newsbtn2" class="newsbtns">
								<img src="images/lbtn2.png" id="newsbtnpic2" class="newsbtnpics"></img>
								<div id="newstext2" class="newstexts">
									我发布的
								</div>
							</div>
						</a>
						<a class="filterbtns">
							<div id="newsbtn3" class="newsbtns">
								<img src="images/lbtn3.png" id="newsbtnpic3" class="newsbtnpics"></img>
								<div id="newstext3" class="newstexts">
									提到我的
								</div>
							</div>
						</a>
						<a class="filterbtns">
							<div id="newsbtn4" class="newsbtns">
								<img src="images/lbtn4.png" id="newsbtnpic4" class="newsbtnpics"></img>
								<div id="newstext4" class="newstexts">
									我的收藏
								</div>
							</div>
						</a>
						<a class="filterbtns">
							<div id="newsbtn5" class="newsbtns">
								<img src="images/lbtn5.png" id="newsbtnpic5" class="newsbtnpics"></img>
								<div id="newstext5" class="newstexts">
									我的私信
								</div>
							</div>
						</a>
					</div>

				</div>

				<div id="contentCenter">
				<!--这里放置设计图中间发布按钮，内容过滤标签以及内容-->
					<!-- 对话框的小三角 -->
					<img id="triangle" src="images/triangle.png"></img>
					<!-- 背景的枝杈图形 -->
					<img id="bkgtrunk" src="images/textgrid.png"></img>
					<div id="poster">
						<!-- 发布新鲜事 -->
						<div id="newstopic">
							发布新鲜事
						</div>
						<br/>
						<div id="posterblank">
						</div>
						<a onclick="filterbtn_onclick(5)">
							<div id="newsaction5" class="newsactions">
								<img src="images/funcbtn3.png" class="funcbtninside"></img>
								<p>领养信息</p>
							</div>
						</a>
						<a onclick="filterbtn_onclick(2)">
							<div id="newsaction2" class="newsactions">
								<img src="images/funcbtn2.png" class="funcbtninside"></img>
								<p>图片</p>
							</div>
						</a>
						<a href="article.html">
							<div id="newsaction1" class="newsactions">
								<img src="images/funcbtn1.png" class="funcbtninside"></img>
								<p>文章</p>
							</div>
						</a>
					</div>

					<div id="controlpanel">
						<!-- 发布新事物的控制面板 -->

						<!-- 1.文字发布界面 -->
						<div id="c_panel1" class="c_panels">
							<div id="cpanel1_btn1">
								<a>字体</a>
							</div>
							<div id="cpanel1_btn2">
								<a>字号</a>
							</div>
							<div id="cpanel1_btn3">
								<a>发布</a>
							</div>
							<br/>
							<textarea id="cpanel1_input1">

							</textarea>
						</div>
						<!-- 2.图片发布界面 -->
						<div id="c_panel2" class="c_panels">
							<div id="picuploadcount">
								最多可上传 6 张图片
							</div>
							<br/>
							<hr/>
							<!-- 新的图片放置区 -->
							<div id="picsarea">
								<!-- 放置六张图片 -->
								<img src="images/blank.png" id="previewimage1" class="previewimages" onclick="cancel_an_image(0)">

								</img>
								<img src="images/blank.png" id="previewimage2" class="previewimages" onclick="cancel_an_image(1)">

								</img>
								<img src="images/blank.png" id="previewimage3" class="previewimages" onclick="cancel_an_image(2)">

								</img>
								<img src="images/blank.png" id="previewimage4" class="previewimages" onclick="cancel_an_image(3)">

								</img>
								<img src="images/blank.png" id="previewimage5" class="previewimages" onclick="cancel_an_image(4)">

								</img>
								<img src="images/blank.png" id="previewimage6" class="previewimages" onclick="cancel_an_image(5)">

								</img>
								<br/>
								<!-- 放置上传按钮 -->
								<div id="uploadbtn" onclick="trigger_filebox()">
									+添加图片
								</div>
								<!-- 骗人用的隐藏对话框 -->
								<input type="file" accept="image/*" id="cpanel2_fileuploader" value="selectFile" onchange="begin_upload_image()"></input>
							</div>
							说点儿什么吧......<br/>
							<textarea id="cpanel2_input2" onclick="textcomplete()"> </textarea>
							<br/>
							<hr/>
							<!-- 以谁的名义发布？ -->
							<div id="publisher_leader">
								<div id="publisher1" class="publishers">
									以主人名义发布(默认)
								</div>
								<div id="publisher2" class="publishers">
									以宠物1名义发布
								</div>
								<div id="publisher3" class="publishers">
									以宠物2名义发布
								</div>
							</div>
							<br/>
							<hr/>
							<!-- 发布给谁看？ -->
							<div id="receiver_leader">
								<div id="receiver1" class="receivers">
									所有人可见(默认)
								</div>
								<div id="receiver2" class="receivers">
									仅收听者可见
								</div>
								<div id="receiver3" class="receivers">
									仅自己可见
								</div>
							</div>
							<br/>
							<hr/>
							<div id="cpanel2_btn1" onclick="distribute_pics()">
								<a>发布</a>
							</div>
						</div>
						<!-- 3.声音发布界面 -->
						<div id="c_panel3" class="c_panels">
							请输入声音链接：(或点击<a href="#">这里</a>上传)<br/>
							<input type="file" id="cpanel3_input1" value="selectFile">

							</input>
							请输入简短说明：<br/>
							<textarea id="cpanel3_input2">

							</textarea>
							<br/>
							<hr/>


							<div id="cpanel3_btn1">
								<a>发布</a>
							</div>
						</div>
						<!-- 4.影像发布界面 -->
						<div id="c_panel4" class="c_panels">
							请输入影像链接：(或点击<a href="#">这里</a>上传)<br/>
							<input type="text" id="cpanel4_input1">

							</input>
							请输入简短说明：<br/>
							<textarea id="cpanel4_input2">

							</textarea>
							<br/>
							<div id="cpanel4_btn1">
								<a>发布</a>
							</div>
						</div>
						<!-- 5.领养信息发布界面 -->
						<div id="c_panel5" class="c_panels">
							名字：<input type="text" id="cpanel5_input1" class="cpanel5_inputs"></input><br/>
							类别：<input type="text" id="cpanel5_input2" class="cpanel5_inputs"></input><br/>
							品种：<input type="text" id="cpanel5_input3" class="cpanel5_inputs"></input><br/>
							性别：<input type="text" id="cpanel5_input4" class="cpanel5_inputs"></input><br/>
							年龄：<input type="text" id="cpanel5_input5" class="cpanel5_inputs"></input><br/>
							绝育：<input type="text" id="cpanel5_input6" class="cpanel5_inputs"></input><br/>
							颜色：<input type="text" id="cpanel5_input7" class="cpanel5_inputs"></input><br/>
							照片：<input type="text" id="cpanel5_input8" class="cpanel5_inputs"></input><br/>
							附言：<input type="text" id="cpanel5_input9" class="cpanel5_inputs"></input><br/>
							<div id="cpanel5_btn1">
								<a>发布</a>
							</div>
						</div>
					</div>
					<br/>

					<div id="posts">
						<!-- 帖子内容及过滤按钮 -->

						<br/>
						<a onclick="posterbtn_onclick(4)">
							<div id="postsfilter1" class="postsfilters">
								<p>领养信息</p>
							</div>
						</a>
						<a onclick="posterbtn_onclick(2)">
							<div id="postsfilter2" class="postsfilters">
								<p>图片</p>
							</div>
						</a>
						<a onclick="posterbtn_onclick(1)">
							<div id="postsfilter3" class="postsfilters">
								<p>文章</p>
							</div>
						</a>
						<a onclick="posterbtn_onclick(3)">
							<div id="postsfilter4" class="postsfilters">
								<p>评论</p>
							</div>
						</a>

						<br/>
						<!-- 以下是帖子主要内容 -->

						<!-- 所发文字 -->
						<div id="postscontent_txt" class="postscontents">
							<!-- 帖子1 -->
							<div id="postscont1" class="postsconts">
								<div id="postdate11" class="postdates">
									付某人 发表于 2013.9.28 13:40PM
								</div>
								<div id="posttxt1" class="posttxts">
									今天在小区里看到三只流浪猫，我上去拿火腿肠喂，它们居然不吃，还用鄙视的眼神瞪我。后来我一问，邻居老大妈说三层住着一位老大爷，天天给它们做腌鸡腿和生鱼片。唉！这群白眼狼！
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont2" class="postsconts">
								<div id="postdate22" class="postdates">
									任翼飞 发表于 2013.10.1 08:23AM
								</div>
								<div id="posttxt3" class="posttxts">
									在院子里散步的时候，我突然看见草丛里放着许多鼠药，这哪是灭鼠的，分明是毒狗的！于是，我马上把它们清理干净了。
								</div>
							</div>
						</div>

						<!-- 所发图片 -->
						<div id="postscontent_pic" class="postscontents">
							<!-- 帖子1 -->
							<div id="postscont3" class="postsconts">
								<div id="postdate33" class="postdates">
									路人甲 发表于 2013.9.26 22:50PM
								</div>
								<div id="postpic1" class="postpics">
									这里放置图片1
								</div>
								<div id="postpic2" class="postpics">
									这里放置图片2
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont4" class="postsconts">
								<div id="postdate44" class="postdates">
									程石 发表于 2013.9.20 18:23PM
								</div>
								<div id="postpic3" class="postpics">
									这里放置图片3
								</div>
							</div>
						</div>

						<!-- 所发评论 -->
						<div id="postscontent_res" class="postscontents">
							<!-- 帖子1 -->
							<div id="postscont5" class="postsconts">
								<div id="postdate55" class="postdates">
									孙悟空 发表于 2013.9.28 13:40PM
								</div>
								<div id="postres1" class="postress">
									亲你养的猫太肥了，该节食了。
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont6" class="postsconts">
								<div id="postdate66" class="postdates">
									朱悟能 发表于 2013.10.1 08:23AM
								</div>
								<div id="postres2" class="postress">
									我也想要一只比熊犬，快告诉我哪里能领养，谢谢！
								</div>
							</div>
							<!-- 帖子3 -->
							<div id="postscont7" class="postsconts">
								<div id="postdate77" class="postdates">
									沙悟净 发表于 2013.10.1 08:23AM
								</div>
								<div id="postres3" class="postress">
									需要灭鼠和清理狗舍服务请联系电话400-400-4000
								</div>
							</div>
						</div>

						<!-- 领养信息 -->
						<div id="postscontent_ado" class="postscontents">
							<!-- 帖子1 -->
							<div id="postscont8" class="postsconts">
								<div id="postdate88" class="postdates">
									蔡贇 发表于 2013.9.28 13:40PM
								</div>
								<div id="postado1" class="postados">
									名字：狗肉<br/>
									类别：犬<br/>
									品种：哈士奇<br/>
									性别：公<br/>
									年龄：2岁3个月<br/>
									绝育：否<br/>
									颜色：黑白<br/>
									照片：<br/>
									附言：已受过训练，不会随地拉屎撒尿。
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont9" class="postsconts">
								<div id="postdate99" class="postdates">
									王涵之 发表于 2013.10.1 08:23AM
								</div>
								<div id="postado2" class="postados">
									名字：阿兹猫<br/>
									类别：猫<br/>
									品种：异国短毛猫<br/>
									性别：母<br/>
									年龄：3岁1个月<br/>
									绝育：是<br/>
									颜色：金色<br/>
									照片：<br/>
									附言：不挑食，黄瓜也吃。
								</div>
							</div>
							<!-- 帖子2 -->
							<div id="postscont10" class="postsconts">
								<div id="postdate100" class="postdates">
									唐玄奘 发表于 2013.10.1 08:23AM
								</div>
								<div id="postado3" class="postados">
									名字：求包养<br/>
									类别：鹦鹉<br/>
									品种：非洲金刚鹦鹉<br/>
									性别：母<br/>
									年龄：1岁<br/>
									绝育：否<br/>
									颜色：蓝紫<br/>
									照片：<br/>
									附言：会六种国家语言。
								</div>
							</div>
						</div>
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
