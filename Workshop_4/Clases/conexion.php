<?php
    // --- Clase de conexión ---
    class Conexion
    {
        protected mysqli $db;

        public function __construct()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "workshop3";

            $this->db = new mysqli($servername, $username, $password, $dbname);

            if ($this->db->connect_error) {
                die("Error de conexión: " . $this->db->connect_error);
            }
        }
    }
?>