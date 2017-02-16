<?php
/**
 * Created by PhpStorm.
 * User: Xcube
 * Date: 2017/2/8
 * Time: 14:37
 * 接受微信component_verify_ticket
 */
namespace Wechat\Controller;

use Org\Util;
use Think\Controller;

//include_once "../Think/Library/Org/Util/wxBizMsgCrypt.class.php";

class EventController extends Controller
{
    private $token;

    public function index()
    {
        import('Org.Util.wxBizMsgCrypt.class.php');
        // 第三方发送消息给公众平台s
        $encodingAesKey = "kjJlI5Z3ycmi8lWEIHwOcUF42QwyZw1tBl9WHJqwDUw";
        $token = "hZJ6fC3Rr3BHc3jR683hSf13p3s7lfbr";
        $this->token = $token;
        $appId = "wx44c377ff043ee764";
        $timeStamp = empty($_GET['timestamp']) ? "" : trim($_GET['timestamp']);
        $nonce = empty($_GET['nonce']) ? "" : trim($_GET['nonce']);
        $msg_sign = empty($_GET['msg_signature']) ? "" : trim($_GET['msg_signature']);
        $encryptMsg = file_get_contents('php://input');
        $pc = new \Org\Util\wxBizMsgCrypt($token, $encodingAesKey, $appId);

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $encrypt = $array_e->item(0)->nodeValue;

        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);

// 第三方收到公众号平台发送的消息
        $msg = '';
        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            $xml = new \DOMDocument();
            $xml->loadXML($msg);
            $array_e = $xml->getElementsByTagName('ComponentVerifyTicket');
            $component_verify_ticket = $array_e->item(0)->nodeValue;
            $sql = M('verify');
            $data['component_verify_ticket'] = $component_verify_ticket;
            $data['appId'] = $appId;
            $data['token'] = $token;
            $data['encodingAesKey'] = $encodingAesKey;
            $data['time'] = date('Y-m-d H:i:s', time());

//            $result = $sql->add($data);
            $flag = $sql->where('token="'.$token.'"')->select();
            if ($flag) {
                $update = array('component_verify_ticket'=>$component_verify_ticket,'time'=>$data['time']);
                $result = $sql->where('token="'.$token.'"')->setField($update);
                $sql->where('token="'.$token.'"')->setInc('verify_ticket_number');
                $num = $sql->where('token="'.$token.'"')->getField('verify_ticket_number');
                echo $num.'click';
                if ($num > 10) {
                    $this->getAccessToken();
                    $sql->where('token="'.$token.'"')->setField('verify_ticket_number', '');
                }
            } else {
                $result = $sql->add($data);
            }
            if ($result) {
                echo 'success';
            }
        } else {
            print($errCode . "\n");
        }

    }

    public function test()
    {
        $token = 'hZJ6fC3Rr3BHc3jR683hSf13p3s7lfbr';
        $this->token=$token;
        echo 'token:'.$this->token."\n";
        $component_verify_ticket='ticket@@@dqi9F0hd9Sjw5vVoFijT-Zbl18qTVoxfH00PTyjCCR0NqqiehuVH_cvZMxXmOCuW7mnpKuUWiDT7Qv6U2rrkvg';
        $data['token'] = $component_verify_ticket;
        $data['time'] =date('Y-m-d H:i:s', time());
        $sql = M('verify');
        $flag = $sql->where('token="'.$token.'"')->limit(1)->select();
        if ($flag) {
//            echo 'ddd';
            $sql = M('verify');
            $update = array('component_verify_ticket'=>$component_verify_ticket,'time'=>$data['time']);
            $result = $sql->where('token="'.$token.'"')->setField($update);
            $sql->where('token="'.$token.'"')->setInc('verify_ticket_number');
            $num = $sql->where('token="'.$token.'"')->getField('verify_ticket_number');
            echo $num.'click';
            if ($num > 10) {
                $this->getAccessToken();
                $sql->where('token="'.$token.'"')->setField('verify_ticket_number', '');
            }
        } else {
            $result = $sql->add($data);
        }
        if ($result) {
            echo 'success';
        }

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
    //请求component_access_token
    function getAccessToken()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/component/api_component_token";
        $sql = M('verify');
        $info = $sql->where('token="'.$this->token.'"')->find();
        $jsonStr = json_encode(array(
            'component_appid' => $info['appid'],
            'component_appsecret' => 'edbcc1d6f63fab74b124475fd70fdd79',
            'component_verify_ticket' => $info['component_verify_ticket']
        ));
        $json = $this->http_post_json($url, $jsonStr);
//        print_r($json);
        $obj = json_decode($json[1]);
        $data = $obj->component_access_token;
        $sql->where('token="'.$this->token.'"')->setField('remark', "$obj");
        $sql->where('token="'.$this->token.'"')->setField('component_access_token', "$data");
    }

}