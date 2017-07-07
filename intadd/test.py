# -*- coding:utf-8 -*-
__author__ = 'siback'

import requests
import time
import re
import sys
import pymysql
from bs4 import BeautifulSoup

# 기본 해더 정보 
headers = {  'Host': 'uis.sejong.ac.kr',
	            'Referer': 'http://uis.sejong.ac.kr/app/modules/sch_sug/SugRecordQ.xrf',
                    'Origin': "http://uis.sejong.ac.kr",
                    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36',
                    'Cache-Control': "max-age=0",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'Accept-Encoding': 'gzip, deflate',
                    'Connection': "keep-alive",
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept': "*/*"
}
data={'rtUrl':'uis.sejong.ac.kr/app/sys.Login.servj?strCommand=SSOLOGIN','loginUrl':'uiloginSSL.jsp','id':'16011115','password':'yang1624!'}
url="http://portal.sejong.ac.kr/jsp/login/login_action.jsp"
res=requests.post(url,data=data,headers=headers)

print res.text
print res.cookies
