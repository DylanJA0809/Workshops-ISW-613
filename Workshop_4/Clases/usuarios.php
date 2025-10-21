<?php
    // --- Clase Usuarios que hereda de Conexion ---
    require_once "conexion.php";

    class Usuarios extends Conexion
    {
        private string $nombre;
        private string $apellido;
        private string $provincia;
        private string $password;

        // Constructor con los datos del usuario
        public function __construct(string $nombre, string $apellido, string $password, string $provincia = '')
        {
            parent::__construct(); // hereda la conexión
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->provincia = $provincia;
        }

        // Método para guardar el usuario en la base de datos
        public function guardar(): bool|int
        {
            $stmt = $this->db->prepare("
                INSERT INTO usuarios (nombre, apellido, password, provincia)
                VALUES (?, ?, ?, ?)
            ");

            if (!$stmt) {
                die("Error al preparar la consulta: " . $this->db->error);
            }

            $stmt->bind_param("ssss", $this->nombre, $this->apellido, $this->password, $this->provincia);

            if ($stmt->execute()) {
                $id = $stmt->insert_id;
                $stmt->close();
                return $id;
            }

            $stmt->close();
            return false;
        }

        // Método saludar
        public function saludar(): string
        {
            return "👋 Hola {$this->nombre} {$this->apellido} de {$this->provincia}!";
        }
    }
?>