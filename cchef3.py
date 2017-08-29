A = [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10 ]
a=6
n=len(A)
i=n/2
e=0
print n
while True :
	if A[i] >a :
		i=i/2
		if i==(i+n)/4 :
			i+=2
			print 'ews'
	elif A[i]<a :
		i=(n+i)/2
		print 'dsxzdc'
	else :
		e=2
		break
	if i==0 and A[0]!=a:
		e=1
		break
	if i==n-1 and A[i]!=a:
		e=1
		break
	
	print i,n,A[i],A[62]	 
if e==1:
	print [-1,-1]
print n, i,A[i]
j=0
start=0
endl=i
midprv=0
if start==endl :
	ans=start
while start<endl :
	if A[start]==a :
		ans=start
		break
	mid = (start+endl)/2
	if A[mid]==a  :
		endl=mid
	else :
		start=mid
	ans=endl
	if mid==midprv :
		if A[mid]==a :
			ans=mid
		else :
			ans=endl
		break
	else :
		midprv=mid

#print start,endl,ans
start=i
endu=n-1
if start==endu :
	ans2=start
while start<endu :
	if A[endu]==a :
		ans2=endu
		break
	mid = (start+endu)/2
	if A[mid]==a  :
		start=mid
	else :
		endu=mid
	ans2=start
	if mid==midprv :
		if A[mid]==a :
			ans2=mid
		else :
			ans2=endu
		break
	else :
		midprv=mid
	#print start,endu,ans2
#print start,endu,ans,mid
print ans,ans2
