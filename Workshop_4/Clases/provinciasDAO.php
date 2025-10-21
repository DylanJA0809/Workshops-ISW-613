<?php
    require_once 'conexion.php';

    class Provincias extends Conexion
    {
        /**
         * Devuelve un array con los nombres de todas las provincias
         */
        public function obtenerTodas(): array
        {
            $provincias = [];

            $sql = "SELECT nombre FROM provincias ORDER BY nombre ASC";
            $resultado = $this->db->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $provincias[] = $fila['nombre'];
                }
            }

            $resultado?->free(); // Libera memoria si existe resultado

            return $provincias;
        }
    }
?>