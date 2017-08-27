<?php
/*
$tuling_app_key = '99508efec6d94421ae83b02954212cb3';
$timestamp = $_GET['timestamp'];//timestamp其实就是一个时间戳
$nonce     = $_GET['nonce'];//nonce是一个随机参数
$signature = $_GET['signature'];//这个signature其实就是在微信公众平台已经加密好的字符串
$echostr   = $_GET['echostr'];
 */
$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
$url = "http://123.206.30.197:8880/wx";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postArr);
$data = curl_exec($ch);
curl_close($ch);
print($data);
/*
$array     = array($timestamp, $nonce, $token);
sort($array);
$tmpstr = implode('', $array);
$tmpstr = sha1($tmpstr);

if( $tmpstr == $signature && $echostr){
  echo $echostr;
  exit;
}
$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
$postObj = simplexml_load_string( $postArr );
$data_sink = $postObj->Content;
$template1 = "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <Content><![CDATA[%s]]></Content>
  </xml>";
$fromUser = $postObj->ToUserName;//消息从哪里来
$toUser   = $postObj->FromUserName;//发送给谁
$time     = time();	
$msgType  = 'text';
$post_data = [
  'perception' => [
    'inputText' => [
      'text' => mb_convert_encoding($data_sink, 'UTF-8', 'UTF-8'),//iconv('UTF-8', 'GBK', $data_sink),
    ],
  ],
  'userInfo' => [
    'apiKey' => $tuling_app_key,
    'userId' => str_replace('_', '', iconv('GBK', 'UTF-8', $fromUser)),
  ],
];
$json_post_data = json_encode($post_data);
$url = 'http://openapi.tuling123.com/openapi/api/v2';
header("Content-type: application/json; charset=utf-8"); 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL , $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS , $json_post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec ( $ch ) ;
$content = json_decode($result);
echo sprintf($template1, $toUser, $fromUser,$time, $msgType, $content->results[0]->values->text);
*/
