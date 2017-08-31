from Tkinter import *
import webbrowser

top5=Tk()

def printin(dating):
	dating=dating+'.txt'
	webbrowser.open(dating)

def printing(dating):
		
	top7=Tk()

	listofraw=['Back_Sheets','White_Sheets','Green_Sheets','Plain_Boards','Soft_Boards','Cloth','Channels','Fevicol']
	if dating == 'Total' :
		for a in listofraw:
			b='Raw_Materials/'+a+'/'+dating
			Button(top7, text =a, command = lambda : printin(b)).pack(padx=100,pady=5)
	else :
		for a in listofraw:
			b='Raw_Materials/'+a+'/'+dating
			Button(top7, text =a, command = lambda : printin(b)).pack(padx=100,pady=5)


def bifer_list():
	
	top6=Tk()
	fu = open("Raw_Materials/dateofupdate.txt", "r")
	for line in fu:
		string=line
		string=string.replace("\n",'')
		#print(string)
		Button(top6, text =line, command = lambda : printing(string)).pack()
	fu.close()

def total_list():
	printing('Total')


B1 = Button(top5, text ="See Datewise", command = bifer_list)
B1.pack(padx=100,pady=50)

B2 = Button(top5, text ="Total Material Left", command = total_list)
B2.pack(padx=100,pady=50)

top5.mainloop()