<?php


// INCLUDE
include_once 'TP2.PHP';

// Crear responsable
$responsable = new ResponsableV("12345", "6789", "Juan", "Perez");

// Crear instancia de Viaje
$viaje = new Viaje("VF001", "Ciudad de destino", 50, $responsable);

// Menú de opciones
echo "Bienvenido al sistema de gestión de viajes de Viaje Feliz\n";

while (true) {
    echo "1. Agregar pasajero\n";
    echo "2. Modificar datos de pasajero\n";
    echo "3. Ver información del viaje\n";
    echo "4. Salir\n";
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
        case 4:
            // Salir del programa
            echo "Saliendo del programa...\n";
            exit;
            break;
        default:
            echo "Opción no válida.\n";
    }
}