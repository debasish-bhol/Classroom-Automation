import os
import speech_recognition as sr
import pyaudio
import sys
from gtts import gTTS
import platform
import ctypes
import psutil
import cv2
import webbrowser
from twilio.rest import Client

text4=""
text5=""
msg="Listening to the lecture! Don't Worry I will mark down the imporatant part for you and will send it to you"
f=open("msg.vbs","w+")
k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
f.write(k)
f.close()
os.system("msg.vbs")
print("Inside Login Loop")
listenlist=["important","very important","essential","must study"]
while(True):
            r=sr.Recognizer()
            with sr.Microphone() as source:
                r.adjust_for_ambient_noise(source)
                print(r.energy_threshold)
                print("Listening Status : ")
                audio=r.listen(source)
            print(audio)
            try:
                text4 = r.recognize_google(audio)
                speechset=text4.split()
                print(text4)
            except:
                pass
            if (text4=="terminate"):
                                msg="Terminating"
                                f=open("msg1.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
                                f.write(k)
                                f.close()
                                os.system("msg1.vbs")
                                break
            else:
                for i in listenlist:
                    if i in speechset:
                                r4=sr.Recognizer()
                                with sr.Microphone() as source:
                                                r4.adjust_for_ambient_noise(source)
                                                print(r4.energy_threshold)
                                                print("Listening Status 23(Imp): ")
                                                audio=r4.listen(source)
                                print(audio)
                                try:
                                               text5 = r4.recognize_google(audio)
                                               print(text5)
                                except:
                                                print("Error")
                                                pass
                                 
                                msg="Marking down the important notes and sending it to your phone"
                                f=open("msg2.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
                                f.write(k)
                                f.close()
                                os.system("msg2.vbs")
                                print("Inside Login Loop")
                                account_sid = "AC5adda6db593a0f369a427283c8436959"
                                auth_token = "fc647306d1cd37646ac0f1f23c55e612"
                                client = Client(account_sid, auth_token)
                                client.api.account.messages.create(
                                to="+13153538299",
                                from_="+13153229683",
                                body=text5)
                                print("Message Sent")
                                smsmsg="Notes Sent Successfully"
                                f=open("SMSSpeech.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
                                f.write(k)
                                f.close()
                                os.system("SMSSpeech.vbs")
                                break
                break    

