<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Citizenship extends BaseController
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
            $table = DB()->table('citizenship');
            $data['citizenship'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Citizenship/list', $data);
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

            $data['action'] = base_url('Admin/Citizenship/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Citizenship/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['citizenship_name'] = $this->request->getPost('citizenship_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'citizenship_name' => ['label' => 'citizenship_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Citizenship/create');
        }else{

            $table = DB()->table('citizenship');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Citizenship/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('citizenship');
            $data['citizenship'] = $table->where('citizenship_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Citizenship/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Citizenship/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $citizenship_id = $this->request->getPost('citizenship_id');

        $data['citizenship_name'] = $this->request->getPost('citizenship_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'citizenship_name' => ['label' => 'citizenship_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Citizenship/update/' . $citizenship_id);
        } else {
            $table = DB()->table('citizenship');
            $table->where('citizenship_id', $citizenship_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Citizenship/update/' . $citizenship_id);
        }
    }


    public function delete($id){

        $table = DB()->table('citizenship');
        $table->where('citizenship_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Citizenship');
    }


}
