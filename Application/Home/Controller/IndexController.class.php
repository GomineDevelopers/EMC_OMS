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
    //2018.01.25 @young 公司分布
    public function company(){
    	$type = I('post.valShow');
    	//var_dump($type);
    	$province = D('company_distribution')->distinct(true)->field('province')->select();
    	//var_dump($province);
    	for ($i=0; $i < count($province) ; $i++) { 
    		//var_dump($province[$i]);
    		$model = D('company_distribution')->where($province[$i])->sum('company_no');
    		$province[$i]['company_no'] = $model;
    		
    	}
    	//header('content-type:text/html;charset=utf-8');
    	//var_dump($province);
    	
    	$this->ajaxReturn($province,'JSON');
    }
}