<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Intern_semester extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
    }

    public function index()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('intern_sem');
            $data['intern_sem'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Intern_semester/list', $data);
            echo view('Admin/footer');
        }
    }

    public function create()
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {

            $data['action'] = base_url('Admin/Intern_semester/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Intern_semester/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['intern_sem_name'] = $this->request->getPost('intern_sem_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'intern_sem_name' => ['label' => 'intern_sem_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Intern_semester/create');
        }else{

            $table = DB()->table('intern_sem');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Intern_semester/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('intern_sem');
            $data['intern_sem'] = $table->where('intern_sem_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Intern_semester/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Intern_semester/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $intern_sem_id = $this->request->getPost('intern_sem_id');

        $data['intern_sem_name'] = $this->request->getPost('intern_sem_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'intern_sem_name' => ['label' => 'intern_sem_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Intern_semester/update/' . $intern_sem_id);
        } else {
            $table = DB()->table('intern_sem');
            $table->where('intern_sem_id', $intern_sem_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Intern_semester/update/' . $intern_sem_id);
        }
    }


    public function delete($id){

        $table = DB()->table('intern_sem');
        $table->where('intern_sem_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Intern_semester');
    }


}
