<?php
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL,"https://portal.sejong.ac.kr/jsp/login/login_action.jsp"); //접속할 URL 주소
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 인증서 체크같은데 true 시 안되는 경우가 많다.
// default 값이 true 이기때문에 이부분을 조심 (https 접속시에 필요)
curl_setopt ($ch, CURLOPT_SSLVERSION,3); // SSL 버젼 (https 접속시에 필요)
curl_setopt ($ch, CURLOPT_HEADER, 1); // 헤더 출력 여부
curl_setopt ($ch, CURLOPT_POST, 1); // Post Get 접속 여부
curl_setopt ($ch, CURLOPT_POSTFIELDS, "id=15011098&pw=!j311311&loginUrl=uisloginSSL.jsp&rtUrl=uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN"); // Post 값 Get 방식처럼적는다.
curl_setopt ($ch, CURLOPT_TIMEOUT, 30); // TimeOut 값
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); // 결과값을 받을것인지
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;
?>
