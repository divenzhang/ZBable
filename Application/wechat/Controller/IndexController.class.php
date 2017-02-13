<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/8
 * Time: 11:42
 */
namespace wechat\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index(){
//        function send_post($url, $post_data) {
//
//            $postdata = http_build_query($post_data);
//            $options = array(
//                'http' => array(
//                    'method' => 'POST',
//                    'header' => 'Content-type:application/x-www-form-urlencoded',
//                    'content' => $postdata,
//                    'timeout' => 15 * 60 // 超时时间（单位:s）
//                )
//            );
//            $context = stream_context_create($options);
//            $result = file_get_contents($url, false, $context);
//            echo 'success';
//            echo $result;
//            return $result;
//
//        }
//
////使用方法
//        $data = array(
//            'component_appid'=>"wx44c377ff043ee764" ,
//            'component_appsecret' =>  'edbcc1d6f63fab74b124475fd70fdd79',
//            'component_verify_ticket' => 'ticket@@@x29eSv4QMUFpSo0cIU8xNqDOBnGrR-tsys8KpfgnOWf-mljD7HJZ_picDzDFZMivwywyvLKtcFvec1hjKAJDaA'
//        );
//        $post_data =json_encode($data);
//        send_post('https://api.weixin.qq.com/cgi-bin/component/api_component_token', $post_data);



        function http_post_json($url, $jsonStr)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json; charset=utf-8',
                    'Content-Length: ' . strlen($jsonStr)
                )
            );
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            return array($httpCode, $response);
        }

        $url = "https://api.weixin.qq.com/cgi-bin/component/api_component_token";
        $jsonStr = json_encode(array(
            'component_appid'=>"wx44c377ff043ee764" ,
            'component_appsecret' =>  'edbcc1d6f63fab74b124475fd70fdd79',
            'component_verify_ticket' => 'ticket@@@ecEpiRmfZGRPiH3ijS1Tl5qWDzYHnrCmFZAeStUdcXKSM3-5pzJ0MEmjIaLsUzijz_6Rpi8SKd8AvDO0TcjYIg'
        ));
//       http_post_json($url, $jsonStr);
        $json=http_post_json($url, $jsonStr);
        dump($json);
        echo '解析：'.$json[1];
    }
}