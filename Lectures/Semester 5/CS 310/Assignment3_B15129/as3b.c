#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <dirent.h>
#include <time.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/wait.h>


size_t Max_Len = 1000;
size_t Max_Len2 = 1000;

int k1,k2;

void matched(char* string, char* pattern,int i, char * out);


int main(int argc, char const *argv[])
{
	pid_t *pids=(pid_t *)malloc((73) * sizeof(pid_t ));

	//printf("dcx\n");
	DIR *dir;
	struct dirent *ent;
	char pattern[strlen(argv[1])],ch;
	int count=0,i=0,j=0;
	k1=0; 
	k2=0;
	for ( i = 0; i < strlen(argv[1]); ++i)
	{
		pattern[i]=argv[1][i];
	}
	char string[Max_Len2];
	//printf("%d\n",argc );
	if (argc>1)
	{
		i=0;
		if ((dir = opendir ("Zip")) != NULL) {
		  /* print all the files and directories within directory */
		while ((ent = readdir (dir)) != NULL) 
		{
			pids[i] = fork();
			if (pids[i] == 0)
			{
				clock_t begin = clock();
				
				k1=0;
				k2=0;
				char filen[20];
				sprintf(filen,"Zip/%s",ent->d_name);
				printf ("\n\n%s\n", filen);
				FILE *fp;
				char *out=(char *)malloc((20) * sizeof(char ));
				sprintf(out,"Out/output%d.txt",i);
				fp = fopen((char*)out ,"w");
				fprintf(fp, "%s\n",filen);
				fclose(fp);
				FILE *f;
				f = fopen((char*)(filen) ,"r");
				// fscanf(f, "%s", string);
				// matched(string,pattern,i,out);
				// ch=fgetc(f);
				while (fgets(string,100,f))
				{
					//fscanf(f, "%s", string);
					matched(string,pattern,i,out);
					//ch=fgetc(f);
				}
				//printf("%d\n",k1 );
				clock_t end = clock();
				double time_spent = (double)(end - begin) / CLOCKS_PER_SEC;
				printf("Time Taken : %lf\n",time_spent);
				fclose(f);
				FILE *fp1;
				fp1 = fopen((char*)out ,"a");
				fprintf(fp1, "Total Number of lines matched : %d\n",k1);
				fprintf(fp1, "time taken : %lf\n",time_spent);
				fclose(fp1);
				_exit(0);
			}
			i+=1;
		}
		  closedir (dir);
		}
		
	}
	for (j = 0; j < 72; ++j)
	{
		waitpid(pids[j],NULL,0);
		//printf("%d   Child with id :%d finished \n",j,pids[j] );
	}
	// printf("wesx\n");
	//printf("%s\t%s\n",string,pattern);
	//printf("ioftheendoftime\n\n\n\n\n\n%d\n\n\n\n\n",i );
	
	//printf("\n\n\n\n\nYodsxweds\n\n\n\n");
	i=72;
	char **args = (char **)malloc((73) * sizeof(char *));
    for (j=0; j<73; j++)
         args[j] = (char *)malloc(20 * sizeof(char));

	for (j = 0; j < 72; ++j)
	{
		sprintf(args[j],"Out/output%d.txt",j );
	}

	args[j]=NULL;
	pid_t exep;
	int status;
	exep = fork();
	if (exep==0)
	{
		execvp("cat",args);		
	}
	waitpid(exep,&status,0);
	// printf("\n\n\n\n\nYodsxweds\n\n\n\n");
	//printf("ioftheendoftime\n\n\n\n\n\n%d\n\n\n\n\n",i );
	return 0;
}

void matched(char* string, char* pattern,int y, char * out)
{
	//printf("%s\t%s\n",string,pattern );
	
	//printf("wdsx\n");

	//printf("\n\n\n\n\n\n\n%s",input);
	int len,len1,j=0,k=0,i,o=0;
	k2+=1;
	len = strlen(string);
	len1 = strlen(pattern);
	char pattern2[len1];
	for (int i = 0; i < len1; ++i)
	{
		if (pattern[i]!='?')
		{
			pattern2[j]=pattern[i];
			
			//printf("%c\n",pattern2[j] );
			j+=1;
		}
	}
	pattern2[j]='\0';
	j=0;
	// printf("%s\t%s\t%s\n",string,pattern,pattern2);
	for (i = 0; i < len; ++i)
	{
		if (string[i]==pattern[0])
		{
			// printf("%d\n",i );
			for (j = 0; j < len1; ++j)
			{

				// printf("\n\n%c \t%c\n",string[i+j],pattern[j]);
				if (string[i+j]==pattern[j])
				{
					k=1;
				}
				else if (pattern[j]=='?') 
				{
					// printf("reds\n");
					k=1;
				}
				else 
				{
					// printf("fvdc%d\n",i );
					k=2;
					break;
				}
			}

		}
		if (k==1)
		{
			break;
		}
	}
	// printf("%d  %d\n",k,i );
	//printf("%s\n",pattern2 );
	int len2=strlen(pattern2);
	if (k==2 || i>=len)
	{
		o=2;
		//printf("dcsxz\n");
		for ( i = 0; i < len; ++i)
		{
			if (string[i]==pattern2[0])
			{
				for (j = 0; j < len2; ++j)
				{
					if (string[i+j]==pattern2[j])
					{
						k=1;
					}
					else 
					{
						k=2;
						break;
					}
				}

			}
			if (k==1)
			{
				break;
			}
		}
	}
	k=2;
	FILE *fp2;
	fp2 = fopen((char*)out ,"a");
	if (i<len)
	{
		k1+=1;
		//printf("%d\t",k2 );
		fprintf(fp2,"%d\t",k2 );
		for (j = 0; j < i; ++j)
		{
			//printf("%c",string[j] );

			fprintf(fp2,"%c",string[j] );
		}
		//printf("[");
		fprintf(fp2,"[");
		if (o==2)
		{
			//printf("hjhv%d\n",o );
			for (j = i; j < len2+i; ++j)
			{
				//printf("%c",string[j] );

				fprintf(fp2,"%c",string[j] );
			}
			fprintf(fp2,"]");
			//printf("]");
			for (j = len2+i; j < len; ++j)
			{
				//printf("%c",string[j] );
				fprintf(fp2,"%c",string[j] );
			}
		}
		else
		{
			for (j = i; j < len1+i; ++j)
			{
				fprintf(fp2,"%c",string[j] );
				//printf("%c",string[j] );
			}
			//printf("]");
			fprintf(fp2,"]");
			for (j = len1+i; j < len; ++j)
			{
				//printf("%c",string[j] );
				fprintf(fp2,"%c",string[j] );
			}
		}
		fprintf(fp2,"\n");
		//printf("\n");
	}
	else 
		k=2;
		//printf("%d\n",i);
		
		
		//printf("ggchhhg \n");
		fclose(fp2);

	
	
}