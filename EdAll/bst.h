int number = 0,suc = -1,pre = -1;

struct node{
 int val;
 struct node * left, * right;
};


struct node * insert(struct node * head,int val)
{
 if(head == NULL)	//if head is NULL 
 {
 	struct node * temp = malloc(sizeof(struct node));
 	temp->val = val;
 	temp->right = temp->left = NULL;
 	return temp;
 }
 else if(val > head->val)
 	head->right = insert(head->right,val);
 else if(val < head->val)
 	head->left = insert(head->left,val);
}

void inorder(struct node * head)	//first left tree than root than right tree
{
 if(head != NULL)
 {
  	inorder(head->left);
  	printf(" %d ",head->val);
  	inorder(head->right);
 }
}

void postorder(struct node * head)	//first left than right tree than root
{
 if(head != NULL)
 {
  	postorder(head->left);	
  	postorder(head->right);
  	printf(" %d ",head->val);
 }
}

void preorder(struct node * head)	//first root than left than right
{
 if(head != NULL)
 {
 	printf(" %d ",head->val);
  	preorder(head->left);
    	preorder(head->right);
 }
}

struct node * delete(struct node * head,int val)
{
	if(head == NULL)	//if tree has no node return 
		printf("given key not present\n");
	else if(head->val < val)	//else if key is greater than head' value than search right tree
		head->right = delete(head->right,val);
	else if(head->val > val)	//else if key is lesser than head' value than search left tree
		head->left = delete(head->left,val);
	else
	{
		if(head->left == NULL) 		//if node has right child only
		{
			struct node * temp = head->right;
			free(head);
			return temp;
		}
		else if(head->right == NULL)		//if node has left child only
		{
			struct node * temp = head->left;
			free(head);
			return temp;
		}
		else
		{
			struct node * temp = head->right;
			while(temp->left != NULL)
 				temp = temp->left;
			head->val = temp->val;
			temp = delete(temp,temp->val);
		}
	} 
}

void totalnode(struct node * head)		//number is global variable
{							
 if(head != NULL)
 {
 	number = number + 1;	//else increment by 1 than call left tree and right tree if not null
 	totalnode(head->left);
 	totalnode(head->right);
 }
}

int max(int a,int b)
{
 if(a > b)return a;
 return b;
}

int height(struct node * head)		//h is global variable
{
	if(head != NULL)	
		 return (max(height(head->left),height(head->right)) + 1);
	return 0;
}

void ccessor(struct node * head, int key)
{
    if(head == NULL)return;
    if (head->val == key)
    {
	  if(head->left != NULL)
	  {
	       struct node * temp = head->left;
	       while (temp->right)
	              temp = temp->right;
	       pre = temp->val;
	  }
	  if(head->right != NULL)
	  {
	       struct node * temp = head->right;
	       while (temp->left)
       	       	      temp = temp->left;
	       suc = temp->val;
	  }
          return ;
    }
    if(head->val > key)
    {
        suc = head->val;
        ccessor(head->left,key);
    }
    else
    {
        pre = head->val;
        ccessor(head->right,key);
    }
}
