<?php
namespace Home\Controller;
use Home\Model\GridinfoModel;
use Think\Controller;
header('Access-Control-Allow-Origin:*');//允许跨域

class IndexController extends controller {
    public function index(){
    
	    $this->display();
	    
    }
    //2018.01.25 @young 人口密度
    public function macro(){
    	$model = D('macrodata')->field('province,sum(poptotal) as poptotal,sum(area) as area')->group('province')->select();
       /* for ($i=0; $i < count($model); $i++) { 
            $model[$i]['areaPop'] = $model[$i]['poptotal']/$model[$i]['area'];
        }
        header('content-type:text/html;charset=utf-8');
    	var_dump($model);*/
    	$this->ajaxReturn($model,'JSON');
    }
    public function macroCity(){
        $type = I('post.showLi');
        //var_dump($type);
        if ($type == '宁夏') {
            $type = '宁夏回族自治区';
        }
        if ($type == '广西') {
            $type = '广西壮族自治区';
        }
        if ($type == '新疆') {
            $type = '新疆维吾尔自治区';
        }
        if ($type == '西藏') {
            $type = '西藏自治区';
        }
        $model = D('macrodata')->field('city,sum(poptotal) as poptotal,sum(area) as area')->where("province = '$type'")->group('city')->select();
       /* for ($i=0; $i < count($model); $i++) { 
            $model[$i]['areaPop'] = $model[$i]['poptotal']/$model[$i]['area'];
        }
        header('content-type:text/html;charset=utf-8');
        var_dump($model);*/
        $this->ajaxReturn($model,'JSON');
    }
    //2018.01.25 @young 省份公司分布
    public function company(){
    	$type = I('post.valShow');
        $dd =$infos = D()-> /*D('company_distribution')->field('province,SUM(company_no) AS company_no,SUM(company_IBno) AS company_IBno,count(RS_20_cities="Y" or null) as rs20,count(OS_20_cities="Y" or null) as os20,count(OS_64_cities="Y" or null) as os64,count(OS_108_cities="Y" or null) as os108')->group('province')->select();*/query("select *,SUM(company_no) AS company_no,SUM(company_IBno) AS company_IBno,sum(if(RS_20_cities='Y',company_no,0)) AS rs20,sum(if(OS_20_cities='Y',company_no,0)) AS os20,sum(if(os_64_cities='Y',company_no,0)) AS os64,sum(if(os_108_cities='Y',company_no,0)) AS os108 from company_distribution group by province");
       /*header('content-type:text/html;charset=utf-8');
        var_dump($dd);*/
    
    	$this->ajaxReturn($dd,'JSON');
    }
    //城市公司分布
    public function cityCompany(){
        $type = I('post.showLi');
        //var_dump($type);
        if ($type == '宁夏') {
            $type = '宁夏回族自治区';
        }
        if ($type == '广西') {
            $type = '广西壮族自治区';
        }
        if ($type == '新疆') {
            $type = '新疆维吾尔自治区';
        }
        if ($type == '西藏') {
            $type = '西藏自治区';
        }
        if ($type == '内蒙古') {
            $type = '内蒙古自治区';
        }
        //$type ='江苏省';
        $city =$infos =D()-> /*D('company_distribution')->field('city,SUM(company_no) AS company_no,SUM(company_IBno) AS company_IBno,count(RS_20_cities="Y" or null) as rs20,count(OS_20_cities="Y" or null) as os20,count(OS_64_cities="Y" or null) as os64,count(OS_108_cities="Y" or null) as os108')->where("province = '$type'")->group('city')->select();*/query("select company_IBno_city_range,company_no_city_range,city,SUM(company_no) AS company_no,SUM(company_IBno) AS company_IBno,sum(if(RS_20_cities='Y',company_no,0)) AS rs20,sum(if(OS_20_cities='Y',company_no,0)) AS os20,sum(if(os_64_cities='Y',company_no,0)) AS os64,sum(if(os_108_cities='Y',company_no,0)) AS os108 from company_distribution where province = '$type' group by city ");
       /* header('content-type:text/html;charset=utf-8');
        echo '<pre>';
        var_dump($city);die();
       */
        $this->ajaxReturn($city,'JSON');
    }
    //根据地名返回对应的经纬度
    public function returnLngLatByLocation(){
    	$address = !empty($_GET['location']) ? $_GET['location']:'北京市';
		$return = $this->lonLat($address);
//		$html = json_decode($return,true);
		$this->ajaxReturn($return,'JSON');
    }
    
    public function lonLat($arName){
    	$select = D('area_lng_lat')->field('lng,lat')->where("area_name = '".$arName."'")->select();
    	if($select){
    		return $select[0];
    	}else{
    		$sk = 'B28SnTg2B6Cdw2GfaYq4KUAsfFpe7H1f';
			$url = "http://api.map.baidu.com/geocoder/v2/?address=%s&output=json&ak=4vWwiDYUhYY3S5uLoPbZqUEz&sn=%s";
			$querystring = "address=".$arName."&output=json&ak=4vWwiDYUhYY3S5uLoPbZqUEz";
		    $sn =  md5(urlencode('/geocoder/v2/?'.$querystring.$sk));  
			$target = sprintf($url, urlencode($arName), $sn);
			$html = json_decode(file_get_contents($target),true);
			$html['result']['location']['area_name']=$arName;
			$html['result']['location']['level']=$html['result']['level'];
			
			$insert = M("area_lng_lat")->data($html['result']['location'])->add();
			
			return $html['result']['location'];
    	}
    	
    	
    }
    //传递地名参数，获取对应参数下的行业
    public function getInfoByLocation(){
    	if(!empty($_GET['location'])){
    		$infos = D('company_distribution')->field('*')->where("province = '".$_GET['location']."'")->select();
    		
    	}else{
    		$infos = D('company_distribution')->field('province,SUM(company_no) AS company_no,SUM(company_IBno) AS company_IBno,SUM(electricity) AS electricity,SUM(serviceProvider) AS serviceProvider,SUM(internet) AS internet,SUM(computer) AS computer,SUM(transportation) AS transportation,SUM(financialServices) AS financialServices,SUM(researchEducation) AS researchEducation,SUM(retail) AS retail,SUM(media) AS media,SUM(energyUtilities) AS energyUtilities,SUM(wholesaleDistribution) AS wholesaleDistribution,SUM(medical) AS medical,SUM(entertainment) AS entertainment,SUM(government) AS government,SUM(manufacturing) AS manufacturing,SUM(professionalServices) AS professionalServices,SUM(Others) AS Others')->group('province')->select();
    	}
    	for($i=0;$i<count($infos);$i++){
    		$local = ($infos[$i]['city'])?$infos[$i]['city']:$infos[$i]['province'];
    		$return = $this->lonLat($local);
    		$infos[$i]['lng'] =$return["lng"];
    		$infos[$i]['lat'] =$return["lat"];
    	}
//  	echo "<pre>";
//  	print_r($infos);
    	$this->ajaxReturn($infos,'JSON');
    }
}