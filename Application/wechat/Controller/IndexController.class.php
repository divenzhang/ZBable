<?php

/**
 * Created by PhpStorm.
 * User: XCube
 * Date: 2017/2/8
 * Time: 11:42
 */
namespace wechat\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $this->display();
    }
    public function jump(){
        $url ='http://jentmc.cn/wechat/';
        $auth_code = empty($_GET['auth_code']) ? "" : trim($_GET['auth_code']);
        $this->authorization_info($auth_code);
        redirect("$url", 0, '页面跳转中...');
    }
    //请求公众号信息

    function authorization_info($auth_code){
        $verdb =M('verify');
        $authorization =M('authorization');
        $verdata =$verdb->find();
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$verdata['component_access_token'].'';

        $jsonStr = json_encode(array(
            "component_appid"=>$verdata['appid'] ,
            "authorization_code"=>$auth_code
        ));
        $json = $this->http_post_json($url, $jsonStr);
        $obj = json_decode($json[1]);
        $auth_info=$obj->authorization_info;
        $data['authorizer_appid']=$auth_info->authorizer_appid;
        $data['authorizer_access_token']=$auth_info->authorizer_access_token;
        $data['authorizer_refresh_token']=$auth_info->authorizer_refresh_token;
        $data['time']=date('Y-m-d H:i:s',time());
        $exist=$authorization->where('authorizer_appid="'.$data['authorizer_appid'].'"')->getField('authorizer_appid');
        if ($exist){
            $authorization->where('authorizer_appid="'.$data['authorizer_appid'].'"')->save($data);
        }else{
            $authorization->add($data);
        }


    }
//获取登录二维码
    public function dologin()
    {
        $auth = M('auth');
        $verdb = M('verify');
        $date = $auth->find();
        $time = date('Y-m-d H:i:s', time());
        $code_time = $date['time'];
        $time_diff = strtotime($time) - strtotime($code_time);
        if ($time_diff > 1800) {
            $verify = $verdb->find();
            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$verify['component_access_token'].'';
            echo $url;
            $jsonStr = json_encode(array(
                'component_appid' => $verify['appid']
            ));
            $json = $this->http_post_json($url, $jsonStr);
            $obj = json_decode($json[1]);
            $data['pre_auth_code'] = $obj->pre_auth_code;
            $data['time'] = date('Y-m-d H:i:s', time());
            if (!empty($data['pre_auth_code'])){
                $auth->where('id=1')->save($data);
                $pre_code =$auth->getField('pre_auth_code');
                $this->qrcode($pre_code, $verify['appid']);
            }else{
                echo 'null';
            }


        } else {
            $pre_auth = $auth->getField('pre_auth_code');
            $appid = $verdb->getField('appid');
            $this->qrcode($pre_auth, $appid);
        }
    }
//跳转二维码
    function qrcode($authcode, $appid)
    {
        $url = 'https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=' . $appid . '&pre_auth_code=' . $authcode . '&redirect_uri=http://jentmc.cn/wechat/Index/jump';
        redirect("$url", 0, '页面跳转中...');

    }

    //网络请求方法
    function http_post_json($url, $jsonStr)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array($httpCode, $response);
    }
}