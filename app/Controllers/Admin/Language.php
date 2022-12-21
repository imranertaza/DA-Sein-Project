<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Language extends BaseController
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
            $table = DB()->table('language');
            $data['language'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Language/list', $data);
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

            $data['action'] = base_url('Admin/Language/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Language/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['language_name'] = $this->request->getPost('language_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'language_name' => ['label' => 'language_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Language/create');
        }else{

            $table = DB()->table('language');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Language/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('language');
            $data['language'] = $table->where('language_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Language/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Language/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $language_id = $this->request->getPost('language_id');

        $data['language_name'] = $this->request->getPost('language_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'language_name' => ['label' => 'language_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Language/update/' . $language_id);
        } else {
            $table = DB()->table('language');
            $table->where('language_id', $language_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Language/update/' . $language_id);
        }
    }


    public function delete($id){

        $table = DB()->table('language');
        $table->where('language_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Language');
    }


}
