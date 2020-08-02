import pandas as pd
import numpy as np
import time
import threading

def f():
  path=""

  alarm_data=pd.read_excel(path+'Alarm1.xlsx',sheet_name=1)
  reason_csv=pd.read_excel(path+'Alarm Reasons.xlsx',sheet_name=0)
  test_col=['Tank Level'	,'S1 Input PT'	,'S1 Output PT'	,'S1 Output Flow', 'Temperature']
  test=alarm_data[test_col]

  rem_col=['L1-PT',	'L2-PT',	'L3-PT'	,'L4-PT',	'S2 Receipt Flow'	,'S2-PT',	\
                  'S2 Forward Flow',	'L5-PT',	'L6-PT',	'L7-PT'	,'L8-PT'	,'S3 Receipt Flow',	'S3-PT']
  remaining=alarm_data[rem_col]
  classes=alarm_data[['Class']]   


  #threading.Timer(5.0, f1).start()
  head=['Timestamp', 'color', 'Component', 'Reason for Alarm','Nature','Sensor type','Range', 'Alarm Type']
  time_csv=pd.DataFrame(columns=head)
  for i in range(test.shape[0]):
    input=test.iloc[i]
    #predicted_class=model.fit(test)
    predicted_class=classes[i]
    
    time_csv.iloc[i,'Timestamp']=alarm_data.iloc[i,'Time']
    
    if predicted_class in ['A','F', 'G']:
      time_csv.iloc[i,'color']='red'
    else:
      time_csv.iloc[i,'color']='yellow'

    time_csv.iloc[i,'Reason for Alarm']=reason_csv.iloc[i,'Reason for Alarm']
    time_csv.iloc[i,'Component']=reason_csv.iloc[i,'Component']
    time_csv.iloc[i,'Alarm type']=reason_csv.iloc[i,'Alarm type']


    if predicted_class=='A':
        a

    

    
    
