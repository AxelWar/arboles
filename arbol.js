class Node { 
    constructor(data) { 
        this.data = data; //7 //3
        this.left = null; //3 //2
        this.right = null; //21//n
    } 
} 

class BinarySearchTree { 
    constructor() { 
        this.root = null;
    } 


    //Devuelve el nodo raiz
getRootNode() { 
    return this.root; 
} 
    //Inserta un nodo como raiz en caso de no tener o llama al metodo insertNode();
insert(data) {
    var newNode = new Node(data); 

    if(!this.root){
        this.root = newNode; 
    } 
    else{
        this.insertNode(this.root, newNode); 
    }  
    
} 
  //Inserta un nodo
insertNode(node, newNode) { 
        //El nodo a insertar es mas chico que el anterior?
    if(newNode.data < node.data){ 
        //Si? entonces, el nodo izquierdo es null?
        //Si? inserta en el nodo de la izquierda
        if(!node.left) 
            node.left = newNode; 
        //No? entonces llama nuevamente el metodo insertNode(); con el nodo izquierdo como previo
        else{
            this.insertNode(node.left, newNode);  
        }
            
    }  
    else{

         // No? entonces, el nodo derecho es null?
         //Si? inserta en el nodo de la derecha  
        if(!node.right){
            node.right = newNode;
        } 
        //No? Entonces llama de nuevo al metodo insertNode(); con el nodo derecho como previo
        else{
            this.insertNode(node.right,newNode);
        }
            
    } 
} 
//itera el array e inserta los valores en el arbol
createTree(array){
		console.log("Array para armar el arbol: " + array);
        for (var i = 0; i < array.length; i++) {
            this.insert(array[i]);
        }
	}
//recorrido inorder (izquierda, raiz, derecha)
inorder(node){ 
	if(node !== null){ 
        this.inorder(node.left); 
        console.log(node.data); 
        this.inorder(node.right); 
        } 
    }  
//recorrido preorder (raiz, izquierda, derecha)
preorder(node){ 
    if(node != null) { 
            console.log(node.data); 
            this.preorder(node.left); 
            this.preorder(node.right); 
        } 
    }
//recorrido postorder (izquierda, derecha, raiz)
postorder(node) { 
    if(node != null) { 
            this.postorder(node.left); 
            this.postorder(node.right); 
            console.log(node.data); 
        } 
    } 

//Entra un nodo a la cola, entran sus hijos en caso de tener, se imprime su valor y se saca de la cola (array)
bylevel(node){

    array = [];
	array[0] = node;
	while(array.length > 0){
		if(array[0].left != null){
			array.push(array[0].left);
		}
		if(array[0].right != null){
			array.push(array[0].right);
		}
		if(array[0].data != null){
			console.log(array[0].data);
		}
		array.shift();
	}
	}	

}



let a = new BinarySearchTree();
array = new Array(7,21,53,11,10);
a.createTree(array);
console.log(a.root);
console.log("Recorrido preorder: ")
a.preorder(a.getRootNode());
console.log("");
console.log("Recorrido inorder: ");
a.inorder(a.getRootNode());
console.log("");
console.log("Recorrido postorder: ");
a.postorder(a.getRootNode());
console.log("");
console.log("Recorrido por niveles: ");
a.bylevel(a.getRootNode());
