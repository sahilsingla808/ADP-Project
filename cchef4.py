arr=[2,4,6]
count3=0
q=1
ma=max(arr)
while ma>1:
	ma/=2
	q+=1
#print q
for i in xrange(q):
	count1=0
	count2=0
	for a in arr:
		if a & (1<<i)==0:
			count1+=1
		else :
			count2+=1
	count3+=count1*count2
print 2*count3