#include<stdio.h>
#include<stdlib.h>
#include"bst.h"

struct link{
 int val;
 struct link * next , * back;
}*tail,*curr,*front;
int flag = 1;

struct link * newnode(int val)
{
	struct link * temp = malloc(sizeof(struct link));
	temp->val = val;
	temp->next = temp->back = NULL;
	printf("The value in new node is: %d", val);
	return temp;
}

void list(struct node * head)
{
 	if(head != NULL)
 	{
 		list(head->left);
 		if(flag == 1)
 		{
	 		struct link * temp = newnode(head->val);
	 		front = curr = temp;
	 		flag--;
	 	}
	 	else
	 	{
	 	 	struct link * temp = newnode(head->val);
	 		temp->back = curr;
	 		curr->next = temp;
	 		curr = temp;
	  	}
 		list(head->right);
 	}
}

int main()
{
	int key,i,nodes,near;
	struct node * head = NULL;
	scanf("%d", &nodes);

	for(i = 0;i < nodes;i++)
	{
		scanf("%d", &key);
		head = insert(head,key);
	}
	list(head);

	return 0;
}
