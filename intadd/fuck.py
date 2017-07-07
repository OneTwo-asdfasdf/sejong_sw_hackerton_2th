__author__ = 'siback'
import urllib2
import httplib
import datetime, time
import re

sejong_url = "http://uis.sejong.ac.kr/app/modules/sch_sue/sch_sue.SueReqLesnE.do?a=5"\

#COOKIE
COOKIE_USER_INFO = "COOKIE_USER_INFO=7966ff8c6ba924bfa5c1f0a834a2d6a9e179db48f27f1e710fd005d7d8af02de7905c40745148a342a9a1bfe60b1f37bee9c15a0db41bd48ec343704086e9e27c1d9d82e55dfabe1184a511b3938a7a48adac0d4ab381b8e47b863d0ab52b6950a83153e9cf79147d78213cca29632b04cedba039ad0b18a3ffec6709e3885586769b6fd440ea5394ab0a3afff3477753a2bc0632eb4c99bad1b5a27c922616eddfdf596b55e55d4151367c4e5827e6babf8d2ee4ef5b0d41b10b1bdedb5e8f76769b6fd440ea5394ab0a3afff347775a7f957a8bb5e0a3283974f0ec71a752e7a3d1d20f531bc185723eb68d6dab8915285380f5962bce323dc9f15259bc28fc0dbd3aa6cf0c7563934155287d643cee7c179f238ee94628593f9c379ea47117be753ab129991ee17c44fdbf44414480dfb34b3ef656b4dac231e35c7302bfcc76415dbb89409c00c482230f214d2c05aa7b9a8046eddfe97a422afb16ae4721a497659327635127f30b8e6e4eb77818f9bfa2940a22e23bc50c7a168ac5df0efa82725d2afcf659dc9a370c66b79ec85cd17ac0ff37a9b99dfcb0ab2d5d53e887f52d50472cf9014a8dc570cb760f1a86dc546c65d3c57e6ccbcb69ff61ea1;"
SJ_SESSION_ID = "SJ_JSESSIONID=MA0Xzwkh5JQlOuxlW8EKQX1DKVpOANb0GywJY72vzK0zOklo0v1T!269702243;"
ssotoken = "ssotoken=Vy3zFySFx5FGWzTyGIDx5FSEJONGzCy1423705968zPy86400zAy33zEyb828NAY2FWLbUCvx783GKK4w2hx79teVwL49CjVJeZlo4ALOqQVMUihlnwcUNx2FG3x78bCb0XoEOt905erB8OeCamx7AZjcFmOih21x2FNx2FoY4x79x2B90L837fnreOG865vm3LmK86vAX7TdQDUTx7ATnor0bV3oFx78343gx3Dx3DzKy2IlTkMD9eSALiiAesXkaSQx3Dx3DzSSy00000045040zUURyeae1401a714f004ezMy9iH8x79Swx2Fttsx3Dz;"
COOKIE_HEADER=COOKIE_USER_INFO+SJ_SESSION_ID+ssotoken

########################Login Logic
headers = {  'Referer': "https://portal.sejong.ac.kr/jsp/login/uisloginSSL.jsp",
                    'Origin': "https://portal.sejong.ac.kr",
                    'Content-Length': "123",
                    'Cache-Control': "max-age=0",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'Accept-Encoding': 'gzip, deflate',
                    'Connection': "keep-alive",
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept':"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"
}

#First
ssl_uis = httplib.HTTPSConnection('localhost', 8888)
ssl_uis.set_tunnel('uis.sejong.ac.kr')
ssl_uis.request("GET", '/app/loginSSL.jsp',headers={'Host': "uis.sejong.ac.kr",
                    'Referer': "http://uis.sejong.ac.kr/",
                    'User-Agent': "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36",
                    'Accept-Encoding': 'gzip, deflate, sdch',
                    'Connection': "close",
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept':"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"})
ssl_uis_response = ssl_uis.getresponse().getheader('set-cookie')
wmonid_cookie = ssl_uis_response[0:19]
print wmonid_cookie

#Second
ssl_po = httplib.HTTPSConnection('localhost', 8888)
ssl_po.set_tunnel('portal.sejong.ac.kr')
#ssl_login_data =  "rtUrl=uis.sejong.ac.kr%2Fapp%2Fsys.Login.servj%3FstrCommand%3DSSOLOGIN&loginUrl=uisloginSSL.jsp&id=112102&password=dltl6034"
ssl_po.request("POST", '/jsp/login/uisloginSSL.jsp', headers={ 'Host': "portal.sejong.ac.kr",'Referer': "https://uis.sejong.ac.kr/app/loginSSL.jsp",
                    'Accept-Encoding': 'gzip, deflate, sdch',
                    'Connection': "close",
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept':"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"})
ssl_po_response = ssl_po.getresponse().getheader('set-cookie')
po_cookie = ssl_po_response[0:79]
print po_cookie

#Third
#date = datetime.datetime.fromtimestamp(time.time()).strftime('%a, %d %b %Y %H:%M:%S GMT')
ssl_po = httplib.HTTPSConnection('localhost', 8888)
ssl_po.set_tunnel('portal.sejong.ac.kr', 443)
ssl_login_data =  "rtUrl=uis.sejong.ac.kr%2Fapp%2Fsys.Login.servj%3FstrCommand%3DSSOLOGIN&loginUrl=uisloginSSL.jsp&id=112102&password=dltl6034"
ssl_po.request("POST", '/jsp/login/login_action.jsp', headers={ 'Host': "portal.sejong.ac.kr",
                    'Connection': "close",
                    'Content-Length': "123",
                    'Cache-Control': "max-age=0",
                    'Accept':"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
                    'Origin': "https://portal.sejong.ac.kr",
                    'User-Agent': "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'Referer': "https://portal.sejong.ac.kr/jsp/login/uisloginSSL.jsp",
                    'Accept-Encoding': 'gzip, deflate',
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Cookie': po_cookie+ssotoken})

ssl_po_response = ssl_po.getresponse().getheader('set-cookie')
ssotoken_cookie = ssl_po_response[0:79]
print ssotoken_cookie

#Fourth
ssl_uis.request("GET", '/app/sys.Login.servj?strCommand=SSOLOGIN', headers={ 'Host': "uis.sejong.ac.kr",
                    'Cookie': wmonid_cookie+ssotoken_cookie,
                    'Accept-Encoding': 'gzip, deflate, sdch',
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept':"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8"})
ssl_uis_response = ssl_uis.getresponse().read()
print ssl_uis_response
time.sleep(5)

