import time
import pandas as pd

copy = pd.read_csv("copy1.csv",index_col=0)
paste= pd.read_csv("copy.csv",index_col=0)
#print(copy.iloc[0], copy.columns)

for i in range(0,copy.shape[0]):
    paste=paste.append(copy.iloc[i])
    paste.to_csv('copy.csv')
    #print(copy.iloc[i],paste)
    time.sleep(5)
