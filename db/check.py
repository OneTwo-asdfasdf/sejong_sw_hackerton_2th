# -*- coding: utf-8-
import copy
import random
import json

classlist = [[0, '001', '화', '13:30-15:00'],
			[1, '002', '화', '15:30-16:30'],
			[2, '003', '수', '10:30-12:00'],
			[3, '004', '목', '15:00-16:30'],
			[4, '005', '목', '16:30-18:00']]

subjectName = ['컴퓨터네트워크', '영상처리', '임베디드시스템', '데이터베이스', '인공지능']
studentList = ['14010969', '15011098', '16011115']

# A student table
studentJIN = [['월', '10:30-12:00'],
			['월', '15:00-16:30'],
			['화', '09:00-10:30'],
			['수', '15:00-16:30'],
			['수', '16:30-18:00'],
			['목', '09:00-10:30'],
			['목', '10:30-12:00'],
			['목', '15:00-16:30']]

studentASDFASDF = [['월', '12:00-13:30'],
			        ['월', '13:30-15:00'],
			        ['화', '10:30-12:00'],
		            ['수', '13:30-15:30'],
		            ['수', '16:30-18:00'],
		            ['목', '12:00-13:30'],
		            ['금', '16:30-18:00']]

studentCHAN = [['월', '12:00-13:30'],
        		['월', '13:30-15:00'],
         		['화', '10:30-12:00'],
	            ['수', '13:30-15:30'],
	            ['수', '16:30-18:00'],
	            ['목', '12:00-13:30'],
	            ['목', '14:00-15:00'],
	            ['금', '16:30-18:00']]

# remake class time
classtime = []
for c in classlist:
	startTime = int(c[3][0:2] + c[3][3:5])
	endTime = int(c[3][6:8] + c[3][9:11])
	tmp = [c[0], c[1], c[2], startTime, endTime]
	classtime.append(tmp)

# print classtime

# remake student time
jinTime = []
for c in studentJIN:
	startTime = int(c[1][0:2] + c[1][3:5])
	endTime = int(c[1][6:8] + c[1][9:11])
	tmp = [c[0], startTime, endTime]
	jinTime.append(tmp)

asdfTime = []
for c in studentASDFASDF:
	startTime = int(c[1][0:2] + c[1][3:5])
	endTime = int(c[1][6:8] + c[1][9:11])
	tmp = [c[0], startTime, endTime]
	asdfTime.append(tmp)

chanTime = []
for c in studentCHAN:
	startTime = int(c[1][0:2] + c[1][3:5])
	endTime = int(c[1][6:8] + c[1][9:11])
	tmp = [c[0], startTime, endTime]
	chanTime.append(tmp)


# get Able schedule
jinAbleTime = copy.copy(classtime)
for i in jinTime:
	for j in jinAbleTime:
		if j[2] == i[0]:
			if j[3] <= i[1] < j[4] or j[3] < i[2] <= j[4]:
				jinAbleTime.remove(j)

asdfAbleTime = copy.copy(classtime)
for i in asdfTime:
	for j in asdfAbleTime:
		if j[2] == i[0]:
			if j[3] <= i[1] < j[4] or j[3] < i[2] <= j[4]:
				asdfAbleTime.remove(j)


chanAbleTime = copy.copy(classtime)
for i in chanTime:
	for j in chanAbleTime:
		if j[2] == i[0]:
			if j[3] <= i[1] < j[4] or j[3] < i[2] <= j[4]:
				chanAbleTime.remove(j)


countAbleStudent = []
for i in classtime:
	tmp = [i[0], 0]
	countAbleStudent.append(tmp)

for i in jinAbleTime:
	countAbleStudent[i[0]][1] += 1
	countAbleStudent[i[0]].append('14010969')

for i in asdfAbleTime:
	countAbleStudent[i[0]][1] += 1
	countAbleStudent[i[0]].append('15011098')

for i in chanAbleTime:
	countAbleStudent[i[0]][1] += 1
	countAbleStudent[i[0]].append('16011115')


for i in range(len(countAbleStudent)):
	for j in range(len(countAbleStudent)-1):
		if countAbleStudent[j][1] > countAbleStudent[j+1][1]:
			tmp = copy.copy(countAbleStudent[j+1])
			countAbleStudent[j+1] = copy.copy(countAbleStudent[j])
			countAbleStudent[j] = copy.copy(tmp)


setAssistant = []
for i in range(len(classtime)):
	tmp = [i]
	setAssistant.append(tmp)


nTime = 2	 # num of class which you have to take
getSchedule = []
for i in studentList:
	tmp = [i, nTime]
	getSchedule.append(tmp)


def checkIsAllAssigned(schedule):

	flag = False
	for j in schedule:
		if j[1] > 0:
			flag = True
	return flag

def findIndex(schedule, student):
	for i in range(len(schedule)):
		if student in schedule[i]:
			return i

# but it can occure infinite loop
# if any schedule can not apply
# we have to designate the loop count which can not make assistant schedule fully

check = True
while check:
	for i in countAbleStudent:
		if i[1] == 0:
			continue

		if not checkIsAllAssigned(getSchedule):
			check = False

		randValue = random.randrange(i[1])
		# print "randValue : ", randValue

		studentIndex = findIndex(getSchedule,i[2+randValue])
		if getSchedule[studentIndex][1] != 0:
			setAssistant[i[0]].append(i[2+randValue])
			getSchedule[studentIndex][1] -= 1
			i[1] -= 1
			i.remove(i[2+randValue])


# print getSchedule
# print countAbleStudent
# print setAssistant

for i in range(len(classlist)):
	setAssistant[i].insert(1, classlist[i][1])
	setAssistant[i].insert(2, classlist[i][2])
	setAssistant[i].insert(3, subjectName[i])

result = json.dumps(setAssistant)
result = str(setAssistant)

print result
