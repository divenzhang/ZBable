<?php
/**
  * wechat php test
  */
header('content-type:text/html;charset=utf-8');  
//define your token
define("TOKEN", "xcube");
$wechatObj = new wechatCallbackapiTest();
// $wechatObj->valid();
if($_GET['echostr']){  
    $wechatObj->valid(); //如果发来了echostr则进行验证  
}else{  
    $wechatObj->responseMsg(); //如果没有echostr，则返回消息  
}  
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
                    if($keyword =="hehe"){  
                    $msgType = "text";
                    $contentStr = 'hello world!!!';  
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);  
                    echo $resultStr;                                              
                }else{  
                    $msgType = "text";
                        $contentStr = 'hello wordfang';
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                }  
              		
                }else{
                	echo "Input something...";
                }
            if($keyword =="hehe"){  
                $msgType = "text";
                $contentStr = 'hello world!!!';  
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr);  
                echo $resultStr;                                              
            }else{  
                $msgType = "text";
                $contentStr = '输入hehe试试';  
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr);  
                echo $resultStr;  
            }  

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>