import matplotlib.pyplot as plt
import numpy as np

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
		arr.append((np.transpose(xvec[i]).dot(cov)).dot(xvec[i]))
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
plt.plot(x1, y1, 'ro', label='Loaded from file!')


x2, y2=np.loadtxt('LS_Group17/Class2.txt', delimiter=' ', unpack=True)
plt.plot(x2, y2, 'bo', label='Loaded!')

x3, y3=np.loadtxt('LS_Group17/Class3.txt', delimiter=' ', unpack=True)
plt.plot(x3, y3, 'bo', label='Loaded!')

meanvec1=singlematrix(x1,y1)
meanvec2=singlematrix(x2,y2)
meanvec3=singlematrix(x3,y3)

#print (xvec1)

cov1=covmatrix(x1,y1)
cov2=covmatrix(x2,y2)
cov3=covmatrix(x3,y3)

print (cov1)
print (cov2)
print (cov3)

covavg=(cov3+cov2+cov1)/3
print (covavg)

# print(xvec1[0])


gi1=giofx(meanvec1,cov1)
gi2=giofx(meanvec2,cov2)
gi3=giofx(meanvec3,cov3)



plt.xlabel('x')
plt.ylabel('y')
plt.title('Class1')
plt.legend()
plt.savefig(filename='Class1.png')