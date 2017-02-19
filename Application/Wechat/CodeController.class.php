<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/10
 * Time: 14:31
 */

namespace Wechat\Controller;
use Think\Controller;

class CodeController extends Controller
{
    public function index(){
        function http_post_json($url, $jsonStr)
        {
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

        $url = "https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token=07s2WQlfiULIopd7PP4-sOj8Pq6WlgiAWLWWyB3em4LVVqkXSR6GbVMdNsnjFFQdOlOg5gQvEQb6OpuTQSW-TYBTHUgxDkWlEqTTM8RK8-kUCFiAEAHPS";
        $jsonStr = json_encode(array(
            'component_appid'=>"wx44c377ff043ee764"
        ));
//       http_post_json($url, $jsonStr);
        $json=http_post_json($url, $jsonStr);
        dump($json);
        echo '解析：'.$json[1];

    }
}