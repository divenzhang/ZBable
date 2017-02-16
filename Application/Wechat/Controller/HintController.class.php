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
        $auth_code = empty($_GET['auth_code']) ? "" : trim($_GET['auth_code']);
        $expires_in =empty($_GET['expires_in'])?"":trim($_GET['expires_in']);


        echo '授权成功！';
    }
    public function text(){
        $json='{"component_access_token":"TER4o_UDMuAFfv4MVWT3qjQzq8d0LUSYENOhmVnjhKRxuTnvmBdKyY2I7l5uf4zC2h0F7t_cjRvC7sxywuuZ-tAarqfQLnNIN-ODBPRJq6H0RuLIuHZNhghpvxNINH8IXBNbACAGKW","expires_in":1800}';

//        $obj=json_decode($json);
//        dump($json) ;
//        dump($obj) ;
//        print_r($obj->component_access_token);
//        print_r($obj);
//$one = strtotime('2017-02-15 07:02:40');//开始时间 时间戳
//$tow = strtotime('2017-02-15 08:02:40');//结束时间 时间戳
//$cle = $tow - $one; //得出时间戳差值
//        echo $cle;
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//        $txt = "Bill Gates\n";
        fwrite($myfile, $json);
        $txt = "Steve Jobs\n";
        fwrite($myfile, $txt);
        fclose($myfile);

    }
    public function getfile(){
//        $myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
//        $token= fread($myfile,filesize("newfile.txt"));
//        echo $token;
//        $jsoncode =json_decode($token);
//        echo 'jsoncode:'.$jsoncode->component_access_token;
//        fclose($myfile);
        $url ='http://www.baidu.com';
        redirect("$url",0, '页面跳转中...');
    }
}