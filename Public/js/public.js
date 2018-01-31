	var control = $("input#controlerUrl").val();		//获取index控制器地址
    var pub = $("input#publicUrl").val();		//获取index的public地址
//在对应ID上添加数据为data的饼图
  function addCharts(id,data,point,typeName,size){
	var myCompOverlay = new ComplexCustomOverlay(point,id,size);
    map.addOverlay(myCompOverlay);		
    var dom = document.getElementById(id);
			var newData=new Array();
			var myChart = echarts.init(dom);
			for(i in data){
				newData.push({value:data[i],name:i});
			}
			option = {
			    tooltip : {
			        trigger: 'item',
			        formatter: "{a} <br/>{b} : {c} ({d}%)"	
			    },
			    series : [{name: typeName,
			            type: 'pie',
			            hoverAnimation:false,
			            radius : '100%',
			            center: ['50%', '50%'],
			            data: newData,
			            itemStyle: {
			                emphasis: {
			                    shadowBlur: 10,
			                    shadowOffsetX: 0,
			                    shadowColor: 'rgba(0, 0, 0, 0.5)'
			                }
			            },
			            labelLine:false,
			            label:false
			        }
			    ]
			}
			myChart.setOption(option, true);
		}
    function ComplexCustomOverlay(point, divID,size){
      this._point = point;
      this._divID = divID;
      this._size = size;
      
    }
    ComplexCustomOverlay.prototype = new BMap.Overlay();
    ComplexCustomOverlay.prototype.initialize = function(map){
      this._map = map;
      var div = this._div = document.createElement("div");
      div.style.position = "absolute";
      div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);
      div.style.backgroundColor = "#EE5D5B";
      div.style.width = this._size;
      div.style.height = this._size;
      div.id=this._divID;
      map.getPanes().labelPane.appendChild(div);
      
      return div;
    }
    ComplexCustomOverlay.prototype.draw = function(){
      var map = this._map;
      var pixel = map.pointToOverlayPixel(this._point);
      this._div.style.left = pixel.x+"px";
      this._div.style.top  = pixel.y +"px";
    }


//根据keword获取经纬度并加上对应的labe
function searchByStationName(keyword,labe){
    	$.ajax({
		    type: "get",
		    url: control+"/returnLngLatByLocation",	
		    data:{"location":keyword},
		    success:function(e){
		        var opts = {
				  position : new BMap.Point(e.lng,e.lat),    
				  offset   : new BMap.Size(-10, -10)    //设置文本偏移量
				}
				var label = new BMap.Label(labe, opts);  // 创建文本标注对象
					label.setStyle({
						 color : "orange",
						 fontSize : "12px",
						 height : "20px",
						 lineHeight : "20px",
						 fontFamily:"微软雅黑",border:0,backgroundColor:'inherit'
					 });
				map.addOverlay(label);   
		    }
		});
}