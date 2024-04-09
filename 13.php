<?php

class cafetera{

// Atributos
private $capacidadMaxima;
private $cantidadActual;

    // Constructor
    public function __construct($capacidadMaxima, $cantidadActual) {
    $this->capacidadMaxima = $capacidadMaxima;
    $this->cantidadActual = $cantidadActual;

    }
    // Métodos de acceso
    public function getCMax() {
        return $this->capacidadMaxima;
    }
    
    public function getCAct() {
        return $this->cantidadActual;
    }

    // llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera
    public function llenarCafetera(){

        $this->cantidadActual = $this->capacidadMaxima;
    }
    //servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
    //antidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
    //al consumidor para que sepa porque no se le sirvió un taza completa.

    public function servirTaza($cantidad) {
        if ($cantidad <= $this->cantidadActual) {
            $this->cantidadActual -= $cantidad;
            echo "Se ha servido una taza de $cantidad ml de café.\n";
        } else {
            echo "No se puede servir una taza completa. Solo queda {$this->cantidadActual} ml de café.\n";
            $this->cantidadActual = 0;
        }
    }
    
    //vaciarCafetera(): pone la cantidad de café actual en cero.
    public function vaciarCafetera(){
        $this->cantidadActual = 0;
    }

    //agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada

    public function agregarCafe($cantidad) {
        $this->cantidadActual += $cantidad;
        if ($this->cantidadActual > $this->capacidadMaxima) {
            $this->cantidadActual = $this->capacidadMaxima;
        }
    }
    //Redefinir el método _ _toString() para que retorne la información de los atributos de la clase
    public function __toString() {
        return "Cafetera: Capacidad máxima: {$this->capacidadMaxima} ml, Cantidad actual: {$this->cantidadActual} ml\n";
    }
}
//Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
//métodos implementados.
// Script de prueba
$cafetera = new Cafetera(1000, 500);

echo "Estado inicial de la cafetera:\n";
echo $cafetera;

$cafetera->llenarCafetera();
echo "Cafetera llena:\n";
echo $cafetera;

$cafetera->servirTaza(200);
echo "Sirviendo una taza de 200 ml:\n";
echo $cafetera;

$cafetera->vaciarCafetera();
echo "Cafetera vaciada:\n";
echo $cafetera;

$cafetera->agregarCafe(800);
echo "Agregando 800 ml de café:\n";
echo $cafetera;

?>