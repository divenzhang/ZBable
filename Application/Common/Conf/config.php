<?php
return array(
	//'配置项'=>'配置值'


    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'ding',      // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',    // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  'xf_',       // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'SHOW_PAGE_TRACE' 		=>	false,		 //开启页面trace
    'DOMAIN'                =>  'http://127.0.0.1',
    'WEB_NAME'				=>	'测试',



    'DEFAULT_FILTER'        =>  'htmlspecialchars,trim', // 默认参数过滤方法 用于I函数...
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Wechat'),
    'DEFAULT_MODULE'       =>    'Home',
);