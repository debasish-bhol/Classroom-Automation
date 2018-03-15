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
k=str(psutil.virtual_memory())
ramdetails=(k[6:len(k)].split(','))
totalram=ramdetails[0]
totalram=int(totalram[6:])
totalram=round(totalram//(1024*1024*1000))
totalram=str(totalram)
smsmsg="Hi Students! I am ZAI developed by ToughX developers and I am here to assist you today on the topic of Data Science!. I will be listening now. Bring on your queries I will try to answer it!. Well remeber i am still under development."
f=open("SpeechTask1.vbs","w+")
k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
f.write(k)
f.close()
os.system("SpeechTask1.vbs")
while(True):
        t=0
        r=sr.Recognizer()
        print(r)
        with sr.Microphone() as source:
            r.adjust_for_ambient_noise(source)
            print(r.energy_threshold)
            audio=r.listen(source)
        print(audio)
        t=0
        try:
                questionlist=["what is datascience","define dataScience","define dataanalysis","elaborate data science","data science","tell me about datascience","data","science","data science"]
                bringon=["graph","graphs","show me the data science graph","show me the example of data science","example","show the graphs","graphs in the datascience","graphs of the datascience","graphs","graphs of the data","big data graph","data science graph"]
                exiton=["terminate","exit","stop listening","graph"]
                talklist=["tell me about yourself","who are you","who r u","tell me something about yourself","introduce","introduce yourself","intro","give intro"]
                text1 = r.recognize_google(audio)
                print("You said: " + text1)
                speechsaid=text1.lower().split()
                print(speechsaid)
                if "graphs" in speechsaid or "graphs" in text1 or "graph" in speechsaid:
                    t=1
                if "terminate" in speechsaid or "exit" in text1 or "stop" in speechsaid:
                    t=2
                try:
                    if t==0:
                        for i in questionlist:
                            if i in  speechsaid:
                                key12="Data analysis, also known as analysis of data or data analytics, is a process of inspecting, cleansing, transforming, and modeling data with the goal of discovering useful information, suggesting conclusions, and supporting decision-making."
                                f=open("SpeechTask2.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+key12+'"'
                                f.write(k)
                                f.close()
                                os.system("SpeechTask.vbs")
                                key12="Here are the extra resourse which may help you with it."
                                f=open("SpeechTask2.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+key12+'"'
                                f.write(k)
                                f.close()
                                os.system("SpeechTask2.vbs")
                                url = "https://en.wikipedia.org/wiki/Special:Search?search={}".format(speechsaid) 
                                webbrowser.open(url)
                                break
                        break
                except sr.UnknownValueError:
                                        print("Google Speech Recognition could not understand audio")
                             
                except sr.RequestError as e:
                                        print("Could not request results from Google  Speech Recognition service; {0}".format(e))
                try:
                    if t==1:
                        for i in bringon:
                            if i in  speechsaid:
                                key12="Data analysis Examples are here"
                                f=open("SpeechTask3.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+key12+'"'
                                f.write(k)
                                f.close()
                                os.system("SpeechTask3.vbs")
                                os.system("chartopen.html")
                                break
                        break
                except sr.UnknownValueError:
                                        print("Google Speech Recognition could not understand audio")
                             
                except sr.RequestError as e:
                                        print("Could not request results from Google  Speech Recognition service; {0}".format(e))                            

                try:
                    if t==2:
                        for i in exiton:
                            if i in  speechsaid:
                                key12="Hope You have a good day! Bye Bye See you in next Class"
                                f=open("SpeechTask4.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+key12+'"'
                                f.write(k)
                                f.close()
                                os.system("SpeechTask4.vbs")
                                break
                        break
                except sr.UnknownValueError:
                                        print("Google Speech Recognition could not understand audio")
                             
                except sr.RequestError as e:
                                        print("Could not request results from Google  Speech Recognition service; {0}".format(e))

                                
                try:
                        for i in talklist:
                                if i in text1:
                                    t=2
                                    print("Yes")
                                    break
                        if t==2:
                                wordmsg="I am ToughX version 1.0. I am a basic python build assistant. I can run on any machine which supports python 3.6."
                                wordmsg+="Currently My Platform Machine is "+platform.machine()+" . "
                                wordmsg+="My Platform System is "+platform.system()+" . "
                                wordmsg+="Platform Processor is "+platform.processor()+" . "
                                wordmsg+="Current RAM Memory  "+totalram+" GigaBytes . "
                                f=open("IntroSpeech.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+wordmsg+'"'
                                f.write(k)
                                f.close()
                                os.system("IntroSpeech.vbs")
                                print(z)
                                break
                except:
                        pass
                                
        except:
                        pass
                

                
                                                        
                            
                    
