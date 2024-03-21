
<?php
class Usuario {
    private $nombreUsuario;
    private $contraseña;
    private $fraseRecordar;
    private $ultimasContraseñas;

    public function __construct($nombreUsuario, $contraseña, $fraseRecordar) {
        $this->nombreUsuario = $nombreUsuario;
        $this->contraseña = $contraseña;
        $this->fraseRecordar = $fraseRecordar;
        $this->ultimasContraseñas = array();
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function getFraseRecordar() {
        return $this->fraseRecordar;
    }

    public function getUltimasContraseñas() {
        return $this->ultimasContraseñas;
    }

    public function __toString() {
        return "Usuario: " . $this->nombreUsuario . "\nContraseña: " . $this->contraseña . "\nFrase Recordar: " . $this->fraseRecordar;
    }

    public function cambiarContraseña($nuevaContraseña) {
        if (!in_array($nuevaContraseña, $this->ultimasContraseñas)) {
            // Guardamos la contraseña actual antes de cambiarla
            $contraseñaAnterior = $this->contraseña;
            
            // Cambiamos la contraseña actual por la nueva contraseña
            $this->contraseña = $nuevaContraseña;
    
            // Agregamos la contraseña anterior al array de últimas contraseñas
            array_push($this->ultimasContraseñas, $contraseñaAnterior);
        } else {
            echo "No se puede cambiar la contraseña. La nueva contraseña ya ha sido usada recientemente.";
        }
    }
}

class TestUsuario {
    public static function main() {
        $usuario = new Usuario("ejemploUsuario", "contraseña123", "Frase para recordar");
        echo $usuario . "\n";
        $usuario->cambiarContraseña("nuevaContraseña456");
        echo $usuario . "\n";
        $usuario->cambiarContraseña("contraseña123");
        echo $usuario . "\n";
    }
}

// Ejecutar la prueba
TestUsuario::main();
?>