import time
import pandas as pd

copy = pd.read_csv("simulation.csv",index_col=None)
paste= pd.read_csv("sim2.csv",index_col=None)
#print(copy.iloc[0], copy.columns)

for i in range(0,copy.shape[0]):
    paste=paste.append(copy.iloc[i],ignore_index=True)
    paste.to_csv('copy.csv',index=False)
    #print(copy.iloc[i],paste)
    time.sleep(5)
