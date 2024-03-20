<?php
class Punto {
// R e p r e s e n t a ci ó n de un punto en e l pl an o
// l o s a t r i b u t o s son : $coordenada_x e $coordenada_y
// r e p r e s e n t a n l o s v a l o r e s de l a s c o o rden ad a s c a r t e s i a n a s .
private $coordenada_x ;
private $coordenada_y ;

public function __construct ( $x , $y ) {
// Metodo c o n s t r u c t o r de l a c l a s e Punto
// $x y $y son v a l o r e s nume ric o s
// que r e p r e s e n t a n puntos en e l e j e c a r t e s i a n o
$this->coordenada_x = $x ;
$this->coordenada_y = $y ;
}
public function getCoordenada_x ( ) {
return $this->coordenada_x ;
}
public function getCoordenada_y ( ) {
return $this->coordenada_y ;
}
}
// s e c r e a un o b j e t o punto y s e a si g n a a l a v a r i a b l e
$p = new Punto ( 5 , 7 ) ;
// s e v i s u a l i z a e l o b j e t o
print_r ( $p ) ;
// s e o b ti e n e y v i s u a l i z a e l v al o r c o n t e ni d o en l a v a r i a b l e i n s t a n c i a coordenada_x
echo $p->getCoordenada_x ( ) ;
// s e v i s u a l i z a e l v al o r c o n t e ni d o en l a v a r i a b l e i n s t a n c i a y coordenada_y
echo $p->getCoordenada_y ( ) ;