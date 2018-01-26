
function searchByStationName(keyword,labe){
    localSearch.search(keyword);  
    localSearch.setSearchCompleteCallback(function(searchResult){  
      	var poi = searchResult.getPoi(0);
      	var opts = {
		  	position : new BMap.Point(poi.point.lng,poi.point.lat),   
		  	offset   : new BMap.Size(0, 0)    //设置文本偏移量
		}
		var label = new BMap.Label(labe, opts);  // 创建文本标注对象
		label.setStyle({
			 color : "black",
			 fontSize : "9px",
			 height : "15px",
			 lineHeight : "15px",
			 fontFamily:"微软雅黑",
          	 border:0,
          	 backgroundColor:'inherit'
		});

		map.addOverlay(label); 
    });  
}