<?php

class Cuadrado {
    private $vertices;

    public function __construct($p1, $p2, $p3, $p4) {
        $this->vertices = array(
            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3,
            'p4' => $p4
        );
    }

    public function getP1() {
        return $this->vertices['p1'];
    }

    public function setP1($p1) {
        $this->vertices['p1'] = $p1;
    }

    public function getP2() {
        return $this->vertices['p2'];
    }

    public function setP2($p2) {
        $this->vertices['p2'] = $p2;
    }

    public function getP3() {
        return $this->vertices['p3'];
    }

    public function setP3($p3) {
        $this->vertices['p3'] = $p3;
    }

    public function getP4() {
        return $this->vertices['p4'];
    }

    public function setP4($p4) {
        $this->vertices['p4'] = $p4;
    }

    public function area() {
        $lado = $this->distancia($this->vertices['p1'], $this->vertices['p2']);
        return $lado * $lado;
    }

    public function desplazar($d) {
        foreach ($this->vertices as $key => $punto) {
            $this->vertices[$key]['x'] += $d['x'];
            $this->vertices[$key]['y'] += $d['y'];
        }
    }

    public function aumentarTamaño($t) {
        foreach ($this->vertices as $key => $punto) {
            $this->vertices[$key]['x'] *= $t;
            $this->vertices[$key]['y'] *= $t;
        }
    }

    public function __toString() {
        return "Cuadrado: \n" .
               "P1: ({$this->vertices['p1']['x']}, {$this->vertices['p1']['y']})\n" .
               "P2: ({$this->vertices['p2']['x']}, {$this->vertices['p2']['y']})\n" .
               "P3: ({$this->vertices['p3']['x']}, {$this->vertices['p3']['y']})\n" .
               "P4: ({$this->vertices['p4']['x']}, {$this->vertices['p4']['y']})\n";
    }

    private function distancia($p1, $p2) {
        $dx = $p2['x'] - $p1['x'];
        $dy = $p2['y'] - $p1['y'];
        return sqrt($dx * $dx + $dy * $dy);
    }
}

// Prueba de la clase Cuadrado
$cuadrado = new Cuadrado(['x' => 0, 'y' => 0], ['x' => 0, 'y' => 2], ['x' => 2, 'y' => 2], ['x' => 2, 'y' => 0]);
echo $cuadrado; // Imprime la información del cuadrado

echo "Área del cuadrado: " . $cuadrado->area() . "\n";

$cuadrado->desplazar(['x' => 3, 'y' => 3]);
echo "Cuadrado desplazado:\n" . $cuadrado;

$cuadrado->aumentarTamaño(2);
echo "Cuadrado aumentado de tamaño:\n" . $cuadrado;

?>