	var control = $("input#controlerUrl").val();		//获取index控制器地址
    var pub = $("input#publicUrl").val();		//获取index的public地址

function addIndustry(e){
	var dat = (e)?{"location":e}:"";
		$.ajax({
		    type: "get",
		    url: control+"/getInfoByLocation",	
		    data:dat,
		    success:function(e){
		        for(var i=0;i<e.length;i++){
    			var arr = {'电力':e[i].electricity,'服务提供商':e[i].serviceProvider,'互联网':e[i].internet,'计算机':e[i].computer,'交通运输':e[i].transportation,'金融服务':e[i].financialServices,'科研和教育':e[i].researchEducation,'零售':e[i].retail,'媒体':e[i].media,'能源/公用事业':e[i].energyUtilities,'批发/分销':e[i].wholesaleDistribution,'医疗':e[i].medical,'娱乐':e[i].entertainment,'政府':e[i].government,'制造':e[i].manufacturing,'专业服务':e[i].professionalServices,'其他':e[i].Others};
    			var point = new BMap.Point(e[i].lng,e[i].lat);
    			addCharts("divId"+i,arr,point,'公司行业分布','50px');

		        }
		    }
		});
}
 
//根据keword获取经纬度并加上对应的labe
function searchByStationName123(keyword,labe){
    	$.ajax({
		    type: "get",
		    url: control+"/returnLngLatByLocation",	
		    data:{"location":keyword},
		    success:function(e){
		        var opts = {
				  position : new BMap.Point(e[i].lng,e[i].lat),    
				  offset   : new BMap.Size(-10, -10)    //设置文本偏移量
				}
				var label = new BMap.Label(labe, opts);  // 创建文本标注对象
					label.setStyle({
						 color : "red",
						 fontSize : "12px",
						 height : "20px",
						 lineHeight : "20px",
						 fontFamily:"微软雅黑",border:0,backgroundColor:'inherit'
					 });
				map.addOverlay(label);   
		    }
		});
}