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

        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=4Y6d1pJ4c-70ALyyCLD9cxSgAh_aBSrxsQLrpXoyBe8BTtCXmoVTPS1KTU_DnTuPUAV-lBdSxgBMRXC4Jposjiux5STY__kUCd-oRYSpz9wa-Hv0OqFippXqlDSZbNpaWMZcAKDHXK&type=image";
//        $jsonStr = json_encode(array(
//            'component_appid'=>"wx44c377ff043ee764"
//        ));
        $file=dirname(__FILE__).'/121.jpg';
//        echo $file;
        $data['media']='@'.$file;
//       http_post_json($url, $jsonStr);
        $json=http_post_json($url, $data);
//        dump($json);
        echo $json[1];

    }
    public function hello(){
        $json ='{"type":"image","media_id":"lMO8o_pXI_jHBu-gtq99YSeSaVcYA-DeyFPWXccr-FqwaeWHpmC7ne23bH96PWJg","created_at":1487326282}';
    }
}