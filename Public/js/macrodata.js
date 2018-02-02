//省份
	function getMacro(data){       
		var bdary = new BMap.Boundary();
		bdary.get(data.province, function(rs){       //获取行政区域
			//map.clearOverlays();        //清除地图覆盖物   
			var count = rs.boundaries.length; //行政区域的点有多少个
			var val=$('input:radio[name="doc-radio-2"]:checked').val();
			var num = 0.001;
			//console.log(val);
			for (var i = 0; i < count; i++) {
				/*if (val == '人口密度') {
					$('#demo').css('display','none');
				};*/
				
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 0.5, strokeColor: "#333",fillColor:"#B30000",fillOpacity:data.popArea*num}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物	
		
			} 
			
		});   

	}
	//城市
	 function macroCity(data){       
		var bdary = new BMap.Boundary();
		bdary.get(data.city, function(rs){       //获取行政区域
			//map.clearOverlays();        //清除地图覆盖物   
			var count = rs.boundaries.length; //行政区域的点有多少个
			var num = 0.0009;
			//var val=$('input:radio[name="doc-radio-2"]:checked').val();
			for (var i = 0; i < count; i++) {
				/*if (val == '装机公司数量') {
					data.company_no=data.compnay_IBno;
					var num = 0.2;
				};*/
				var ply = new BMap.Polygon(rs.boundaries[i], {strokeWeight: 0.5, strokeColor: "#333",fillColor:"#B30000",fillOpacity:data.popArea*num}); //建立多边形覆盖物
				map.addOverlay(ply);  //添加覆盖物	
			} 
			map.centerAndZoom(data.city, 8);   //调整视野   
		});   

	}
	$('#macroDiv input').click(function(){
		//console.log(11);
		map.clearOverlays();        //清除地图覆盖物   
		var valShow = $(this).val();
			$.ajax({
		        type: "post",
		        url: "index/macro",
		        data:{valShow:valShow},
		        success:function(e){
		            var datas;
		            datas = e;
		            //console.log(datas);
		            for(var i=0;i<datas.length;i++){  
		            var popArea = datas[i]['poptotal']/datas[i]['area'];
						popArea = popArea.toFixed(2);
						datas[i]['popArea'] = popArea;  
						getMacro(datas[i]); 
						
						//console.log(popArea);
						if (valShow == '人口密度') {
							$('#demo').css('display','none');
							searchByStationName(datas[i]['province'],datas[i]['popArea']);	
						};
						
					} 
		        }
			});  
			//城市
			$('.showUl a').click(function(){
				map.clearOverlays();        //清除地图覆盖物   
				var showLi = $.trim($(this).first().text());
				var val=$('input:radio[name="doc-radio-2"]:checked').val();
				//console.log(val);
				$.ajax({
			        type: "post",
			        url: "Index/macroCity",
			        data:{showLi:showLi},
			        success:function(e){
			            var datas;
			            datas = e;
			            //console.log(datas);
			            if (typeof(val) == 'undefined') {
			            		alert('请选择指标！');
			            }else{
			            	 for(var i=0;i<datas.length;i++){ 
			            	 	var popArea = datas[i]['poptotal']/datas[i]['area'];
								popArea = popArea.toFixed(2);
								datas[i]['popArea'] = popArea;  
			            	 	macroCity(datas[i]);
								if (val == '人口密度') {
									$('#demo').css('display','none');
									searchByStationName(datas[i]['city'],datas[i]['popArea']);
								};
								
							}
			            }
			           
			        }
				});  
			});
	});

	