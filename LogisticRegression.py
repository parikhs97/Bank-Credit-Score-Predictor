import pandas as pd
import matplotlib
import matplotlib.pyplot as plt
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import pickle
from sklearn.feature_selection import RFE
from sklearn.linear_model import LogisticRegression
from sklearn import cross_validation
import random
from sklearn.linear_model import LogisticRegression

import sys

ID = int(sys.argv[1])

df = pd.read_excel("creditclients.xls")

df = df.drop(["SEX", "EDUCATION", "MARRIAGE", "AGE","PAY_0","PAY_2", "PAY_3", "PAY_4", "PAY_5", "PAY_6"], axis=1)

features = df.drop(["default payment next month"], axis=1).columns

df_train, df_test = cross_validation.train_test_split(df, test_size=0.2)

#display(df.head(5))

logisticRegr = LogisticRegression()

logisticRegr.fit(df_train[features], df_train["default payment next month"])

score = logisticRegr.score(df_test[features], df_test["default payment next month"])

#print("Accuracy: ", score)

df_test1 = df[df.ID == ID]
predictions1 = logisticRegr.predict(df_test1[features])
#predictions = logisticRegr.predict(df_test[features])
#probs = logisticRegr.predict_proba(df_test[features])
#print(predictions)
#print(probs)
print (predictions1)

