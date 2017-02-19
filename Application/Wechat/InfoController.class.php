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
//        fwrite($user_msg,$appid);
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
            $user_msg = fopen("usermsg.txt", "w") or die("Unable to open file!");
//        $txt = "Bill Gates\n";
//            fwrite($user_msg,$content);
//            fwrite($user_msg,$FromUserName,$ToUserName);
//            fclose($user_msg);

            $media_id='BAfjsAIuHNZaNgMgPS8-NY2Wh3e-yk0KRNvj9DDQAeqzSBV3W6RSRYOFA89Vavti';




//            加密消息
            $encryptMsg = '';
            $time=date('Y-m-d H:m:i',time());
            $text = "<xml>
                    <ToUserName><![CDATA[$FromUserName]]></ToUserName>
                    <FromUserName><![CDATA[$ToUserName]]></FromUserName>
                    <CreateTime>$time</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
                    <Image>
                        <MediaId><![CDATA[$media_id]]></MediaId>
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

}