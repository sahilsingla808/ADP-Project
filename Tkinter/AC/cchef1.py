from Tkinter import *
import tkMessageBox
import Tkinter
import webbrowser

top=Tk()
top.title("Aggarwal Creations")

global str

def updatee():
	top1=Tk()
	top1.title('Raw Materials Update')
	L1 = Label(top1, text="Plain Board")
	L1.grid(row=0)
	E1 = Entry(top1, bd =5)
	E1.grid(row=0,column=2)

	
	L2 = Label(top1, text="Soft Board")
	L2.grid(row=1)
	E2 = Entry(top1, bd =5)
	E2.grid(row=1,column=2)

		
	L3 = Label(top1, text="White Sheet")
	L3.grid(row=2)
	E3 = Entry(top1, bd =5)
	E3.grid(row=2,column=2)

		
	L4 = Label(top1, text="Green Sheet")
	L4.grid(row=3)
	E4 = Entry(top1, bd =5)
	E4.grid(row=3,column=2)
	
	
	L5 = Label(top1, text="Back Sheet")
	L5.grid(row=4)
	E5 = Entry(top1, bd =5)
	E5.grid(row=4,column=2)

	
	L6 = Label(top1, text="Cloth in meter")
	L6.grid(row=5)
	E6 = Entry(top1, bd =5)
	E6.grid(row=5,column=2)

	
	L7 = Label(top1, text="Channels")
	L7.grid(row=6)
	E7 = Entry(top1, bd =5)
	E7.grid(row=6,column=2)

	
	L8 = Label(top1, text="Fevicol in KiloGram")
	L8.grid(row=7)
	E8 = Entry(top1, bd =5)
	E8.grid(row=7,column=2)

	
	L9 = Label(top1, text="Date Of Purchase")
	L9.grid(row=8,column=1)
	L10 = Label(top1, text="Day")
	L10.grid(row=9)
	L11 = Label(top1, text="Month")
	L11.grid(row=10)
	L12 = Label(top1, text="Year")
	L12.grid(row=11)
	E10 = Entry(top1, bd =5)
	E10.grid(row=9, column=2)
	E11 = Entry(top1, bd =5)
	E11.grid(row=10, column=2)
	E12 = Entry(top1, bd =5)
	E12.grid(row=11, column=2)

	
	def Confirm_update():
		top3=Tk()
		top3.title('List of Raw Materials To Update')
		Label(top3, text="List Updated").pack()
		Button(top3, text ="Quit", command = top3.destroy).pack(pady=5)
		# print ('Plain Board',E1.get())
		# print ('Soft Board',E2.get())
		# print ('White Sheet',E3.get())
		# print ('Green Sheet',E4.get())
		# print ("Back Sheet",E5.get())
		# print ("Cloth",E6.get())
		# print ("Channels",E7.get())
		# print ("Fevicol",E8.get())
		
		listofraw={'Back_Sheets': E5.get(),'White_Sheets':E3.get(),'Green_Sheets':E4.get(),'Plain_Boards':E1.get(),'Soft_Boards':E2.get(),'Cloth':E6.get(),'Channels':E7.get(),'Fevicol':E8.get()}
		din=E10.get()+'-'+E11.get()+'-'+E12.get()
		
		for a in listofraw:
			b='Raw_Materials/'+a+'/'+din+'.txt'
			fo = open(b, "a")
			fo.write(a+"\n"+listofraw[a])
			fo.close()

			b='Raw_Materials/'+a+'/Total.txt'
			fo = open(b, "r")
			message=fo.read()
			fo.close()

			fo = open(b, "w")

			try:
				if a=='Cloth' or a== 'Channels' or a== 'Fevicol':
					var=message.find(':')
					# print(a)
					# print(message[var+1:])
					message=message[:var+1] + str(int(message[var+1:])+int(listofraw[a]))+ '\n'
				else :
					var=message.find('8-4')
					var2=message.find('6-4')
					# print(a)
					# print(var)
					# print(var2)
					# print(message[var+3:var2])
					# print(message[var+4:var2])
					# print(message[var+4:var2-1])

					message=message[:var+4] + str(int(message[var+4:var2])+int(listofraw[a]))+ '\n' +message[var2:]
					# print(message)

			except :
				# print("hiii")
				if a=='Cloth' or a== 'Channels' or a== 'Fevicol':
					message= a+ '\n:' + listofraw[a]
				else :
					message= a+ '\n8-4:' + listofraw[a]+message[var2:]
			
			fo.write(message)
			fo.close()
			

		fo = open("Raw_Materials/dateofupdate.txt", "a")
		fo.write(din+'\n')
		fo.close()


	B = Button(top1, text ="Update?", command = Confirm_update)
	B.grid(row=12,column=1)

	
	B3 = Button(top1, text ="Quit", command = top1.destroy)
	B3.grid(row=13,column=1)


def Soldd():
	
	top2=Tk()
	top2.title("Material to be Sold")

	variable = StringVar(top2)
	variable.set('Choose The Board Type') # default value

	option = OptionMenu(top2, variable, "Green_Board", "White_Board", "Pin_Board")
	option.grid(row=1, column=1)

	L2 = Label(top2, text="Board Size")
	L2.grid(row=3, column=1)

	variable1 = StringVar(top2)
	variable1.set('Choose The Length') # default value

	option = OptionMenu(top2, variable1, "8", "6", "5", "3")
	option.grid(row=5, column=1)

	variable2 = StringVar(top2)
	variable2.set('Choose The Breadth') # default value

	option2 = OptionMenu(top2, variable2, "4", "2")
	option2.grid(row=6, column=1)

	L13 = Label(top2, text="Quantity")
	L13.grid(row=7)
	E13 = Entry(top2, bd =5)
	E13.grid(row=7, column=2)

	# mb1=  Menubutton ( top2, text="Breadth", relief=RAISED )
	# #mb.grid()
	# mb1.menu  =  Menu ( mb, tearoff = 0 )
	# mb1["menu"]  =  mb.menu
	    
	# L_4  = IntVar()
	# L_2 = IntVar()

	# mb1.menu.add_checkbutton ( label="4",
	#                           variable=L_4 )
	# mb1.menu.add_checkbutton ( label="2",
	#                           variable=L_2 )

	# mb1.pack()

	L9 = Label(top2, text="Date Of Purchase")
	L9.grid(row=8,column=1)
	L10 = Label(top2, text="Day")
	L10.grid(row=9)
	L11 = Label(top2, text="Month")
	L11.grid(row=10)
	L12 = Label(top2, text="Year")
	L12.grid(row=11)
	E10 = Entry(top2, bd =5)
	E10.grid(row=9, column=2)
	E11 = Entry(top2, bd =5)
	E11.grid(row=10, column=2)
	E12 = Entry(top2, bd =5)
	E12.grid(row=11, column=2)
	
	def Confirm_sold() :
		top4=Tk()
		# print("hello")
		# print(variable.get() ,int(variable1.get()),int(variable2.get()))

		if variable.get()=="Pin_Board" :
			listofraw=['Back_Sheets','Soft_Boards']
			
		if variable.get()=="Green_Board" :
			listofraw=['Back_Sheets','Green_Sheets','Plain_Boards']
			
		if variable.get()=="White_Board" :
			listofraw=['Back_Sheets','White_Sheets','Plain_Boards']

		#listofraw={'Back_Sheets': E5.get(),'White_Sheets':E3.get(),'Green_Sheets':E4.get(),'Plain_Boards':E1.get(),'Soft_Boards':E2.get(),'Cloth':E6.get(),'Channels':E7.get(),'Fevicol':E8.get()}
		din=E10.get()+'-'+E11.get()+'-'+E12.get()
		quantity=int(E13.get())
		for a in listofraw:

			b='Raw_Materials/'+a+'/Total.txt'
			fo = open(b, "r")
			message=fo.read()
			fo.close()
			# if variable1.get()=='8' and variable2.get() =='4' :
			# 	print (message)
			fo = open(b, "w")
			try:
				#print(message)
				if variable1.get()=='8' and variable2.get()=='4' :

					var=message.find('8-4')
					var2=message.find('6-4')
					# print(var)
					# print(message[:var+4])
					

					if (int(message[var+4:var2])-int(E13.get())) >=0 :
						print(message[var+4:var2-1])
						message=message[:var+4] + str(int(message[var+4:var2])-int(E13.get())) + '\n' +message[var2:]
						print (message)


			except :
				pass

			try:
				#print(message)
				if variable1.get()=='6' and variable2.get()=='4' :
					var=message.find('6-4')
					var2=message.find('5-4')
					#print(var)
					diff=int(E13.get())-int(message[var+4:var2])
					if (int(message[var+4:var2])-int(E13.get())) >=0 :
						message=message[:var+4] + str(int(message[var+4:var2])-int(E13.get()))+ '\n' +message[var2:]
					else:
						message=message[:var+4] + '0\n' +message[var2:]
						var=message.find('8-4')
						var2=message.find('6-4')
						message=message[:var+4] + str(int(message[var+4:var2])-diff)+ '\n' +message[var2:]
						var=message.find('4-2')
						var2=message.find('3-2')
						message=message[:var+4] + str(int(message[var+4:var2])+diff)+ '\n' +message[var2:]



			except :
				pass

			try:
				#print(message)
				if variable1.get()=='5' and variable2.get()=='4' :
					var=message.find('5-4')
					var2=message.find('4-3')
					#print(var)
					diff=int(E13.get())-int(message[var+4:var2])
					if (int(message[var+4:var2])-int(E13.get())) >=0 :
						message=message[:var+4] + str(int(message[var+4:var2])-int(E13.get()))+ '\n' +message[var2:]
					else:
						message=message[:var+4] + '0\n' +message[var2:]
						var=message.find('8-4')
						var2=message.find('6-4')
						message=message[:var+4] + str(int(message[var+4:var2])-diff)+ '\n' +message[var2:]
						var=message.find('4-3')
						var2=message.find('4-2')
						message=message[:var+4] + str(int(message[var+4:var2])+diff) + '\n' +message[var2:]

			except :
				pass

			try:
				#print(message)
				if variable1.get()=='3' and variable2.get()=='4' :
					var=message.find('4-3')
					var2=message.find('4-2')
					var3=message.find('6-4')
					var4=message.find('5-4')
					#print(var)
					diff=int(E13.get())-int(message[var+4:var2])
					if (int(message[var+4:var2])-int(E13.get())) >=0 :
						message=message[:var+4] + str(int(message[var+4:var2])-int(E13.get()))+ '\n' +message[var2:]
					elif (int(message[var+4:var2])+2*(int(message[var3+4:var4]))-int(E13.get())) >=0 :
						message=message[:var+4] + '0\n' +message[var2:]
						if diff%2==0 :
							message=message[:var3+4] + str(int(message[var3+4:var4])-diff/2)+ '\n' +message[var3:]
						else :
							message=message[:var3+4] + str(int(message[var3+4:var4])-(diff/2))+ '\n' +message[var3:] 
							var=message.find('4-3')
							var2=message.find('4-2')
							message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]
					else :
						message=message[:var+4] + '0\n' +message[var2:]
						message=message[:var3+4] + '0\n' +message[var4:]
						diff2=int(E13.get())-int(message[var+4:var2])-2*(int(message[var3+4:var4]))
						var3=message.find('8-4')
						var4=message.find('6-4')
						if diff%2==0 :
							message=message[:var3+4] + str(int(message[var3+4:var4])-diff/2)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+diff/2)+ '\n' +message[var2:]
						else :
							message=message[:var3+4] + str(int(message[var3+4:var4])-diff/2-1)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+diff/2)+ '\n' +message[var2:]
							var=message.find('5-4')
							var2=message.find('4-3')
							message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]

			except :
				pass

			try:
				#print(message)
				if variable1.get()=='3' and variable2.get()=='2' :
					var=message.find('4-2')
					var2=message.find('3-2')
					var3=message.find('6-4')
					var4=message.find('5-4')
					#print(var)
					diff=int(E13.get())-int(message[var+4:var2])
					if (int(message[var+4:var2])-int(E13.get())) >=0 :
						message=message[:var+4] + str(int(message[var+4:var2])-int(E13.get()))+ '\n' +message[var2:]
						message=message[:var2+4] + str(int(message[var2+4:])-diff/2)
					if diff>1 :
						if (int(message[var+4:var2])+4*(int(message[var3+4:var4]))-int(E13.get())) >=0 :
							message=message[:var+4] + '0\n' +message[var2:]
							if diff%4==0 :
								message=message[:var3+4] + str(int(message[var3+4:var4])-diff/4)+'\n'+message[var3:]
							elif diff%4==1:
								message=message[:var3+4] + str(int(message[var3+4:var4])-diff/4)+ '\n' +message[var3:]
								var=message.find('8-4')
								var2=message.find('6-4')
								message=message[:var+4] + str(int(message[var+4:var2])-1)+  '\n' +message[var2:]
								var=message.find('6-4')
								var2=message.find('5-4')
								message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]

							elif diff%4==2:
								message=message[:var3+4] + str(int(message[var3+4:var4])-(diff/4)-1)+ '\n' +message[var3:]
								var=message.find('4-3')
								var2=message.find('4-2')
								message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]


							elif diff%4==3:
								message=message[:var3+4] + str(int(message[var3+4:var4])-(diff/4)-1)+ '\n' +message[var3:]
								var=message.find('3-2')
								var2=message.find('2-1')
								message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]

					else :
						message=message[:var+4] + '0\n' +message[var2:]
						message=message[:var3+4] + '0\n' +message[var4:]
						diff2=int(E13.get())-int(message[var+4:var2])-4*(int(message[var3+4:var4]))
						var3=message.find('8-4')
						var4=message.find('6-4')
						

						if diff2%4==0 :
							message=message[:var3+4] + str(int(message[var3+4:var4])-diff/4)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+diff/4)+ '\n' +message[var2:]

						elif diff2%4==1:
							message=message[:var3+4] + str(int(message[var3+4:var4])-diff/4-1)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+diff/4)+ '\n' +message[var2:]
							
							var=message.find('6-4')
							var2=message.find('5-4')
							message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]

						elif diff2%4==2:
							message=message[:var3+4] + str(int(message[var3+4:var4])-(diff/4)-1)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+diff/4)+ '\n' +message[var2:]

							var=message.find('5-4')
							var2=message.find('4-3')
							message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]


						elif diff2%4==3:
							message=message[:var3+4] + str(int(message[var3+4:var4])-(diff/4)-1)+ '\n' +message[var3:]
							var=message.find('4-2')
							var2=message.find('3-2')
							message=message[:var+4] + str(int(message[var+4:var2])+(diff/4)+1)+ '\n' +message[var2:]

							var=message.find('3-2')
							var2=message.find('2-1')
							message=message[:var+4] + str(int(message[var+4:var2])+1)+ '\n' +message[var2:]

			except :
				pass   #alert message
			
			message=fo.write(message)
			fo.close()

		# fc = open("Raw_Materials/Channels/Total.txt", "a")
		# message=fc.read()
		# var=message.find('12')
		# var2=message.find('4')
		# var3=message.find('3')
		# if variable1.get()=='8' and variable2=='4' :
		# 	message=message[:var+3]+str(int(message[var+3:var2])-2*int(E13.get()))+message[var2:]

		# if variable1.get()=='6' and variable2=='4' :
		# 	if int(message[var2+2:])-2*(int(E13.get())) >=0 :
		# 		message=message[:var2+2]+str(int(message[var2+2:var3])-2*int(E13.get()))
		# 	else :
		# 		message=message[:var2+2]+'0\n'+message[var3:]
		# 		message=message[:var+3]+str(int(message[var2+3:var2])-2*int(E13.get()))	

		# if variable1.get()=='5' and variable2=='4' :
		# 	var=message.find('12')
		# 	message=message[:var+3]+str(int(message[var+3:var2])-2*int(E13.get()))+message[var2:]
		
		# if variable1.get()=='3' and variable2=='4' :
		# 	var=message.find('12')
		# 	message=message[:var+3]+str(int(message[var+3:var2])-2*int(E13.get()))+message[var2:]
		
		# if variable1.get()=='3' and variable2=='2' :
		# 	var=message.find('12')
		# 	message=message[:var+3]+str(int(message[var+3:var2])-2*int(E13.get()))+message[var2:]

		# fc.write(din+'\n')
		# fc.close()

		fc=open("Raw_Materials/Fevicol/Total.txt", "r")
		message=fc.read()
		fc.close()

		fc = open("Raw_Materials/Fevicol/Total.txt", "w")
		

		if variable.get()=="Green_Board" or variable.get()=="White_Board" :
			if variable1.get()=='8' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(2.5)*int(E13.get()))
				
			elif variable1.get()=='6' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(2)*int(E13.get()))
					
			elif variable1.get()=='5' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1.75)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='2' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(.5)*int(E13.get()))

		if variable.get()=="Pin_Board" :
			if variable1.get()=='8' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1.350)*int(E13.get()))
				
			elif variable1.get()=='6' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1.0)*int(E13.get()))
					
			elif variable1.get()=='5' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(.850)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(.50)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='2' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(.30)*int(E13.get()))
			
		fc.write(message)
		fc.close()				

		fc=open("Raw_Materials/Cloth/Total.txt", "r")
		message=fc.read()
		fc.close()

		fc = open("Raw_Materials/Cloth/Total.txt", "w")
		# message=fc.read()

		if variable.get()=="Pin_Board" :
			if variable1.get()=='8' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(2.60)*int(E13.get()))
				
			elif variable1.get()=='6' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(2)*int(E13.get()))
					
			elif variable1.get()=='5' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1.7)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='4' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(1)*int(E13.get()))
					
			elif variable1.get()=='3' and variable2.get()=='2' :
				var=message.find(':')
				message=message[:var+1]+str(float(message[var+1:])-(.7)*int(E13.get()))

		fc.write(message)
		fc.close()	

	B0 = Button(top2, text ="Update", command = Confirm_sold)
	B0.grid(row=12, column=1)
	

def List_see():

	top5=Tk()

	def printin(b1):
		b1=b1+'.txt'
		print b1
		webbrowser.open(b1)

	def printing(dating):
			
		top7=Tk()
		print dating
		listofraw=['Back_Sheets','White_Sheets','Green_Sheets','Plain_Boards','Soft_Boards','Cloth','Channels','Fevicol']
		if dating == 'Total' :
			# for a in listofraw:
			# 	b='Raw_Materials/'+a+'/'+dating
			# 	print b                                     #see why not working properly
			# 	Button(top7, text =a, command = lambda : printin(b)).pack(padx=100,pady=5)
			Button(top7, text ="Back_Sheets", command = lambda : printin('Raw_Materials/'+"Back_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="White_Sheets", command = lambda : printin('Raw_Materials/'+"White_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Green_Sheets", command = lambda : printin('Raw_Materials/'+"Green_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Plain_Boards", command = lambda : printin('Raw_Materials/'+"Plain_Boards"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Soft_Boards", command = lambda : printin('Raw_Materials/'+"Soft_Boards"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Cloth", command = lambda : printin('Raw_Materials/'+"Cloth"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Channels", command = lambda : printin('Raw_Materials/'+"Channels"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Fevicol", command = lambda : printin('Raw_Materials/'+"Fevicol"+'/'+dating)).pack(padx=100,pady=5)


		else :
			# for a in listofraw:
			# 	b='Raw_Materials/'+a+'/'+dating                      #see why not working properly
			# 	Button(top7, text =a, command = lambda : printin(b)).pack(padx=100,pady=5)
			Button(top7, text ="Back_Sheets", command = lambda : printin('Raw_Materials/'+"Back_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="White_Sheets", command = lambda : printin('Raw_Materials/'+"White_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Green_Sheets", command = lambda : printin('Raw_Materials/'+"Green_Sheets"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Plain_Boards", command = lambda : printin('Raw_Materials/'+"Plain_Boards"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Soft_Boards", command = lambda : printin('Raw_Materials/'+"Soft_Boards"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Cloth", command = lambda : printin('Raw_Materials/'+"Cloth"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Channels", command = lambda : printin('Raw_Materials/'+"Channels"+'/'+dating)).pack(padx=100,pady=5)
			Button(top7, text ="Fevicol", command = lambda : printin('Raw_Materials/'+"Fevicol"+'/'+dating)).pack(padx=100,pady=5)



	def bifer_list():
		
		top6=Tk()
		fu = open("Raw_Materials/dateofupdate.txt", "r")
		for line in fu:
			string=line
			string=string.replace("\n",'')
			#print(string)
			Button(top6, text =line, command = lambda : printing(string)).grid()
		fu.close()

	def total_list():
		printing('Total')


	B1 = Button(top5, text ="See Datewise", command = bifer_list)
	B1.pack(padx=100,pady=50)

	B2 = Button(top5, text ="Total Material Left", command = total_list)
	B2.pack(padx=100,pady=50)


B = Button(top, text ="Update The Raw Materials", command = updatee)

B.pack(padx=100, pady=50)

B1 = Button(top, text ="Sold Boards", command = Soldd)
B1.pack(padx=100,pady=50)

B2 = Button(top, text ="Available Material", command = List_see)
B2.pack(padx=100,pady=50)

B3 = Button(top, text ="Quit", command = top.destroy)
B3.pack(padx=100,pady=50)

top.mainloop()
