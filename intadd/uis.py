# -*- coding:utf-8 -*-
data1={'pgauth_sys_id':'SELF_STUD','pgauth_sub_id':'SELF_SUB_30','pgauth_menu_id':'SCH_SUG05_STUD','pgauth_pg_id':'SugRecordQ','pgauth_self_yn':'Y','pgauth_orgn_clsf_map_cd':'MAP-001','pgauth_orgn_clsf_ctrl_yn':'Y','pgauth_auth_depth_cd':'9','pgauth_upd_posb_yn':'Y','pgauth_dwn_posb_yn':'Y','pguser_member_no':'16011115','pguser_login_dt':'20170626130035','pgauth_login_dt':'20170626135759','param_member_no':'16011115','param_login_dt':'20170626130035','strCommand':'List','strOrgnClsfCd':'20','strStudentNo':'16011115','strRecordYn':'Y','strYearSmt':'','strYear':'','strSmtCd':'','strSmtCdNm':'','strConOrgn':''}
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
cookies={'COOKIE_MENU_SYS_ID':'400f96014ce59784a850ad5bf3bd0da6','COOKIE_USER_INFO':'7966ff8c6ba924bfa5c1f0a834a2d6a942f294bb14548e5550cfa60cf3d98e8ab52c73b9c3be2542d5b5afb326aaaf8e77f5f032db17a639a157653576f67dfffcb7fa3540b1afc08657f65ae4246998f92b6832c034718e834f293fe92267738acfcd1371f277e401fa9841fdae5b94d1549f9297ca51ff160572c93f1f5bccbd3f5696003bd9fbdf371efbe16e80828966ed7d1944f45c8e031e3dbeceb67560bf5c970fee923e0dec49196a5eed128f2ddbe4ce8361cdaf5d2ef576e3987bbd3f5696003bd9fbdf371efbe16e8082943d2cf1d6021249cc1ddf4922f1f8ba60bf5c970fee923e0dec49196a5eed12d4a3a27f8b44906ea83ea65ad72b4c2e386bfd186958bd6fe8966602e9edd459c0f84a5b0cb622dd2697213ee4d8ed084dff01fcd6d8f7984ee75e6ac6cae85a689d36e7db21f6eb8e5a1b10dfc50b84ec8de7013068a7abe91f95b0909dd26f176d9d5cdc22da13176952a19ec91c924026317f460051a3dab70e4bca6b8d5437f0cd230cb732e012cfea00df7194158ab15274ca5ae2d313433e16bb6c51b8b65edd8dfde0ef7f2165c9e2a0a7aff8', 'MENU_SHOW_YN':'false','SJ_JSESSIONID':'GxqyiKhCCCjYYk30ElbWeaMW3FNbnYOpnu84eWnVXtWrUBMTpJdh!-910742640'}

url="http://uis.sejong.ac.kr/app/modules/sch_sud/sch_sud.SudBaseScheSelfServQ.do"
data={'pgauth_sys_id':'SELF_STUD','pgauth_sub_id':'SELF_SUB_20','pgauth_menu_id':'SELF_MENU_10','pgauth_pg_id':'SudBaseScheSelfServQ','pgauth_self_yn':'Y','pgauth_orgn_clsf_map_cd':'MAP-001','pgauth_orgn_clsf_ctrl_yn':'Y','pgauth_auth_depth_cd':'9','pgauth_upd_posb_yn':'Y','pgauth_dwn_posb_yn':'Y','pguser_member_no':'16011115','pguser_login_dt':'20170626130035','pgauth_login_dt':'20170626132656','param_member_no':'16011115','param_login_dt':'','strCommand':'List','strOrgnClsfCd':'20','strYear':'2017','strMonth':'06'}



#당학기 성적 조회 쿠키 
cookie1={'WMONID':'zBfg98gYnzY','ssotoken':'Vy3zFySFx5FGW2zTyGIDx5FSEJONGzCy1498464040zPy86400zAy34zEygKunUYRx7AshgbFHglQTjLnx78rx7A0x2FRtvYx7AeYK9Q9SEDVUlx79x2F25jsx2Fx2FNN9tpMh8Ox2Fx2BIN05l9RFoipXOGeCVAqx7AdpBPvLSO1CrGq1vA9OdEPoJFqEhcEA6nx78ax79x79tQx7AMfdGrUqx2BIx7Aj7X8VMuZx79fUox2F3x79O8x7AiJaavDhe7x7Amx78FDrE3ws99Bre6hZdgd2stZGnUQvix78GABHCIPCCLQ93wSk9jZ4lVffx786VX3L05LSex2FTXrCf0lVx2FauGa0uus8gbZkZb8vWx2BpPpx7AgKemx2F8qruP2x2BfqTx78fQkW7OiKThAJo0rNoYgk3t79vjN6MYcMeSo4i6TRq18x2FovzKyQrx7A68VfR5bcqabx79qGWLbwgPOJBAuBI9px2BPYx78E4GiUacx3DzSSy00000287070zUURy0c8b3bd383cb7385zMyDwKegKI6w2Yx3Dz','SJ_JSESSIONID':'5X1pR30btGYwDKwIltZ9c90RBovewAaciJkcNZvI92xMMlbtm0gd!-438178610','COOKIE_MENU_SYS_ID':'400f96014ce59784a850ad5bf3bd0da6','COOKIE_USER_INFO':'7966ff8c6ba924bfa5c1f0a834a2d6a942f294bb14548e5550cfa60cf3d98e8ab52c73b9c3be2542d5b5afb326aaaf8e77f5f032db17a639a157653576f67dfffcb7fa3540b1afc08657f65ae4246998f92b6832c034718e834f293fe92267738acfcd1371f277e401fa9841fdae5b94d1549f9297ca51ff160572c93f1f5bccbd3f5696003bd9fbdf371efbe16e80828966ed7d1944f45c8e031e3dbeceb67560bf5c970fee923e0dec49196a5eed128f2ddbe4ce8361cdaf5d2ef576e3987bbd3f5696003bd9fbdf371efbe16e8082943d2cf1d6021249cc1ddf4922f1f8ba60bf5c970fee923e0dec49196a5eed12d4a3a27f8b44906ea83ea65ad72b4c2e386bfd186958bd6fe8966602e9edd459c0f84a5b0cb622dd2697213ee4d8ed084dff01fcd6d8f7984ee75e6ac6cae85a689d36e7db21f6eb8e5a1b10dfc50b84ec8de7013068a7abe91f95b0909dd26f176d9d5cdc22da13176952a19ec91c924026317f460051a3dab70e4bca6b8d54a61f796604a407ccf85710aab53a32c74c7f0480831f1a9b10702708716d4beab5ce4edda731ba3cf6a3d9393b51e714','MENU_SHOW_YN':'false','COOKIE_MENU_SYS_ID':'SELF_STUD','XTM_MENU_INFO':'%24MENU_SYS_ID%3DSELF_STUD%26*%24MENU_SUB_ID%3DSELF_SUB_30%26*%24MENU_MENU_ID%3DSCH_SUG05_STUD%26*%24MENU_PG_ID%3DSugRecordNowQ%26*%24MENU_ORGN_CLSF_MAP_CD%3DMAP-001%26*%24MENU_ORGN_CLSF_CTRL_YN%3DY%26*%24MENU_AUTH_DEPTH_CD%3D9%26*%24MENU_SELF_YN%3DY%26*%24MENU_UPD_POSB_YN%3DY%26*%24MENU_DWN_POSB_YN%3DY%26*%24MENU_HELP_BTN_YN%3DN%26*%24MENU_HELP_POSB_YN%3DN%26*%24MENU_MANUAL_BTN_YN%3DN%26*%24MENU_REMARK%3D%26*%24MENU_PG_TYPE_CD%3DQ%26*%24MENU_URL%3D/app/modules/sch_sug/SugRecordNowQ.xrf%26*%24param_member_no%3D16011115%26*%24param_login_dt%3D20170626130035%26*%24MENU_REQUEST_YN%3DY%26*'}
#당학기 성적 조회 url 
url1="http://uis.sejong.ac.kr/app/modules/sch_sug/sch_sug.SugRecordNowQ.do"

#당학기 성적 조회 post
data1={'pgauth_sys_id':'SELF_STUD','pgauth_sub_id':'SELF_SUB_30','pgauth_menu_id':'SCH_SUG05_STUD','pgauth_pg_id':'SugRecordNowQ','pgauth_self_yn':'Y','pgauth_orgn_clsf_map_cd':'MAP-001','pgauth_orgn_clsf_ctrl_yn':'Y','pgauth_auth_depth_cd':'9','pgauth_upd_posb_yn':'Y','pgauth_dwn_posb_yn':'Y','pguser_member_no':'16011115','pguser_login_dt':'20170626170041','pgauth_login_dt':'20170626171116','param_member_no':'16011115','param_login_dt':'20170626170041','strCommand':'List','strOrgnClsfCd':'20','strStudentNo':'16011115','strYear':'2017','strSmtCd':'10','keyCuriNo':'','keyYearSmt':'','keySmtCdNm':'','keyRecordYn':'Y','strCorsScheGrpCd':'0','strConOrgn':''}

# 기이수 성적 조회 url
url2="http://uis.sejong.ac.kr/app/modules/sch_sug/sch_sug.SugRecordQ.do"

#기이수 성적 조회 post
data2={'pgauth_sys_id':'SELF_STUD','pgauth_sub_id':'SELF_SUB_30','pgauth_menu_id':'SCH_SUG05_STUD','pgauth_pg_id':'SugRecordQ','pgauth_self_yn':'Y','pgauth_orgn_clsf_map_cd':'MAP-001','pgauth_orgn_clsf_ctrl_yn':'Y','pgauth_auth_depth_cd':'9','pgauth_upd_posb_yn':'Y','pgauth_dwn_posb_yn':'Y','pguser_member_no':'14010969','pguser_login_dt':'20170626182400','pgauth_login_dt':'20170626182518','param_member_no':'14010969','param_login_dt':'20170626182400','strCommand':'List','strOrgnClsfCd':'20','strStudentNo':'14010969','strYear':'','strSmtCd':'','strConOrgn':''}
data3={'pgauth_sys_id':'SELF_STUD','pgauth_sub_id':'SELF_SUB_30','pgauth_menu_id':'SELF_MENU_10','pgauth_pg_id':'SueReqLesnQ','pgauth_self_yn':'Y','pgauth_orgn_clsf_map_cd':'MAP-001','pgauth_orgn_clsf_ctrl_yn':'Y','pgauth_auth_depth_cd':'9','pgauth_upd_posb_yn':'Y','pgauth_dwn_posb_yn':'Y','pguser_member_no':'16011115','pguser_login_dt':'20170626170041','pgauth_login_dt':'20170626175048','param_member_no':'16011115','param_login_dt':'20170626170041','strCommand':'List','strOrgnClsfCd':'20','strStudentNo':'16011115','strYearSmt':'201710','strReqLogCd':'','strCdt':'','strCnt':'','strYear':'2017','strSmtCd':'10','strSmtCdNm':'1학기'}
	
#기이수 성적 조회 cookie
cookie2={'WMONID':'zBfg98gYnzY','ssotoken':'Vy3zFySFx5FGW2zTyGIDx5FSEJONGzCy1498469039zPy86400zAy34zEy48cqox7AF00k9x2BgWRx79dWVUin18VsuqhKndfcX8UnQbTx2F4arh5DQHfcbsOV1lad98k7l982N8GfTrdH7o8D7Rm6ef7uMOx78isPA7iGEYx2BrigeDSe09UIbtJDiN0Pcex7A3CW8npjcdS1kNVUuKN98udhZmitppDffAx78ZbkXgI9Ieo24ocqOoqZLB15DsK6aFsn7ecx7AXZ5sn9qx79fJoSjdx796nff2OGE6kx2FVvpax79wuJXHkvkliv2QigB7nPGwMieEx78nsSAkx7A3O3ABOnOf9O9DsDYDBH5QEx79hkNnbu5jcuUUAvLpQHUosKdgx2B7WDT9x78tjdekx2FKwx79Nx2FzKyDx79OvNnaYKx78qb9QrdeQamthjVAgVOL90QBp6UakliQ1gx3DzSSy00000662051zUURy41eaf983c67ae2fbzMy8dIPRrVBb7gx3Dz','SJ_JSESSIONID':'FbmuSA9pVlBhKOiuojeGHks08ECjB0iGYsBOb9zf0BIpE8TYJ0Fi!-2001823522','COOKIE_MENU_SYS_ID':'400f96014ce59784a850ad5bf3bd0da6','COOKIE_USER_INFO':'7966ff8c6ba924bfa5c1f0a834a2d6a92705fb42d69cda0267030df1ce2f830baca66c3e22a7bdaf6af2e92bdac785ec2658cd4710fc1be6ce33165cfe0cb5f1de0673320a0772187633945847b00aba876885c778f146b9c8da6b6658daefdf66324bbcf4c9b5b3370d10149ba53eb4c9e192f12daf55ba3f29b5418d503b8178fd0e141334b9d5c4326faeef2bb2919160c8cfc5373f0434477f0b0b12fc596769b6fd440ea5394ab0a3afff347775971ba0591f80598832675393e8b2fd3c60dd998a32ff7d163941be4b6c467b62928679c6570f9326c4932a9d4566bd7c6769b6fd440ea5394ab0a3afff347775dd45798fc247181c032a8484a4b40f3f8ecfa17b2b4c237f37cf35d75a35a67c881a27598d2bf69a24d01262a310d91c715c4a4c180eabc21fc27f75cdc1a9d508830a7a5d27ab86627fb2bf74ac40419595e188ba8f2999134266009f43fa0872837fb25272a3d57612ebe1250bef50401196941fc740b8dac25690abd5a6efbbabc3b3ac129ce16e6f9d91e550b5928a144422cd8f8a52f83a07d0b637a7cbee5e0318e301b411895dd1718a834dae','MENU_SHOW_YN':'false','COOKIE_MENU_SYS_ID':'SELF_STUD','XTM_MENU_INFO':'%24MENU_SYS_ID%3DSELF_STUD%26*%24MENU_SUB_ID%3DSELF_SUB_30%26*%24MENU_MENU_ID%3DSCH_SUG05_STUD%26*%24MENU_PG_ID%3DSugRecordQ%26*%24MENU_ORGN_CLSF_MAP_CD%3DMAP-001%26*%24MENU_ORGN_CLSF_CTRL_YN%3DY%26*%24MENU_AUTH_DEPTH_CD%3D9%26*%24MENU_SELF_YN%3DY%26*%24MENU_UPD_POSB_YN%3DY%26*%24MENU_DWN_POSB_YN%3DY%26*%24MENU_HELP_BTN_YN%3DN%26*%24MENU_HELP_POSB_YN%3DN%26*%24MENU_MANUAL_BTN_YN%3DN%26*%24MENU_REMARK%3D%26*%24MENU_PG_TYPE_CD%3DQ%26*%24MENU_URL%3D/app/modules/sch_sug/SugRecordQ.xrf%26*%24param_member_no%3D14010969%26*%24param_login_dt%3D20170626182400%26*%24MENU_REQUEST_YN%3DY%26*'}


url3="http://uis.sejong.ac.kr/app/modules/sch_sue/sch_sue.SueReqLesnQ.do"
res=requests.post(url2,data=data2,cookies=cookie2)




text=res.text
soup=BeautifulSoup(text,'html.parser')
print soup
mr= soup.find_all("curi_nm")
mr2=soup.find_all("time_all")



i=0
user_id='14010969'
while (1):
	try:
		text=mr[i].get_text()
		text=text.encode('utf-8')
		print text

		i=i+1


	
	except:
		break



#conn.commit()
#conn.close()

