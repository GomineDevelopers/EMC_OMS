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
		<link rel="icon" type="image/png" href="/git/EMC_OMS/Public/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="/git/EMC_OMS/Public/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="/git/EMC_OMS/Public/css/amazeui.min.css" />
		<link rel="stylesheet" href="/git/EMC_OMS/Public/css/admin.css">
		<link rel="stylesheet" href="/git/EMC_OMS/Public/css/app.css">
		<script src="/git/EMC_OMS/Public/js/echarts.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/git/EMC_OMS/Public/plugin/amazeui.tree.min.css" />
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=4vWwiDYUhYY3S5uLoPbZqUEz"></script>
		<script src="/git/EMC_OMS/Public/js/jquery.min.js"></script>
		
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
			.paddingUserDefine,#upgrateOne_item{
				padding-left:0px;
				padding-right: 0px; 
				
			}
			.paddingUserDefine label {
				font-size: 13px;
			}
			.tpl-left-nav-item .nav-link, .tpl-left-nav-sub-menu a {
			    font-size: 20px;
			    position: relative;
			    text-shadow: none;
			    font-weight: 300;
			    top: 2px;
			    margin-left: 50px;
			    margin-right: 6px;
			    color: #a7bdcd;
			}
		</style>
	</head>

	<body data-type="index">
		<input type="hidden" id="publicUrl" value="/git/EMC_OMS/Public">
		<input type="hidden" id="controlerUrl" value="/git/EMC_OMS/index.php/Home/Index">
		
		<header class="am-topbar  admin-header">
			<div class="am-topbar-brand">
				<a href="javascript:;" class="tpl-logo">
					<img src="/git/EMC_OMS/Public/img/logo.png" alt="">
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
							<span class="tpl-header-list-user-ico"> <img src="/git/EMC_OMS/Public/img/user01.png"><span>&nbsp;数海智库</span></span>
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
						
					</div>
				</div>
				<div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
              <li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                  <span>东区</span>
                  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                  <li class="showUl">
                    <a href="#">
                      <span>安徽省</span>
                    </a>
                    <a href="#">
                      <span>湖北省</span>
                    </a>
                    <a href="#">
                      <span>湖南省</span>
                    </a>
                    <a href="#">
                      <span>江苏省</span>
                    </a>
                    <a href="#">
                      <span>江西省</span>
                    </a>
                    <a href="#">
                      <span>上海市</span>
                    </a>
                    <a href="#">
                      <span>浙江省</span>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                  <span>南区</span>
                  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                  <li class="showUl">
                    <a href="#">
                      <span>福建省</span>
                    </a>
                    <a href="#">
                      <span>广东省</span>
                    </a>
                    <a href="#">
                      <span>广西</span>
                    </a>
                    <a href="#">
                      <span>海南省</span>
                    </a>
                  
                  </li>
                </ul>
              </li>

              <li class="tpl-left-nav-item">
                 <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                  <span>西区</span>
                  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                  <li class="showUl">
                    <a href="#">
                      <span>甘肃省</span>

                    </a>
                    <a href="#">
                      <span>贵州省</span>

                    </a>
                    <a href="#">
                      <span>宁夏</span>

                    </a>
                    <a href="#">
                      <span>青海省</span>

                    </a>
                   <a href="#">
                      <span>陕西省</span>

                    </a>
                    <a href="#">
                      <span>四川省</span>

                    </a>
                     <a href="#">
                      <span>重庆市</span>

                    </a>
                    <a href="#">
                      <span>云南省</span>

                    </a>
                      <a href="#">
                      <span>新疆</span>
                    </a>
                    <a href="#">
                      <span>西藏</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>


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
						        				<div class=" " id="upgrateOne">
						                          <a class="nav-link tpl-left-nav-link-list" style="height: 38px;line-height: 38px;">
						                            <span>office公司数量</span>
						                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fl am-margin-right "></i>
						                          </a>
						                        </div>

						                        <div class="am-radio" id="upgrateOne_item" style="display: none;">
						                         <div class='am-u-md-3 paddingUserDefine' ><label class="center-aligine">
						                            <input type="radio" name="doc-radio-1" class="center-aligine" value="rs20">Roadshow 20 Cities
						                            </label></div>
						                          <div class='am-u-md-3 paddingUserDefine' ><label class="center-aligine">
						                            <input type="radio" name="doc-radio-1" class="center-aligine" value="os20">Focus 20 Cities
						                            </label></div>
						                          <div class='am-u-md-3 paddingUserDefine' ><label class="center-aligine">
						                            <input type="radio" name="doc-radio-1" class="center-aligine" value="os64">Focus 64 Cities
						                            </label></div>
						                            <div class='am-u-md-3 paddingUserDefine' ><label class="center-aligine">
						                            <input type="radio" name="doc-radio-1" class="center-aligine" value="os108">Focus 108 Cities
						                            </label></div>

						                        </div>
						                         <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
							                        <script type="text/javascript">
							                          $(document).ready(function() {
							                            $("#upgrateOne").click(function() {
							                              $("#upgrateOne_item").toggle("slow");
							                            });
							                          });
							                    </script>
        										
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
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="人口密度"> 联系人数量
      											</label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="GDP指数"> 联系人行业分布
     											 </label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="CPI指数"> 装机联系人数量
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="IT行业公司"> OFFICE联系人数量
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-3" class="center-aligine" value="IT行业公司"> 联系人职务分布
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
										<form class="am-form" >
											<div class="am-radio">
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine"> 打开Email联系人分布
      											</label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option2"> 点击Email联系人分布
     											 </label></div>
												<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option3"> 电话Touch联系人分布
      											</label></div>
      											<div class='am-u-md-3 paddingUserDefine'><label class="center-aligine">
        										<input type="radio" name="doc-radio-4" class="center-aligine" value="option3"> 参加活动联系人分布
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

		
		<script src="/git/EMC_OMS/Public/js/disPicker.js" type="text/javascript" charset="utf-8"></script>
		<script src="/git/EMC_OMS/Public/js/amazeui.min.js"></script>
		<script src="/git/EMC_OMS/Public/js/iscroll.js"></script>
		<script src="/git/EMC_OMS/Public/js/app.js"></script>
		
		<script type="text/javascript" src="/git/EMC_OMS/Public/plugin/amazeui.tree.min.js"></script>
		<script src="/git/EMC_OMS/Public/js/public.js"></script>
		<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	map.setMapStyle({
		  styleJson:[
		          {
                    "featureType": "highway",
                    "elementType": "all",
                    "stylers": {
                              "visibility": "off"
                    }
          },
          {
                    "featureType": "highway",
                    "elementType": "all",
                    "stylers": {
                              "hue": "#000000",
                              "visibility": "off"
                    }
          }
		]
	});
//	var localSearch= new BMap.LocalSearch (map, {renderOptions: {pageCapacity: 8}});
	map.centerAndZoom(new BMap.Point(108.787213,34.478528), 5);
	map.enableScrollWheelZoom();
	
	//省份
	function getBoundary(data){       
		var bdary = new BMap.Boundary();
		bdary.get(data.province, function(rs){       //获取行政区域
			//map.clearOverlays();        //清除地图覆盖物   
			var count = rs.boundaries.length; //行政区域的点有多少个
			var val=$('input:radio[name="doc-radio-1"]:checked').val();
			var num = 0.00003;
			for (var i = 0; i < count; i++) {
				if (val == '装机公司数量') {
					data.company_no=data.compnay_IBno;
					var num = 0.02;
				};
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 0.5, strokeColor: "#333",fillColor:"#B30000",fillOpacity:data.company_no*num}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物	
		
			} 
			
		});   

	}
	//城市
	 function getBoundaryCity(data){       
		var bdary = new BMap.Boundary();
		bdary.get(data.city, function(rs){       //获取行政区域
			//map.clearOverlays();        //清除地图覆盖物   
			var count = rs.boundaries.length; //行政区域的点有多少个
			var num = 0.005;
			var val=$('input:radio[name="doc-radio-1"]:checked').val();
			for (var i = 0; i < count; i++) {
				if (val == '装机公司数量') {
					data.company_no=data.compnay_IBno;
					var num = 0.2;
				};
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 0.5, strokeColor: "#333",fillColor:"#B30000",fillOpacity:data.company_no*num}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物	
			} 
			map.centerAndZoom(data.city, 8);   //调整视野   
		});   

	}
	
	$('.am-radio input').click(function(){
		map.clearOverlays();        //清除地图覆盖物   
		var valShow = $(this).val();
			$.ajax({
		        type: "post",
		        url: "<?php echo U('Index/company');?>",
		        data:{valShow:valShow},
		        success:function(e){
		            var datas;
		            datas = e;
		            //console.log(datas);
		            for(var i=0;i<datas.length;i++){    
						getBoundary(datas[i]); 
						if (valShow == '公司数量') {
							searchByStationName(datas[i]['province'],datas[i]['company_no']);	
						};
						if (valShow == '装机公司数量') {
							searchByStationName(datas[i]['province'],datas[i]['compnay_IBno']);
						};
						if (valShow == 'rs20') {
							searchByStationName(datas[i]['province'],datas[i]['rs20']);
						};
						if (valShow == 'os20') {
							searchByStationName(datas[i]['province'],datas[i]['os20']);
						};
						if (valShow == 'os64') {
							searchByStationName(datas[i]['province'],datas[i]['os64']);
						};
						if (valShow == 'os108') {
							searchByStationName(datas[i]['province'],datas[i]['os108']);
						};
					} 
		        }
			});  
	});
	//城市
	$('.showUl a').click(function(){
		map.clearOverlays();        //清除地图覆盖物   
		var showLi = $.trim($(this).first().text());
		var val=$('input:radio[name="doc-radio-1"]:checked').val();
		console.log(val);
		$.ajax({
	        type: "post",
	        url: "<?php echo U('Index/cityCompany');?>",
	        data:{showLi:showLi},
	        success:function(e){
	            var datas;
	            datas = e;
	            if (typeof(val) == 'undefined') {
	            		alert('请选择指标！');
	            }else{
	            	 for(var i=0;i<datas.length;i++){ 
	            	 	getBoundaryCity(datas[i]);
						if (val == '公司数量') {
							searchByStationName(datas[i]['city'],datas[i]['company_no']);
						};
						if (val == '装机公司数量') {
							searchByStationName(datas[i]['city'],datas[i]['compnay_IBno']);
						};
					}
	            }
	           
	        }
		});  
	});

</script>
	</body>

</html>