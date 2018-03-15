import os
import sys
import urllib
smsmsg="Data analysis, also known as analysis of data or data analytics, is a process of inspecting, cleansing, transforming, and modeling data with the goal of discovering useful information, suggesting conclusions, and supporting decision-making. Data analysis has multiple facets and approaches, encompassing diverse techniques under a variety of names, in different business, science, and social science domains."
f=open("SpeechTell12.vbs","w+")
k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
f.write(k)
f.close()
os.system("SpeechTell12.vbs")
