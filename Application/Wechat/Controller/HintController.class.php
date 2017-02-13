<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/10
 * Time: 14:35
 */

namespace Wechat\Controller;


use Think\Controller;

class HintController extends    Controller
{
    public function index(){
        echo '授权成功！';
    }
    public function text(){
        $json='{"component_access_token":"TER4o_UDMuAFfv4MVWT3qjQzq8d0LUSYENOhmVnjhKRxuTnvmBdKyY2I7l5uf4zC2h0F7t_cjRvC7sxywuuZ-tAarqfQLnNIN-ODBPRJq6H0RuLIuHZNhghpvxNINH8IXBNbACAGKW","expires_in":7200}';

        $obj=json_decode($json);
//        dump($json) ;
//        dump($obj) ;
        print_r($obj->component_access_token);
//        print_r($obj);
    }
}