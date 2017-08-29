#include <stdio.h>
#include <stdlib.h>

struct node{
	int val;
	struct node* left;
	struct node* right;
};

struct tree{
	struct node* root;
	int num_nodes;
};


struct node* create_node(int val);
struct tree* create_bintree();
void insert(struct tree** tree, int val);
struct node* _insert(struct node* root, int val);
void inorderToDoublyLinkedList(struct node* root,struct node **front);

int main(int argc, char const *argv[])
{
	struct tree* tree;
	struct node *prevLoc,*old;
	tree = create_bintree();
	insert(&tree, 50);
	insert(&tree, 30);
	insert(&tree, 20);
	insert(&tree, 40);
	insert(&tree, 70);
	insert(&tree, 60);
	insert(&tree, 80);
	inorderToDoublyLinkedList(tree->root,&prevLoc);

	printf("Traversal using right nodes from root\n");
	while(prevLoc!=NULL)
	{
		printf("%d ",prevLoc->val );
		old=prevLoc;
		prevLoc=prevLoc->right;

	}
	printf("\nTraversal using left nodes from end\n");
	while(old!=NULL)
	{
		printf("%d ",old->val );
		old=old->left;
	}
	return 0;
}
struct node* create_node(int val){
	struct node* temp;
	temp = (struct node*) malloc(sizeof(struct node));
	temp->val = val;
	temp->left = NULL;
	temp->right = NULL;
	return temp;
}

struct tree* create_bintree(){
	struct tree* temp;
	temp = (struct tree*) malloc(sizeof(struct tree));
	temp->root = NULL;
	temp->num_nodes=0;
	return temp;
}

struct node* _insert(struct node* root, int val){
	if(root==NULL)
		return create_node(val);

	if(val<root->val)
		root->left = _insert(root->left, val);
	else
		root->right = _insert(root->right, val);

	return root;
}

void insert(struct tree** tree, int val){
	(*tree)->num_nodes++;
	(*tree)->root = _insert((*tree)->root, val);
}

void inorderToDoublyLinkedList(struct node* root,struct node** front){
	if(root!=NULL){
		static struct node* old=NULL;
		inorderToDoublyLinkedList(root->left,front);
		if(old==NULL)
			*front=root;
		else
		{
			root->left=old;
			old->right=root;
		}
		old=root;
		inorderToDoublyLinkedList(root->right,front);
	}
}