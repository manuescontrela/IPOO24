<?php
class Fecha {
    private $dia;
    private $mes;
    private $anio;

    public function __construct($dia, $mes, $anio) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    // Métodos de acceso para las variables de instancia
    public function getDia() {
        return $this->dia;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getAnio() {
        return $this->anio;
    }

    // Método __toString() para representación en string
    public function __toString() {
        return sprintf("%02d/%02d/%d", $this->dia, $this->mes, $this->anio);
    }

    // Método para obtener la fecha en formato extendido (16 de febrero de 2000)
    public function fechaExtendida() {
        $meses = array(
            1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio',
            7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
        );
        return $this->dia . ' de ' . $meses[$this->mes] . ' de ' . $this->anio;
    }

    // Método para incrementar la fecha en un número de días
    public function incremento($dias) {
        for ($i = 0; $i < $dias; $i++) {
            $this->incrementaUnDia();
        }
    }

    // Método privado para incrementar la fecha en un día
    private function incrementaUnDia() {
        $this->dia++;
        $diasEnMes = $this->diasEnMes($this->mes, $this->anio);
        if ($this->dia > $diasEnMes) {
            $this->dia = 1;
            $this->mes++;
            if ($this->mes > 12) {
                $this->mes = 1;
                $this->anio++;
            }
        }
    }

    // Método privado para obtener el número de días en un mes y año dados
    private function diasEnMes($mes, $anio) {
        switch ($mes) {
            case 4:
            case 6:
            case 9:
            case 11:
                return 30;
            case 2:
                return ($this->esBisiesto($anio)) ? 29 : 28;
            default:
                return 31;
        }
    }

    // Método privado para determinar si un año es bisiesto
    private function esBisiesto($anio) {
        return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
    }
}

// Clase de prueba para probar la clase Fecha
class TestFecha {
    public static function probar() {
        $fecha = new Fecha(25, 2, 2024);
        echo "Fecha en formato abreviado: " . $fecha . "\n";
        echo "Fecha en formato extendido: " . $fecha->fechaExtendida() . "\n";

        $fecha->incremento(5);
        echo "Fecha después de incrementar 5 días: " . $fecha . "\n";
    }
}

// Probando la clase
TestFecha::probar();