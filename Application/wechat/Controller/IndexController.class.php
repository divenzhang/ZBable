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
    public function index(){
        $auth_code = empty($_GET['auth_code']) ? "" : trim($_GET['auth_code']);
        $expires_in =empty($_GET['expires_in'])?"":trim($_GET['expires_in']);
        echo $auth_code;
        echo $expires_in;
        $this->display();
    }

    public function dologin(){
        $auth = M('auth');
        $verdb =M('verify');
        $data =$auth->find();
        $time =date('Y-m-d H:i:s',time());
        echo 'time:'.$time."\n";
        $code_time=$data['time'];
        echo 'ctime:'.$code_time."\n";
        $time_diff =strtotime($time)-strtotime($code_time);
        echo 'dtime:'.$time_diff."\n";
        if ($time_diff>1800){
//            $data['tip']= "时间过期！";
            $verify =$verdb->find();
            print_r($verify);
            $url='https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$verify['component_access_token'].'';
            $jsonStr = json_encode(array(
                'component_appid' => $verify['appid']
            ));
            $json = $this->http_post_json($url, $jsonStr);
            print_r($json);
            $obj = json_decode($json[1]);
            $data['pre_auth_code'] = $obj->auth_code;
            $data['expires_in'] =$obj->expires_in;
            $auth->where('id=1')->save($data);
            $this->qrcode($data['pre_auth_code'],$verify['appid']);

        }else{
//            $data['tip']= '时间有效！';
            $pre_auth=$auth->getField('pre_auth_code');
            print_r($pre_auth);
            $appid =$verdb->getField('appid');
//            echo "auth_code:".$auth_code;
            $this->qrcode($pre_auth,$appid);
        }
    }
    function  qrcode($authcode,$appid){
        $url ='https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid='.$appid.'&pre_auth_code='.$authcode.'&redirect_uri=http://jentmc.cn/wechat/';
        redirect("$url", 0, '页面跳转中...');

    }

    //网络请求方法
    function http_post_json($url, $jsonStr)
    {
        echo 'url:'.$url;
        dump($jsonStr);
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $jsonStr);
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