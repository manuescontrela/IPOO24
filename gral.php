<?php

// Clase de ejemplo con métodos de acceso y método __toString()
class MiClase {
    private $variable1;
    private $variable2;

    public function __construct($var1, $var2) {
        $this->variable1 = $var1;
        $this->variable2 = $var2;
    }

    // Métodos de acceso (getters)
    public function getVariable1() {
        return $this->variable1;
    }

    public function getVariable2() {
        return $this->variable2;
    }

    // Método mágico para representación en string
    public function __toString() {
        return "Variable1: " . $this->variable1 . ", Variable2: " . $this->variable2;
    }
}

// Clase de prueba para probar la clase MiClase
class TestMiClase {
    public static function probar() {
        $obj = new MiClase("valor1", "valor2");
        echo $obj->__toString() . "\n";
        echo "Variable1: " . $obj->getVariable1() . "\n";
        echo "Variable2: " . $obj->getVariable2() . "\n";
    }
}

// Probando la clase
TestMiClase::probar();