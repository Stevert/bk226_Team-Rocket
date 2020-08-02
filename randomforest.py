import math
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble.forest import RandomForestClassifier
from sklearn import metrics
from sklearn.preprocessing import LabelEncoder 
from numpy import array
from sklearn.metrics import mean_squared_error
from sklearn.metrics import classification_report, confusion_matrix, accuracy_score
df= pd.read_csv('My Drive/SIH 2020/Dataset/CSV/Alarm/Extras/Ala3Copy.csv')
X=df[['Tank Level','S1 Input PT','S1 Output PT','S1 Output Flow','Temperature']]
Y=df[['Class']]
X_train,X_test,y_train,y_test=train_test_split(X,Y,test_size=0.1)
clf=RandomForestClassifier(n_estimators=100)
clf.fit(X_train,y_train)									
y_predict=clf.predict([['3.545','3.5616667','43.89','224.43','51.945']])
y_pred=clf.predict(X_test);
print("\n")
print(confusion_matrix(y_test,y_pred))
print("\n")
print(classification_report(y_test,y_pred))
print("\n")
print("accuracy ",accuracy_score(y_test,y_pred))
