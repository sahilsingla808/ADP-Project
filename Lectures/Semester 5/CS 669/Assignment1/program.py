#to compile run $python3 program.py < input
import csv
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import math

def g(i, *x) :
	
	res=-0.5*( ( np.dot( np.dot( np.transpose( x-meanvec[i-1] ),( cov[i-1] )),(x-meanvec[i-1]))) + math.log(np.linalg.det(cov[i-1])) )
	#res=-0.5*(trans(x-mui)*inv(covmat(i))*(x-mu(i))+math.log(det(covmat(i)))) #Still incomplete(will return value of g)
	return res
	

def gp(*x):#compare g for all classes
	if g(1, *x)>g(2, *x):
		if g(1, *x)>g(3, *x):
			return 1
		elif g(1, *x)<g(3, *x):
			return 3
	elif g(1, *x)<g(2, *x):
		if g(2, *x)>g(3, *x):
			return 2
		elif g(2, *x)<g(3, *x):
			return 3


def singlematrix(x,y):
	arr=[]
	meanx=(np.sum(x))/len(x)
	meany=(np.sum(y))/len(y)
	arr.append(meanx)
	arr.append(meany)
	return np.array(arr) 


def covmatrix(x,y):
	arr=[]
	sigmaxx=0
	sigmaxy=0
	sigmayx=0
	sigmayy=0
	meanx=(np.sum(x))/len(x)
	meany=(np.sum(y))/len(y)
	for i in xrange(0,len(x)):
		sigmaxx+=(x[i]-meanx)**2
		sigmaxy+=(x[i]-meanx)*(y[i]-meany)
		sigmayx+=(y[i]-meany)*(x[i]-meanx)
		sigmayy+=(y[i]-meany)**2

	arr.append([sigmaxx/len(x),sigmaxy/len(x)])
	arr.append([sigmayx/len(x),sigmayy/len(x)])
	return np.array(arr)


def giofx(xvec,cov):
	arr=[]
	for i in xrange(0,len(xvec)):
		arr.append( np.dot( np.dot( np.transpose( x-meanvec[i] ),( cov[i] )),(x-meanvec[i])))
	return np.array(arr)


def decision_boundary(g1x,g2x):
	gx=g1x-g2x
	x=[]
	y=[]
	for i in xrange(0,len(gx)):
		if gx >0 :
			x.append(gx)
		else :
			y.append(gx)


x1, y1=np.loadtxt('LS_Group17/Class1.txt', delimiter=' ', unpack=True)

x2, y2=np.loadtxt('LS_Group17/Class2.txt', delimiter=' ', unpack=True)

x3, y3=np.loadtxt('LS_Group17/Class3.txt', delimiter=' ', unpack=True)

meanvec=[]

meanvec.append(singlematrix(x1,y1))
meanvec.append(singlematrix(x2,y2))
meanvec.append(singlematrix(x3,y3))

#print (xvec1)

cov=[]

cov.append(covmatrix(x1,y1))
cov.append(covmatrix(x2,y2))
cov.append(covmatrix(x3,y3))

# print (cov)

#covavg=(cov+cov2+cov1)/3
#print (covavg)

# print(xvec1[0])


# gi1=giofx(meanvec1,cov1)
# gi2=giofx(meanvec2,cov2)
# gi3=giofx(meanvec3,cov3)


allClasses=[]									#list to store name of all classes
Classes=int(raw_input("Number of classes to see : "))

print("Name of All required classes  : ")
for i in range(Classes):
	cn=raw_input()
	cn="LS_Group17/"+cn
	allClasses.append(cn)

CaseNo=int(raw_input("Case number : \n"))

maxx=float('-inf')#find the range of graph to be plotted
minx=float('inf')
maxy=float('-inf')
miny=float('inf')
for i in range(len(allClasses)):
	for j in open(allClasses[i]):
		if maxx<float(j.split()[0]):
			maxx=float(j.split()[0])
		if minx>float(j.split()[0]):
			minx=float(j.split()[0])
		if maxy<float(j.split()[1]):
			maxy=float(j.split()[1])
		if miny>float(j.split()[1]):
			miny=float(j.split()[1])
minx=int(minx-3)#increased the limit for better presentation
maxx=int(maxx+3)
miny=int(miny-3)
maxy=int(maxy+3)
output=''
title=''
if CaseNo==1:#All the cases as asked in the question
	

	for i in xrange(0,len(cov)):
		cov[i][0][0]=(cov[i][0][0]+cov[i][1][1])/2
		cov[i][1][1]=(cov[i][0][0]+cov[i][1][1])/2
		cov[i][1][0]=cov[i][0][1]=0
	cova=[[0.0,0.0],[0.0,0.0]]
	cova=np.array(cova)
	for i in xrange(0,len(cov)):
		cova+=cov[i]
	cova/=len(cov)

	for i in xrange(0,len(cov)):
		cov[i] = cova
	

	for i in range(minx, 2*maxx):#decision region plot
		for j in range(miny, 2*maxy):
			x=list(range(2))
			x[0]=i
			x[1]=j
			reftoclass=(gp(*x))#gi(x) will be called over here and passed to graph for plotting
			color=''
			
			if reftoclass==1 :
				color="red"
			elif reftoclass==2 :
				color="blue"
			elif reftoclass==3 :
				color="green"
			
			plt.scatter(x[0] , x[1] , c=color,alpha=0.8)

			output="Case1.png"
			title='Case1'
		# print('\n')

elif CaseNo==2:#rest of the cases
	print("Second Case is on!")

	cova=[[0.0,0.0],[0.0,0.0]]
	
	cova=np.array(cova)

	for i in xrange(0,len(cov)):
		cova+=cov[i]
	cova/=len(cov)

	for i in xrange(0,len(cov)):
		cov[i] = cova

	for i in range(minx, 2*maxx):#decision region plot
		for j in range(miny, maxy):
			x=list(range(2))
			x[0]=i
			x[1]=j
			reftoclass=(gp(*x))#gi(x) will be called over here and passed to graph for plotting
			color=''
			
			if reftoclass==1 :
				color="red"
			elif reftoclass==2 :
				color="blue"
			elif reftoclass==3 :
				color="green"
			
			plt.scatter(x[0] , x[1] , c=color,alpha=0.8)
			
			output="Case2.png"
			title='Case2'


elif CaseNo==3:
	print("Third Case is on!")

	for i in xrange(0,len(cov)):
		cov[i][0][0]=(cov[i][0][0]+cov[i][1][1])/2
		cov[i][1][1]=(cov[i][0][0]+cov[i][1][1])/2
		cov[i][1][0]=cov[i][0][1]=0

	for i in range(minx, 2*maxx):#decision region plot
		for j in range(miny, maxy):
			x=list(range(2))
			x[0]=i
			x[1]=j
			reftoclass=(gp(*x))#gi(x) will be called over here and passed to graph for plotting
			color=''
			
			if reftoclass==1 :
				color="red"
			elif reftoclass==2 :
				color="blue"
			elif reftoclass==3 :
				color="green"
			
			plt.scatter(x[0] , x[1] , c=color,alpha=0.8)
			
			output="Case3.png"
			title='Case3'


elif CaseNo==4:
	print("Fourth Case is on!")
	for i in range(minx, 	maxx):#decision region plot
		for j in range(miny, maxy):
			x=list(range(2))
			x[0]=i
			x[1]=j
			reftoclass=(gp(*x))#gi(x) will be called over here and passed to graph for plotting
			color=''
			
			if reftoclass==1 :
				color="red"
			elif reftoclass==2 :
				color="blue"
			elif reftoclass==3 :
				color="green"
			
			plt.scatter(x[0] , x[1] , c=color,alpha=0.8)
			
			output="Case4.png"
			title='Case4'


# plt.scatter(x1, y1, 'co', label='Class1!')
plt.scatter(x1, y1, c='firebrick', label='Class1!',alpha=0.8)

# plt.plot(x2, y2, 'mo', label='Class2!')
plt.scatter(x2, y2, c='midnightblue', label='Class2!',alpha=0.8)

# plt.plot(x3, y3, 'yo', label='Class3!')
plt.scatter(x3, y3, c='darkgreen', label='Class3!',alpha=0.8)

plt.xlabel('x')
plt.ylabel('y')
plt.title(title)
plt.legend()
plt.savefig(filename=output)