import time
import pandas as pd


pred_temp = pd.read_csv("pred_temp.csv",index_col=0)
pred= pd.read_csv("pred.csv",index_col=0)

for i in range(0,pred_temp.shape[0],5):
    end=min(i+5, pred_temp.shape[0])
    pred=pred_temp.iloc[i:end]
    pred.to_csv('pred.csv')
    time.sleep(5)


