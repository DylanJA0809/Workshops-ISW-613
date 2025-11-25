<?php

namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table      = 'carreras';   // Nombre de la tabla
    protected $primaryKey = 'id';         // Llave primaria

    protected $allowedFields = ['nombre']; // Campos permitidos para INSERT/UPDATE

    public $useTimestamps = false; 
}
