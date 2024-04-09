<?php

class Linea {
    // Atributos
    private $pA;
    private $pB;
    private $pC;
    private $pD;
    
    // Constructor
    public function __construct($pA, $pB, $pC, $pD) {
        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }
    
    // Métodos de acceso
    public function getPA() {
        return $this->pA;
    }
    
    public function getPB() {
        return $this->pB;
    }
    
    public function getPC() {
        return $this->pC;
    }
    
    public function getPD() {
        return $this->pD;
    }
    
    // Métodos para mover la línea
    public function mueveDerecha($d) {
        $this->pA['x'] += $d;
        $this->pB['x'] += $d;
        $this->pC['x'] += $d;
        $this->pD['x'] += $d;
    }
    
    public function mueveIzquierda($d) {
        $this->pA['x'] -= $d;
        $this->pB['x'] -= $d;
        $this->pC['x'] -= $d;
        $this->pD['x'] -= $d;
    }
    
    public function mueveArriba($d) {
        $this->pA['y'] += $d;
        $this->pB['y'] += $d;
        $this->pC['y'] += $d;
        $this->pD['y'] += $d;
    }
    
    public function mueveAbajo($d) {
        $this->pA['y'] -= $d;
        $this->pB['y'] -= $d;
        $this->pC['y'] -= $d;
        $this->pD['y'] -= $d;
    }
    
    // Método para representar la información de la línea como string
    public function __toString() {
        $info = "Línea:\n";
        $info .= "Punto A: ({$this->pA['x']}, {$this->pA['y']})\n";
        $info .= "Punto B: ({$this->pB['x']}, {$this->pB['y']})\n";
        $info .= "Punto C: ({$this->pC['x']}, {$this->pC['y']})\n";
        $info .= "Punto D: ({$this->pD['x']}, {$this->pD['y']})\n";
        return $info;
    }
}

// Script de prueba
$l = new Linea(['x' => 0, 'y' => 0], ['x' => 2, 'y' => 0], ['x' => 2, 'y' => 2], ['x' => 0, 'y' => 2]);

echo "Línea antes de mover:\n";
echo $l;

$l->mueveDerecha(3);
echo "Línea después de mover a la derecha:\n";
echo $l;

$l->mueveArriba(2);
echo "Línea después de mover hacia arriba:\n";
echo $l;

?>
