<?php

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct($horas = 0, $minutos = 0, $segundos = 0) {
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }

    // Métodos de acceso para las variables de instancia
    public function getHoras() {
        return $this->horas;
    }

    public function getMinutos() {
        return $this->minutos;
    }

    public function getSegundos() {
        return $this->segundos;
    }

    // Método __toString() para representación en string
    public function __toString() {
        return sprintf("%02d:%02d:%02d", $this->horas, $this->minutos, $this->segundos);
    }

    //** Método para poner a cero el reloj
    public function puestaACero() {
        $this->horas = 0;
        $this->minutos = 0;
        $this->segundos = 0;
    } 

    // Método para incrementar el reloj
    public function incremento() {
        $this->segundos++;
        if ($this->segundos >= 60) {
            $this->segundos = 0;
            $this->minutos++;
            if ($this->minutos >= 60) {
                $this->minutos = 0;
                $this->horas++;
                if ($this->horas >= 24) {
                    $this->horas = 0;
                }
            }
        }
    }
}

// Clase de prueba para probar la clase Reloj
class TestReloj {
    public static function probar() {
        $reloj = new Reloj(23, 56, 58);
        echo "Reloj inicial: " . $reloj . "\n";
        
        $reloj->incremento();
        echo "Reloj después de incrementar: " . $reloj . "\n";

        $reloj->incremento();
        echo "Reloj después de incrementar2: " . $reloj . "\n";
        
        $reloj->incremento();
        echo "Reloj después de incrementar3: " . $reloj . "\n";
        

        $reloj->puestaACero();
        echo "Reloj después de poner a cero: " . $reloj . "\n";
    }
}

// Probando la clase
TestReloj::probar();