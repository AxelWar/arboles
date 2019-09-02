
<?php
//declara la clase
    class Node {
		//declara las variables
          public $info;
          public $left;
          public $right;
          public $level;
          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;
                 $this->level = NULL;
          }
          public function __toString() {
                 return "$this->info";
          }
    }  
    
    class SearchBinaryTree {
		//declara la raiz
          public $root;
          public function  __construct() {
                 $this->root = NULL;
          }

          public function create($info) {
              //si root esta vacio crea un nodo en root
                 if($this->root == NULL) {
                    $this->root = new Node($info);
                 } else {
  //como root no esta vacio lo guarda en current
                    $current = $this->root;
            //itera el array e inserta los valores en el arbol
                    while(true) {
               //El nodo a insertar es mas chico?
                          if($info < $current->info) {
                          //Si? entonces, el nodo izquierdo es null?
                                if($current->left) {
                                    //Si? inserta en el nodo de la izquierda
                                   $current = $current->left;
                                } else {
//No? entonces llama nuevamente el metodo insertNode(); con el nodo izquierdo como previo
                                   $current->left = new Node($info);
                                   break; 
                                }

// No es mas chico? entonces, es mas grande?
                          } else if($info > $current->info){
                           //el nodo derecho es null?
                                if($current->right) {
                                   //Si? inserta en el nodo de la derecha
                                   $current = $current->right;
                                } else {
//No? Entonces llama de nuevo al metodo insertNode(); con el nodo derecho como previo
                                   $current->right = new Node($info);
                                   break; 
                                }
                          } else {
                            break;
                          }
                    } 
                 }
          }
          public function traverse($method) {
                 switch($method) {
                     case 'inorder':
                     $this->_inorder($this->root);
                     break;
                     case 'postorder':
                     $this->_postorder($this->root);
                     break;
    
                     case 'preorder':
                     $this->_preorder($this->root);
                     break;
   
                     default:
                     break;
                 } 
          } 
          //recorrido inorder (izquierda, raiz, derecha)
          private function _inorder($node) {
                          if($node->left) {
                             $this->_inorder($node->left); 
                          } 
                          echo $node. " ";
                          if($node->right) {
                             $this->_inorder($node->right); 
                          } 
          }
          //recorrido preorder (raiz, izquierda, derecha)
          private function _preorder($node) {
                          echo $node. " ";
                          if($node->left) {
                             $this->_preorder($node->left); 
                          } 
                          if($node->right) {
                             $this->_preorder($node->right); 
                          } 
          }
          //recorrido postorder (izquierda, derecha, raiz)
          private function _postorder($node) {
                          if($node->left) {
                             $this->_postorder($node->left); 
                          } 
                          if($node->right) {
                             $this->_postorder($node->right); 
                          } 
                          echo $node. " ";
          }

//Entra un nodo a la cola, entran sus hijos en caso de tener, se imprime su valor y se saca de la cola (array)
//lo hace por niveles          
public function BFT() {
                 $node = $this->root;
                 
                 $node->level = 1; 
                 $queue = array($node);
                 $out = array("<br/>");
                 $current_level = $node->level;
  
                 while(count($queue) > 0) {
                       $current_node = array_shift($queue);
                       if($current_node->level > $current_level) {
                            $current_level++;
                            array_push($out,"<br/>");  
                       } 
                       array_push($out,$current_node->info. " ");
                       if($current_node->left) {
                          $current_node->left->level = $current_level + 1;
                          array_push($queue,$current_node->left); 
                       }    
                       if($current_node->right) {
                          $current_node->right->level = $current_level + 1;
                          array_push($queue,$current_node->right); 
                       }    
                 }
    
                
                return join($out,""); 
          }
    } 
               $arr = array(7,21,53,11,10);
               $tree = new SearchBinaryTree();
               for($i=0,$n=count($arr);$i<$n;$i++) {
                   $tree->create($arr[$i]);
               }

   
    echo"<h1>Busqueda de Arbol Binario</h1>"; 

    echo "<h2>Vector: ", join($arr," "), "</h2>";
    echo"<h1>Por niveles, izq a derecha</h1>"; 
    echo $tree->BFT();
    echo"<h1>Inorder</h1>"; 
    $tree->traverse('inorder');
    echo"<h1>Postorder</h1>"; 
    $tree->traverse('postorder');
    echo"<h1>Preorder</h1>"; 
    $tree->traverse('preorder');
  
?>
