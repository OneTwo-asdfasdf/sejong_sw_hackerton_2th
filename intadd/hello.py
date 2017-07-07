# -*- coding:utf-8 -*-
__author__ = 'siback'

import urllib2
import time
import re
import sys

#COOKIE
sejong_url="http://uis.sejong.ac.kr/app/sys.Login.servj"
#sejong_url = "http://uis.sejong.ac.kr/app/modules/sch_sue/sch_sue.SueReqLesnE.do?a=5"
COOKIE_USER_INFO = "COOKIE_USER_INFO=7966ff8c6ba924bfa5c1f0a834a2d6a942f294bb14548e5550cfa60cf3d98e8ab52c73b9c3be2542d5b5afb326aaaf8e77f5f032db17a639a157653576f67dfffcb7fa3540b1afc08657f65ae4246998f92b6832c034718e834f293fe92267738acfcd1371f277e401fa9841fdae5b94d1549f9297ca51ff160572c93f1f5bccbd3f5696003bd9fbdf371efbe16e80828966ed7d1944f45c8e031e3dbeceb67560bf5c970fee923e0dec49196a5eed128f2ddbe4ce8361cdaf5d2ef576e3987bbd3f5696003bd9fbdf371efbe16e8082943d2cf1d6021249cc1ddf4922f1f8ba60bf5c970fee923e0dec49196a5eed12d4a3a27f8b44906ea83ea65ad72b4c2e386bfd186958bd6fe8966602e9edd459c0f84a5b0cb622dd2697213ee4d8ed084dff01fcd6d8f7984ee75e6ac6cae85a689d36e7db21f6eb8e5a1b10dfc50b84ec8de7013068a7abe91f95b0909dd26f176d9d5cdc22da13176952a19ec91c924026317f460051a3dab70e4bca6b8d5410864dd7659b5865b83d42e0a11c1d98bf91bed7541c322a1999a40db6f29e95318c3f2a132bb8769d42a91e37f7a2c1;"
ssotoken = "ssotoken=Vy3zFySFx5FGW2zTyGIDx5FSEJONGzCy1498447254zPy86400zAy34zEyXog3dVXx78ss1fCQ5iIg5l3PN5Hwx2Fax7AYhBMurmx2BPk9aHXCl5AA6E7VNJOuwnHE98qCGU7lA13I5sj2ix2Bx79VSRAFmc5SZ0romWmaFCcgsTx2FDLx79O555RDv8iUCYXVTuAquvOgV4HU7Ix79QFLT76UYKx2FdJU9fSdl85uqAkAi0ZFYb2IOPtoBbJwjE1x7858bJk3MdDLZnT5x2F2d6qVoNx2BXY0x79oEwKCJVburFF4iaYoZXA7XFS9ux79ZrsBoBLQV4ljXM9x2B8gx2BnSNHQx78TH12x2Fc92EBLx79o2tmcpl3mM3fghaHCfMYE2SadKHx78Ji4H0QpLOTuIHx2BcFMhVgLzKyHr308UGTx2BXjx2F7Du0ROx2BX1roPhhXnEx2BvWPfx2Fx2BWfCox78mEx3DzSSy00000287070zUURy0b57b85b00f4abfdzMy4W9qALM26cwx3Dz;"
SJ_JSESSIONID = "SJ_JSESSIONID=BLw2y6fj9gvQqGfAeFYyxflMV2TvaZ08rIb8tpgzKJqdSswfrx63!-438178610;"
#COOKIE_HEADER = COOKIE_USER_INFO + SJ_JSESSIONID + ssotoken
COOKIE_HEADER = "ssotoken=Vy3zFySFx5FGW2zTyGIDx5FSEJONGzCy1498447254zPy86400zAy34zEyXog3dVXx78ss1fCQ5iIg5l3PN5Hwx2Fax7AYhBMurmx2BPk9aHXCl5AA6E7VNJOuwnHE98qCGU7lA13I5sj2ix2Bx79VSRAFmc5SZ0romWmaFCcgsTx2FDLx79O555RDv8iUCYXVTuAquvOgV4HU7Ix79QFLT76UYKx2FdJU9fSdl85uqAkAi0ZFYb2IOPtoBbJwjE1x7858bJk3MdDLZnT5x2F2d6qVoNx2BXY0x79oEwKCJVburFF4iaYoZXA7XFS9ux79ZrsBoBLQV4ljXM9x2B8gx2BnSNHQx78TH12x2Fc92EBLx79o2tmcpl3mM3fghaHCfMYE2SadKHx78Ji4H0QpLOTuIHx2BcFMhVgLzKyHr308UGTx2BXjx2F7Du0ROx2BX1roPhhXnEx2BvWPfx2Fx2BWfCox78mEx3DzSSy00000287070zUURy0b57b85b00f4abfdzMy4W9qALM26cwx3Dz; SJ_JSESSIONID=BLw2y6fj9gvQqGfAeFYyxflMV2TvaZ08rIb8tpgzKJqdSswfrx63!-438178610; COOKIE_MENU_SYS_ID=400f96014ce59784a850ad5bf3bd0da6; COOKIE_USER_INFO=7966ff8c6ba924bfa5c1f0a834a2d6a942f294bb14548e5550cfa60cf3d98e8ab52c73b9c3be2542d5b5afb326aaaf8e77f5f032db17a639a157653576f67dfffcb7fa3540b1afc08657f65ae4246998f92b6832c034718e834f293fe92267738acfcd1371f277e401fa9841fdae5b94d1549f9297ca51ff160572c93f1f5bccbd3f5696003bd9fbdf371efbe16e80828966ed7d1944f45c8e031e3dbeceb67560bf5c970fee923e0dec49196a5eed128f2ddbe4ce8361cdaf5d2ef576e3987bbd3f5696003bd9fbdf371efbe16e8082943d2cf1d6021249cc1ddf4922f1f8ba60bf5c970fee923e0dec49196a5eed12d4a3a27f8b44906ea83ea65ad72b4c2e386bfd186958bd6fe8966602e9edd459c0f84a5b0cb622dd2697213ee4d8ed084dff01fcd6d8f7984ee75e6ac6cae85a689d36e7db21f6eb8e5a1b10dfc50b84ec8de7013068a7abe91f95b0909dd26f176d9d5cdc22da13176952a19ec91c924026317f460051a3dab70e4bca6b8d5410864dd7659b5865b83d42e0a11c1d98bf91bed7541c322a1999a40db6f29e95318c3f2a132bb8769d42a91e37f7a2c1; MENU_SHOW_YN=true; WMONID=mp60F4GV8kv; COOKIE_MENU_SYS_ID=SELF_STUD; XTM_MENU_INFO=%24MENU_SYS_ID%3DSELF_STUD%26*%24MENU_SUB_ID%3DSELF_SUB_30%26*%24MENU_MENU_ID%3DSELF_MENU_10%26*%24MENU_PG_ID%3DSueReqLesnE%26*%24MENU_ORGN_CLSF_MAP_CD%3DMAP-006%26*%24MENU_ORGN_CLSF_CTRL_YN%3DY%26*%24MENU_AUTH_DEPTH_CD%3D9%26*%24MENU_SELF_YN%3DY%26*%24MENU_UPD_POSB_YN%3DY%26*%24MENU_DWN_POSB_YN%3DY%26*%24MENU_HELP_BTN_YN%3DN%26*%24MENU_HELP_POSB_YN%3DN%26*%24MENU_MANUAL_BTN_YN%3DN%26*%24MENU_REMARK%3D%26*%24MENU_PG_TYPE_CD%3DE%26*%24MENU_URL%3D/app/modules/sch_sue/SueReqLesnNewE.xrf%26*%24param_member_no%3D112102%26*%24param_login_dt%3D20170214123245%26*%24MENU_REQUEST_YN%3DY%26*; NetFunnel_ID="

##Request Data
#information
request_data1 = "pgauth_sys_id=SELF_STUD&pgauth_sub_id=SELF_SUB_30&pgauth_menu_id=SELF_MENU_10&pgauth_pg_id=SueReqLesnE&pgauth_self_yn=Y&pgauth_orgn_clsf_map_cd=MAP-006&pgauth_orgn_clsf_ctrl_yn=Y&pgauth_auth_depth_cd=9&pgauth_upd_posb_yn=Y&pgauth_dwn_posb_yn=Y&pguser_member_no=112102&pguser_login_dt=20170214123245&pgauth_login_dt=20170214123351&param_member_no=112102&param_login_dt=20170214123245&strCommand=Insert&keyOrgnClsfCd=20&keyYear=2017&keySmtCd=10&keyDeptCd=&keyStudentNo=112102&keyCuriAdptCd=&keyDanCd=&keyMustLCd=&keyCuriNm=&keyCuriNo=&keyClassNo=&keyDisCdt=15&keyDisCnt=6&keyCorsCd=&keySpecialGetCdt=&keyYearSmtCd=201710&keySearchDiv=99&keyCuriTypeLCd=&keySearchOrgnClsfCd=20&studentDeptCd=&studentYear=&studentClassCd=&rowOrgnClsfCd=20&rowDeptCd=9001&rowCuriNo=600026&rowCuriNm=%EC%A0%95%EB%B3%B4%EC%82%AC%ED%9A%8C%ED%95%99%EC%9E%85%EB%AC%B8&rowClass=001&rowCuriTypeCd=19&rowCdt=3&rowCuriDivCd=7&rowStudentYear=1&rowFromStudentYear=1&rowToStudentYear=5&rowReYear=&rowReSmtCd=&rowReOrgnClsfCd=&rowReCuriNo=&rowReqPosbYn=&rowTotLimitRcnt=&rowOutLimitRcnt=&rowCyberTypeCd=2&rowMySelfDivCd=SUE40-4&rowChapelYn=N&rowEnglishYn=N&rowIntensiveYn=N&rowE12Yn=N&rowE34Yn=N&rowGdtCuriCd=&rowSeasonCd=&rowCollDivForeignerYn=&rowCollDivLocalYn=&myOrgnClsfCd=20&myCorsCd=11&myDeptCd=2922&myDanCd=1&myCuriYear=2011&myCuriSmtCd=10&myStudentYear=4&myInoutMainCd=10&myInoutSubCd=10&myAdmitSmtCnt=0&myEarlyYn=N&myMajIngYn=N&myMajBuYn=N&myMajBokYn=N&myMajYeonYn=N&myTeacherYn=N&myRotcYn=&myEngLesYn=Y&myValidSmt=6&myLessSmtCnt=8&myCorsScheGrpCd=0&myEntYear=2011&myEntSmtCd=10&mySchoCd=&myCollDivCd=10&myEtcPartCd=&mySchRegiCd=31&userErrCode=0&myMaxReqCdt=18&keyMajDivCd=&navInfo=error&returnCode=SUCCEED&rowInternshipTypeCd=&a1=&a2=&"
#history
request_data2 = "pgauth_sys_id=SELF_STUD&pgauth_sub_id=SELF_SUB_30&pgauth_menu_id=SELF_MENU_10&pgauth_pg_id=SueReqLesnE&pgauth_self_yn=Y&pgauth_orgn_clsf_map_cd=MAP-006&pgauth_orgn_clsf_ctrl_yn=Y&pgauth_auth_depth_cd=9&pgauth_upd_posb_yn=Y&pgauth_dwn_posb_yn=Y&pguser_member_no=112102&pguser_login_dt=20170214123245&pgauth_login_dt=20170214123351&param_member_no=112102&param_login_dt=20170214123245&strCommand=Insert&keyOrgnClsfCd=20&keyYear=2017&keySmtCd=10&keyDeptCd=&keyStudentNo=112102&keyCuriAdptCd=&keyDanCd=&keyMustLCd=&keyCuriNm=&keyCuriNo=&keyClassNo=&keyDisCdt=15&keyDisCnt=6&keyCorsCd=&keySpecialGetCdt=&keyYearSmtCd=201710&keySearchDiv=99&keyCuriTypeLCd=&keySearchOrgnClsfCd=20&studentDeptCd=&studentYear=&studentClassCd=&rowOrgnClsfCd=20&rowDeptCd=9001&rowCuriNo=007210&rowCuriNm=%EC%97%AD%EC%82%AC%EC%99%80%ED%95%9C%EA%B5%AD%EC%9D%98%EC%98%81%ED%86%A0&rowClass=001&rowCuriTypeCd=19&rowCdt=3&rowCuriDivCd=1&rowStudentYear=1&rowFromStudentYear=1&rowToStudentYear=5&rowReYear=&rowReSmtCd=&rowReOrgnClsfCd=&rowReCuriNo=&rowReqPosbYn=&rowTotLimitRcnt=&rowOutLimitRcnt=&rowCyberTypeCd=4&rowMySelfDivCd=SUE40-4&rowChapelYn=N&rowEnglishYn=N&rowIntensiveYn=N&rowE12Yn=N&rowE34Yn=N&rowGdtCuriCd=&rowSeasonCd=&rowCollDivForeignerYn=&rowCollDivLocalYn=&myOrgnClsfCd=20&myCorsCd=11&myDeptCd=2922&myDanCd=1&myCuriYear=2011&myCuriSmtCd=10&myStudentYear=4&myInoutMainCd=10&myInoutSubCd=10&myAdmitSmtCnt=0&myEarlyYn=N&myMajIngYn=N&myMajBuYn=N&myMajBokYn=N&myMajYeonYn=N&myTeacherYn=N&myRotcYn=&myEngLesYn=Y&myValidSmt=6&myLessSmtCnt=8&myCorsScheGrpCd=0&myEntYear=2011&myEntSmtCd=10&mySchoCd=&myCollDivCd=10&myEtcPartCd=&mySchRegiCd=31&userErrCode=0&myMaxReqCdt=18&keyMajDivCd=&navInfo=error&returnCode=SUCCEED&rowInternshipTypeCd=&a1=&a2=&"
Request_Count = 0

headers = {  'Host': 'uis.sejong.ac.kr',
                    'Referer': "http://uis.sejong.ac.kr/app/modules/sch_sue/SueReqLesnNewE.xrf",
                    'Origin': "http://uis.sejong.ac.kr",
                    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36',
                    'Cache-Control': "max-age=0",
                    'Content-Type': "application/x-www-form-urlencoded",
                    'Accept-Encoding': 'gzip, deflate',
                    'Connection': "keep-alive",
                    'Accept-Language': "ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4",
                    'Accept': "*/*"
}

def register(register_data):
    request = urllib2.Request(sejong_url, register_data, headers=headers)
    request.add_header('Cookie', COOKIE_HEADER)
    respone = urllib2.urlopen(request).read()
    if re.findall(r"수강여석이 없습니다!", respone):
        pass
    else:
        print respone
        sys.exit(0)

# register for course
def sejong_request():
    global Request_Count
    Request_Count +=1
    register(request_data2)

    print "Try Count : %d\n" % Request_Count
    return 0

def main():
    print '[*] Sejong Register Macro\n'
    while 1:
        sejong_request()
        time.sleep(3)

if __name__ == '__main__':
    main()

