<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Education extends BaseController
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
            $table = DB()->table('education');
            $data['education'] = $table->get()->getResult();


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Education/list', $data);
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

            $data['action'] = base_url('Admin/Education/create_action');


            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Education/create', $data);
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {

        $data['education_name'] = $this->request->getPost('education_name');
        $data['createdBy'] = $this->session->userId;

        $this->validation->setRules([
            'education_name' => ['label' => 'education_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Education/create');
        }else{

            $table = DB()->table('education');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Education/create');
        }
    }


    public function update($id)
    {
        $isLoggedIn = $this->session->isLoggedIn;
        $role_id = $this->session->role;
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            return redirect()->to(site_url('Admin/login'));
        } else {
            $table = DB()->table('education');
            $data['education'] = $table->where('education_id', $id)->get()->getRow();

            $data['action'] = base_url('Admin/Education/update_action');

            echo view('Admin/header');
            echo view('Admin/sidebar');
            echo view('Admin/Education/update', $data);
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {

        $education_id = $this->request->getPost('education_id');

        $data['education_name'] = $this->request->getPost('education_name');
        $data['updatedBy'] = $this->session->userId;

        $this->validation->setRules([
            'education_name' => ['label' => 'education_name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Education/update/' . $education_id);
        } else {
            $table = DB()->table('education');
            $table->where('education_id', $education_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Education/update/' . $education_id);
        }
    }


    public function delete($id){

        $table = DB()->table('education');
        $table->where('education_id', $id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Education');
    }


}
