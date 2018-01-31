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
        $dd =$infos = D('company_distribution')->field('province,SUM(company_no) AS company_no,count(compnay_IBno) AS compnay_IBno,count(RS_20_cities="Y" or null) as rs20,count(OS_20_cities="Y" or null) as os20,count(OS_64_cities="Y" or null) as os64,count(OS_108_cities="Y" or null) as os108')->group('province')->select();
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
        $city =$infos = D('company_distribution')->field('city,SUM(company_no) AS company_no,SUM(compnay_IBno) AS compnay_IBno,count(compnay_IBno) AS compnay_IBno,count(RS_20_cities="Y" or null) as rs20,count(OS_20_cities="Y" or null) as os20,count(OS_64_cities="Y" or null) as os64,count(OS_108_cities="Y" or null) as os108')->where("province = '$type'")->group('city')->select();
       /* header('content-type:text/html;charset=utf-8');
        echo '<pre>';
        var_dump($city);die();
       */
        $this->ajaxReturn($city,'JSON');
    }
    //根据地名返回对应的经纬度
    public function returnLngLatByLocation(){
    	$address = !empty($_GET['location']) ? $_GET['location']:'北京市';
    	
    	$sk = 'B28SnTg2B6Cdw2GfaYq4KUAsfFpe7H1f';
		$url = "http://api.map.baidu.com/geocoder/v2/?address=%s&output=json&ak=4vWwiDYUhYY3S5uLoPbZqUEz&sn=%s";
		$querystring = "address=".$address."&output=json&ak=4vWwiDYUhYY3S5uLoPbZqUEz";  
	    $sn =  md5(urlencode('/geocoder/v2/?'.$querystring.$sk));  
		$target = sprintf($url, urlencode($address), $sn);
		$html = json_decode(file_get_contents($target),true);
		
		$this->ajaxReturn($html,'JSON');
    }
    
}