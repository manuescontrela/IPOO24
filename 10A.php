<?php

class Calculadora {
    private $numero1;
    private $numero2;

    public function __construct($num1, $num2) {
        $this->numero1 = $num1;
        $this->numero2 = $num2;
    }

    // Métodos de acceso para las variables de instancia
    public function getNumero1() {
        return $this->numero1;
    }

    public function getNumero2() {
        return $this->numero2;
    }

    // Método __toString() para representación en string
    public function __toString() {
        return "Número 1: " . $this->numero1 . ", Número 2: " . $this->numero2;
    }

    // Métodos para realizar operaciones
    public function sumar() {
        return $this->numero1 + $this->numero2;
    }

    public function restar() {
        return $this->numero1 - $this->numero2;
    }

    public function multiplicar() {
        return $this->numero1 * $this->numero2;
    }

    public function dividir() {
        if ($this->numero2 == 0) {
            throw new Exception("No se puede dividir entre cero.");
        }
        return $this->numero1 / $this->numero2;
    }
}

// Clase de prueba para probar la clase Calculadora
class TestCalculadora {
    public static function probar() {
        $calc = new Calculadora(5, 3);
        echo "Valores: " . $calc->__toString() . "\n";
        echo "Suma: " . $calc->sumar() . "\n";
        echo "Resta: " . $calc->restar() . "\n";
        echo "Multiplicación: " . $calc->multiplicar() . "\n";
        echo "División: " . $calc->dividir() . "\n";
    }
}

// Probando la clase
TestCalculadora::probar();



