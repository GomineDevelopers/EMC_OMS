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
    	$model = D('macrodata')->distinct(true)->field('province')->select();
    	
    	$model = D('macrodata')->where("province = '河南省'")->sum('poptotal');
    	var_dump($model);
    	$this->ajaxReturn($model,'JSON');
    }
    //2018.01.25 @young 省份公司分布
    public function company(){
    	$type = I('post.valShow');
        $dd =$infos = D('company_distribution')->field('province,SUM(company_no) AS company_no,count(compnay_IBno) AS compnay_IBno,count(RS_20_cities) as rs20,count(OS_20_cities) as os20,count(OS_64_cities) as os64,count(OS_108_cities) as os108')->/*where("RS_20_cities = 'Y' or OS_20_cities = 'Y' or OS_64_cities = 'Y' or OS_108_cities = 'Y'")->*/group('province')->select();
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
        //$city = D('company_distribution')->distinct(true)->field('city')->where("province = '$type'")->select();
        $city =$infos = D('company_distribution')->field('city,SUM(company_no) AS company_no,SUM(compnay_IBno) AS compnay_IBno')->where("province = '$type'")->group('city')->select();
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
    		$infos = D('company_distribution')->field('province,SUM(company_no) AS company_no,SUM(compnay_IBno) AS compnay_IBno,SUM(electricity) AS electricity,SUM(serviceProvider) AS serviceProvider,SUM(internet) AS internet,SUM(computer) AS computer,SUM(transportation) AS transportation,SUM(financialServices) AS financialServices,SUM(researchEducation) AS researchEducation,SUM(retail) AS retail,SUM(media) AS media,SUM(energyUtilities) AS energyUtilities,SUM(wholesaleDistribution) AS wholesaleDistribution,SUM(medical) AS medical,SUM(entertainment) AS entertainment,SUM(government) AS government,SUM(manufacturing) AS manufacturing,SUM(professionalServices) AS professionalServices,SUM(Others) AS Others')->group('province')->select();
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