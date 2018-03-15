import sys
import MySQLdb
import random
import os
from twilio.rest import Client
#print(sys.argv[0])
#print(sys.argv[1])
name=sys.argv[1]
phone=sys.argv[2]
#db connection
def datacollect(name,phone,otp):
    db=MySQLdb.connect(host="localhost",user="root",password="amit",db="quickit")
    cur=db.cursor()
    name="'"+name+"'"
    query="insert into quickotpsign(name,phone,otp) values("+name+","+str(phone)+","+str(otp)+")"
    print(query)
    cur.execute(query)
    db.commit()
    db.close()



def otp(name,phone):
                                n=random.randint(10345,99999)
                                msg="Message Sent to "+str(name)
                                f=open("msg.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
                                f.write(k)
                                f.close()
                                os.system("msg.vbs")
                                account_sid = "AC5adda6db593a0f369a427283c8436959"
                                auth_token = "fc647306d1cd37646ac0f1f23c55e612"
                                client = Client(account_sid, auth_token)
                                client.api.account.messages.create(to="+13153538299",from_="+13153229683",body="Hello "+name+" Your OTP for QuickIt SignUp is "+str(n))
                                smsmsg="OTP sent successfully"
                                f=open("SMSSpeech.vbs","w+")
                                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+smsmsg+'"'
                                f.write(k)
                                f.close()
                                os.system("SMSSpeech.vbs")
                                datacollect(name,phone,n)
otp(name,phone)
