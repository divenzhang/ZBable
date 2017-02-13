<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/13
 * Time: 10:02
 */

namespace Wechat\Controller;

use Think\Controller;

class VerifyController extends Controller
{
    public function index()
    {
        $encodingAesKey = "kjJlI5Z3ycmi8lWEIHwOcUF42QwyZw1tBl9WHJqwDUw";
        $token = "hZJ6fC3Rr3BHc3jR683";
        $appId = "wx44c377ff043ee764";
        $timeStamp = empty($_GET['timestamp']) ? "" : trim($_GET['timestamp']);
        $nonce = empty($_GET['nonce']) ? "" : trim($_GET['nonce']);
        $msg_sign = empty($_GET['msg_signature']) ? "" : trim($_GET['msg_signature']);
        $pc = new \Org\Util\wxBizMsgCrypt();
        $pc->wxBizMsgCrypt($token,$encodingAesKey,$appId);
        $encryptMsg = file_get_contents('php://input');

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML($encryptMsg);
        $array_e = $xml_tree->getElementsByTagName('Encrypt');
        $encrypt = $array_e->item(0)->nodeValue;
        echo $encryptMsg.'$encryptMsg';
        echo 'ddd'.$encrypt;

        $format= "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><[!CDATA[%s]]></Encrypt></xml>";
        $form_xml = sprintf($format,$encrypt);

        //第三方收信息
        $msg="";
        $errCode=$pc->decryptMsg($msg_sign,$timeStamp,$nonce,$form_xml,$msg);
        if ($errCode == 0){
            print ("解密后:"."\n");
        }else{
            print ($errCode."\n");
        }
    }

}