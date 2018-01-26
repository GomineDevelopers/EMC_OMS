<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>EMC OMS数据库可视化展示系统</title>
		<meta name="description" content="这是一个 index 页面">
		<meta name="keywords" content="index">

		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="icon" type="image/png" href="/EMC_OMS/Public/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="/EMC_OMS/Public/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="/EMC_OMS/Public/css/amazeui.min.css" />
		<link rel="stylesheet" href="/EMC_OMS/Public/css/admin.css">
		<link rel="stylesheet" href="/EMC_OMS/Public/css/app.css">
		<script src="/EMC_OMS/Public/js/echarts.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/EMC_OMS/Public/plugin/amazeui.tree.min.css" />
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=vU5MZP66PBzfA1WA9n5SxPsAl1npAbX7"></script>
		<script src="/EMC_OMS/Public/js/public.js"></script>
		<style>
			.tpl-page-header-fixed {
				margin-top: 122px;
			}
			
			.nav-list-style {
				height: 35px;
				line-height: 28px;
			}
			
			.am-topbar-right {
				float: right;
				margin-right: 10px;
				margin-top: 10px;
			}
			
			.am-topbar-middle {
				margin-left: 20%;
				margin-top: 10px;
			}
			
			.am-nav>li>a {
				position: relative;
				display: block;
				padding: .1em 1em;
				border-radius: 0;
				font-size: 16px;
			}
			
			.am-nav>li>a:hover {
				color: #004295;
				/*background-color: #3598dc;*/
				border-bottom: 3px solid #1A5BA1;
			}
			
			.tpl-left-nav-wrapper {
				background-color: white;
				margin-top: 5px;
				border-bottom: 1px solid #eee;
				box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
				border-bottom-left-radius: inherit;
				border-bottom-right-radius: inherit;
			}
			
			.am-tree li {
				margin: 20px 0;
				margin-left: 40px;
				font-weight: 600;
			}
			
			.tpl-left-nav {}
			
			.tpl-left-nav-title {}
			
			.am-tabs-default .am-tabs-nav {
				line-height: 40px;
				background-color: white;
			}
			
			.am-tree .am-tree-branch-name,
			.am-tree .am-tree-item .am-tree-item-name:hover {
				color: #666666;
			}
			
			.am-dropdown-userdefine {
				width: 600px;
				padding-top: 10px;
				
			}
			.center-aligine{
				font-size: medium; 
				height: 40px;
				line-height: 40px;
				
			}
			.center-aligine:hover{
				
				color: #5b9bd5;
			}
			.center-aligine:active{
				
				color: #5b9bd5;
			}
			.am-form{
				padding-left: 20px;
			} 
			.paddingUserDefine{
				padding-left:0px;
				padding-right: 0px; 
			}
		</style>
	</head>

	<body data-type="index">

		<header class="am-topbar  admin-header">
			<div class="am-topbar-brand">
				<a href="javascript:;" class="tpl-logo">
					<img src="/EMC_OMS/Public/img/logo.png" alt="">
				</a>
			</div>
			<div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

			</div>
			<div class="am-fl tpl-header-navbar">
						<ul>
							<!-- 欢迎语 -->
							<li class=" tpl-header-navbar-welcome am-align-left">
								<a href="javascript:;">
									<span style="font-size: 26px;padding-left: 20px; ">EMC OMS数据库可视化展示系统</span></a>
							</li>
						</ul>
					</div>
			<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

			<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

				<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
					<!--<li class="am-hide-sm-only">
						<a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">全屏</span></a>
					</li>-->
					<li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
						<a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
							<span class="tpl-header-list-user-ico"> <img src="/EMC_OMS/Public/img/user01.png"><span>&nbsp;数海智库</span></span>
						</a>
						<ul class="am-dropdown-content">
							<li>
								<a href="#"><span>管理员</span>&nbsp; <span class="am-alert-success">已认证</span></a>
							</li>
							<li>
								<a href="#"><span class="am-icon-user am-icon-fw"></span>&nbsp;我的账号</a>
							</li>
							<li>
								<a href="#"><span class="am-icon-edit am-icon-fw "></span>&nbsp; 编辑账号</a>
							</li>
							
						</ul>
					</li>

					<li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
						<a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
							<span class="am-icon-gear">&nbsp;</span>系统管理</span>
						</a>
						<ul class="am-dropdown-content">

							<li>
								<a href="#"><span class="am-icon-wrench"></span>&nbsp;系统信息</a>
							</li>
							<li>
								<a href="#"><i class="am-icon-refresh"></i>&nbsp; 系统设置</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="###" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a>
					</li>
				</ul>
				</div>
                
						
						
					
			
		</header>

		<div class="tpl-page-container tpl-page-header-fixed">
			<div class=" tpl-left-nav tpl-left-nav-hover">
				<div class="tpl-left-nav-wrapper">
					<div class="am-lg-text-center ">
						<span class="am-text-lg am-lg-text-center"><label>区域选择</label></span>
					</div>
					<div class="tpl-left-nav-list">
						<ul class="am-tree am-lg-text-justify" id="firstTree">
							<li class="am-tree-branch am-hide" data-template="treebranch">
								<div class="am-tree-branch-header">
									<button class="am-tree-branch-name">
       										 <span class="am-tree-icon am-tree-icon-folder"></span>
        									 <span class="am-tree-label"></span>
      								</button>
								</div>
								<ul class="am-tree-branch-children"></ul>
								<div class="am-tree-loader"><span class="am-icon-spin am-icon-spinner"></span></div>
							</li>
							<li class="am-tree-item am-hide" data-template="treeitem">
								<button class="am-tree-item-name">
     									 <span class="am-tree-icon am-tree-icon-item am-icon-flag"></span>
      									<label class="am-tree-label"></label>
      									</button>
							</li>
						</ul>
					</div>
				</div>
				<div class="tpl-left-nav-wrapper">

					<div class="tpl-left-nav-list">
						<ul class="am-tree am-lg-text-justify" id="secondTree">
							<li class="am-tree-branch am-hide" data-template="treebranch">
								<div class="am-tree-branch-header">
									<button class="am-tree-branch-name">
       										 <span class="am-tree-icon am-tree-icon-folder"></span>
        									 <span class="am-tree-label"></span>
      								</button>
								</div>
								<ul class="am-tree-branch-children"></ul>
								<div class="am-tree-loader"><span class="am-icon-spin am-icon-spinner"></span></div>
							</li>
							<li class="am-tree-item am-hide" data-template="treeitem">
								<button class="am-tree-item-name">
     									 <span class="am-tree-icon am-tree-icon-item am-icon-flag"></span>
      									<label class="am-tree-label"></label>
      									</button>
							</li>
						</ul>
					</div>
				</div>
				<div class="tpl-left-nav-wrapper">

					<div class="tpl-left-nav-list">
						<ul class="am-tree am-lg-text-justify" id="thirdTree">
							<li class="am-tree-branch am-hide" data-template="treebranch">
								<div class="am-tree-branch-header">
									<button class="am-tree-branch-name">
       										 <span class="am-tree-icon am-tree-icon-folder"></span>
        									 <span class="am-tree-label"></span>
      								</button>
								</div>
								<ul class="am-tree-branch-children"></ul>
								<div class="am-tree-loader"><span class="am-icon-spin am-icon-spinner"></span></div>
							</li>
							<li class="am-tree-item am-hide" data-template="treeitem">
								<button class="am-tree-item-name">
     									 <span class="am-tree-icon am-tree-icon-item am-icon-flag"></span>
      									<label class="am-tree-label"></label>
      									</button>
							</li>
						</ul>
					</div>
				</div>
				<div class="tpl-left-nav-wrapper">

					<div class="tpl-left-nav-list">
						<ul class="am-tree am-lg-text-justify" id="fourthTree">
							<li class="am-tree-branch am-hide" data-template="treebranch">
								<div class="am-tree-branch-header">
									<button class="am-tree-branch-name">
       										 <span class="am-tree-icon am-tree-icon-folder"></span>
        									 <span class="am-tree-label"></span>
      								</button>
								</div>
								<ul class="am-tree-branch-children"></ul>
								<div class="am-tree-loader"><span class="am-icon-spin am-icon-spinner"></span></div>
							</li>
							<li class="am-tree-item am-hide" data-template="treeitem">
								<button class="am-tree-item-name">
     									 <span class="am-tree-icon am-tree-icon-item am-icon-flag"></span>
      									<label class="am-tree-label"></label>
      									</button>
							</li>
						</ul>
					</div>
				</div>
				<!--<div class="tpl-left-nav-wrapper">
					<div class="tpl-left-nav-title">
						联系我们
					</div>
					<div class="tpl-left-nav-list">
						<ul class="tpl-left-nav-menu">
							<li class="tpl-left-nav-item">
								<a href="javascript:;" class="nav-link tpl-left-nav-link-list">
									<i class="am-icon-stethoscope am-success" style="color:#0ea28b ;"></i>
									<span>在线客服</span>
									<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
								</a>

							</li>

							<li class="tpl-left-nav-item">
								<a href="javascript:;" class="nav-link tpl-left-nav-link-list">
									<i class="am-icon-phone-square am-secondary" style="color: #0171bc;"></i>
									<span>电话: 86-10-87510730 </span>
									<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
								</a>

							</li>
							<li class="tpl-left-nav-item">
								<a href="javascript:;" class="nav-link tpl-left-nav-link-list am-success ">
									<i class="am-success am-icon-weixin " style="color:#44b549;"></i>
									<span>关注微信公众号</span>
									<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
								</a>

							</li>

							</li>
						</ul>
					</div>
				</div>-->

			</div>

			<div class="tpl-content-wrapper">

				<!--内容区域第一块-->
				<div class="row " style="background-color: #FFFFFF;">
					<div class="am-u-sm-centered  am-u-lg-centered am-tabs am-tabs-d2 am-no-layout" data-am-widget="tabs">
						<ul class="am-nav am-u-lg-6 am-nav-justify am-nav-pills am-topbar-nav  admin-header-list tpl-header-list">
							<li style="border-bottom: none;"></li>
							<li class="">
								<a href="#">首页</a>
							</li>
							<li class="am-dropdown" data-am-dropdown="">
								<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
									宏观数据
								</a>
								<ul class="am-dropdown-content am-dropdown-userdefine">
									<li class="am-dropdown-header">请选择</li>
									<li>
										<form class="am-form">
											<div class="am-radio">
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-2" class="center-aligine" value="人口密度"> 人口密度
      											</label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine ">
        										<input type="radio" name="doc-radio-2" class="center-aligine" value="GDP指数"> GDP指数
     											 </label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-2" class="center-aligine" value="CPI指数"> CPI指数
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-2" class="center-aligine" value="IT行业公司"> IT行业公司
      											</label></div>
											</div>
										</form>

									</li>

								</ul>
							</li>
							<li class="am-dropdown" data-am-dropdown="">
								<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
									公司分布
								</a>
								<ul class="am-dropdown-content am-dropdown-userdefine">
									<li class="am-dropdown-header">请选择</li>
									<li>
										<form class="am-form">
											<div class="am-radio" id='company'>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio"  name="doc-radio-1" class="center-aligine" value="公司数量"> 公司数量</label></div>
												<div class='am-u-md-3 paddingUserDefine' ><label class="center-aligine">
        										<input type="radio"  name="doc-radio-1" class="center-aligine" value="公司行业分布"> 公司行业分布</label></div>
												<div class='am-u-md-3 paddingUserDefine'>
												<label class="center-aligine">
        										<input type="radio"  name="doc-radio-1" class="center-aligine" value="装机公司数量"> 装机公司数量</label></div>
        										<div class='am-u-md-3 paddingUserDefine'>
      											<label class="center-aligine">
        										<input type="radio"  name="doc-radio-1" class="center-aligine" value="OFFICE公司数量"> OFFICE公司数量</label></div>
											</div>
										</form>

									</li>

								</ul>
							</li>
							<li class="am-dropdown" data-am-dropdown="">
								<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
									联系人分布
								</a>
								<ul class="am-dropdown-content am-dropdown-userdefine">
									<li class="am-dropdown-header">请选择</li>
									<li>
										<form class="am-form">
											<div class="am-radio">
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="人口密度"> 人口密度
      											</label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="GDP指数"> GDP指数
     											 </label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="CPI指数"> CPI指数
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="IT行业公司"> IT行业公司
      											</label></div>
											</div>
										</form>

									</li>

								</ul>
							</li>
							<li class="am-dropdown" data-am-dropdown="">
								<a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
									活跃人群分布
								</a>
								<ul class="am-dropdown-content am-dropdown-userdefine">
									<li class="am-dropdown-header">请选择</li>
									<li>
										<form class="am-form">
											<div class="am-radio">
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine"> 人口密度
      											</label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option2"> GDP指数
     											 </label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option3"> CPI指数
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option3"> IT行业公司
      											</label></div>
											</div>
										</form>

									</li>

								</ul>
							</li>
							
                          <li></li>
						</ul>
					</div>
					<div class="am-u-md-12 am-u-sm-12 row-mb">
						<div class="tpl-portlet">
							

							<!--统计图表插入点-->
							<div class="form-content" style="height: 800px;">
							<!-- 2018.01.25 @young -->
								<div id="allmap" style="height: 900px;"></div>
							</div>
							<!--统计图表插入点-->
						</div>
					</div>

				</div>
				<!--内容区域第三块-->

			</div>

		</div>

		<script src="/EMC_OMS/Public/js/jquery.min.js"></script>
		<script src="/EMC_OMS/Public/js/disPicker.js" type="text/javascript" charset="utf-8"></script>
		<script src="/EMC_OMS/Public/js/amazeui.min.js"></script>
		<script src="/EMC_OMS/Public/js/iscroll.js"></script>
		<script src="/EMC_OMS/Public/js/app.js"></script>
		
		<script type="text/javascript" src="/EMC_OMS/Public/plugin/amazeui.tree.min.js"></script>
		<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var localSearch= new BMap.LocalSearch (map, {renderOptions: {pageCapacity: 8}});
	map.centerAndZoom(new BMap.Point(108.787213,34.478528), 5);
	map.enableScrollWheelZoom();

	function getBoundary(data){       
		var bdary = new BMap.Boundary();
		bdary.get(data.province, function(rs){       //获取行政区域
			var count = rs.boundaries.length; //行政区域的点有多少个
			
          	
			for (var i = 0; i < count; i++) {
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 0.5, strokeColor: "#333",fillColor:"#B30000",fillOpacity:data.company_no*0.00007}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物	
			}    
		});   

	}
	 

	$('.am-radio input').click(function(){
		var valShow = $(this).val();
		if (valShow == '公司数量') {

			$.ajax({
		        type: "post",
		        url: "<?php echo U('Index/company');?>",
		        data:valShow,

		        success:function(e){
		            var datas;
		            datas = e;
		            for(var i=0;i<datas.length;i++){    
						getBoundary(datas[i]);  console.log(datas[i]['company_no'])
						searchByStationName(datas[i]['province'],datas[i]['company_no']);
					} 
		        }
			});  
		};
		if (valShow == '公司行业分布') {
			alert($(this).val());
		};
	});
	$('.am-tree-label').click(function(){
		console.log($('.am-tree-label').html());
		});
</script>
	</body>

</html>