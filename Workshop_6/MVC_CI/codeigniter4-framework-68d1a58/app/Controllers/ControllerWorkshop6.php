<?php
namespace App\Controllers;

use App\Models\CarreraModel;
use App\Models\EstudianteModel;
use CodeIgniter\Controller;

class ControllerWorkshop6 extends BaseController 
{
    // -------------------------------------------------------------------------
    //                               INICIO
    // -------------------------------------------------------------------------
    public function index() 
    {
        $data['titulo'] = "Listado de Carreras y Estudiantes";

        // Modelos
        $carreraModel    = new CarreraModel();
        $estudianteModel = new EstudianteModel();

        // Cargar carreras
        $data['carreras'] = $carreraModel->findAll();

        // JOIN para estudiantes con nombre de carrera
        $db = \Config\Database::connect();
        $builder = $db->table('estudiantes');
        $builder->select('estudiantes.*, carreras.nombre AS carrera');
        $builder->join('carreras', 'carreras.id = estudiantes.idCarrera', 'left');
        $data['estudiantes'] = $builder->get()->getResultArray();

        return view('Views_Workshop6/inicio', $data);
    }

    // -------------------------------------------------------------------------
    //                               REGISTRO CARRERAS
    // -------------------------------------------------------------------------
    public function register_careers() 
    {
        $data['titulo'] = "Creación de Carreras";
        return view('Views_Workshop6/registro_carreras', $data);
    }

    public function save_career()
    {
        $model = new CarreraModel();
        $nombre = $this->request->getPost('nombre');

        if (!empty($nombre)) {
            $model->insert(['nombre' => $nombre]);
        }

        return redirect()->to(site_url('register_careers'));
    }

    // -------------------------------------------------------------------------
    //                               EDITAR CARRERAS
    // -------------------------------------------------------------------------
    public function edit_careers() 
    {
        $data['titulo'] = "Edición de Carreras";

        $model = new CarreraModel();
        $data['carreras'] = $model->findAll();

        return view('Views_Workshop6/editar_carreras', $data);
    }

    public function edit_career($id)
    {
        $model = new CarreraModel();

        $data['titulo'] = "Editar Carrera";
        $data['carrera'] = $model->find($id);

        return view('Views_Workshop6/editar_carrera', $data);
    }

    public function update_career($id)
    {
        $model = new CarreraModel();

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre')
        ]);

        return redirect()->to(site_url('edit_careers'));
    }

    public function delete_career($id)
    {
        $model = new CarreraModel();
        $model->delete($id);

        return redirect()->to(site_url('edit_careers'));
    }

    // -------------------------------------------------------------------------
    //                               REGISTRO ESTUDIANTES
    // -------------------------------------------------------------------------
    public function register_students() 
    {
        $data['titulo'] = "Creación de Estudiantes";

        // Necesitamos lista de carreras para el select
        $carrModel = new CarreraModel();
        $data['carreras'] = $carrModel->findAll();

        return view('Views_Workshop6/registro_estudiantes', $data);
    }

    public function save_student()
    {
        $model = new EstudianteModel();

        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'edad'      => $this->request->getPost('edad'),
            'idCarrera' => $this->request->getPost('idCarrera'),
        ];

        $model->insert($data);

        return redirect()->to(site_url('register_students'));
    }

    // -------------------------------------------------------------------------
    //                               EDITAR ESTUDIANTES
    // -------------------------------------------------------------------------
    public function edit_students() 
    {
        $data['titulo'] = "Edición de Estudiantes";

        $db      = \Config\Database::connect();
        $builder = $db->table('estudiantes');

        $builder->select('estudiantes.*, carreras.nombre AS carrera');
        $builder->join('carreras', 'carreras.id = estudiantes.idCarrera', 'left');
        $data['estudiantes'] = $builder->get()->getResultArray();

        $carrModel = new CarreraModel();
        $data['carreras'] = $carrModel->findAll();

        return view('Views_Workshop6/editar_estudiantes', $data);
    }

    public function edit_student($id)
    {
        $estModel  = new EstudianteModel();
        $carrModel = new CarreraModel();

        $data['titulo'] = "Editar Estudiante";
        $data['estudiante'] = $estModel->find($id);
        $data['carreras']   = $carrModel->findAll();

        return view('Views_Workshop6/editar_estudiante', $data);
    }

    public function update_student($id)
    {
        $model = new EstudianteModel();

        $model->update($id, [
            'nombre'    => $this->request->getPost('nombre'),
            'edad'      => $this->request->getPost('edad'),
            'idCarrera' => $this->request->getPost('idCarrera'),
        ]);

        return redirect()->to(site_url('edit_students'));
    }

    public function delete_student($id)
    {
        $model = new EstudianteModel();
        $model->delete($id);

        return redirect()->to(site_url('edit_students'));
    }
}
