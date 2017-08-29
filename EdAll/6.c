#include<stdio.h>
#include<stdlib.h>
#include<math.h>
 
struct node
{
    int key;
    struct node *left, *right;
};

struct node *newNode(int item)
{
    struct node *temp =  (struct node *)malloc(sizeof(struct node));
    temp->key = item;
    temp->left = temp->right = NULL;
    return temp;
}
 
 
struct node* insert(struct node* node,int key)
{
	
    if (node == NULL) return newNode(key);
 
    
    if (key < node->key)
        node->left  = insert(node->left,key);
    else
        node->right = insert(node->right,key);
 
    
    return node;
}

void postorder(struct node *root)
{
    if (root != NULL)
    { 
        
        postorder(root->left);
        postorder(root->right);
        printf("%d ", root->key);
    }
}



int main()
{
	int n,i;
	printf("no.of.inputs");
	scanf("%d",&n);
	
	int preorder[n];
	
	struct node *root = NULL;
	for(i=0;i<n;i++)
	{
		printf("preorder[%d]=",i);
		scanf("%d",&preorder[i]);
		root = insert(root,preorder[i]);
	}
	
	postorder(root);
}
