# -*- coding:utf-8 -*-
import pymysql
 

conn=pymysql.connect(host='localhost',user='root',password='reo_star123',database='reo_star')

curs=conn.cursor()


sql = """ insert into subject_complete (userid,class_name) values(%s,%s)"""


user_id='16011115'
text='가'
print type(text)
curs.execute('''insert into subject_complete (userid,class_name) values(%s,%s)''',(user_id,text))
conn.commit()


conn.close()
