<?php
/**
 * Created by PhpStorm.
 * User: Xcube
 * Date: 2017/2/15
 * Time: 10:51
 */
namespace Wechat\Controller;

use Think\Controller;

class AuthController extends Controller
{
    public function index()
    {
        $token = "hZJ6fC3Rr3BHc3jR683hSf13p3s7lfbr";
        $sql = M('verify');
        $info = $sql->where('token="' . $token . '"')->find();
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$info['component_access_token'].'';
        echo $url;
        $jsonStr = json_encode(array(
            'component_appid' => $info['appid'],
            'authorization_code' => 'queryauthcode@@@Ij30ED3_PsUNk-jwtZFvtwTOwy93wARCViZ8JHVTZpKHS4SpxMfx6h-vxgp8-SSbsjhL41KViGdmagSPx_5U7Q'
        ));
        $json = $this->http_post_json($url, $jsonStr);
        print_r($json);
        $obj = json_decode($json[1]);
        $data = $obj->component_access_token;
        print_r($data);

    }

    function http_post_json($url, $jsonStr)
    {
//        echo 'url:'.$url;
        dump($jsonStr);
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