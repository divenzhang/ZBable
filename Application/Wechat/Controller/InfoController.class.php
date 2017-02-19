<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/17
 * Time: 9:36
 */

namespace Wechat\Controller;
use Think\Controller;

class InfoController extends Controller
{
    private $token;
    private $picid;
    public function index(){
        import('Org.Util.wxBizMsgCrypt.class.php');
        // 第三方发送消息给公众平台s
        $encodingAesKey = "kjJlI5Z3ycmi8lWEIHwOcUF42QwyZw1tBl9WHJqwDUw";
        $token = "hZJ6fC3Rr3BHc3jR683hSf13p3s7lfbr";
        $this->token = $token;
        $appId = "wx44c377ff043ee764";
        $timeStamp = empty($_GET['timestamp']) ? "" : trim($_GET['timestamp']);
        $nonce = empty($_GET['nonce']) ? "" : trim($_GET['nonce']);
        $msg_sign = empty($_GET['msg_signature']) ? "" : trim($_GET['msg_signature']);
        $appid = empty($_GET['appid']) ? "" : trim($_GET['appid']);
        $newappid =str_replace('/','',$appid);
        $encryptMsg = file_get_contents('php://input');
        $pc = new \Org\Util\wxBizMsgCrypt($token, $encodingAesKey, $appId);

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $encrypt = $array_e->item(0)->nodeValue;

        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);
//        $user_msg = fopen("usermsg.txt", "w") or die("Unable to open file!");
////        $txt = "Bill Gates\n";
//        fwrite($user_msg,$encryptMsg);
//        fwrite($user_msg,$newappid);
//        fclose($user_msg);

// 第三方收到公众号平台发送的消息
        $msg = '';
        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            $xml = new \DOMDocument();
            $xml->loadXML($msg);

            $array_e = $xml->getElementsByTagName('Content');
            $content = $array_e->item(0)->nodeValue;

            $array_e2 = $xml->getElementsByTagName('ToUserName');
            $ToUserName = $array_e2->item(0)->nodeValue;

            $array_e3 = $xml->getElementsByTagName('FromUserName');
            $FromUserName = $array_e3->item(0)->nodeValue;

            $array_e5 = $xml->getElementsByTagName('MsgType');
            $MsgType = $array_e5->item(0)->nodeValue;

//            fwrite($user_msg,$FromUserName,$ToUserName);
//            fclose($user_msg);

//            $media_id='BAfjsAIuHNZaNgMgPS8-NY2Wh3e-yk0KRNvj9DDQAeqzSBV3W6RSRYOFA89Vavti';
            $authDB= M('authorization');
            $atoken =$authDB->where('authorizer_appid ="'.$newappid.'"')->getField('authorizer_access_token');

//            $postdata = array('name'=>"$content",'access_token'=>"$atoken");
//            $media_id =$this->postTo($postdata);
            $postdata=array('name'=>$content,'access_token'=>$atoken);
            $user_msg = fopen("usermsg.txt", "w") or die("Unable to open file!");
            fwrite($user_msg,$postdata);
            $url='http://zb.jentmc.cn/index.php?s=/addon/Toy/Toy6/checks_img';

//            $callback = $this->http($url,$postdata);
//            $callback = $this->http_post_json($url,$postdata);
////            $media_data=$callback[1];
//            $media_json=json_decode($callback[1]);
//            $content =$media_json->content;
//
//            $con_json=json_decode($content);
//            $media_id=$con_json->media_id;
            $media_id=$this->http($url,$postdata);
            dump($media_id[1]);
            $aa =json_decode($media_id[1]);
            dump($aa);
            $content =$aa->content;
            dump($content);
            $bbb=json_decode($content);
            $tokena =$bbb->media_id;
//            $user_msg = fopen("usermsg.txt", "w") or die("Unable to open file!");
//            fwrite($user_msg,$postdata);

//            加密消息
            $encryptMsg = '';
            $time=date('Y-m-d H:m:i',time());
            $text = "<xml>
                    <ToUserName><![CDATA[$FromUserName]]></ToUserName>
                    <FromUserName><![CDATA[$ToUserName]]></FromUserName>
                    <CreateTime>$time</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
                    <Image>
                        <MediaId><![CDATA[$tokena]]></MediaId>
                    </Image>
                    </xml>";

            $errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
            echo $encryptMsg;
            if ($errCode ==0){

            }else{
                print($errCode . "\n");
            }
            exit();
//            if ($result) {
//                echo 'success';
//            }
        } else {
            print($errCode . "\n");
        }

    }
    public function test(){
        $authDB=M('authorization');
        $atoken =$authDB->getField('authorizer_access_token');
//        echo $atoken;
        $postdata =array('name'=>'baba','access_token'=>'qiWNQRxyS49Hfy9Qxj6bsOQnGjyPHjkuzKY-pAi68LyO9UXzX23mqToZdtyLmzJCz-wSyFJkrATNBtDwosf62cb3heRaLyw8Q4JtV5I64CVaL-Gdft92NE-E_UGaBQE8XNWeAFDQGP');
//        $media_id =$this->postTo($postdata);
        $url='http://zb.jentmc.cn/index.php?s=/addon/Toy/Toy6/checks_img';
        $media_id=$this->http_post_json($url,$postdata);
        dump($media_id[1]);
        $aa =json_decode($media_id[1]);
        dump($aa);
        $content =$aa->content;
        dump($content);
        $bbb=json_decode($content);
        $tokena =$bbb->media_id;
        dump($tokena);
//        print_r('media:'.$media_id) ;
//        $data=array('name'=>'66','access_token'=>'4Y6d1pJ4c-70ALyyCLD9cxSgAh_aBSrxsQLrpXoyBe8BTtCXmoVTPS1KTU_DnTuPUAV-lBdSxgBMRXC4Jposjiux5STY__kUCd-oRYSpz9wa-Hv0OqFippXqlDSZbNpaWMZcAKDHXK');
//
//        $url='http://zb.jentmc.cn/index.php?s=/addon/Toy/Toy6/checks_img';
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch,CURLOPT_TIMEOUT,10);
//        curl_setopt($ch, CURLOPT_POST, 1 );
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
//        curl_setopt($ch, CURLOPT_NOBODY,false);
//        $s = curl_exec($ch);
//        curl_close($ch);
//        print_r($s);
    }
    function postTo($data){
        $url='http://zb.jentmc.cn/index.php?s=/addon/Toy/Toy6/checks_img';

        $json = $this->http_post_json($url,$data);
        dump($json);
        print_r('json:'.$json."\n");
        $media_id = $json[1];
//        $obj2=json_decode($obj);
        dump($media_id);
        print_r('id:'.$media_id->media_id."\n");
//        $media_id='4QRPV-2xhxo-7Vt1Ubn-o6PVKobNJnNDdt-VGI8ARgSSyTe3PzVeGrQYovBdECOv';
        return $media_id;

    }
    function http_post_json($url, $data)
    {
//        echo 'url:'.$url;
//        dump($jsonStr);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY,false);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        $httpCode = 0;
        return array($httpCode, $response);
    }
    function http($url, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY,false);
        $response = curl_exec($ch);
//        $a=json_encode($response);
//        dump($response);
        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        $httpCode = 0;
        return array($httpCode, $response);
    }

}