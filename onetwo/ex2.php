<?php
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL,"https://portal.sejong.ac.kr/jsp/login/login_action.jsp");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt ($ch, CURLOPT_SSLVERSION,3);
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS,"id=15011098&pw=!j311311&loginUrl=uisloginSSL.jsp&rtUrl=uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN");
curl_setopt ($ch, CURLOPT_TIMEOUT, 300);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;
?>
