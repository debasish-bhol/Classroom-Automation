import face_recognition
import cv2
import MySQLdb
from datetime import datetime
from time import gmtime, strftime
from twilio.rest import Client
video_capture = cv2.VideoCapture(0)
import sys,os
imgname="" #collect photos
studname="" #collect studentname
def message(name,reg):
		msg="Attendance of "+str(name)+"bearing registration number"+str(reg)+" marked"
		f=open("msg.vbs","w+")
		k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
		f.write(k)
		f.close()
		os.system("msg.vbs")
		db=MySQLdb.connect(host="localhost",user="root",password="amit",db="attendance")
		cur=db.cursor()
		query="select count(reg) from markme where reg="+str(reg);
		k=cur.execute(query)
		print(k)
		for row in cur.fetchall():
		    print(row[0])
		db.commit()
		db.close()
		account_sid = "AC5adda6db593a0f369a427283c8436959"
		auth_token = "fc647306d1cd37646ac0f1f23c55e612"
		client = Client(account_sid, auth_token)
		client.api.account.messages.create(to="+13153538299",from_="+13153229683",body="Attendance for the today is marked.")
		smsmsg="Attendance Acknowlegement was sent successfully"
		f=open("SMSSpeech.vbs","w+")
		k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
		f.write(k)
		f.close()
		os.system("SMSSpeech.vbs")

def markattend(name,reg1,imgname,sub):
    db=MySQLdb.connect(host="localhost",user="root",password="amit",db="attendance")
    cur=db.cursor()
    attime=str(datetime.now())
    k=len(attime)
    attime=attime[:k-6]
    attime="'"+attime+"'"
    imgname="'"+imgname+"'"
    query="insert into markme(reg,Studentname,attime,img,Subject) values("+str(int(reg1))+","+name+","+attime+","+imgname+","+sub+");"
    print(query)
    cur.execute(query)
    db.commit()
    db.close()
    

def collectphotos(name):
    global imgname
    global studname
    db=db=MySQLdb.connect(host="localhost",user="root",password="amit",db="attendance")
    cur=db.cursor()
    name=int(name) #registration number
    query="select * from studentdata where reg="+str(name)+";"
    cur.execute(query)
    for row in cur.fetchall():
        imgname=row[3]
        studname=row[2]
    db.close()
#print("Hello World")
reg1=sys.argv[1]#getting the parameter outside php
sub=sys.argv[2]
print(sub)
sub="'"+sub+"'"
collectphotos(reg1)
imagen=imgname
#print("Hello")
#print(imagen)
studn="'"+studname+"'"
#print(imagen)
#print(studn)
Picture_face_encoding=[]
Pic_image = face_recognition.load_image_file(imagen)
#print(Pic_image)
Pic_face_encoding = face_recognition.face_encodings(Pic_image)[0]
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True
k=0
p=0
name="Unknown"
#print("Found")
while True:
    ret, frame = video_capture.read()
    small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
    if process_this_frame:
        face_locations = face_recognition.face_locations(small_frame)
        face_encodings = face_recognition.face_encodings(small_frame, face_locations)
        face_names = []
        for face_encoding in face_encodings:
            match = face_recognition.compare_faces([Pic_face_encoding], face_encoding)
            name = "Unknown"
            if match[0]:
                name = studn
                #print(name)
            face_names.append(name)
    process_this_frame = not process_this_frame
    for (top, right, bottom, left), name in zip(face_locations, face_names):
        top *= 4
        right *= 4
        bottom *= 4
        left *= 4
        cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)
        cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
        font = cv2.FONT_HERSHEY_DUPLEX
        cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
    cv2.imshow('Video', frame)
#   print("Found")
    if name=="Unknown":
            smsmsg="Attendance validity Unknown Check Credentials"
            f=open("SMSSpeech.vbs","w+")
            k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
            f.write(k)
            f.close()
            os.system("SMSSpeech.vbs")
            break
    if k<=10 and name!="Unknown":
        k+=1
        if k==10:
            p=1
            if(p==1):
                markattend(name,reg1,imgname,sub)  #functioncall
                message(name,reg1)
            break
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
video_capture.release()
cv2.destroyAllWindows()
