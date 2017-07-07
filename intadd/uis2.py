import requests

headers={ 'Content-Type': 'application/json; charset=utf-8','User-Agent': 'Mozilla/5.0i' }


data={'rtUrl':'uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN','loginUrl':'uisloginSSL.jsp','id':'16011115','password':'yang1624!'}
cookies={}

url="https://portal.sejong.ac.kr/jsp/login/uisloginSSL.jsp?rtUrl=uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN"
res=requests.post(url,data=data,headers=headers)





