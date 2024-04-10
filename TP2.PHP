<?php

class Pasajero {
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    public function __construct($nombre, $apellido, $documento, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

class ResponsableV {
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido) {
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNumeroEmpleado() {
        return $this->numeroEmpleado;
    }

    public function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }

    public function setNumeroLicencia($numeroLicencia) {
        $this->numeroLicencia = $numeroLicencia;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
}

class Viaje {
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $responsable;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $responsable) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->responsable = $responsable;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }

    public function modificarPasajero($documento, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() === $documento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                return true;
            }
        }
        return false;
    }

    public function agregarPasajero($nombre, $apellido, $documento, $telefono) {
        if (count($this->pasajeros) < $this->cantMaxPasajeros) {
            foreach ($this->pasajeros as $pasajero) {
                if ($pasajero->getDocumento() === $documento) {
                    return false; // El pasajero ya está en el viaje
                }
            }
            $this->pasajeros[] = new Pasajero($nombre, $apellido, $documento, $telefono);
            return true;
        }
        return false; // El viaje ya está completo
    }
}

// Script testViaje.php
// Ejemplo de uso de la clase Viaje

// Crear responsable
$responsable = new ResponsableV("12345", "6789", "Juan", "Perez");

// Crear instancia de Viaje
$viaje = new Viaje("VF001", "Ciudad de destino", 50, $responsable);

// Menú de opciones
echo "Bienvenido al sistema de gestión de viajes de Viaje Feliz\n";
echo "1. Agregar pasajero\n";
echo "2. Modificar datos de pasajero\n";
echo "3. Ver información del viaje\n";
echo "Ingrese el número de la opción deseada: ";

$opcion = trim(fgets(STDIN));

switch ($opcion) {
    case 1:
        // Agregar pasajero
        echo "Ingrese el nombre del pasajero: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero: ";
        $apellido = trim(fgets(STDIN));
        echo "Ingrese el número de documento del pasajero: ";
        $documento = trim(fgets(STDIN));
        echo "Ingrese el teléfono del pasajero: ";
        $telefono = trim(fgets(STDIN));

        if ($viaje->agregarPasajero($nombre, $apellido, $documento, $telefono)) {
            echo "Pasajero agregado correctamente al viaje.\n";
        } else {
            echo "No se pudo agregar el pasajero. El viaje está completo o el pasajero ya está incluido en el viaje.\n";
        }
        break;
    case 2:
        // Modificar datos de pasajero
        echo "Ingrese el número de documento del pasajero a modificar: ";
        $documento = trim(fgets(STDIN));
        echo "Ingrese el nuevo nombre del pasajero: ";
        $nuevoNombre = trim(fgets(STDIN));
        echo "Ingrese el nuevo apellido del pasajero: ";
        $nuevoApellido = trim(fgets(STDIN));
        echo "Ingrese el nuevo teléfono del pasajero: ";
        $nuevoTelefono = trim(fgets(STDIN));

        if ($viaje->modificarPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoTelefono)) {
            echo "Datos del pasajero modificados correctamente.\n";
        } else {
            echo "No se pudo encontrar al pasajero con el documento ingresado.\n";
        }
        break;
    case 3:
        // Ver información del viaje
        echo "Información del Viaje:\n";
        echo "Código: " . $viaje->getCodigo() . "\n";
        echo "Destino: " . $viaje->getDestino() . "\n";
        echo "Cantidad máxima de pasajeros: " . $viaje->getCantMaxPasajeros() . "\n";
        echo "Responsable del viaje: " . $viaje->getResponsable()->getNombre() . " " . $viaje->getResponsable()->getApellido() . "\n";

        if (!empty($viaje->getPasajeros())) {
            echo "Pasajeros:\n";
            foreach ($viaje->getPasajeros() as $pasajero) {
                echo "- Nombre: " . $pasajero->getNombre() . " " . $pasajero->getApellido() . ", Documento: " . $pasajero->getDocumento() . ", Teléfono: " . $pasajero->getTelefono() . "\n";
            }
        } else {
            echo "No hay pasajeros registrados en este viaje.\n";
        }
        break;
    default:
        echo "Opción no válida.\n";
}

