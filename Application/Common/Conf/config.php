<?php
return array(
    'SHOW_PAGE_TRACE'   =>  false,
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '55599dea9ed20.sh.cdb.myqcloud.com', // 服务器地址
    'DB_NAME'               =>  'EMC_OMS_Visualization',          // 数据库名
    'DB_USER'               =>  'OMS_Visualizatio',      // 用户名
    'DB_PWD'                =>  '1XBwt4Psh5',          // 密码
    'DB_PORT'               =>  '6111',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
     
    'DEFAULT_FILTER'        =>  'trim,htmlspecialchars',
    
    'MODULE_ALLOW_LIST'     =>  array('Home'),
   /* 'SHOW_PAGE_TRACE'   =>  false,
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'icbc',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
     
    'DEFAULT_FILTER'        =>  'trim,htmlspecialchars',
    
    'MODULE_ALLOW_LIST'     =>  array('Home'),*/
    /*
     'TMPL_ENGINE_TYPE'  =>  'smarty',
    'TMPL_ENGINE_CONFIG'    =>array(
        'caching'       =>  1,
        'compile_dir'   =>  './Application/Runtime/Cache/Home/',
        'cache_dir'     =>  './Application/Runtime/Temp/Home/',
        'left_delimiter'    =>  '{*',
        'right_delimiter'   =>  '*}',
    )
     * 
     */
    /*
    //'配置项'=>'配置值'
    'URL_ROUTER_ON'         =>  true,   // 是否开启URL路由
    'URL_ROUTE_RULES'       =>  array(
        'aa'  =>  'goods/index',
        'bb'  =>    'goods/add'
    ), // 默认路由规则 针对模块
     * 
     */
    'DB_PARAMS'    			=>  array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
     
);