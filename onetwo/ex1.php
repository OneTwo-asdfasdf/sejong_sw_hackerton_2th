<?php
$post_data = array(
"rtUrl" => "uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN"
,"loginUrl" => "uisloginSSL.jsp"
,"id" => "15011098"
,"password" => "!j311311"
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://portal.sejong.ac.kr/jsp/login/login_action.jsp');
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt ($ch, CURLOPT_SSLVERSION,3);
curl_setopt ($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

$result =curl_exec($ch);
curl_close($ch);
echo $result;
?>
