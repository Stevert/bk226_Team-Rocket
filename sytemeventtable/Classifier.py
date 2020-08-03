import pandas as pd
import numpy as np
import time
import threading
import os

def copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i):
  #print(type(loc),loc)
  #head=['Timestamp'0, 'color1', 2'Component', 3'Reason for Alarm', \
  #'4Nature','5Sensor type','6Range', '7Alarm Occurence', '8Alarm Type', '9Location']
  time_csv.iloc[loc,0]=alarm_data.iloc[i]['TIME']
  print(time_csv)
  if actual_class in ['A','F', 'G']:
    time_csv.iloc[loc,1]='red'
  else:
    time_csv.iloc[loc,1]='yellow'
  #print(time_csv)
  mask=(reason_csv['Class']==actual_class)

  time_csv.iloc[loc,3]=reason_csv.loc[mask,'Reason for alarm'].values[0]
  #print(time_csv)
  time_csv.iloc[loc,2]=reason_csv.loc[mask,'Component'].values[0]
  #print(time_csv)
  time_csv.iloc[loc,8]=reason_csv.loc[mask,'Alarm type'].values[0]
  #print(time_csv)
  time_csv.iloc[loc,4]=reason_csv.loc[mask,'Nature'].values[0]
  #print(time_csv)

  time_csv.iloc[loc,5]=sensor
  #print(time_csv)
  time_csv.iloc[loc,6]=alarm_data[sensor].iloc[i]
  
  location=np.random.choice(['Mumbai','Pune','Solapur'])
  time_csv.iloc[loc,9]=location
  #print(time_csv)
  time_csv.iloc[loc,7]=1
  #print(time_csv)
  return time_csv

def f():
  #threading.Timer(5.0, f).start()
  
  path=""

  alarm_data=pd.read_csv(path+'Alarmfin.csv')
  reason_csv=pd.read_excel(path+'Alarm Reasons.xlsx',sheet_name=0)
  test_col=['Tank Level'	,'S1 Input PT'	,'S1 Output PT'	,'S1 Output Flow', 'Temperature']
  test=alarm_data[test_col]

  rem_col=['L1-PT',	'L2-PT',	'L3-PT'	,'L4-PT',	'S2 Receipt Flow'	,'S2-PT',	\
                  'S2 Forward Flow',	'L5-PT',	'L6-PT',	'L7-PT'	,'L8-PT'	,'S3 Receipt Flow',	'S3-PT']
  remaining=alarm_data[rem_col]
  classes=alarm_data[['Class']]   

  head=['Timestamp', 'color', 'Component', 'Reason for Alarm', \
  'Nature','Sensor type','Range', 'Alarm Occurence', 'Alarm Type', 'Location']

  

  

  if os.path.exists('copy.csv'):
    '''time_csv=pd.read_csv('copy.csv')
    loc=time_csv.shape[0]'''
    time_csv=pd.DataFrame(columns=head)
    loc=0
  else:
    time_csv=pd.DataFrame(columns=head)
    loc=0
  for i in range(test.shape[0]):
    
    input=test.iloc[i]
    #predicted_class=model.fit(test)
    simul=pd.DataFrame(columns=['Tank Level','Input Pressure','Output Pressure','Output Flow','Temperature','Actual Class','Predicted Class'])

    actual_class=classes.iloc[i]['Class']
    #print(actual_class)
    predicted_class=classes.iloc[i]['Class']


    if actual_class is 'A':
      sensors=['Tank Level'	,'S1 Output PT'	,'S1 Output Flow', 'Temperature']

      mask=(reason_csv['Class']==actual_class)
      '''if not time_csv.empty and time_csv.iloc[loc-1,4]==reason_csv.loc[mask,'Nature'].values[0] :
        var=len(sensors)
        for sensor in sensors:
          time_csv=copy_update(alarm_data,time_csv,reason_csv,loc-var,sensor,actual_class,i)
          var-=1
      else:'''
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1

    elif actual_class is 'C': 
      sensors=['Tank Level'	,'S1 Input PT']
      
      
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1



    elif actual_class is 'D':
      sensors=['S1 Output Flow']

      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1

    elif actual_class is 'E':
      sensors=['S1 Output PT'	,'S1 Output Flow', 'Temperature']
      
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1


    elif actual_class is 'F':
      sensors=['S1 Output PT'	, 'Temperature']
      
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1


    
    elif actual_class is 'G':
      sensors=['S1 Output PT'	,'S1 Output Flow', 'Temperature']
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1



    elif actual_class is 'H':
      sensors=['S1 Output PT'	,'S1 Output Flow']
      
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1



    
    elif actual_class is 'I':
      sensors=['S1 Output PT'	, 'Temperature']
      
      
      for sensor in sensors:
        time_csv = time_csv.append(pd.Series(),ignore_index=True)
        #print(time_csv)
        time_csv=copy_update(alarm_data,time_csv,reason_csv,loc,sensor,actual_class,i)
        loc+=1

    #print(time_csv)
    #print(loc)
    time_csv.to_csv('copy.csv',index=False) 
    #print(time_csv)
    if i==200:
      print(time_csv)
      break

    time.sleep(5)

f()
    

    
    
